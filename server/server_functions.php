<?

function create(){
  if(!$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)){
    return "Error";
  } else {
    return $socket;
  }
}

function bind($socket, $address, $port){
  if(!socket_bind($socket, $address, $port)){
    return "Error: " . socket_strerror(socket_last_error());
  }else{
    return "Success";
  }
}

function listen($socket){
  socket_set_option($socket, SOL_SOCKET, SO_REUSEADDR, 1);//разрешаем использовать один порт для нескольких соединений
  if(!socket_listen($socket, 5)){
    return "Error: " . socket_strerror(socket_last_error());
  }else{
    return "Success";
  }
}
  
function connect($socket){
  while(true){ //Бесконечный цикл ожидания подключений
  $accept = @socket_accept($socket); //Зависаем пока не получим ответа
  if($accept === false){
    echo "Error: " . socket_strerror(socket_last_error());
    usleep(100);
  } else {
    echo "Success";
    echo "Client \"".$accept."\" has connected";
  }
  $msg = "Hello, Client!";
  echo "Send to client \"".$msg."\"... ";
  socket_write($accept, $msg);
  echo "Success";
  }
}
  
?>
