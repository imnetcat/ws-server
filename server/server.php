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
      bind($socket, $address, $port);
      listen($socket);
      echo connect($socket);
      socket_close($socket);
    }
	
	echo "--------------------------------------------------------------------";
	
	error_reporting(E_ALL);
echo "<h2>Соединение TCP/IP</h2>\n";
/* Получаем порт сервиса WWW. */
$service_port = getservbyname('socks', 'tcp');
/* Получаем IP-адрес целевого хоста. */
$address = gethostbyname('logs.net-cat-server.online');
/* Создаём сокет TCP/IP. */
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket === false) {
    echo "Не удалось выполнить socket_create(): причина: " . socket_strerror(socket_last_error()) . "\n";
} else {
    echo "OK.\n";
}
echo "Пытаемся соединиться с '$address' на порту '$service_port'...";
$result = socket_connect($socket, $address, $service_port);
if ($result === false) {
    echo "Не удалось выполнить socket_connect().\nПричина: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
} else {
    echo "OK.\n";
}
$in = "HEAD / HTTP/1.1\r\n";
$in .= "Host: www.example.com\r\n";
$in .= "Connection: Close\r\n\r\n";
$out = '';
echo "Отправляем HTTP-запрос HEAD...";
socket_write($socket, $in, strlen($in));
echo "OK.\n";
echo "Читаем ответ:\n\n";
while ($out = socket_read($socket, 2048)) {
    echo $out;
}
echo "Закрываем сокет...";
socket_close($socket);
echo "OK.\n\n";
  ?>
?>
</div>
</body>
</html>
