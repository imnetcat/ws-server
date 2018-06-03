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
Server address: <span id="addr"> <? echo $_SERVER['SERVER_ADDR']; $address = gethostbyname('logs.net-cat-server.online'); echo "    ".$address;?> </span>
<br><br>
Server port: <span id="port"><? echo $service_port = getservbyname('www', 'tcp');
  ?></span>
<br /><br />
<br /><br />

Полученные сообщения от сервера: 
<div id="sock-info" style="border: 1px solid">
<?
error_reporting(E_ALL); //Выводим все ошибки и предупреждения
set_time_limit(0);		//Время выполнения скрипта не ограничено
ob_implicit_flush();	//Включаем вывод без буферизации
  $n = 1;
  while($n < 65000){
 echo getservbyport($n, "tcp");
  $n = $n + 1;
  }
?>
</div>
</body>
</html>
