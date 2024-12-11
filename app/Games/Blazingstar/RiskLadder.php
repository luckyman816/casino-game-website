<?php

namespace VanguardLTE\Games\Merkur\Blazingstar;

class RiskLadder
{
    public static function get($balance, $log)
    {
        list($minLevel, $maxLevel, $currentLevel) = self::getLevel($log['TotalWin']);
        list($nextGameActions, $initialLadderItems) = self::getData($minLevel, $maxLevel, $currentLevel);
        return array($minLevel, $maxLevel, $currentLevel, ["de.edict.eoc.gaming.comm.GameClientActionResponseDTO" => [
            "coreData" => [
                "depot" => [
                    "balance" => $balance,
                    "limitBalance" => $balance,
                    "playerMoney" => 0],
                "isGameFinished" => false],
            "gameData" => json_encode([
                "mainGameResult" => [
                    "winnings" => $log['Winnings']],
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
                    "2" => ["visibleSymbolCount" => 3,"swingOffSize" => 1,"symbols" => $log['Reels'][2]]
                ],
                "nextGameActions" => $nextGameActions,
                "accounting" => ["debit" => $log['Bet'], "credit" => 0, "debitType" => "WAGER", "creditType" => "WIN"],
                "uncommittedWinSum" => $log['TotalWin'],
                "riskPot" => $log['TotalWin'],
                "lastWagerSum" => $log['TotalWin'],
                "addOnGameResult" => [
                    "winnings" => [], "creatorName" => "LADDER", "parameters" => [], "ladderItems" => [
                        ["winnings" => [], "creatorName" => "LADDER", "parameters" => [], "value" => 0, "level" => 0, "lossLevel" => 0, "winLevel" => 1],
                        ["winnings" => [], "creatorName" => "LADDER", "parameters" => [], "value" => 15, "level" => 1, "lossLevel" => 0, "winLevel" => 2],
                        ["winnings" => [], "creatorName" => "LADDER", "parameters" => [], "value" => 30, "level" => 2, "lossLevel" => 0, "winLevel" => 3],
                        ["winnings" => [], "creatorName" => "LADDER", "parameters" => [], "value" => 60, "level" => 3, "lossLevel" => 0, "winLevel" => 4],
                        ["winnings" => [], "creatorName" => "LADDER", "parameters" => [], "value" => 120, "level" => 4, "lossLevel" => 0, "winLevel" => 5],
                        ["winnings" => [], "creatorName" => "LADDER", "parameters" => [], "value" => 240, "level" => 5, "lossLevel" => 0, "winLevel" => 6],
                        ["winnings" => [], "creatorName" => "LADDER", "parameters" => [], "value" => 0, "level" => 6, "lossLevel" => 6, "winLevel" => 6],
                        ["winnings" => [], "creatorName" => "LADDER", "parameters" => [], "value" => 400, "level" => 7, "lossLevel" => 0, "winLevel" => 8],
                        ["winnings" => [], "creatorName" => "LADDER", "parameters" => [], "value" => 800, "level" => 8, "lossLevel" => 7, "winLevel" => 9],
                        ["winnings" => [], "creatorName" => "LADDER", "parameters" => [], "value" => 1200, "level" => 9, "lossLevel" => 7, "winLevel" => 10],
                        ["winnings" => [], "creatorName" => "LADDER", "parameters" => [], "value" => 2000, "level" => 10, "lossLevel" => 8, "winLevel" => 11],
                        ["winnings" => [], "creatorName" => "LADDER", "parameters" => [], "value" => 3200, "level" => 11, "lossLevel" => 9, "winLevel" => 12],
                        ["winnings" => [], "creatorName" => "LADDER", "parameters" => [], "value" => 5200, "level" => 12, "lossLevel" => 10, "winLevel" => 13],
                        ["winnings" => [], "creatorName" => "LADDER", "parameters" => [], "value" => 8400, "level" => 13, "lossLevel" => 11, "winLevel" => 14],
                        ["winnings" => [], "creatorName" => "LADDER", "parameters" => [], "value" => 14000, "level" => 14, "lossLevel" => -1, "winLevel" => -1]],
                    "initialLadderItems" => $initialLadderItems, "initialWager" => 56000],
                "winStreaks" => [
                    "32000" => ["winSum" => 256000, "length" => 1, "multiplier" => 0, "previousMultiplier" => 0, "nextMultiplier" => 0],
                    "800" => ["winSum" => 6400, "length" => 1, "multiplier" => 0, "previousMultiplier" => 0, "nextMultiplier" => 0],
                    "48000" => ["winSum" => 384000, "length" => 1, "multiplier" => 0, "previousMultiplier" => 0, "nextMultiplier" => 0],
                    "56000" => ["winSum" => 56000, "length" => 1, "multiplier" => 0, "previousMultiplier" => 0, "nextMultiplier" => 0]],
                "nextGameFlowName" => "RISK_GAME",
                "responseType" => "ACTION"])]]);
    }

    // функция определяющая текущий уровень риска
    private static function getLevel($win)
    {
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
        foreach ($levels as $key => $level) {
            if ($win == $level['value']) { // если выигрыш уже является уровнем
                $currentLevel = $levels[$key];
                if ($currentLevel['level'] == 7) $min = $currentLevel['level']; else $min = 1;
                if ($currentLevel['level'] === 5){
                    $maxLevel = $levels[$key+1];
                    $minLevel = $levels[$key-5];
                    break;
                }
                $maxLevel = $levels[$key+1];
                $minLevel = $levels[$key-$min];
                break;
            }
            if ($win < $level['value']) {
                $maxLevel = $levels[$key];
                if ($maxLevel['level'] == 7){
                    $minLevel = $levels[$key-2];
                }else{
                    $minLevel = $levels[$key-1];
                }
                $currentLevel = false;
                break;
            }
        }
        return array($minLevel, $maxLevel, $currentLevel);
    }

    private static function getData($minLevel, $maxLevel, $currentLevel)
    {
        if ($currentLevel) {
            $initialLadderItems = [
                ["winnings" => [], "creatorName" => "LADDER", "parameters" => [], "childGameResult" => null,
                    "value" => $currentLevel['value'],
                    "level" => $currentLevel['level'],
                    "lossLevel" => $currentLevel['lossLevel'],
                    "winLevel" => $currentLevel['winLevel']]
            ];
            $nextGameActions = [
                ["id" => "FINISH_GAME", "minTotalWager" => 0, "maxTotalWager" => 0, "wagerPositions" => []],
                ["id" => "RISK_DIVIDE", "minTotalWager" => 0, "maxTotalWager" => 0, "wagerPositions" => []],
                ["id" => "PLAY", "minTotalWager" => 0, "maxTotalWager" => 0, "wagerPositions" => []]
            ];
        } else {
            $initialLadderItems = [
                ["winnings" => [], "creatorName" => "LADDER", "parameters" => [], "childGameResult" => null,
                    "value" => $maxLevel['value'],
                    "level" => $maxLevel['level'],
                    "lossLevel" => $maxLevel['lossLevel'],
                    "winLevel" => $maxLevel['winLevel']],

                ["winnings" => [], "creatorName" => "LADDER", "parameters" => [], "childGameResult" => null,
                    "value" => $minLevel['value'],
                    "level" => $minLevel['level'],
                    "lossLevel" => $minLevel['lossLevel'],
                    "winLevel" => $minLevel['winLevel']]
            ];
            $nextGameActions = [
                ["id" => "FINISH_GAME", "minTotalWager" => 0, "maxTotalWager" => 0, "wagerPositions" => []],
                ["id" => "PLAY", "minTotalWager" => 0, "maxTotalWager" => 0, "wagerPositions" => []]
            ];
        }
        return array($nextGameActions, $initialLadderItems);
    }
}
