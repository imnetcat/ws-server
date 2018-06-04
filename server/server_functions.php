<?

function create(){
  if(!$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)){
    return "Error";
  } else {
    return $socket;
  }
  socket_close($socket);
}

function bind($address, $port){
  if(!socket_bind($socket, $address, $port)){
    return "Error: " . socket_strerror(socket_last_error());
  }else{
    return "OK";
  }
  socket_close($socket);
}

function listen($socket){
  socket_set_option($socket, SOL_SOCKET, SO_REUSEADDR, 1);//разрешаем использовать один порт для нескольких соединений
  if(!socket_listen($socket, 5)){
    return "Error: " . socket_strerror(socket_last_error());
  }else{
    return "OK";
  }
  socket_close($socket);
}
  
function connect($socket){
  while(true){ //Бесконечный цикл ожидания подключений
  $accept = @socket_accept($socket); //Зависаем пока не получим ответа
  if($accept === false){
    echo "Error: " . socket_strerror(socket_last_error());
    usleep(100);
  } else {
    echo "Connect accept";
    echo "Client \"".$accept."\" has connected";
  }
  $msg = "Hello, Client!";
  echo "Send to client \"".$msg."\"... ";
  socket_write($accept, $msg);
  echo "OK";
  }
  socket_close($socket);
}
  
?>
