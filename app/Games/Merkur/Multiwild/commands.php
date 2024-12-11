<?php

$commands['INIT'] = [
    "de.edict.eoc.gaming.comm.GameClientActionResponseDTO" => [
        "coreData" => [
            "depot" => [
                "balance" => 7707950,
                "limitBalance" => 7707950,
                "playerMoney" => 0
            ],
            "isGameFinished" => true
        ],
          "gameData" => "{\"mainGameResult\":{\"winnings\":[],\"creatorName\":\"MAIN_GAME\",\"parameters\":{\"CLIENT_SETTINGS\":\"{\\\"coin\\\":720,\\\"countOfActiveWagerPositions\\\":1,\\\"custom\\\":null}\"},\"childGameResult\":null,\"freeGameRound\":0,\"freeGamesTotal\":0,\"multiplier\":1,\"resultGeneratorKey\":{\"keyName\":\"SLOT_MACHINE\"},\"reels\":{\"0\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[0,4,2,0]},\"1\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[3,2,4,1]},\"2\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[3,4,3,3]},\"3\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[4,2,2,7]}}},\"nextGameActions\":[{\"id\":\"PLAY\",\"minTotalWager\":480,\"maxTotalWager\":19200,\"wagerPositions\":[{\"id\":1,\"wagerBounds\":{\"possibleWagers\":[480,2400,4800,7200,9600,14400,19200,720,1200],\"minWager\":480,\"maxWager\":19200,\"wagerStepType\":\"FIXED\"}}]}],\"accounting\":{\"debit\":0,\"credit\":0,\"debitType\":\"WAGER\",\"creditType\":\"WIN\"},\"uncommittedWinSum\":0,\"lastWagerSum\":0,\"addOnGameInitResult\":null,\"addOnGameResult\":null,\"responseType\":\"INIT\",\"payTable\":{\"groups\":[{\"members\":[8],\"items\":[{\"winFactor\":10000,\"occur\":4}]},{\"members\":[7],\"items\":[{\"winFactor\":800,\"occur\":4},{\"winFactor\":80,\"occur\":3}]},{\"members\":[6],\"items\":[{\"winFactor\":300,\"occur\":4},{\"winFactor\":30,\"occur\":3}]},{\"members\":[5],\"items\":[{\"winFactor\":200,\"occur\":4},{\"winFactor\":20,\"occur\":3}]},{\"members\":[4,3,2,1],\"items\":[{\"winFactor\":20,\"occur\":4},{\"winFactor\":5,\"occur\":3}]},{\"members\":[0],\"items\":[{\"winFactor\":10,\"occur\":4},{\"winFactor\":5,\"occur\":3}]}]},\"wagerPositionSets\":[{\"wagerPositionIds\":[1],\"type\":\"FIXED\",\"wagerBounds\":null}],\"coins\":[480,720,1200,2400,4800,7200,9600,14400,19200],\"translations\":{\"ButtonCaption_RISK_BLACKRED_BLACK\":\"Risiko auf Schwarz\",\"ButtonCaption_RISK_BLACKRED_CHOICE\":\"Kartenrisiko\",\"ButtonCaption_RISK_BLACKRED_RED\":\"Risiko auf Rot\",\"deactivate_autoplay\":\"STOP\",\"sound\":\"Sound\",\"shortcutExplanation\":\"M: x1000000 G: x1000M\",\"POST_STATE_MOVED\":\"verschoben\",\"deactivate_turbospin\":\"Deaktivieren mit <icon>\",\"autostart\":\"AUTO START\",\"choose_lines\":\"LINIEN WÄHLEN\",\"POST_STATE_LOWERED\":\"verringert\",\"LINES\":\"LINIEN\",\"POST_STATE_CANCELED_BY_BANK\":\"storniert\",\"at_next_freegames\":\"bei Gewinn von Freispielen\",\"max_win_propability\":\"Höchstgewinnwahrscheinlichkeit\",\"activate_sound\":\"Aktiviere den Sound\",\"POST_STATE_LOST\":\"nicht gewonnen\",\"bet\":\"Einsatz\",\"at_win_available\":\"Bei Gewinn verfügbar:\",\"choose_stake\":\"EINSATZ WÄHLEN\",\"at_max_total_loss_of\":\"bei GUTHABEN kleiner gleich\",\"choose_autospins\":\"SPIELANZAHL WÄHLEN\",\"ButtonCaption_PLAY\":\"Start\",\"BLACKRED\":\"Kartenrisiko\",\"shortThousand\":\"k\",\"at_win_of_freegames\":\"bei Gewinn von Freispielen\",\"ButtonCaption_RISK_LADDER_CHOICE\":\"Risikoleiter\",\"ButtonCaption_RISK_DIVIDE\":\"Risiko teilen\",\"openGameCloseConfirmation.body\":\"Ihr Spiel ist noch nicht beendet. Wollen Sie das Spiel schließen und später fortsetzen?\",\"Number.Delim.Float\":\",\",\"at_max_total_win_of\":\"bei GUTHABEN größer gleich\",\"at_min_win_of\":\"bei Gewinn von mind.\",\"set_the_bet\":\"Einsatz\",\"ButtonCaption_RaiseBetsToMaxBtn\":\"Max. Einsatz\",\"set_the_amount_of_autospins\":\"Anzahl der Autostarts\",\"set_the_bet_per_line\":\"Einsatz pro Linie\",\"ButtonCaption_COLLECT\":\"Gewinn nehmen\",\"GameMeterCaption_DEPOT\":\"GUTHABEN\",\"propability_seperator\":\"zu\",\"TOTALBET\":\"EINSATZ\",\"POST_STATE_WON\":\"gewonnen\",\"at_total_loss_of\":\"bei Verlust größer gleich\",\"left_handed\":\"links\",\"POST_STATE_PARTIAL_WIN\":\"Teilgewinn\",\"ButtonCaption_RISK\":\"Gewinn riskieren\",\"reentering_freegames_message\":\"Willkommen zurück! Bisherige Gewinne wurden bereits auf DEPOT gebucht.\",\"BETS_PER_LINE\":\"PRO LINIE\",\"choose_stake_pre_line\":\"EINSATZ PRO LINIE WÄHLEN\",\"shortBillion\":\"G\",\"ButtonCaption_FINISH_GAME\":\"Gewinn nehmen\",\"big_win\":\"GLÜCKWUNSCH\",\"GameMeterCaption_BETS\":\"EINSATZ\",\"button_yes\":\"ja\",\"autospins\":\"Autostarts\",\"ButtonCaption_ADP_PLAY\":\"Start\",\"LADDER\":\"Risikoleiter\",\"POST_STATE_IN_PLAY\":\"nimmt teil\",\"BlackRedPeakCaption\":\"RISIKO SPITZE\",\"BlackRedWinCaption\":\"RISIKO GEWINN\",\"LadderPlayOffCaption\":\"Ausspielung\",\"GameMeterCaption_WINS\":\"GEWINN\",\"set_the_amount_of_lines\":\"Anzahl der Linien\",\"POST_STATE_PLACING\":\"platziert\",\"LINE\":\"LINIE\",\"ban_active\":\"Aktiviert\",\"reentering_freegames_title\":\"Willkommen zurück!\",\"POST_STATE_PLACED\":\"angenommen\",\"at_next_win\":\"beim nächsten Gewinn\",\"button_no\":\"nein\",\"POST_STATE_CANCELED_BY_PLAYER\":\"storniert\",\"POST_STATE_RAISED\":\"erhöht\",\"is_mandatory\":\"*) Bitte alle Pflichtfelder ausfüllen.\",\"right_handed\":\"rechts\",\"paytable\":\"Gewinnplan\",\"rtp\":\"RTP\",\"shortMillion\":\"M\",\"help\":\"Hilfe\",\"POST_STATE_SUSPENDED\":\"ausgesetzt\",\"bet_per_line\":\"PRO LINIE\",\"ban24hours\":\"24h Sperre\",\"BlackRedRiskCaption\":\"RISIKO EINSATZ\",\"activate_turbospin\":\"Aktiviere Schnellspiel?\",\"POST_STATE_SURRENDERED\":\"aufgegeben\"},\"locale\":\"de\",\"nextGameFlowName\":\"MAIN_GAME\"}"

    ]
];

