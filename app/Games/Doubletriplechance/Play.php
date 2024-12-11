<?php

namespace VanguardLTE\Games\Merkur\Doubletriplechance;

class Play
{
    public static function get($balance, $winnings, $reels, $bet, $totalWin, $finish = false)
    {
        return ["de.edict.eoc.gaming.comm.GameClientActionResponseDTO" => [
            "coreData" => ["depot" => ["balance" => $balance, "limitBalance" => $balance, "playerMoney" => 0], "isGameFinished" => false],
            "gameData" => json_encode([
                "mainGameResult" => [
                    "winnings" => $winnings,
                    "creatorName" => "MAIN_GAME",
                    "parameters" => [],
                    "freeGameRound" => 0,
                    "freeGamesTotal" => 0,
                    "multiplier" => 1,
                    "resultGeneratorKey" => ["keyName" => "SLOT_MACHINE"],
                    "baseRound" => 1,
                    "reels" => [
                        "0" => ["visibleSymbolCount" => 3,"swingOffSize" => 1,"symbols" => $reels[0]],
                        "1" => ["visibleSymbolCount" => 3,"swingOffSize" => 1,"symbols" => $reels[1]],
                        "2" => ["visibleSymbolCount" => 3,"swingOffSize" => 1,"symbols" => $reels[2]]
                    ]
                ],
                "nextGameActions" => self::nextGameActions($winnings, $finish, $totalWin),
                "accounting" => [
                    "debit" => $bet,
                    "credit" => 0,
                    "debitType" => "WAGER",
                    "creditType" => "WIN"],
                "uncommittedWinSum" => $totalWin,
                "riskPot" => 0,
                "lastWagerSum" => $bet,
                "winStreaks" => ["32000" => ["winSum" => $totalWin, "length" => 1, "multiplier" => 0, "previousMultiplier" => 0, "nextMultiplier" => 0],
                    "800" => ["winSum" => 6400, "length" => 1, "multiplier" => 0, "previousMultiplier" => 0, "nextMultiplier" => 0]],
                "nextGameFlowName" => $winnings && !$finish ? "RISK_CHOICE" : "MAIN_GAME",
                "responseType" => "ACTION"
            ])
        ]
        ];
    }

    private static function nextGameActions($winnings, $finish, $totalWin)
    {
        if ($totalWin > 14000 && !$finish){
            return [
                ["id" => "FINISH_GAME",
                    "minTotalWager" => 0,
                    "maxTotalWager" => 0,
                    "wagerCondition" => "ADD",
                    "debitType" => "WAGER",
                    "wagerPositions" => []]
            ];
        }
        if ($winnings && !$finish) {
            return [
                [
                    "id" => "RISK_BLACKRED_CHOICE",
                    "minTotalWager" => 0,
                    "maxTotalWager" => 0,
                    "wagerCondition" => "ADD",
                    "debitType" => "WAGER",
                    "wagerPositions" => []
                ],
                [
                    "id" => "RISK_LADDER_CHOICE",
                    "minTotalWager" => 0,
                    "maxTotalWager" => 0,
                    "wagerCondition" => "ADD",
                    "debitType" => "WAGER",
                    "wagerPositions" => []
                ],
                [
                    "id" => "FINISH_GAME",
                    "minTotalWager" => 0,
                    "maxTotalWager" => 0,
                    "wagerCondition" => "ADD",
                    "debitType" => "WAGER",
                    "wagerPositions" => []
                ]
            ];
        } else {
            return [
                [
                    "id" => "PLAY",
                    "minTotalWager" => 5,
                    "maxTotalWager" => 500,
                    "wagerCondition" => "ADD",
                    "debitType" => "WAGER",
                    "wagerPositions" => [
                        [
                            "id" => 1,
                            "wagerBounds" => [
                                "possibleWagers" => [1, 2, 3, 4, 5, 10, 20, 30, 40, 50, 100],
                                "minWager" => 1,
                                "maxWager" => 100,
                                "wagerStepType" => "FIXED"
                            ]
                        ]
                    ]
                ]
            ];
        }

    }
}
