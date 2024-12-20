<!DOCTYPE html>
<html>

<head>
    <title>{{ $game->title }}</title>
    <meta charset="utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
    <style>
        body,
        html {
            position: fixed;
        }
    </style>
</head>

<script>
    localStorage.clear();

    if (true) {
        sessionStorage.setItem('sessionId', {{ $userId }});
    }


    var exitUrl = '';
    if (document.location.href.split("api_exit=")[1] != undefined) {
        exitUrl = document.location.href.split("api_exit=")[1].split("&")[0];
    }
    addEventListener('message', function(ev) {

        if (ev.data == 'CloseGame') {
            var isFramed = false;
            try {
                isFramed = window != window.top || document != top.document || self.location != top.location;
            } catch (e) {
                isFramed = true;
            }

            if (isFramed) {
                window.parent.postMessage('CloseGame', "*");
            }
            document.location.href = exitUrl;
        }

    });


    function ResizeHandler() {

        var frm = document.getElementById('game');

        frm.style['height'] = window.innerHeight + 'px';

    }

    addEventListener('resize', ResizeHandler);
    addEventListener('orientationchange', ResizeHandler);
</script>

<body onload="ResizeHandler();" style="margin:0px;width:100%;background-color:black;overflow:hidden">



    <iframe id='game' style="margin:0px;border:0px;width:100%;height:100vh;"
        src='/games/{{ $game->name }}/games/fortunerangers-client/game/fortunerangers-client.xhtml?flashParams.bgcolor=000000&gameId=fortunerangers_not_mobile&mobileParams.lobbyURL=&server=/game/{{ $game->name }}/server&lang=en&sessId=DEMO-3901711636-EUR&operatorId=netent'
        allowfullscreen>


    </iframe>




</body>
<script rel="javascript" type="text/javascript" src="/games/{{ $game->name }}/device.js"></script>
<!-- <script rel="javascript" type="text/javascript" src="/games/{{ $game->name }}/addon.js"></script> -->

</html>
