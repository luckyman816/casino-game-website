<?php

namespace VanguardLTE\Games\Merkur\Goldofpersia;

class RiskBlackRed
{
    public static function get($balance, $log, $cards)
    {
        $totalWin = $log['FreeSpins'] ? $log['FreeSpins']['TotalWin'] : $log['TotalWin'];
        return ["de.edict.eoc.gaming.comm.GameClientActionResponseDTO" => [
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
                    "reels" => [
                        "0" => ["visibleSymbolCount" => 3,"swingOffSize" => 1,"symbols" => $log['Reels'][0]],
                        "1" => ["visibleSymbolCount" => 3,"swingOffSize" => 1,"symbols" => $log['Reels'][1]],
                        "2" => ["visibleSymbolCount" => 3,"swingOffSize" => 1,"symbols" => $log['Reels'][2]],
                        "3" => ["visibleSymbolCount" => 3,"swingOffSize" => 1,"symbols" => $log['Reels'][3]],
                        "4" => ["visibleSymbolCount" => 3,"swingOffSize" => 1,"symbols" => $log['Reels'][4]]
                    ]],
                "nextGameActions" => self::nextGameActions($totalWin),
                "accounting" => ["debit" => $log['Bet'], "credit" => 0, "debitType" => "WAGER", "creditType" => "WIN"],
                "uncommittedWinSum" => $totalWin,
                "riskPot" => $totalWin,
                "lastWagerSum" => 0,
                "addOnGameResult" => ["winnings" => [], "creatorName" => "BLACKRED", "parameters" => [], "childGameResult" => null,
                    "drawnCards" => json_decode($cards->dropped_cards, true),
                    "initialWager" => $totalWin,
                    "peak" => 14000,
                    "nextWagerStep" => $totalWin,
                    "nextWinSum" => $totalWin * 2,
                    "drawnCard" => null,
                    "winSum" => 0,
                    "wager" => 0,
                    "isPeakBetStep" => false,
                    "won" => false],
                "nextGameFlowName" => "RISK_GAME",
                "responseType" => "ACTION"])]];
    }

    private static function nextGameActions($totalWin){
        if ($totalWin < 20){
            return [
                ["id" => "FINISH_GAME", "minTotalWager" => 0, "maxTotalWager" => 0, "wagerCondition" => "ADD", "debitType" => "WAGER", "wagerPositions" => []],
                ["id" => "RISK_BLACKRED_RED", "minTotalWager" => 0, "maxTotalWager" => 0, "wagerCondition" => "ADD", "debitType" => "WAGER", "wagerPositions" => []],
                ["id" => "RISK_BLACKRED_BLACK", "minTotalWager" => 0, "maxTotalWager" => 0, "wagerCondition" => "ADD", "debitType" => "WAGER", "wagerPositions" => []]
            ];
        }else{
            return [
                ["id" => "FINISH_GAME", "minTotalWager" => 0, "maxTotalWager" => 0, "wagerCondition" => "ADD", "debitType" => "WAGER", "wagerPositions" => []],
                ["id" => "RISK_DIVIDE", "minTotalWager" => 0, "maxTotalWager" => 0, "wagerCondition" => "ADD", "debitType" => "WAGER", "wagerPositions" => []],
                ["id" => "RISK_BLACKRED_RED", "minTotalWager" => 0, "maxTotalWager" => 0, "wagerCondition" => "ADD", "debitType" => "WAGER", "wagerPositions" => []],
                ["id" => "RISK_BLACKRED_BLACK", "minTotalWager" => 0, "maxTotalWager" => 0, "wagerCondition" => "ADD", "debitType" => "WAGER", "wagerPositions" => []]
            ];
        }
    }

    public static function cards($userId, $gameId, $shopId){
        $cards = self::getCards();
        list($dropped_cards, $cards) = self::getInitialCards($cards);
        // при открытии карточного риска, проверить есть ли запись в бд, если нет - создать и вернуть
        $cardsDb = \VanguardLTE\CardsRisk::firstOrCreate(
            [
                'user_id' => $userId,
                'game_id' => $gameId,
                'shop_id' => $shopId],
            [
                'cards' => json_encode($cards),
                'dropped_cards' => json_encode($dropped_cards)
            ]);
        return $cardsDb;
    }

    private static function getInitialCards($cards){
        // выбрать из массива карт 6 рандомных карт, убрать их из массива колоды
        shuffle($cards);
        $dropped_cards = array_slice($cards, 0,6);
        $cards = array_slice($cards, 6);
        // вернуть колоду и выпавшие карты
        return array($dropped_cards, $cards);
    }

    public static function getCards(){
        return [ // ♦️0 - Бубны — diamonds, ♥️1 - Червы — hearts, ♠️2 - Пики — spades, ♣️3 - Трефы — clubs
            // 0 - 2 / 1 - 3 / 2 - 4 / 3 - 5 / 4 - 6 / 5 - 7 / 6 - 8 / 7 - 9 / 8 - 10 / 9 - J / 10 - Q / 11 - K / 12 - A
            ["winCard" => false, "hold" => false, "rankId" => 0, "suitId" => 0], // 2♦️
            ["winCard" => false, "hold" => false, "rankId" => 1, "suitId" => 0], // 3♦️
            ["winCard" => false, "hold" => false, "rankId" => 2, "suitId" => 0], // 4♦️
            ["winCard" => false, "hold" => false, "rankId" => 3, "suitId" => 0], // 5♦️
            ["winCard" => false, "hold" => false, "rankId" => 4, "suitId" => 0], // 6♦️
            ["winCard" => false, "hold" => false, "rankId" => 5, "suitId" => 0], // 7♦️
            ["winCard" => false, "hold" => false, "rankId" => 6, "suitId" => 0], // 8♦️
            ["winCard" => false, "hold" => false, "rankId" => 7, "suitId" => 0], // 9♦️
            ["winCard" => false, "hold" => false, "rankId" => 8, "suitId" => 0], // 10♦️
            ["winCard" => false, "hold" => false, "rankId" => 9, "suitId" => 0], // J♦️
            ["winCard" => false, "hold" => false, "rankId" => 10, "suitId" => 0], // Q♦️
            ["winCard" => false, "hold" => false, "rankId" => 11, "suitId" => 0], // K♦️
            ["winCard" => false, "hold" => false, "rankId" => 12, "suitId" => 0], // A♦️
            //
            ["winCard" => false, "hold" => false, "rankId" => 0, "suitId" => 1], // 2♥️️
            ["winCard" => false, "hold" => false, "rankId" => 1, "suitId" => 1], // 3♥️️
            ["winCard" => false, "hold" => false, "rankId" => 2, "suitId" => 1], // 4♥️️
            ["winCard" => false, "hold" => false, "rankId" => 3, "suitId" => 1], // 5♥️️
            ["winCard" => false, "hold" => false, "rankId" => 4, "suitId" => 1], // 6♥️️
            ["winCard" => false, "hold" => false, "rankId" => 5, "suitId" => 1], // 7♥️️
            ["winCard" => false, "hold" => false, "rankId" => 6, "suitId" => 1], // 8♥️️
            ["winCard" => false, "hold" => false, "rankId" => 7, "suitId" => 1], // 9♥️️
            ["winCard" => false, "hold" => false, "rankId" => 8, "suitId" => 1], // 10♥️️
            ["winCard" => false, "hold" => false, "rankId" => 9, "suitId" => 1], // J♥️️
            ["winCard" => false, "hold" => false, "rankId" => 10, "suitId" => 1], // Q♥️️
            ["winCard" => false, "hold" => false, "rankId" => 11, "suitId" => 1], // K♥️️
            ["winCard" => false, "hold" => false, "rankId" => 12, "suitId" => 1], // A♥️
            //
            ["winCard" => false, "hold" => false, "rankId" => 0, "suitId" => 2], // 2♠️️
            ["winCard" => false, "hold" => false, "rankId" => 1, "suitId" => 2], // 3♠️️
            ["winCard" => false, "hold" => false, "rankId" => 2, "suitId" => 2], // 4♠️️
            ["winCard" => false, "hold" => false, "rankId" => 3, "suitId" => 2], // 5♠️️
            ["winCard" => false, "hold" => false, "rankId" => 4, "suitId" => 2], // 6♠️️
            ["winCard" => false, "hold" => false, "rankId" => 5, "suitId" => 2], // 7♠️️
            ["winCard" => false, "hold" => false, "rankId" => 6, "suitId" => 2], // 8♠️️
            ["winCard" => false, "hold" => false, "rankId" => 7, "suitId" => 2], // 9♠️️
            ["winCard" => false, "hold" => false, "rankId" => 8, "suitId" => 2], // 10♠️️️
            ["winCard" => false, "hold" => false, "rankId" => 9, "suitId" => 2], // J♠️️
            ["winCard" => false, "hold" => false, "rankId" => 10, "suitId" => 2], // Q♠️️
            ["winCard" => false, "hold" => false, "rankId" => 11, "suitId" => 2], // K♠️️
            ["winCard" => false, "hold" => false, "rankId" => 12, "suitId" => 2], // A♠️
            //
            ["winCard" => false, "hold" => false, "rankId" => 0, "suitId" => 3], // 2♣️️️
            ["winCard" => false, "hold" => false, "rankId" => 1, "suitId" => 3], // 3♣️️️
            ["winCard" => false, "hold" => false, "rankId" => 2, "suitId" => 3], // 4♣️️️
            ["winCard" => false, "hold" => false, "rankId" => 3, "suitId" => 3], // 5♣️️️
            ["winCard" => false, "hold" => false, "rankId" => 4, "suitId" => 3], // 6♣️️️
            ["winCard" => false, "hold" => false, "rankId" => 5, "suitId" => 3], // 7♣️️️
            ["winCard" => false, "hold" => false, "rankId" => 6, "suitId" => 3], // 8♣️️️
            ["winCard" => false, "hold" => false, "rankId" => 7, "suitId" => 3], // 9♣️️️
            ["winCard" => false, "hold" => false, "rankId" => 8, "suitId" => 3], // 10♣️️️️
            ["winCard" => false, "hold" => false, "rankId" => 9, "suitId" => 3], // J♣️️️
            ["winCard" => false, "hold" => false, "rankId" => 10, "suitId" => 3], // Q♣️️️
            ["winCard" => false, "hold" => false, "rankId" => 11, "suitId" => 3], // K♣️️️
            ["winCard" => false, "hold" => false, "rankId" => 12, "suitId" => 3], // A♣️️
        ];
    }
}