$commands[0] = [
    "de.edict.eoc.gaming.comm.GameClientActionResponseDTO" => [
        "coreData" => [
            "depot" => [
                "balance" => 7707950,
                "limitBalance" => 7707950,
                "playerMoney" => 0
            ],
            "isGameFinished" => true
        ],
          "gameData" => "{\"mainGameResult\":{\"winnings\":[{\"wagerPositionId\":1,\"winFactor\":10,\"winSum\":1440,\"wagerId\":1,\"winExtensions\":[],\"items\":[{\"point\":{\"x\":0,\"y\":2},\"symbol\":0},{\"point\":{\"x\":1,\"y\":0},\"symbol\":0},{\"point\":{\"x\":2,\"y\":2},\"symbol\":0},{\"point\":{\"x\":3,\"y\":0},\"symbol\":0}],\"highlight\":{\"payGroupMemberId\":0,\"occurrence\":4},\"lid\":61,\"eid\":1},{\"wagerPositionId\":1,\"winFactor\":10,\"winSum\":1440,\"wagerId\":1,\"winExtensions\":[],\"items\":[{\"point\":{\"x\":0,\"y\":2},\"symbol\":0},{\"point\":{\"x\":1,\"y\":0},\"symbol\":0},{\"point\":{\"x\":2,\"y\":2},\"symbol\":0},{\"point\":{\"x\":3,\"y\":1},\"symbol\":0}],\"highlight\":{\"payGroupMemberId\":0,\"occurrence\":4},\"lid\":62,\"eid\":1}],\"creatorName\":\"MAIN_GAME\",\"parameters\":{},\"childGameResult\":null,\"freeGameRound\":0,\"freeGamesTotal\":0,\"multiplier\":1,\"resultGeneratorKey\":{\"keyName\":\"SLOT_MACHINE\"},\"reels\":{\"0\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[7,3,2,0,2,3]},\"1\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[3,0,6,3,5,3,2,3]},\"2\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[0,2,7,0,2,7,5,0,6,5]},\"3\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[1,0,0,3,2,0,1,4,0,2,1,3]}}},\"nextGameActions\":[{\"id\":\"RISK_BLACKRED_CHOICE\",\"minTotalWager\":0,\"maxTotalWager\":0,\"wagerPositions\":[]},{\"id\":\"RISK_LADDER_CHOICE\",\"minTotalWager\":0,\"maxTotalWager\":0,\"wagerPositions\":[]},{\"id\":\"FINISH_GAME\",\"minTotalWager\":0,\"maxTotalWager\":0,\"wagerPositions\":[]}],\"accounting\":{\"debit\":720,\"credit\":2880,\"debitType\":\"WAGER\",\"creditType\":\"WIN\"},\"uncommittedWinSum\":2880,\"lastWagerSum\":720,\"addOnGameInitResult\":null,\"addOnGameResult\":null,\"responseType\":\"ACTION\",\"nextGameFlowName\":\"RISK_CHOICE\"}"

    ]
];

