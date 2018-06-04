<?

function bind($socket, $address, $port){
  if(!socket_bind($socket, $address, $port)){
    return "Error: " . socket_last_error();
  }else{
    return "S";
  }
}

function listing($socket){
  socket_set_option($socket, SOL_SOCKET, SO_REUSEADDR, 1);//разрешаем использовать один порт для нескольких соединений
  if(!socket_listen($socket, 5)){
    return "Error: ".socket_strerror(socket_last_error());
  }else{
    return "Success";
  }
  
function connect($socket){
  while(true){ //Бесконечный цикл ожидания подключений
  $accept = @socket_accept($socket); //Зависаем пока не получим ответа
  if($accept === false){
    echo "Error: ".socket_strerror(socket_last_error())."<br />\r\n";
    usleep(100);
  } else {
    echo "Success";
    echo "Client \"".$accept."\" has connected<br />\r\n";
  }
  $msg = "Hello, Client!";
  echo "Send to client \"".$msg."\"... ";
  socket_write($accept, $msg);
  echo "Success";
  }
}
  
?>
