<? require_once "server_functions.php"; ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Siple Web-Socket Client</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<br><br>
<br><br>
<? if(extension_loaded('sockets')){ echo "Status ext-sockets: ready to use"; }else{ echo "Status ext-sockets: UNVALIBLE !"; } ?> 
<br><br>
Server address: <span id="addr"> <? echo $address = $_SERVER['SERVER_ADDR']; ?> </span>
<br><br>
Server port: <span id="port"><? echo $port = getservbyname('socks', 'tcp');
  ?></span>
<br><br>
<br><br>
<button id="startbtn">Start server</button>
<script async>
    $( () => {
      $('#startbtn').click( () => {
	$('#logs').append($("<p>socket_create ...</p>"));
        $('#logs').append($("<p>" + "<? echo create($address, $port) ?>" + "</p>"));
      });
    });
  </script>
Полученные сообщения от сервера: 
<div id="logs" style="border: 1px solid">

</div>
</body>
</html>
