<html>

<head>
    <title>{{ $game->title }}</title>
    <meta charset="utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
    <link href='/games/Sparta/css/fonts.css' rel='stylesheet' type='text/css'>
    <script src="/games/Sparta/js/lib/createjs-2015.11.26.min.js" type="text/javascript"></script>
    <script src="/games/Sparta/js/classes/GameButton.js" type="text/javascript"></script>
    <script src="/games/Sparta/js/classes/GameBack.js" type="text/javascript"></script>
    <script src="/games/Sparta/js/classes/GameUI.js" type="text/javascript"></script>
    <script src="/games/Sparta/js/classes/GameView.js" type="text/javascript"></script>
    <script src="/games/Sparta/js/classes/GameReels.js" type="text/javascript"></script>
    <script src="/games/Sparta/js/classes/GameLines.js" type="text/javascript"></script>
    <script src="/games/Sparta/js/classes/GameCounters.js" type="text/javascript"></script>
    <script src="/games/Sparta/js/classes/GameRules.js" type="text/javascript"></script>

    @if ($slot->slotGamble)
        <script src="/games/Sparta/js/classes/GameGamble.js" type="text/javascript"></script>
    @endif

    @if ($slot->slotBonus)
        <script src="/games/Sparta/js/classes/GameBonus.js" type="text/javascript"></script>
    @endif
    <script src="/games/Sparta/js/classes/GameMessages.js" type="text/javascript"></script>
    <script src="/games/Sparta/js/utils.js" type="text/javascript"></script>
    <script src="/games/Sparta/js/loader.js" type="text/javascript"></script>
    <script src="/games/Sparta/js/core.js" type="text/javascript"></script>
    <script src="/games/Sparta/js/classes/Sounds.js" type="text/javascript"></script>
    <script>
        if (true) {
            sessionStorage.setItem('sessionId', {{ $userId }});
        }
    </script>
    <style>
        body,
        html {
            position: fixed;
        }
    </style>
</head>

<body onload="InitializeGame()" style="margin:0px;background-color:black">
    <canvas id="game" width="750" height="630" cstyle="position: absolute;"></canvas>
</body>

</html>