$commands[1] = [
    "de.edict.eoc.gaming.comm.GameClientActionResponseDTO" => [
        "coreData" => [
            "depot" => [
                "balance" => 7707950,
                "limitBalance" => 7707950,
                "playerMoney" => 0
            ],
            "isGameFinished" => true
        ],
        
          "gameData" => "{\"mainGameResult\":{\"winnings\":[{\"wagerPositionId\":1,\"winFactor\":10,\"winSum\":1440,\"wagerId\":1,\"winExtensions\":[],\"items\":[{\"point\":{\"x\":0,\"y\":2},\"symbol\":0},{\"point\":{\"x\":1,\"y\":0},\"symbol\":0},{\"point\":{\"x\":2,\"y\":2},\"symbol\":0},{\"point\":{\"x\":3,\"y\":0},\"symbol\":0}],\"highlight\":{\"payGroupMemberId\":0,\"occurrence\":4},\"lid\":61,\"eid\":1},{\"wagerPositionId\":1,\"winFactor\":10,\"winSum\":1440,\"wagerId\":1,\"winExtensions\":[],\"items\":[{\"point\":{\"x\":0,\"y\":2},\"symbol\":0},{\"point\":{\"x\":1,\"y\":0},\"symbol\":0},{\"point\":{\"x\":2,\"y\":2},\"symbol\":0},{\"point\":{\"x\":3,\"y\":1},\"symbol\":0}],\"highlight\":{\"payGroupMemberId\":0,\"occurrence\":4},\"lid\":62,\"eid\":1}],\"creatorName\":\"MAIN_GAME\",\"parameters\":{},\"childGameResult\":null,\"freeGameRound\":0,\"freeGamesTotal\":0,\"multiplier\":1,\"resultGeneratorKey\":{\"keyName\":\"SLOT_MACHINE\"},\"reels\":{\"0\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[7,3,2,0,2,3]},\"1\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[3,0,6,3,5,3,2,3]},\"2\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[0,2,7,0,2,7,5,0,6,5]},\"3\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[1,0,0,3,2,0,1,4,0,2,1,3]}}},\"nextGameActions\":[{\"id\":\"PLAY\",\"minTotalWager\":480,\"maxTotalWager\":19200,\"wagerPositions\":[{\"id\":1,\"wagerBounds\":{\"possibleWagers\":[480,2400,4800,7200,9600,14400,19200,720,1200],\"minWager\":480,\"maxWager\":19200,\"wagerStepType\":\"FIXED\"}}]}],\"accounting\":{\"debit\":0,\"credit\":2880,\"debitType\":\"WAGER\",\"creditType\":\"PAYOUT\"},\"uncommittedWinSum\":0,\"lastWagerSum\":720,\"addOnGameInitResult\":null,\"addOnGameResult\":null,\"responseType\":\"ACTION\",\"nextGameFlowName\":\"MAIN_GAME\"}"

          ]
];

