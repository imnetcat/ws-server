<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Siple Web-Socket Client</title>
</head>
<body>
<br><br>

<script src="socket.js" type="text/javascript"></script>

Server address: <br><br>
Server port: 
<br /><br />
<br /><br />

Полученные сообщения от сервера: 
<div id="sock-info" style="border: 1px solid">

<?

error_reporting(E_ALL); //Выводим все ошибки и предупреждения
set_time_limit(0);		//Время выполнения скрипта не ограничено
ob_implicit_flush();	//Включаем вывод без буферизации

$starttime = round(microtime(true),2);
echo "GO() ... <br />\r\n";

echo "socket_create ...";
if(!$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)){
  echo "Error: ".socket_strerror(socket_last_error())."<br />\r\n";
  exit();
} else {
  echo "OK <br />\r\n";
}


echo "socket_bind on" . "$_SERVER['SERVER_ADDR']" . ":" . "$_SERVER['SERVER_PORT']" . "...";
$bind = socket_bind($socket, '127.0.0.1', 15777);//привязываем его к указанным ip и порту
if($bind < 0){
  echo "Error: ".socket_strerror(socket_last_error())."<br />\r\n";
  exit();
}else{
  echo "OK <br />\r\n";
}

socket_set_option($socket, SOL_SOCKET, SO_REUSEADDR, 1);//разрешаем использовать один порт для нескольких соединений

echo "Listening socket... ";
$listen = socket_listen($socket, 5);//слушаем сокет

if($listen < 0){
  echo "Error: ".socket_strerror(socket_last_error())."<br />\r\n";
  exit();
}else{
  echo "OK <br />\r\n";
}

while(true){ //Бесконечный цикл ожидания подключений
  echo "Waiting... ";
  $accept = @socket_accept($socket); //Зависаем пока не получим ответа
  if($accept === false){
    echo "Error: ".socket_strerror(socket_last_error())."<br />\r\n";
    usleep(100);
  } else {
    echo "OK <br />\r\n";
    echo "Client \"".$accept."\" has connected<br />\r\n";
  }

  $msg = "Hello, Client!";
  echo "Send to client \"".$msg."\"... ";
  socket_write($accept, $msg);
  echo "OK <br />\r\n";
	
  if( ( round(microtime(true),2) - $starttime) > 100) {
    echo "time = ".(round(microtime(true),2) - $starttime);
    echo "return <br />\r\n";
    socket_close($socket);
  }
}

?>
  </div>
</body>
</html>
