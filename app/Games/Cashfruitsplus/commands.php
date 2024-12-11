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
        "gameData" => "{\"mainGameResult\":{\"winnings\":[],\"creatorName\":\"MAIN_GAME\",\"parameters\":{\"CLIENT_SETTINGS\":\"{\\\"coin\\\":600,\\\"countOfActiveWagerPositions\\\":5,\\\"custom\\\":null}\"},\"childGameResult\":null,\"freeGameRound\":0,\"freeGamesTotal\":0,\"multiplier\":1,\"resultGeneratorKey\":{\"keyName\":\"SLOT_MACHINE\"},\"reels\":{\"0\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[4,5,5,1]},\"1\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[0,4,4,1]},\"2\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[4,2,2,5]},\"3\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[0,0,7,2]},\"4\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[0,4,2,2]}}},\"nextGameActions\":[{\"id\":\"PLAY\",\"minTotalWager\":400,\"maxTotalWager\":16000,\"wagerPositions\":[{\"id\":1,\"wagerBounds\":{\"possibleWagers\":[80,400,800,1200,1600,2400,3200,120,200],\"minWager\":80,\"maxWager\":3200,\"wagerStepType\":\"FIXED\"}},{\"id\":2,\"wagerBounds\":{\"possibleWagers\":[80,400,800,1200,1600,2400,3200,120,200],\"minWager\":80,\"maxWager\":3200,\"wagerStepType\":\"FIXED\"}},{\"id\":3,\"wagerBounds\":{\"possibleWagers\":[80,400,800,1200,1600,2400,3200,120,200],\"minWager\":80,\"maxWager\":3200,\"wagerStepType\":\"FIXED\"}},{\"id\":4,\"wagerBounds\":{\"possibleWagers\":[80,400,800,1200,1600,2400,3200,120,200],\"minWager\":80,\"maxWager\":3200,\"wagerStepType\":\"FIXED\"}},{\"id\":5,\"wagerBounds\":{\"possibleWagers\":[80,400,800,1200,1600,2400,3200,120,200],\"minWager\":80,\"maxWager\":3200,\"wagerStepType\":\"FIXED\"}}]}],\"accounting\":{\"debit\":0,\"credit\":0,\"debitType\":\"WAGER\",\"creditType\":\"WIN\"},\"uncommittedWinSum\":0,\"lastWagerSum\":0,\"addOnGameInitResult\":null,\"addOnGameResult\":null,\"responseType\":\"INIT\",\"payTable\":{\"groups\":[{\"members\":[3],\"items\":[{\"winFactor\":5,\"occur\":2},{\"winFactor\":20,\"occur\":3},{\"winFactor\":50,\"occur\":4},{\"winFactor\":200,\"occur\":5}]},{\"members\":[0,1,2],\"items\":[{\"winFactor\":20,\"occur\":3},{\"winFactor\":50,\"occur\":4},{\"winFactor\":200,\"occur\":5}]},{\"members\":[4,5],\"items\":[{\"winFactor\":50,\"occur\":3},{\"winFactor\":200,\"occur\":4},{\"winFactor\":500,\"occur\":5}]},{\"members\":[6],\"items\":[{\"winFactor\":100,\"occur\":3},{\"winFactor\":1000,\"occur\":4},{\"winFactor\":5000,\"occur\":5}]},{\"members\":[7],\"items\":[{\"winFactor\":2,\"occur\":3},{\"winFactor\":10,\"occur\":4},{\"winFactor\":50,\"occur\":5}]}]},\"wagerPositionSets\":[{\"wagerPositionIds\":[1,2,3,4,5],\"type\":\"FIXED\",\"wagerBounds\":null}],\"coins\":[400,600,1000,2000,4000,6000,8000,12000,16000],\"translations\":{\"ButtonCaption_RISK_BLACKRED_BLACK\":\"Risiko auf Schwarz\",\"ButtonCaption_RISK_BLACKRED_RED\":\"Risiko auf Rot\",\"ButtonCaption_RISK_BLACKRED_CHOICE\":\"Kartenrisiko\",\"deactivate_autoplay\":\"STOP\",\"sound\":\"Sound\",\"shortcutExplanation\":\"M: x1000000 G: x1000M\",\"POST_STATE_MOVED\":\"verschoben\",\"deactivate_turbospin\":\"Deaktivieren mit <icon>\",\"choose_lines\":\"LINIEN WÄHLEN\",\"autostart\":\"AUTO START\",\"POST_STATE_LOWERED\":\"verringert\",\"LINES\":\"LINIEN\",\"POST_STATE_CANCELED_BY_BANK\":\"storniert\",\"at_next_freegames\":\"bei Gewinn von Freispielen\",\"max_win_propability\":\"Höchstgewinnwahrscheinlichkeit\",\"activate_sound\":\"Aktiviere den Sound\",\"POST_STATE_LOST\":\"nicht gewonnen\",\"bet\":\"Einsatz\",\"choose_stake\":\"EINSATZ WÄHLEN\",\"at_win_available\":\"Bei Gewinn verfügbar:\",\"choose_autospins\":\"SPIELANZAHL WÄHLEN\",\"at_max_total_loss_of\":\"bei GUTHABEN kleiner gleich\",\"ButtonCaption_PLAY\":\"Start\",\"BLACKRED\":\"Kartenrisiko\",\"shortThousand\":\"k\",\"at_win_of_freegames\":\"bei Gewinn von Freispielen\",\"ButtonCaption_RISK_LADDER_CHOICE\":\"Risikoleiter\",\"ButtonCaption_RISK_DIVIDE\":\"Risiko teilen\",\"openGameCloseConfirmation.body\":\"Ihr Spiel ist noch nicht beendet. Wollen Sie das Spiel schließen und später fortsetzen?\",\"Number.Delim.Float\":\",\",\"at_max_total_win_of\":\"bei GUTHABEN größer gleich\",\"at_min_win_of\":\"bei Gewinn von mind.\",\"set_the_bet\":\"Einsatz\",\"ButtonCaption_RaiseBetsToMaxBtn\":\"Max. Einsatz\",\"set_the_amount_of_autospins\":\"Anzahl der Autostarts\",\"set_the_bet_per_line\":\"Einsatz pro Linie\",\"ButtonCaption_COLLECT\":\"Gewinn nehmen\",\"GameMeterCaption_DEPOT\":\"GUTHABEN\",\"propability_seperator\":\"zu\",\"TOTALBET\":\"EINSATZ\",\"POST_STATE_WON\":\"gewonnen\",\"at_total_loss_of\":\"bei Verlust größer gleich\",\"left_handed\":\"links\",\"POST_STATE_PARTIAL_WIN\":\"Teilgewinn\",\"reentering_freegames_message\":\"Willkommen zurück! Bisherige Gewinne wurden bereits auf DEPOT gebucht.\",\"ButtonCaption_RISK\":\"Gewinn riskieren\",\"BETS_PER_LINE\":\"PRO LINIE\",\"choose_stake_pre_line\":\"EINSATZ PRO LINIE WÄHLEN\",\"ButtonCaption_FINISH_GAME\":\"Gewinn nehmen\",\"shortBillion\":\"G\",\"big_win\":\"GLÜCKWUNSCH\",\"GameMeterCaption_BETS\":\"EINSATZ\",\"button_yes\":\"ja\",\"autospins\":\"Autostarts\",\"ButtonCaption_ADP_PLAY\":\"Start\",\"LADDER\":\"Risikoleiter\",\"POST_STATE_IN_PLAY\":\"nimmt teil\",\"BlackRedPeakCaption\":\"RISIKO SPITZE\",\"BlackRedWinCaption\":\"RISIKO GEWINN\",\"LadderPlayOffCaption\":\"Ausspielung\",\"GameMeterCaption_WINS\":\"GEWINN\",\"set_the_amount_of_lines\":\"Anzahl der Linien\",\"POST_STATE_PLACING\":\"platziert\",\"LINE\":\"LINIE\",\"ban_active\":\"Aktiviert\",\"reentering_freegames_title\":\"Willkommen zurück!\",\"POST_STATE_PLACED\":\"angenommen\",\"at_next_win\":\"beim nächsten Gewinn\",\"button_no\":\"nein\",\"POST_STATE_CANCELED_BY_PLAYER\":\"storniert\",\"POST_STATE_RAISED\":\"erhöht\",\"is_mandatory\":\"*) Bitte alle Pflichtfelder ausfüllen.\",\"paytable\":\"Gewinnplan\",\"right_handed\":\"rechts\",\"rtp\":\"RTP\",\"shortMillion\":\"M\",\"help\":\"Hilfe\",\"POST_STATE_SUSPENDED\":\"ausgesetzt\",\"ban24hours\":\"24h Sperre\",\"bet_per_line\":\"PRO LINIE\",\"BlackRedRiskCaption\":\"RISIKO EINSATZ\",\"activate_turbospin\":\"Aktiviere Schnellspiel?\",\"POST_STATE_SURRENDERED\":\"aufgegeben\"},\"locale\":\"de\",\"nextGameFlowName\":\"MAIN_GAME\"}"

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
        "gameData" => "{\"mainGameResult\":{\"winnings\":[],\"creatorName\":\"MAIN_GAME\",\"parameters\":{},\"childGameResult\":null,\"freeGameRound\":0,\"freeGamesTotal\":0,\"multiplier\":1,\"resultGeneratorKey\":{\"keyName\":\"SLOT_MACHINE\"},\"reels\":{\"0\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[1,5,5,5,2,2]},\"1\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[4,3,2,2,1,1,5,0]},\"2\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[6,5,5,1,1,1,4,0,0,3]},\"3\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[1,0,0,7,2,2,2,4,7,2,2,4]},\"4\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[4,2,2,2,4,7,1,1,1,1,3,0,0,0]}}},\"nextGameActions\":[{\"id\":\"PLAY\",\"minTotalWager\":400,\"maxTotalWager\":16000,\"wagerPositions\":[{\"id\":1,\"wagerBounds\":{\"possibleWagers\":[80,400,800,1200,1600,2400,3200,120,200],\"minWager\":80,\"maxWager\":3200,\"wagerStepType\":\"FIXED\"}},{\"id\":2,\"wagerBounds\":{\"possibleWagers\":[80,400,800,1200,1600,2400,3200,120,200],\"minWager\":80,\"maxWager\":3200,\"wagerStepType\":\"FIXED\"}},{\"id\":3,\"wagerBounds\":{\"possibleWagers\":[80,400,800,1200,1600,2400,3200,120,200],\"minWager\":80,\"maxWager\":3200,\"wagerStepType\":\"FIXED\"}},{\"id\":4,\"wagerBounds\":{\"possibleWagers\":[80,400,800,1200,1600,2400,3200,120,200],\"minWager\":80,\"maxWager\":3200,\"wagerStepType\":\"FIXED\"}},{\"id\":5,\"wagerBounds\":{\"possibleWagers\":[80,400,800,1200,1600,2400,3200,120,200],\"minWager\":80,\"maxWager\":3200,\"wagerStepType\":\"FIXED\"}}]}],\"accounting\":{\"debit\":600,\"credit\":0,\"debitType\":\"WAGER\",\"creditType\":\"WIN\"},\"uncommittedWinSum\":0,\"lastWagerSum\":600,\"addOnGameInitResult\":null,\"addOnGameResult\":null,\"responseType\":\"ACTION\",\"nextGameFlowName\":\"MAIN_GAME\"}"

    ]
];

