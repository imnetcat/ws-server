<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Client</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script async>
    $( () => {
      $('#to_server').click( () => {
         document.location += '/server/server.php';
      });
    });
  </script>
</head>
<body>
<br>
<br>
<br>
<button id="to_server">Go to server</button>
<br>
Server address: <? echo $server_address = $_SERVER['SERVER_ADDR']; ?> <br>
Our proxy: <? echo $our_proxy = gethostbyname('logs.net-cat-server.online'); ?> <br>
  
Our address: <? echo @$our_address = $_SERVER['HTTP_X_FORWARDED_FOR']; ?><br>
Port: <? echo $port = getservbyname('socks', 'tcp'); ?> <br>
Message:
<input id="message" type="text">
<script async>
$( () => {
  $('#startbtn').click( () => {
    $('#logs').append($("<span>Creating ...</span><br>"));
    $.ajax({
      type: "GET",
      url: "client_actions.php"    
    });
  });
});
 </script>
<input id="sock-send-butt" type="button" value="send">
<br />
<br />
<input id="startbtn" type="button" value="startbtn"><input id="sock-disc-butt" type="button" value="disconnect">
<br />
<br />

Полученные сообщения от веб-сокета: 
<div id="logs" style="border: 1px solid"></div>

</body>
</html>
