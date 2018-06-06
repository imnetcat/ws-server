<?

function create(){
  if(!$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)){
    return "Error";
  } else {
    return $socket;
  }
  socket_close($socket);
}

function bind($socket, $address, $port){
  if(!socket_bind($socket, $address, $port)){
    socket_close($socket);
    return "Error: " . socket_strerror(socket_last_error());
  }else{
    socket_close($socket);
    return "OK";
  }
}

function listen($socket){
  socket_set_option($socket, SOL_SOCKET, SO_REUSEADDR, 1);//разрешаем использовать один порт для нескольких соединений
  if(!socket_listen($socket, 5)){
    socket_close($socket);
    return "Error: " . socket_strerror(socket_last_error());
  }else{
    socket_close($socket);
    return "OK";
  }
}
  
function connect($socket){
  while(true){ //Бесконечный цикл ожидания подключений
  $accept = @socket_accept($socket); //Зависаем пока не получим ответа
  if($accept === false){
    // echo "Error: " . socket_strerror(socket_last_error());
    usleep(100);
  } else {
    $msg = "Hello, Client!";
    socket_write($accept, $msg);
    socket_close($socket);
    return "Client \"".$accept."\" has connected" . "<br>" . "Send to client \"".$msg."\"... " . "<br>" . "OK";
  }
  }
}
  
?>
