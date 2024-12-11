<?php

namespace VanguardLTE\Games\Merkur\Jollyscap;

class RiskLadderPlay
{
    public static function get($balance, $log, $bank, $game, $divide = false)
    {
        // провести игру, задать новый уровень (ниже или выше)
        // нужно забрать из банка новую сумму при выигрыше и записать это в статистику
        // при проигрыше - вернуть в банк сумму и записать в статистику
        if ($divide){
            // вернуть лог с новыми уровнями, новой суммой выигрыша. Уровень должен быть на один ниже чем был
            list($toLog, $returnSumm, $totalWin, $level) = self::getDivide($log['MinLevel'], $log['MaxLevel'], $log['TotalWin']);
            // Сразу обновить баланс, путем добавления возвратной суммы
            $balance += $returnSumm;
        } else {
            list($toLog, $returnSumm, $totalWin, $level) = self::getRisk($log['MinLevel'], $log['MaxLevel'], $log['TotalWin'], $bank, $game);
        }
        $nextGameActions = self::getNextGameActions($level['level']);

        return array($toLog, $returnSumm, ["de.edict.eoc.gaming.comm.GameClientActionResponseDTO" => [
            "coreData" => [
                "depot" => [
                    "balance" => $balance,
                    "limitBalance" => $balance,
                    "playerMoney" => 0],
                "isGameFinished" => false],
            "gameData" => json_encode([
                "mainGameResult" => [
                    "winnings" => $log['Winnings'],
                    "creatorName" => "MAIN_GAME",
                    "parameters" => [],
                    "freeGameRound" => 0,
                    "freeGamesTotal" => 0,
                    "multiplier" => 1,
                    "resultGeneratorKey" => ["keyName" => "SLOT_MACHINE"],
                    "baseRound" => 1,
                    "reels" => [
                        "0" => ["visibleSymbolCount" => 3,"swingOffSize" => 1,"symbols" => $log['Reels'][0]],
                        "1" => ["visibleSymbolCount" => 3,"swingOffSize" => 1,"symbols" => $log['Reels'][1]],
                        "2" => ["visibleSymbolCount" => 3,"swingOffSize" => 1,"symbols" => $log['Reels'][2]],
                        "3" => ["visibleSymbolCount" => 3,"swingOffSize" => 1,"symbols" => $log['Reels'][3]],
                        "4" => ["visibleSymbolCount" => 3,"swingOffSize" => 1,"symbols" => $log['Reels'][4]]
                    ]],
                "nextGameActions" => $nextGameActions,
                "accounting" => ["debit" => $log['Bet'], "credit" => 0, "debitType" => "RISK", "creditType" => "WIN"],
                "uncommittedWinSum" => $totalWin,
                "riskPot" => $totalWin,
                "lastWagerSum" => 0,
                "addOnGameResult" => [
                    "winnings" => [], "creatorName" => "LADDER", "parameters" => [],
                    "childGameResult" => null,
                    "value" => $level['value'],
                    "level" => $level['level'],
                    "lossLevel" => $level['lossLevel'],
                    "winLevel" => $level['winLevel']
                ],
                "winStreaks" => ["32000" => ["winSum" => 256000, "length" => 1, "multiplier" => 0, "previousMultiplier" => 0, "nextMultiplier" => 0],
                    "800" => ["winSum" => 6400, "length" => 1, "multiplier" => 0, "previousMultiplier" => 0, "nextMultiplier" => 0],
                    "48000" => ["winSum" => 384000, "length" => 1, "multiplier" => 0, "previousMultiplier" => 0, "nextMultiplier" => 0],
                    "56000" => ["winSum" => 56000, "length" => 1, "multiplier" => 0, "previousMultiplier" => 0, "nextMultiplier" => 0]],
                "nextGameFlowName" => "RISK_GAME",
                "responseType" => "ACTION"])]]);
    }