$sym1 = "[2,0,1,2]";
$sym2 = "[2,3,4,5]";
$sym3 = "[2,0,1,2]";
$sym4 = "[2,3,4,5]";
$sym5 = "[2,6,7,7]";
$win = 12000;

class Point {
    public $x;
    public $y;
    public $winSym;

    public function __construct($x, $y, $winSym){
        $this->x = $x;
        $this->y = $y;
        $this->winSym = $winSym;
    }
};

$point1 = new Point(0,0,6);
$point2 = new Point(1,0,6);
$point3 = new Point(2,0,6);
$point4 = new Point(3,0,6);
$point5 = new Point(4,0,6);

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
        "gameData" => "{\"mainGameResult\":{\"winnings\":[{\"wagerPositionId\":6,\"winFactor\":100,\"winSum\":$win,\"wagerId\":2,\"winExtensions\":[],\"items\":[{\"point\":{\"x\":$point1->x,\"y\":$point1->y},\"symbol\":$point1->winSym},{\"point\":{\"x\":$point2->x,\"y\":$point2->y},\"symbol\":$point2->winSym},{\"point\":{\"x\":$point3->x,\"y\":$point3->y},\"symbol\":$point3->winSym},{\"point\":{\"x\":$point4->x,\"y\":$point4->y},\"symbol\":$point4->winSym},{\"point\":{\"x\":$point5->x,\"y\":$point5->y},\"symbol\":$point5->winSym}],\"highlight\":{\"payGroupMemberId\":6,\"occurrence\":3},\"lid\":2,\"eid\":1}],\"creatorName\":\"MAIN_GAME\",\"parameters\":{},\"childGameResult\":null,\"freeGameRound\":0,\"freeGamesTotal\":0,\"multiplier\":1,\"resultGeneratorKey\":{\"keyName\":\"SLOT_MACHINE\"},\"reels\":{\"0\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":$sym1},\"1\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":$sym2},\"2\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":$sym3},\"3\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":$sym4},\"4\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":$sym5}}},\"nextGameActions\":[{\"id\":\"RISK_BLACKRED_CHOICE\",\"minTotalWager\":0,\"maxTotalWager\":0,\"wagerPositions\":[]},{\"id\":\"RISK_LADDER_CHOICE\",\"minTotalWager\":0,\"maxTotalWager\":0,\"wagerPositions\":[]},{\"id\":\"FINISH_GAME\",\"minTotalWager\":0,\"maxTotalWager\":0,\"wagerPositions\":[]}],\"accounting\":{\"debit\":600,\"credit\":12000,\"debitType\":\"WAGER\",\"creditType\":\"WIN\"},\"uncommittedWinSum\":12000,\"lastWagerSum\":600,\"addOnGameInitResult\":null,\"addOnGameResult\":null,\"responseType\":\"ACTION\",\"nextGameFlowName\":\"RISK_CHOICE\"}"

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
        "gameData" => "{\"mainGameResult\":{\"winnings\":[{\"wagerPositionId\":1,\"winFactor\":20,\"winSum\":2400,\"wagerId\":1,\"winExtensions\":[],\"items\":[{\"point\":{\"x\":0,\"y\":1},\"symbol\":2},{\"point\":{\"x\":1,\"y\":1},\"symbol\":2},{\"point\":{\"x\":2,\"y\":1},\"symbol\":2}],\"highlight\":{\"payGroupMemberId\":2,\"occurrence\":3},\"lid\":1,\"eid\":1},{\"wagerPositionId\":5,\"winFactor\":20,\"winSum\":2400,\"wagerId\":5,\"winExtensions\":[],\"items\":[{\"point\":{\"x\":0,\"y\":2},\"symbol\":2},{\"point\":{\"x\":1,\"y\":1},\"symbol\":2},{\"point\":{\"x\":2,\"y\":0},\"symbol\":2}],\"highlight\":{\"payGroupMemberId\":2,\"occurrence\":3},\"lid\":5,\"eid\":1}],\"creatorName\":\"MAIN_GAME\",\"parameters\":{},\"childGameResult\":null,\"freeGameRound\":0,\"freeGamesTotal\":0,\"multiplier\":1,\"resultGeneratorKey\":{\"keyName\":\"SLOT_MACHINE\"},\"reels\":{\"0\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[0,2,2,2,5,2]},\"1\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[0,3,2,2,1,1,5,6]},\"2\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[3,2,2,5,7,4,0,0,1,1]},\"3\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[2,6,0,0,5,1,1,1,1,4,6,3]},\"4\":{\"visibleSymbolCount\":3,\"swingOffSize\":1,\"symbols\":[0,4,4,3,0,0,6,1,1,2,2,0,0,0]}}},\"nextGameActions\":[{\"id\":\"RISK_BLACKRED_CHOICE\",\"minTotalWager\":0,\"maxTotalWager\":0,\"wagerPositions\":[]},{\"id\":\"RISK_LADDER_CHOICE\",\"minTotalWager\":0,\"maxTotalWager\":0,\"wagerPositions\":[]},{\"id\":\"FINISH_GAME\",\"minTotalWager\":0,\"maxTotalWager\":0,\"wagerPositions\":[]}],\"accounting\":{\"debit\":600,\"credit\":4800,\"debitType\":\"WAGER\",\"creditType\":\"WIN\"},\"uncommittedWinSum\":4800,\"lastWagerSum\":600,\"addOnGameInitResult\":null,\"addOnGameResult\":null,\"responseType\":\"ACTION\",\"nextGameFlowName\":\"RISK_CHOICE\"}"


    ]
];

return $commands;
