<?php

namespace VanguardLTE\Games\Merkur\Goldofpersia;

class Play
{
    public static function get($balance, $winnings, $reels, $bet, $totalWin, $freespinsLog, $freespins, $addFs, $finish = false)
    {
        return ["de.edict.eoc.gaming.comm.GameClientActionResponseDTO" => [
            "coreData" => ["depot" => ["balance" => $balance, "limitBalance" => $balance, "playerMoney" => 0], "isGameFinished" => false],
            "gameData" => json_encode([
                "mainGameResult" => [
                    "winnings" => $winnings,
                    "creatorName" => "MAIN_GAME",
                    "parameters" => [],
                    "freeGameRound" => $freespinsLog['CurrentFreeSpins'] ?: 0,
                    "freeGamesTotal" => $freespinsLog['TotalFreeSpins'] ?: 0,
                    "multiplier" => $freespinsLog ?: 1,
                    "resultGeneratorKey" => ["keyName" => "SLOT_MACHINE"],
                    "baseRound" => 1,
                    "reels" => [
                        "0" => ["visibleSymbolCount" => 3,"swingOffSize" => 1,"symbols" => $reels[0]],
                        "1" => ["visibleSymbolCount" => 3,"swingOffSize" => 1,"symbols" => $reels[1]],
                        "2" => ["visibleSymbolCount" => 3,"swingOffSize" => 1,"symbols" => $reels[2]],
                        "3" => ["visibleSymbolCount" => 3,"swingOffSize" => 1,"symbols" => $reels[3]],
                        "4" => ["visibleSymbolCount" => 3,"swingOffSize" => 1,"symbols" => $reels[4]]
                    ]
                ],
                "nextGameActions" => self::nextGameActions($winnings, $finish, $totalWin, $addFs,$freespinsLog),
                "accounting" => [
                    "debit" => $bet,
                    "credit" => 0,
                    "debitType" => "WAGER",
                    "creditType" => "WIN"],
                "uncommittedWinSum" => $freespinsLog ? $freespinsLog['TotalWin'] : $totalWin,
                "riskPot" => 0,
                "lastWagerSum" => $bet,
                "winStreaks" => ["32000" => ["winSum" => $totalWin, "length" => 1, "multiplier" => 0, "previousMultiplier" => 0, "nextMultiplier" => 0],
                    "800" => ["winSum" => 6400, "length" => 1, "multiplier" => 0, "previousMultiplier" => 0, "nextMultiplier" => 0]],
                "nextGameFlowName" => self::nextGameFlowName($winnings,$finish,$addFs,$freespinsLog),
                "responseType" => "ACTION"
            ])
        ]
        ];
    }

    private static function nextGameFlowName($winnings, $finish, $addFs, $freespinsLog){
        if ($freespinsLog && $freespinsLog['CurrentFreeSpins'] === $freespinsLog['TotalFreeSpins']) return "RISK_CHOICE";
        if ($winnings && !$finish && !$addFs && !$freespinsLog) return "RISK_CHOICE";
        if ($addFs) return "FREE_GAME";
        if ($freespinsLog['CurrentFreeSpins'] < $freespinsLog['TotalFreeSpins']) return "FREE_GAME";
        return "MAIN_GAME";
    }

    private static function nextGameActions($winnings, $finish, $totalWin, $addFs,$freespinsLog)
    {
        if ($freespinsLog && $freespinsLog['CurrentFreeSpins'] === $freespinsLog['TotalFreeSpins']) {
            return [
                ["id" => "RISK_BLACKRED_CHOICE","minTotalWager" => 0,"maxTotalWager" => 0,"wagerCondition" => "ADD","debitType" => "WAGER","wagerPositions" => []],
                ["id" => "RISK_LADDER_CHOICE","minTotalWager" => 0,"maxTotalWager" => 0,"wagerCondition" => "ADD","debitType" => "WAGER","wagerPositions" => []],
                ["id" => "FINISH_GAME","minTotalWager" => 0,"maxTotalWager" => 0,"wagerCondition" => "ADD","debitType" => "WAGER","wagerPositions" => []]
            ];
        }
        if ($addFs || $freespinsLog['CurrentFreeSpins'] < $freespinsLog['TotalFreeSpins']){
            return [
                ["id" => "PLAY","minTotalWager" => 0,"maxTotalWager" => 0,"wagerCondition" => "ADD","debitType" => "WAGER","wagerPositions" => []]
            ];
        }
        if ($totalWin > 14000 && !$finish){
            return [
                ["id" => "FINISH_GAME","minTotalWager" => 0,"maxTotalWager" => 0,"wagerCondition" => "ADD","debitType" => "WAGER","wagerPositions" => []]
            ];
        }
        if ($winnings && !$finish) {
            return [
                ["id" => "RISK_BLACKRED_CHOICE","minTotalWager" => 0,"maxTotalWager" => 0,"wagerCondition" => "ADD","debitType" => "WAGER","wagerPositions" => []],
                ["id" => "RISK_LADDER_CHOICE","minTotalWager" => 0,"maxTotalWager" => 0,"wagerCondition" => "ADD","debitType" => "WAGER","wagerPositions" => []],
                ["id" => "FINISH_GAME","minTotalWager" => 0,"maxTotalWager" => 0,"wagerCondition" => "ADD","debitType" => "WAGER","wagerPositions" => []]
            ];
        } else {
            return [
                ["id" => "PLAY","minTotalWager" => 5,"maxTotalWager" => 500,"wagerCondition" => "ADD","debitType" => "WAGER","wagerPositions" =>
                    [
                        ["id" => 1,"wagerBounds" => ["possibleWagers" => [1, 2, 3, 4, 5, 10, 20, 30, 40, 50, 100],"minWager" => 1,"maxWager" => 100,"wagerStepType" => "FIXED"]]
                    ]
                ]
            ];
        }

    }
}