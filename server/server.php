<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Server</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<br><br>
<br><br>
<? if(extension_loaded('sockets')){ echo "Status ext-sockets: ready to use"; }else{ echo "Status ext-sockets: UNVALIBLE !"; } ?> 
<br><br>
Server address: <span id="addr"> <? echo $address =  gethostbyname('logs.net-cat-server.online'); ?> </span>
<br><br>
Server port: <span id="port"><? echo $port = getservbyname('socks', 'tcp'); ?></span>
<br><br>
<br><br>

Полученные сообщения от сервера: 
<div id="logs" style="border: 1px solid">
<?
	require_once "server_functions.php";
	if(!$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)){
      echo "Error";
    } else {
      bind($socket, $_POST['address'], $_POST['port']);
      listen($socket);
      echo connect($socket);
      socket_close($socket);
    }
?>
</div>
</body>
</html>
