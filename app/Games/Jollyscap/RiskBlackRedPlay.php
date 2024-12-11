<?php

namespace VanguardLTE\Games\Merkur\Jollyscap;

class RiskBlackRedPlay
{
    public static function get($log, $command, $cards, $balance, $bank, $divide = false)
    {
        list($card, $win, $cards, $dropped_cards) = self::playCardRisk($cards, $bank, $command, $log['TotalWin']);
        $winSumm = $win ? self::getWin($win, $log['TotalWin']) : 0;

        return array($win, $winSumm, $cards, $dropped_cards, ["de.edict.eoc.gaming.comm.GameClientActionResponseDTO" => [
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
                "nextGameActions" => self::nextGameActions($win),
                "accounting" => ["debit" => $log['TotalWin'], "credit" => self::getWin($win, $log['TotalWin']), "debitType" => "RISK", "creditType" => "WIN"],
                "uncommittedWinSum" => $log['TotalWin'],
                "riskPot" => $log['TotalWin'],
                "lastWagerSum" => $log['Bet'],
                "addOnGameResult" => [
                    "winnings" => [], "creatorName" => "BLACKRED", "parameters" => [],
                    "drawnCards" => $dropped_cards,
                    "initialWager" => $log['TotalWin'],
                    "peak" => 14000,
                    "nextWagerStep" => self::getWin($win, $log['TotalWin']),
                    "nextWinSum" => self::getWin($win, $log['TotalWin'], true),
                    "drawnCard" => $card,
                    "winSum" => self::getWin($win, $log['TotalWin']),
                    "wager" => 256000,
                    "isPeakBetStep" => ($log['TotalWin'] * 2) > 13999,
                    "won" => $win],
                "winStreaks" => [
                    "32000" => ["winSum" => 256000, "length" => 1, "multiplier" => 0, "previousMultiplier" => 0, "nextMultiplier" => 0],
                    "800" => ["winSum" => 6400, "length" => 1, "multiplier" => 0, "previousMultiplier" => 0, "nextMultiplier" => 0],
                    "48000" => ["winSum" => 384000, "length" => 1, "multiplier" => 0, "previousMultiplier" => 0, "nextMultiplier" => 0],
                    "56000" => ["winSum" => 56000, "length" => 1, "multiplier" => 0, "previousMultiplier" => 0, "nextMultiplier" => 0]],
                "nextGameFlowName" => "RISK_GAME",
                "responseType" => "ACTION"])]]);
    }

    private static function getWin($win, $totalWin, $next = false){
        $mult = $next ? 4 : 2;
        if (!$win) return 0;
        if ($totalWin * $mult > 13999) return 14000;
        return $totalWin * $mult;
    }

    public static function playCardRisk($cards, $bank, $command, $totalWin): array
    {
        $dropped_cards = json_decode($cards->dropped_cards, true);
        $cards = json_decode($cards->cards, true);
        newCard:
        // получить рандомную карту из массива в бд
        $card = $cards[array_rand($cards)];
        // проверить на выигрыш
        $win = self::checkWin($command,$card);
        // проверить можно ли выигрывать если есть выигрыш
        if ($win && $bank->slots < (($totalWin * 2) / 100) ) goto newCard; // выбрать новую карту, если нет возможности выплатить
        // удалить карту из колоды игрока
        unset($cards[array_search($card, $cards)]);
        // добавить карту в выпавшие
        $dropped_cards[] = $card;
        // если в массиве выпавших больше 6 - то обрезать масив
        if (count($dropped_cards) > 6) $dropped_cards = array_slice($dropped_cards, -6, 6);
        // если в колоде осталось 2 карты - то заполнить колоду заново, исключив карты из 6 выпавших
        if (count($cards) < 3) $cards = self::newCards($dropped_cards);
        // вернуть карту, выиграл или нет, и выпавшие карты
        return array($card, $win, $cards, $dropped_cards);
    }

    private static function nextGameActions($win){
        if (!$win) return [["id" => "FINISH_GAME", "minTotalWager" => 0, "maxTotalWager" => 0, "wagerPositions" => []]];
        if ($win) {
            return [
                ["id" => "FINISH_GAME", "minTotalWager" => 0, "maxTotalWager" => 0, "wagerPositions" => []],
                ["id" => "RISK_DIVIDE", "minTotalWager" => 0, "maxTotalWager" => 0, "wagerPositions" => []],
                ["id" => "RISK_BLACKRED_RED", "minTotalWager" => 0, "maxTotalWager" => 0, "wagerPositions" => []],
                ["id" => "RISK_BLACKRED_BLACK", "minTotalWager" => 0, "maxTotalWager" => 0, "wagerPositions" => []]
            ];
        }
    }

    private static function newCards($dropped_cards): array
    {
        // получить новую колоду, и удалить из нее выпавшие
        $cards = RiskBlackRed::getCards();
        foreach ($dropped_cards as $dropped_card) {
            $key = array_search($dropped_card, $cards);
            unset($cards[$key]);
        }
        return array_values($cards);
    }

    private static function checkWin($command, $card){
        // проверить цвет карты и команду
        // если выбрана черная и цвет карты черный - вернуть истину
        if ($command === 'RISK_BLACKRED_BLACK' && $card['suitId'] > 1) return true;
        // то же для красных карт. 0,1 - красные, 2,3 - черные
        if ($command === 'RISK_BLACKRED_RED' && $card['suitId'] < 2) return true;
        // если ничего из этого не выполнилось - вернуть проигрыш
        return false;
    }

}
