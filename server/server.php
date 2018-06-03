<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Siple Web-Socket Client</title>
</head>
<body>
<br><br>
<br><br>
<br><br>
Server address:
<br><br>
Server port: 
<br /><br />
<br /><br />

Полученные сообщения от сервера: 
<div id="sock-info" style="border: 1px solid">
<?
error_reporting(E_ALL); //Выводим все ошибки и предупреждения
set_time_limit(0);		//Время выполнения скрипта не ограничено
ob_implicit_flush();	//Включаем вывод без буферизации
echo "socket_create ...";
if(!$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)){
  echo "Error: ".socket_strerror(socket_last_error())."<br />\r\n";
  exit();
} else {
  echo "OK <br />\r\n";
}

echo "socket_bind...";
if(!socket_bind($socket, $_SERVER['SERVER_ADDR'], $_SERVER['SERVER_PORT'])){
  echo "Error: ".socket_strerror(socket_last_error())."<br />\r\n";
  exit();
}else{
  echo "OK <br />\r\n";
}
socket_set_option($socket, SOL_SOCKET, SO_REUSEADDR, 1);//разрешаем использовать один порт для нескольких соединений
echo "Listening socket... ";
if(!socket_listen($socket, 5)){
  echo "Error: ".socket_strerror(socket_last_error())."<br />\r\n";
  exit();
}else{
  echo "OK <br />\r\n";
}
   
?>
</div>
</body>
</html>