$commands[2] = [
    "de.edict.eoc.gaming.comm.GameClientActionResponseDTO" => [
        "coreData" => [
            "depot" => [
                "balance" => 7707950,
                "limitBalance" => 7707950,
                "playerMoney" => 0
            ],
            "isGameFinished" => true
        ],
        
          "gameData"=> "{\"mainGameResult\":{\"winnings\":[],\"creatorName\":\"MAIN_GAME\",\"parameters\":{},\"childGameResult\":null,\"freeGameRound\":0,\"freeGamesTotal\":0,\"multiplier\":1,\"resultGeneratorKey\":{\"keyName\":\"SLOT_MACHINE\"},\"reels\":{\"0\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[2,0,1,2,0,2]},\"1\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[1,2,3,0,2,3,1,0]},\"2\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[3,4,1,1,4,1,4,1,4,3]},\"3\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[6,0,0,6,2,4,5,6,3,1,0,3]}}},\"nextGameActions\":[{\"id\":\"PLAY\",\"minTotalWager\":480,\"maxTotalWager\":19200,\"wagerPositions\":[{\"id\":1,\"wagerBounds\":{\"possibleWagers\":[480,2400,4800,7200,9600,14400,19200,720,1200],\"minWager\":480,\"maxWager\":19200,\"wagerStepType\":\"FIXED\"}}]}],\"accounting\":{\"debit\":720,\"credit\":0,\"debitType\":\"WAGER\",\"creditType\":\"WIN\"},\"uncommittedWinSum\":0,\"lastWagerSum\":720,\"addOnGameInitResult\":null,\"addOnGameResult\":null,\"responseType\":\"ACTION\",\"nextGameFlowName\":\"MAIN_GAME\"}"

         ]
];

return $commands;
