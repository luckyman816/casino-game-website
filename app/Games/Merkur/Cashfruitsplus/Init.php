<?php

namespace VanguardLTE\Games\Merkur\Cashfruitsplus;

class Init
{

    public static function get($balance, $log, $insufficient = false){
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
                        "parameters" => ["CLIENT_SETTINGS" => ["coin" => $log['Bet'],"countOfActiveWagerPositions" => 0]],
                        "freeGameRound" => 0,
                        "freeGamesTotal" => 0,
                        "multiplier" => 1,
                        "resultGeneratorKey" => ["keyName" => "SLOT_MACHINE"],
                        "baseRound" => $log['Winnings'] ? 1 : 0,
                        "reels" => [
                            "0" => ["visibleSymbolCount" => 3,"swingOffSize" => 1,"symbols" => $log['Reels'][0]],
                            "1" => ["visibleSymbolCount" => 3,"swingOffSize" => 1,"symbols" => $log['Reels'][1]],
                            "2" => ["visibleSymbolCount" => 3,"swingOffSize" => 1,"symbols" => $log['Reels'][2]],
                            "3" => ["visibleSymbolCount" => 3,"swingOffSize" => 1,"symbols" => $log['Reels'][3]],
                            "4" => ["visibleSymbolCount" => 3,"swingOffSize" => 1,"symbols" => $log['Reels'][4]]
                        ]
                    ],
                    "nextGameActions" => self::nextGameActions($log['Winnings']),
                    "accounting" => [
                        "debit" => $log['Bet'],
                        "credit" => 0,
                        "debitType" => "WAGER",
                        "creditType" => "WIN"
                    ],
                    "uncommittedWinSum" => $log['TotalWin'],
                    "riskPot" => $log['TotalWin'],
                    "lastWagerSum" => $log['Bet'],
                    "winStreaks" => ["800" => ["winSum" => 6400,"length" => 1,"multiplier" => 0,"previousMultiplier" => 0,"nextMultiplier" => 0]],
                    "payTable" => [
                        "groups" => [
                            ["members" => [3],"items" => [["winFactor" => 5,"occur" => 2],["winFactor" => 20,"occur" => 3],["winFactor" => 50,"occur" => 4],["winFactor" => 200,"occur" => 5]]],
                            ["members" => [0,1,2],"items" => [["winFactor" => 20,"occur" => 3],["winFactor" => 50,"occur" => 4],["winFactor" => 200,"occur" => 5]]],
                            ["members" => [4,5],"items" => [["winFactor" => 50,"occur" => 3],["winFactor" => 200,"occur" => 4],["winFactor" => 500,"occur" => 5]]],
                            ["members" => [6],"items" => [["winFactor" => 100,"occur" => 3],["winFactor" => 1000,"occur" => 4],["winFactor" => 5000,"occur" => 5]]],
                            ["members" => [7],"items" => [["winFactor" => 2,"occur" => 3],["winFactor" => 10,"occur" => 4],["winFactor" => 50,"occur" => 5]]]
                        ]],
                    "wagerPositionSets" => [["wagerPositionIds" => [1,2,3,4,5],"type" => "FIXED"]],
                    "coins" => [10,20,30,40,50,100,200,300,400,500],
                    "translations" => [
                        "ButtonCaption_RISK_BLACKRED_BLACK" => "Risiko auf Schwarz",
                        "ButtonCaption_RISK_BLACKRED_CHOICE" => "Kartenrisiko",
                        "ButtonCaption_RISK_BLACKRED_RED" => "Risiko auf Rot",
                        "deactivate_autoplay" => "STOP",
                        "sound" => "Sound",
                        "shortcutExplanation" => "M =>  x1000000 G =>  x1000M",
                        "POST_STATE_MOVED" => "verschoben",
                        "deactivate_turbospin" => "Deaktivieren mit <icon>",
                        "choose_lines" => "LINIEN WÄHLEN",
                        "autostart" => "AUTO START",
                        "POST_STATE_LOWERED" => "verringert",
                        "LINES" => "LINIEN",
                        "POST_STATE_CANCELED_BY_BANK" => "storniert",
                        "activate_sound" => "Aktiviere den Sound",
                        "max_win_propability" => "Höchstgewinnwahrscheinlichkeit",
                        "at_next_freegames" => "bei Gewinn von Freispielen",
                        "POST_STATE_LOST" => "nicht gewonnen",
                        "bet" => "Einsatz",
                        "at_win_available" => "Bei Gewinn verfügbar => ",
                        "choose_stake" => "EINSATZ WÄHLEN",
                        "choose_autospins" => "SPIELANZAHL WÄHLEN",
                        "at_max_total_loss_of" => "bei GUTHABEN kleiner gleich",
                        "BLACKRED" => "Kartenrisiko",
                        "ButtonCaption_PLAY" => "Start",
                        "shortThousand" => "k",
                        "at_win_of_freegames" => "bei Gewinn von Freispielen",
                        "ButtonCaption_RISK_LADDER_CHOICE" => "Risikoleiter",
                        "ButtonCaption_RISK_DIVIDE" => "Risiko teilen",
                        "openGameCloseConfirmation.body" => "Ihr Spiel ist noch nicht beendet. Wollen Sie das Spiel schließen und später fortsetzen?",
                        "Number.Delim.Float" => ",",
                        "at_max_total_win_of" => "bei GUTHABEN größer gleich",
                        "at_min_win_of" => "bei Gewinn von mind.",
                        "set_the_bet" => "Einsatz",
                        "ButtonCaption_RaiseBetsToMaxBtn" => "Max. Einsatz",
                        "set_the_amount_of_autospins" => "Anzahl der Autostarts",
                        "set_the_bet_per_line" => "Einsatz pro Linie",
                        "ButtonCaption_COLLECT" => "Gewinn nehmen",
                        "propability_seperator" => "zu",
                        "GameMeterCaption_DEPOT" => "GUTHABEN",
                        "TOTALBET" => "EINSATZ",
                        "POST_STATE_WON" => "gewonnen",
                        "at_total_loss_of" => "bei Verlust größer gleich",
                        "left_handed" => "links",
                        "POST_STATE_PARTIAL_WIN" => "Teilgewinn",
                        "ButtonCaption_RISK" => "Gewinn riskieren",
                        "reentering_freegames_message" => "Willkommen zurück! Bisherige Gewinne wurden bereits auf DEPOT gebucht.",
                        "BETS_PER_LINE" => "PRO LINIE",
                        "choose_stake_pre_line" => "EINSATZ PRO LINIE WÄHLEN",
                        "shortBillion" => "G",
                        "ButtonCaption_FINISH_GAME" => "Gewinn nehmen",
                        "big_win" => "GLÜCKWUNSCH",
                        "GameMeterCaption_BETS" => "EINSATZ",
                        "button_yes" => "ja",
                        "autospins" => "Autostarts",
                        "ButtonCaption_ADP_PLAY" => "Start",
                        "LADDER" => "Risikoleiter",
                        "POST_STATE_IN_PLAY" => "nimmt teil",
                        "BlackRedPeakCaption" => "RISIKO SPITZE",
                        "BlackRedWinCaption" => "RISIKO GEWINN",
                        "LadderPlayOffCaption" => "Ausspielung",
                        "GameMeterCaption_WINS" => "GEWINN",
                        "set_the_amount_of_lines" => "Anzahl der Linien",
                        "POST_STATE_PLACING" => "platziert",
                        "LINE" => "LINIE",
                        "ban_active" => "Aktiviert",
                        "reentering_freegames_title" => "Willkommen zurück!",
                        "POST_STATE_PLACED" => "angenommen",
                        "at_next_win" => "beim nächsten Gewinn",
                        "button_no" => "nein",
                        "POST_STATE_CANCELED_BY_PLAYER" => "storniert",
                        "POST_STATE_RAISED" => "erhöht",
                        "is_mandatory" => "*) Bitte alle Pflichtfelder ausfüllen.",
                        "right_handed" => "rechts",
                        "paytable" => "Gewinnplan",
                        "rtp" => "RTP",
                        "shortMillion" => "M",
                        "help" => "Hilfe",
                        "POST_STATE_SUSPENDED" => "ausgesetzt",
                        "bet_per_line" => "PRO LINIE",
                        "ban24hours" => "24h Sperre",
                        "BlackRedRiskCaption" => "RISIKO EINSATZ",
                        "activate_turbospin" => "Aktiviere Schnellspiel?",
                        "POST_STATE_SURRENDERED" => "aufgegeben"
                    ],
                    "locale" => "de",
                    "targetRtp" => "95.65",
                    "nextGameFlowName" => $log['Winnings'] ? "RISK_CHOICE" :"MAIN_GAME",
                    "rtpLevel" => "9600",
                    "responseType" => $log['Winnings'] ? "RECONSTRUCTION" : "INIT"
                ])
            ]
        ];
    }

    private static function nextGameActions($winnings)
    {
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
