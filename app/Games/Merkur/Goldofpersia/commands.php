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
          "gameData"=> "{\"mainGameResult\":{\"winnings\":[],\"creatorName\":\"MAIN_GAME\",\"parameters\":{\"CLIENT_SETTINGS\":\"{\\\"coin\\\":600,\\\"countOfActiveWagerPositions\\\":5}\"},\"freeGameRound\":0,\"freeGamesTotal\":0,\"multiplier\":1,\"resultGeneratorKey\":{\"keyName\":\"SLOT_MACHINE\"},\"baseRound\":0,\"reels\":{\"0\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[0,0,0,0]},\"1\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[0,0,0,0]},\"2\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[0,0,0,0]},\"3\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[0,0,0,0]},\"4\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[0,0,0,0]}}},\"nextGameActions\":[{\"id\":\"PLAY\",\"minTotalWager\":400,\"maxTotalWager\":40000,\"wagerCondition\":\"ADD\",\"debitType\":\"WAGER\",\"wagerPositions\":[{\"id\":1,\"wagerBounds\":{\"possibleWagers\":[80,400,800,1600,2400,3200,4800,8000,120,200],\"minWager\":80,\"maxWager\":8000,\"wagerStepType\":\"FIXED\"}},{\"id\":2,\"wagerBounds\":{\"possibleWagers\":[80,400,800,1600,2400,3200,4800,8000,120,200],\"minWager\":80,\"maxWager\":8000,\"wagerStepType\":\"FIXED\"}},{\"id\":3,\"wagerBounds\":{\"possibleWagers\":[80,400,800,1600,2400,3200,4800,8000,120,200],\"minWager\":80,\"maxWager\":8000,\"wagerStepType\":\"FIXED\"}},{\"id\":4,\"wagerBounds\":{\"possibleWagers\":[80,400,800,1600,2400,3200,4800,8000,120,200],\"minWager\":80,\"maxWager\":8000,\"wagerStepType\":\"FIXED\"}},{\"id\":5,\"wagerBounds\":{\"possibleWagers\":[80,400,800,1600,2400,3200,4800,8000,120,200],\"minWager\":80,\"maxWager\":8000,\"wagerStepType\":\"FIXED\"}}]}],\"accounting\":{\"debit\":0,\"credit\":0,\"debitType\":\"WAGER\",\"creditType\":\"WIN\"},\"uncommittedWinSum\":0,\"riskPot\":0,\"lastWagerSum\":0,\"winStreaks\":{},\"payTable\":{\"groups\":[{\"members\":[0],\"items\":[{\"winFactor\":5,\"occur\":2},{\"winFactor\":10,\"occur\":3},{\"winFactor\":25,\"occur\":4},{\"winFactor\":75,\"occur\":5}]},{\"members\":[1,2,3],\"items\":[{\"winFactor\":10,\"occur\":3},{\"winFactor\":25,\"occur\":4},{\"winFactor\":75,\"occur\":5}]},{\"members\":[5,4],\"items\":[{\"winFactor\":15,\"occur\":3},{\"winFactor\":35,\"occur\":4},{\"winFactor\":100,\"occur\":5}]},{\"members\":[7,6],\"items\":[{\"winFactor\":5,\"occur\":2},{\"winFactor\":30,\"occur\":3},{\"winFactor\":100,\"occur\":4},{\"winFactor\":750,\"occur\":5}]},{\"members\":[9,10],\"items\":[{\"winFactor\":20,\"occur\":3},{\"winFactor\":40,\"occur\":4},{\"winFactor\":150,\"occur\":5}]},{\"members\":[11],\"items\":[{\"winFactor\":25,\"occur\":3},{\"winFactor\":50,\"occur\":4},{\"winFactor\":400,\"occur\":5}]},{\"members\":[8],\"items\":[{\"winFactor\":15,\"occur\":2},{\"winFactor\":150,\"occur\":3},{\"winFactor\":1500,\"occur\":4},{\"winFactor\":5000,\"occur\":5}]},{\"members\":[12],\"items\":[{\"winFactor\":2,\"occur\":2},{\"winFactor\":5,\"occur\":3},{\"winFactor\":20,\"occur\":4},{\"winFactor\":500,\"occur\":5}]}]},\"wagerPositionSets\":[{\"wagerPositionIds\":[1,2,3,4,5],\"type\":\"FIXED\"}],\"coins\":[400,600,1000,2000,4000,8000,12000,16000,24000,40000],\"translations\":{\"deactivate_autoplay\":\"STOP\",\"POST_STATE_MOVED\":\"verschoben\",\"autostart\":\"AUTO START\",\"deactivate_turbospin\":\"Deaktivieren mit <icon>\",\"Bonusgame\":\"Bonusspiel\",\"at_max_total_loss_of\":\"bei GUTHABEN kleiner gleich\",\"choose_autospins\":\"SPIELANZAHL WÄHLEN\",\"BLACKRED\":\"Kartenrisiko\",\"shortThousand\":\"k\",\"at_win_of_freegames\":\"bei Gewinn von Freispielen\",\"ButtonCaption_RISK_LADDER_CHOICE\":\"Risikoleiter\",\"freeGameDisplayLine4\":\"Bonusspiele\",\"freeGameDisplayLine2\":\"gewinnen\",\"freeGameDisplayLine1\":\"Sie\",\"at_max_total_win_of\":\"bei GUTHABEN größer gleich\",\"set_the_bet\":\"Einsatz\",\"set_the_amount_of_autospins\":\"Anzahl der Autostarts\",\"GameMeterCaption_DEPOT\":\"GUTHABEN\",\"TOTALBET\":\"EINSATZ\",\"at_total_loss_of\":\"bei Verlust größer gleich\",\"POST_STATE_PARTIAL_WIN\":\"Teilgewinn\",\"ButtonCaption_RISK\":\"Gewinn riskieren\",\"BETS_PER_LINE\":\"PRO LINIE\",\"choose_stake_pre_line\":\"EINSATZ PRO LINIE WÄHLEN\",\"shortBillion\":\"G\",\"big_win\":\"GLÜCKWUNSCH\",\"button_yes\":\"ja\",\"autospins\":\"Autostarts\",\"ButtonCaption_ADP_PLAY\":\"Start\",\"wild_line_2_3\":\"den Gewinn\",\"LADDER\":\"Risikoleiter\",\"multi_total\":\"GESAMT\",\"POST_STATE_IN_PLAY\":\"nimmt teil\",\"BlackRedWinCaption\":\"RISIKO GEWINN\",\"LadderPlayOffCaption\":\"Ausspielung\",\"set_the_amount_of_lines\":\"Anzahl der Linien\",\"GameMeterCaption_WINS\":\"GEWINN\",\"POST_STATE_PLACING\":\"platziert\",\"ban_active\":\"Aktiviert\",\"POST_STATE_PLACED\":\"angenommen\",\"at_next_win\":\"beim nächsten Gewinn\",\"wild_line_2_2\":\"als Joker verdoppelt\",\"wild_line_2_1\":\"Ein oder mehr\",\"button_no\":\"nein\",\"POST_STATE_CANCELED_BY_PLAYER\":\"storniert\",\"multi_freegames\":\"FREISPIELE\",\"is_mandatory\":\"*) Bitte alle Pflichtfelder ausfüllen.\",\"right_handed\":\"rechts\",\"rtp\":\"RTP\",\"help\":\"Hilfe\",\"POST_STATE_SUSPENDED\":\"ausgesetzt\",\"ban24hours\":\"24h Sperre\",\"ButtonCaption_RISK_BLACKRED_BLACK\":\"Risiko auf Schwarz\",\"ButtonCaption_RISK_BLACKRED_RED\":\"Risiko auf Rot\",\"ButtonCaption_RISK_BLACKRED_CHOICE\":\"Kartenrisiko\",\"sound\":\"Sound\",\"shortcutExplanation\":\"M: x1000000 G: x1000M\",\"choose_lines\":\"LINIEN WÄHLEN\",\"POST_STATE_LOWERED\":\"verringert\",\"LINES\":\"LINIEN\",\"POST_STATE_CANCELED_BY_BANK\":\"storniert\",\"max_win_propability\":\"Höchstgewinnwahrscheinlichkeit\",\"activate_sound\":\"Aktiviere den Sound\",\"at_next_freegames\":\"bei Gewinn von Bonusspielen\",\"POST_STATE_LOST\":\"nicht gewonnen\",\"bet\":\"Einsatz\",\"at_win_available\":\"Bei Gewinn verfügbar:\",\"choose_stake\":\"EINSATZ WÄHLEN\",\"ButtonCaption_PLAY\":\"Start\",\"summary_line_3\":\"gewonnen\",\"from\":\"von\",\"ButtonCaption_RISK_DIVIDE\":\"Risiko teilen\",\"wild_line_1_2\":\"außer SCATTER\",\"wild_line_1_1\":\"ersetzt alle Symbole\",\"openGameCloseConfirmation.body\":\"Ihr Spiel ist noch nicht beendet. Wollen Sie das Spiel schließen und später fortsetzen?\",\"Number.Delim.Float\":\",\",\"at_min_win_of\":\"bei Gewinn von mind.\",\"summary_line_1\":\"Sie haben\",\"ButtonCaption_RaiseBetsToMaxBtn\":\"Max. Einsatz\",\"set_the_bet_per_line\":\"Einsatz pro Linie\",\"ButtonCaption_COLLECT\":\"Gewinn nehmen\",\"propability_seperator\":\"zu\",\"POST_STATE_WON\":\"gewonnen\",\"left_handed\":\"links\",\"reentering_freegames_message\":\"Willkommen zurück! Bisherige Gewinne wurden bereits auf DEPOT gebucht.\",\"ButtonCaption_FINISH_GAME\":\"Gewinn nehmen\",\"GameMeterCaption_BETS\":\"EINSATZ\",\"scatter_line_1\":\"<fg>25</fg> Bonusspiele\",\"scatter_line_3\":\"<fg>15</fg> Bonusspiele\",\"scatter_line_2\":\"<fg>20</fg> Bonusspiele\",\"scatter_line_4\":\"Im <freegame>BONUSSPIEL</freegame> alle Gewinne <multiplier>x3</multiplier>\",\"BlackRedPeakCaption\":\"RISIKO SPITZE\",\"LINE\":\"LINIE\",\"reentering_freegames_title\":\"Willkommen zurück!\",\"POST_STATE_RAISED\":\"erhöht\",\"paytable\":\"Gewinnplan\",\"shortMillion\":\"M\",\"bet_per_line\":\"PRO LINIE\",\"BlackRedRiskCaption\":\"RISIKO EINSATZ\",\"activate_turbospin\":\"Aktiviere Schnellspiel?\",\"POST_STATE_SURRENDERED\":\"aufgegeben\"},\"locale\":\"de\",\"targetRtp\":\"96.1\",\"nextGameFlowName\":\"MAIN_GAME\",\"rtpLevel\":\"9600\",\"responseType\":\"INIT\"}"


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
          "gameData"=> "{\"mainGameResult\":{\"winnings\":[{\"wagerPositionId\":5,\"winFactor\":5,\"winSum\":600,\"wagerId\":5,\"winExtensions\":[],\"items\":[{\"point\":{\"x\":0,\"y\":2},\"symbol\":6},{\"point\":{\"x\":1,\"y\":1},\"symbol\":6}],\"highlight\":{\"payGroupMemberId\":6,\"occurrence\":2},\"lid\":5,\"eid\":1}],\"creatorName\":\"MAIN_GAME\",\"parameters\":{},\"freeGameRound\":0,\"freeGamesTotal\":0,\"multiplier\":1,\"resultGeneratorKey\":{\"keyName\":\"SLOT_MACHINE\"},\"baseRound\":1,\"reels\":{\"0\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[11,9,1,6,2,1]},\"1\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[8,4,6,3,5,0,6,5]},\"2\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[2,10,4,0,3,4,5,2,1,0]},\"3\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[2,1,0,8,1,2,4,11,5,7,1,11]},\"4\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[10,3,4,7,9,3,1,4,9,6,5,7,0,4]}}},\"nextGameActions\":[{\"id\":\"RISK_BLACKRED_CHOICE\",\"minTotalWager\":0,\"maxTotalWager\":0,\"wagerCondition\":\"ADD\",\"debitType\":\"WAGER\",\"wagerPositions\":[]},{\"id\":\"RISK_LADDER_CHOICE\",\"minTotalWager\":0,\"maxTotalWager\":0,\"wagerCondition\":\"ADD\",\"debitType\":\"WAGER\",\"wagerPositions\":[]},{\"id\":\"FINISH_GAME\",\"minTotalWager\":0,\"maxTotalWager\":0,\"wagerCondition\":\"ADD\",\"debitType\":\"WAGER\",\"wagerPositions\":[]}],\"accounting\":{\"debit\":600,\"credit\":600,\"debitType\":\"WAGER\",\"creditType\":\"WIN\"},\"uncommittedWinSum\":600,\"riskPot\":600,\"lastWagerSum\":600,\"winStreaks\":{\"600\":{\"winSum\":600,\"length\":1,\"multiplier\":0,\"previousMultiplier\":0,\"nextMultiplier\":0}},\"nextGameFlowName\":\"RISK_CHOICE\",\"responseType\":\"ACTION\"}"


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
          "gameData"=> "{\"mainGameResult\":{\"winnings\":[{\"wagerPositionId\":0,\"winFactor\":10,\"winSum\":1200,\"wagerId\":0,\"winExtensions\":[],\"items\":[{\"point\":{\"x\":0,\"y\":1},\"symbol\":12},{\"point\":{\"x\":1,\"y\":1},\"symbol\":12}],\"highlight\":{\"payGroupMemberId\":12,\"occurrence\":2},\"lid\":0,\"eid\":0}],\"creatorName\":\"MAIN_GAME\",\"parameters\":{},\"freeGameRound\":0,\"freeGamesTotal\":0,\"multiplier\":1,\"resultGeneratorKey\":{\"keyName\":\"SLOT_MACHINE\"},\"baseRound\":1,\"reels\":{\"0\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[2,1,12,2,10,1],\"teaser\":{\"id\":12,\"occur\":1}},\"1\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[1,3,12,1,6,11,1,5],\"teaser\":{\"id\":12,\"occur\":2}},\"2\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[1,3,5,7,3,4,0,2,3,10]},\"3\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[1,11,5,2,4,5,9,11,5,7,2,9]},\"4\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[5,9,3,6,2,7,1,4,9,5,4,6,11,2]}}},\"nextGameActions\":[{\"id\":\"RISK_BLACKRED_CHOICE\",\"minTotalWager\":0,\"maxTotalWager\":0,\"wagerCondition\":\"ADD\",\"debitType\":\"WAGER\",\"wagerPositions\":[]},{\"id\":\"RISK_LADDER_CHOICE\",\"minTotalWager\":0,\"maxTotalWager\":0,\"wagerCondition\":\"ADD\",\"debitType\":\"WAGER\",\"wagerPositions\":[]},{\"id\":\"FINISH_GAME\",\"minTotalWager\":0,\"maxTotalWager\":0,\"wagerCondition\":\"ADD\",\"debitType\":\"WAGER\",\"wagerPositions\":[]}],\"accounting\":{\"debit\":600,\"credit\":1200,\"debitType\":\"WAGER\",\"creditType\":\"WIN\"},\"uncommittedWinSum\":1200,\"riskPot\":1200,\"lastWagerSum\":600,\"winStreaks\":{\"600\":{\"winSum\":1200,\"length\":1,\"multiplier\":0,\"previousMultiplier\":0,\"nextMultiplier\":0}},\"nextGameFlowName\":\"RISK_CHOICE\",\"responseType\":\"ACTION\"}"


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
          "gameData"=> "{\"mainGameResult\":{\"winnings\":[{\"wagerPositionId\":0,\"winFactor\":25,\"winSum\":3000,\"wagerId\":0,\"winExtensions\":[{\"parameters\":{\"MULTIPLIER\":3,\"FREEGAMES\":15},\"key\":\"FREE_GAME\"}],\"items\":[{\"point\":{\"x\":0,\"y\":2},\"symbol\":12},{\"point\":{\"x\":1,\"y\":1},\"symbol\":12},{\"point\":{\"x\":2,\"y\":0},\"symbol\":12}],\"highlight\":{\"payGroupMemberId\":12,\"occurrence\":3},\"lid\":0,\"eid\":0}],\"creatorName\":\"MAIN_GAME\",\"parameters\":{},\"freeGameRound\":0,\"freeGamesTotal\":0,\"multiplier\":1,\"resultGeneratorKey\":{\"keyName\":\"SLOT_MACHINE\"},\"baseRound\":1,\"reels\":{\"0\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[8,9,1,12,3,4],\"teaser\":{\"id\":12,\"occur\":1}},\"1\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[9,3,12,1,9,6,11,7],\"teaser\":{\"id\":12,\"occur\":2}},\"2\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[2,12,4,3,8,10,2,3,12,4],\"teaser\":{\"id\":12,\"occur\":3}},\"3\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[12,2,1,8,4,2,1,5,11,0,3,1]},\"4\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[7,6,5,4,11,5,0,7,6,2,3,1,6,3]}}},\"nextGameActions\":[{\"id\":\"PLAY\",\"minTotalWager\":0,\"maxTotalWager\":0,\"wagerCondition\":\"ADD\",\"debitType\":\"WAGER\",\"wagerPositions\":[]}],\"accounting\":{\"debit\":600,\"credit\":3000,\"debitType\":\"WAGER\",\"creditType\":\"WIN\"},\"uncommittedWinSum\":3000,\"riskPot\":3000,\"lastWagerSum\":600,\"winStreaks\":{\"600\":{\"winSum\":3000,\"length\":1,\"multiplier\":0,\"previousMultiplier\":0,\"nextMultiplier\":0}},\"nextGameFlowName\":\"FREE_GAME\",\"responseType\":\"ACTION\"}"

    ]
];

return $commands;