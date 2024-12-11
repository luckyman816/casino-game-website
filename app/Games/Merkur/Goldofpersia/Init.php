<?php

namespace VanguardLTE\Games\Merkur\Goldofpersia;

class Init
{

    public static function get($balance, $log, $insufficient = false)
    {
        return [
            "de.edict.eoc.gaming.comm.GameClientActionResponseDTO" => [
                "coreData" => [
                    "depot" => [
                        "balance" => $balance,
                        "limitBalance" => $balance,
                        "playerMoney" => 0
                    ],
                    "isGameFinished" => !$log['Winnings'],
                    "messages" => $insufficient ? [["priority" => "HIGH",
                        "text" => "TOTAL_BALANCE_INSUFFICIENT_FOR_GAME",
                        "flags" => 0,
                        "messageId" => -350088639,
                        "group" => "EXTERNAL_ISSUES"]] : ''
                ],
                "gameData" => json_encode([
                    "mainGameResult" => [
                        "winnings" => $log['Winnings'],
                        "creatorName" => "MAIN_GAME",
                        "parameters" => ["CLIENT_SETTINGS" => json_encode(["coin" => $log['Bet'], "countOfActiveWagerPositions" => $log['Lines']])],
                        "freeGameRound" => $log['FreeSpins']['CurrentFreeSpins'] != 1 ? $log['FreeSpins']['CurrentFreeSpins'] : 0,
                        "freeGamesTotal" => $log['FreeSpins']['CurrentFreeSpins'] != 1 ? $log['FreeSpins']['TotalFreeSpins'] : 0,
                        "multiplier" => $log['FreeSpins']['CurrentFreeSpins'] != 1 ? 3 : 1,
                        "resultGeneratorKey" => ["keyName" => "SLOT_MACHINE"],
                        "baseRound" => $log['Winnings'] ? 1 : 0,
                        "reels" => [
                            "0" => ["visibleSymbolCount" => 3, "swingOffSize" => 1, "symbols" => $log['Reels'][0]],
                            "1" => ["visibleSymbolCount" => 3, "swingOffSize" => 1, "symbols" => $log['Reels'][1]],
                            "2" => ["visibleSymbolCount" => 3, "swingOffSize" => 1, "symbols" => $log['Reels'][2]],
                            "3" => ["visibleSymbolCount" => 3, "swingOffSize" => 1, "symbols" => $log['Reels'][3]],
                            "4" => ["visibleSymbolCount" => 3, "swingOffSize" => 1, "symbols" => $log['Reels'][4]]
                        ]
                    ],
                    "nextGameActions" => self::nextGameActions($log['Winnings'], $log['FreeSpins']),
                    "accounting" => [
                        "debit" => $log['Bet'],
                        "credit" => 0,
                        "debitType" => "WAGER",
                        "creditType" => "WIN"
                    ],
                    "uncommittedWinSum" => $log['FreeSpins'] ? $log['FreeSpins']['TotalWin'] : $log['TotalWin'],
                    "riskPot" => $log['FreeSpins'] ? $log['FreeSpins']['TotalWin'] : $log['TotalWin'],
                    "lastWagerSum" => $log['Bet'],
                    "winStreaks" => ["800" => ["winSum" => 6400, "length" => 1, "multiplier" => 0, "previousMultiplier" => 0, "nextMultiplier" => 0]],
                    "payTable" => [
                        "groups" => [
                            ["members" => [0],"items" => [["winFactor" => 5,"occur" => 2],["winFactor" => 10,"occur" => 3],["winFactor" => 25,"occur" => 4],["winFactor" => 75,"occur" => 5]]],
                            ["members" => [1,2,3],"items" => [["winFactor" => 10,"occur" => 3],["winFactor" => 25,"occur" => 4],["winFactor" => 75,"occur" => 5]]],
                            ["members" => [5,4],"items" => [["winFactor" => 15,"occur" => 3],["winFactor" => 35,"occur" => 4],["winFactor" => 100,"occur" => 5]]],
                            ["members" => [7,6],"items" => [["winFactor" => 5,"occur" => 2],["winFactor" => 30,"occur" => 3],["winFactor" => 100,"occur" => 4],["winFactor" => 750,"occur" => 5]]],
                            ["members" => [9,10],"items" => [["winFactor" => 20,"occur" => 3],["winFactor" => 40,"occur" => 4],["winFactor" => 150,"occur" => 5]]],
                            ["members" => [11],"items" => [["winFactor" => 25,"occur" => 3],["winFactor" => 50,"occur" => 4],["winFactor" => 400,"occur" => 5]]],
                            ["members" => [8],"items" => [["winFactor" => 15,"occur" => 2],["winFactor" => 150,"occur" => 3],["winFactor" => 1500,"occur" => 4],["winFactor" => 5000,"occur" => 5]]],
                            ["members" => [12],"items" => [["winFactor" => 2,"occur" => 2],["winFactor" => 5,"occur" => 3],["winFactor" => 20,"occur" => 4],["winFactor" => 500,"occur" => 5]]]
                        ]],
                    "wagerPositionSets" => [
                        ["wagerPositionIds" => [1, 2, 3, 4, 5], "type" => "FIXED"]],
                    "coins" => [10, 20, 30, 40, 50, 100, 200, 300, 400, 500],
                    "translations" => [
                        "deactivate_autoplay" => "STOP",
                        "POST_STATE_MOVED" => "verschoben",
                        "autostart" => "AUTO START",
                        "deactivate_turbospin" => "Deaktivieren mit <icon>",
                        "Bonusgame" => "Bonusspiel",
                        "at_max_total_loss_of" => "bei GUTHABEN kleiner gleich",
                        "choose_autospins" => "SPIELANZAHL WÄHLEN",
                        "BLACKRED" => "Kartenrisiko",
                        "shortThousand" => "k",
                        "at_win_of_freegames" => "bei Gewinn von Freispielen",
                        "ButtonCaption_RISK_LADDER_CHOICE" => "Risikoleiter",
                        "freeGameDisplayLine4" => "Bonusspiele",
                        "freeGameDisplayLine2" => "gewinnen",
                        "freeGameDisplayLine1" => "Sie",
                        "at_max_total_win_of" => "bei GUTHABEN größer gleich",
                        "set_the_bet" => "Einsatz",
                        "set_the_amount_of_autospins" => "Anzahl der Autostarts",
                        "GameMeterCaption_DEPOT" => "GUTHABEN",
                        "TOTALBET" => "EINSATZ",
                        "at_total_loss_of" => "bei Verlust größer gleich",
                        "POST_STATE_PARTIAL_WIN" => "Teilgewinn",
                        "ButtonCaption_RISK" => "Gewinn riskieren",
                        "BETS_PER_LINE" => "PRO LINIE",
                        "choose_stake_pre_line" => "EINSATZ PRO LINIE WÄHLEN",
                        "shortBillion" => "G",
                        "big_win" => "GLÜCKWUNSCH",
                        "button_yes" => "ja",
                        "autospins" => "Autostarts",
                        "ButtonCaption_ADP_PLAY" => "Start",
                        "wild_line_2_3" => "den Gewinn",
                        "LADDER" => "Risikoleiter",
                        "multi_total" => "GESAMT",
                        "POST_STATE_IN_PLAY" => "nimmt teil",
                        "BlackRedWinCaption" => "RISIKO GEWINN",
                        "LadderPlayOffCaption" => "Ausspielung",
                        "set_the_amount_of_lines" => "Anzahl der Linien",
                        "GameMeterCaption_WINS" => "GEWINN",
                        "POST_STATE_PLACING" => "platziert",
                        "ban_active" => "Aktiviert",
                        "POST_STATE_PLACED" => "angenommen",
                        "at_next_win" => "beim nächsten Gewinn",
                        "wild_line_2_2" => "als Joker verdoppelt",
                        "wild_line_2_1" => "Ein oder mehr",
                        "button_no" => "nein",
                        "POST_STATE_CANCELED_BY_PLAYER" => "storniert",
                        "multi_freegames" => "FREISPIELE",
                        "is_mandatory" => "*) Bitte alle Pflichtfelder ausfüllen.",
                        "right_handed" => "rechts",
                        "rtp" => "RTP",
                        "help" => "Hilfe",
                        "POST_STATE_SUSPENDED" => "ausgesetzt",
                        "ban24hours" => "24h Sperre",
                        "ButtonCaption_RISK_BLACKRED_BLACK" => "Risiko auf Schwarz",
                        "ButtonCaption_RISK_BLACKRED_RED" => "Risiko auf Rot",
                        "ButtonCaption_RISK_BLACKRED_CHOICE" => "Kartenrisiko",
                        "sound" => "Sound",
                        "shortcutExplanation" => "M =>  x1000000 G =>  x1000M",
                        "choose_lines" => "LINIEN WÄHLEN",
                        "POST_STATE_LOWERED" => "verringert",
                        "LINES" => "LINIEN",
                        "POST_STATE_CANCELED_BY_BANK" => "storniert",
                        "at_next_freegames" => "bei Gewinn von Bonusspielen",
                        "max_win_propability" => "Höchstgewinnwahrscheinlichkeit",
                        "activate_sound" => "Aktiviere den Sound",
                        "POST_STATE_LOST" => "nicht gewonnen",
                        "bet" => "Einsatz",
                        "at_win_available" => "Bei Gewinn verfügbar => ",
                        "choose_stake" => "EINSATZ WÄHLEN",
                        "ButtonCaption_PLAY" => "Start",
                        "summary_line_3" => "gewonnen",
                        "from" => "von",
                        "ButtonCaption_RISK_DIVIDE" => "Risiko teilen",
                        "wild_line_1_2" => "außer SCATTER",
                        "wild_line_1_1" => "ersetzt alle Symbole",
                        "openGameCloseConfirmation.body" => "Ihr Spiel ist noch nicht beendet. Wollen Sie das Spiel schließen und später fortsetzen?",
                        "Number.Delim.Float" => ",",
                        "at_min_win_of" => "bei Gewinn von mind.",
                        "summary_line_1" => "Sie haben",
                        "ButtonCaption_RaiseBetsToMaxBtn" => "Max. Einsatz",
                        "set_the_bet_per_line" => "Einsatz pro Linie",
                        "ButtonCaption_COLLECT" => "Gewinn nehmen",
                        "propability_seperator" => "zu",
                        "POST_STATE_WON" => "gewonnen",
                        "left_handed" => "links",
                        "reentering_freegames_message" => "Willkommen zurück! Bisherige Gewinne wurden bereits auf DEPOT gebucht.",
                        "ButtonCaption_FINISH_GAME" => "Gewinn nehmen",
                        "GameMeterCaption_BETS" => "EINSATZ",
                        "scatter_line_1" => "<fg>25</fg> Bonusspiele",
                        "scatter_line_3" => "<fg>15</fg> Bonusspiele",
                        "scatter_line_2" => "<fg>20</fg> Bonusspiele",
                        "scatter_line_4" => "Im <freegame>BONUSSPIEL</freegame> alle Gewinne <multiplier>x3</multiplier>",
                        "BlackRedPeakCaption" => "RISIKO SPITZE",
                        "LINE" => "LINIE",
                        "reentering_freegames_title" => "Willkommen zurück!",
                        "POST_STATE_RAISED" => "erhöht",
                        "paytable" => "Gewinnplan",
                        "shortMillion" => "M",
                        "bet_per_line" => "PRO LINIE",
                        "activate_turbospin" => "Aktiviere Schnellspiel?",
                        "BlackRedRiskCaption" => "RISIKO EINSATZ",
                        "POST_STATE_SURRENDERED" => "aufgegeben"
                    ],
                    "locale" => "de",
                    "targetRtp" => "95.65",
                    "nextGameFlowName" => self::nextGameFlowName($log['Winnings'], $log['FreeSpins']),
                    "rtpLevel" => "9600",
                    "responseType" => $log['Winnings'] || $log['FreeSpins'] ? "RECONSTRUCTION" : "INIT"
                ])
            ]
        ];
    }

