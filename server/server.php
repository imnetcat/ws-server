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
<br><br>
Server address: <span id="addr"> <? echo $_SERVER['SERVER_ADDR']; $address = gethostbyname('www.example.com'); echo "    ".$address;?> </span>
<br><br>
Server port: <span id="port">
  <? 
  $service_port = getservbyname('ws', 'tcp');
  echo $service_port;
  ?></span>
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
if(!socket_bind($socket, $_SERVER['SERVER_ADDR']){
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
	
}

?>
  </div>
</body>
</html>
