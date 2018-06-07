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
Server address: <span id="addr"> <? echo $address =  $_SERVER['SERVER_ADDR']; ?> </span>
<br><br>
Server port: <span id="port"><? echo $port = getservbyname('socks', 'tcp'); ?></span>
<br><br>
<br><br>
<button id="startbtn">Start server</button>
Полученные сообщения от сервера: 
<div id="logs" style="border: 1px solid">
<?php
function go(){
	$starttime = round(microtime(true),2);
	echo "GO() ... <br />\r\n";

	echo "socket_create ...";
	$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

	if($socket < 0){
		echo "Error: ".socket_strerror(socket_last_error())."<br />\r\n";
		exit();
	} else {
	    echo "OK <br />\r\n";
	}
	

	echo "socket_bind ...";
	$bind = socket_bind($socket, $_SERVER['SERVER_ADDR'];, 1080);//привязываем его к указанным ip и порту
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
			return $socket;
		}


	}


}

error_reporting(E_ALL); //Выводим все ошибки и предупреждения
set_time_limit(0);		//Время выполнения скрипта не ограничено
ob_implicit_flush();	//Включаем вывод без буферизации 

$socket = go();			//Функция с бесконечным циклом, возвращает $socket по запросу выполненному по прошествии 100 секнуд. 

echo "go() ended<br />\r\n";

if (isset($socket)){
    echo "Closing connection... ";
	@socket_shutdown($socket);
    socket_close($socket);
    echo "OK <br />\r\n";
}
?>
</div>
</body>
</html>