    private static function nextGameFlowName($winnings, $freespinsLog){
        if ($winnings && !$freespinsLog) return "RISK_CHOICE";
        if ($freespinsLog['CurrentFreeSpins'] < $freespinsLog['TotalFreeSpins']) return "FREE_GAME";
        return "MAIN_GAME";
    }

    private static function nextGameActions($winnings, $freespins)
    {
        if ($freespins && $freespins['CurrentFreeSpins'] === $freespins['TotalFreeSpins']){
            return [
                ["id" => "RISK_BLACKRED_CHOICE","minTotalWager" => 0,"maxTotalWager" => 0,"wagerCondition" => "ADD","debitType" => "WAGER","wagerPositions" => []],
                ["id" => "RISK_LADDER_CHOICE","minTotalWager" => 0,"maxTotalWager" => 0,"wagerCondition" => "ADD","debitType" => "WAGER","wagerPositions" => []],
                ["id" => "FINISH_GAME","minTotalWager" => 0,"maxTotalWager" => 0,"wagerCondition" => "ADD","debitType" => "WAGER","wagerPositions" => []]
            ];
        }
        if ($freespins){
            return [
                ["id" => "PLAY","minTotalWager" => 0,"maxTotalWager" => 0,"wagerCondition" => "ADD","debitType" => "WAGER","wagerPositions" => []]
            ];
        }
        if ($winnings) {
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
