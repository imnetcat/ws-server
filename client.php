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
Server address: <? echo $address = $_SERVER['SERVER_ADDR']; ?> <br>
Our proxy: <? echo $our_proxy = gethostbyname('logs.net-cat-server.online'); ?> <br>
  
Our address: <? echo @$our_address = $_SERVER['HTTP_X_FORWARDED_FOR']; ?><br>
Port: <? echo $port = getservbyname('socks', 'tcp'); ?> <br>
Message:
<input id="message" type="text">

<input id="sock-send-butt" type="button" value="send">
<br />
<br />
<input id="startbtn" type="button" value="startbtn"><input id="sock-disc-butt" type="button" value="disconnect">
<br />
<br />

Полученные сообщения от веб-сокета: 
<div id="logs" style="border: 1px solid"></div>
  <?
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
</body>
</html>
