<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Siple Web-Socket Client</title>
  <script async>
    document.addEventListener('DOMContentLoaded', () => {
      document.getElementById('to_server').addEventListener('click', () => {
        document.location = '/server/server.php';
      });
    });
  </script>
  <script src="socket.js" type="text/javascript"></script>
</head>
<body>
<br>
<br>
<br>
<button id="to_server">Go to server</button>
<br>
Server address:
<input id="sock-addr" type="text" value="wss://echo.websocket.org"><br />
Message:
<input id="sock-msg" type="text">

<input id="sock-send-butt" type="button" value="send">
<br />
<br />
<input id="sock-recon-butt" type="button" value="reconnect"><input id="sock-disc-butt" type="button" value="disconnect">
<br />
<br />

Полученные сообщения от веб-сокета: 
<div id="sock-info" style="border: 1px solid"> <? echo $_SERVER['SERVER_ADDR'] ?> </div>

</body>
</html>
