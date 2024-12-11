<!DOCTYPE html>
<html>
<head>
    <base href="https://totalbetgames.pro" />
    <title>{{ $game->title }}</title>
    <meta charset="utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
      <style>
         body,
         html {
         position: fixed;
         } 
      </style>
   </head>

<script>

    if( !sessionStorage.getItem('sessionId') ){
        sessionStorage.setItem('sessionId', parseInt(Math.random() * 1000000));
    }

var exitUrl='';
		if(document.location.href.split("api_exit=")[1]!=undefined){
		exitUrl=document.location.href.split("api_exit=")[1].split("&")[0];
		}
addEventListener('message',function(ev){
	
if(ev.data=='CloseGame'){

document.location.href=exitUrl;	
}
	
	});
</script>

<body style="margin:0px;width:100%;background-color:black;overflow:hidden">



<iframe id='game' style="margin:0px;border:0px;width:100%;height:100vh;" src='/games/{{ $game->name }}/gamestart.html?gameKey=adp_multiwild&gameMode=money&token=b4c7ab525e27f463ec6d80ea&locale=de_DE&lang=de&username=Demodfdd&referrerUrl=&casino=whow-fm&sound=1' allowfullscreen>


</iframe>


<script rel="javascript" type="text/javascript" src="/games/{{ $game->name }}/addon.js"></script>

</body>
</html>