    private static function getRisk($minLevel, $maxLevel, $totalWin, $bank, $game){
        $returnSumm = 0;
        // розыгрыш
        if ($minLevel['level'] == 6 && $maxLevel['level'] == 6){
            // сделать розыгрыш от 7 до 14 уровня
            $levelWin = rand(7, 14); // выбрать рандомно уровень.
            list($minLevel, $maxLevel) = self::getLevel(($levelWin - 1), $levelWin);
        }
        // выбрать рандомно минимальный или максимальный уровень
        $levels = [$minLevel, $maxLevel];
        $level = rand(0,1);
        if ($maxLevel['level'] == 6 && $minLevel['level'] == 0) { // если при выигрыше будет розыгрыш - нужно проверить есть ли в банке максимальный выигрыш в розыгрыше
            if ($bank->slots < 200) $level = 0; // если в банке нет 200 (140 + 60 на запас) то не дать выиграть розыгрыш.
        }
        loseRisk:
        if ($level > 0) { // выигрыш
            // посчитать сколько выиграл сверху уже выигранной суммы
            $winSumm = $levels[$level]['value'] - $totalWin;
            // проверить хватает ли денег в банке на такую выплату, если нет присвоить уровню 0 и перейти к строке перед if
            if ($bank->slots < ($winSumm / 100)){
                $level = 0;
                goto loseRisk;
            } else { // если хватает денег на выплату
                // Снять из банка необходимую сумму
                $bank->decrement('slots', ($winSumm / 100));
                $game->increment('stat_out', ($winSumm / 100));
            }
        } else { // проигрыш
            // посчитать сколько вернуть в банк
            $returnSumm = $totalWin - $levels[$level]['value'];
            $bank->increment('slots', ($returnSumm / 100));
            $game->decrement('stat_out', ($returnSumm / 100));
        }
        $bank->save();
        $game->save();
        $level = $levels[$level];
        $totalWin = $level['value'];
        list($minLevel, $maxLevel) = self::getLevel($level['lossLevel'], $level['winLevel']);
        $toLog = ['MinLevel' => $minLevel, 'MaxLevel' => $maxLevel, 'TotalWin' => $totalWin];
        // возвратить то что записать в лог, выигрыш и текущий уровень
        return array($toLog, $returnSumm, $totalWin, $level);
    }

    private static function getDivide($minLevel, $maxLevel, $totalWin){
        list($newLevel, $newMinLevel, $newMaxLevel) = self::getLevel($minLevel['level'], $maxLevel['level'], true);
        $toLog = ['MinLevel' => $newMinLevel, 'MaxLevel' => $newMaxLevel, 'TotalWin' => $newLevel['value']]; // новые уровни и выигрыш
        $returnSumm = $totalWin - $newLevel['value']; // сумма которую нужно зачислить игроку
        $totalWin = $newLevel['value'];
        $level = $newLevel; // новый уровень
        return array($toLog, $returnSumm, $totalWin, $level);
    }

    private static function getNextGameActions($level){
        if ($level == 6 || $level == 1){
            return [
                ["id" => "FINISH_GAME", "minTotalWager" => 0, "maxTotalWager" => 0, "wagerPositions" => []],
                ["id" => "PLAY", "minTotalWager" => 0, "maxTotalWager" => 0, "wagerPositions" => []]
            ];
        } else {
            return [
                ["id" => "FINISH_GAME", "minTotalWager" => 0, "maxTotalWager" => 0, "wagerPositions" => []],
                ["id" => "RISK_DIVIDE", "minTotalWager" => 0, "maxTotalWager" => 0, "wagerPositions" => []],
                ["id" => "PLAY", "minTotalWager" => 0, "maxTotalWager" => 0, "wagerPositions" => []]
            ];
        }
    }

    private static function getLevel($min, $max, $divide = false){
        $levels = [
            ['level' => 0, 'winLevel' => 1, 'lossLevel' => 0, "value" => 0],
            ['level' => 1, 'winLevel' => 2, 'lossLevel' => 0, "value" => 15],
            ['level' => 2, 'winLevel' => 3, 'lossLevel' => 0, "value" => 30],
            ['level' => 3, 'winLevel' => 4, 'lossLevel' => 0, "value" => 60],
            ['level' => 4, 'winLevel' => 5, 'lossLevel' => 0, "value" => 120],
            ['level' => 5, 'winLevel' => 6, 'lossLevel' => 0, "value" => 240],
            ['level' => 6, 'winLevel' => 6, 'lossLevel' => 6, "value" => 0],
            ['level' => 7, 'winLevel' => 8, 'lossLevel' => 0, "value" => 400],
            ['level' => 8, 'winLevel' => 9, 'lossLevel' => 7, "value" => 800],
            ['level' => 9, 'winLevel' => 10, 'lossLevel' => 7, "value" => 1200],
            ['level' => 10, 'winLevel' => 11, 'lossLevel' => 8, "value" => 2000],
            ['level' => 11, 'winLevel' => 12, 'lossLevel' => 9, "value" => 3200],
            ['level' => 12, 'winLevel' => 13, 'lossLevel' => 10, "value" => 5200],
            ['level' => 13, 'winLevel' => 14, 'lossLevel' => 11, "value" => 8400],
            ['level' => 14, 'winLevel' => -1, 'lossLevel' => -1, "value" => 14000],
        ];
        if ($divide){
            $currentLevel = $levels[$max-1];
            if ($currentLevel['level'] == 7) $divide = 3; else $divide = 2;
            $newLevel = $levels[$max - $divide];
            $newMinLevel = $levels[$newLevel['lossLevel']];
            $newMaxLevel = $levels[$newLevel['winLevel']];
            return array($newLevel, $newMinLevel, $newMaxLevel);
        } else {
            if ($min < 0) return array($levels[14], $levels[14]);
            return array($levels[$min], $levels[$max]);
        }
    }
}
