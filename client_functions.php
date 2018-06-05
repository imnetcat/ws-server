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
    return "Error: " . socket_strerror(socket_last_error());
  }else{
    return "OK";
  }
  socket_close($socket);
}

function connect($socket, $address, $port){
  if(!socket_connect($socket, $address, $port)){
    return "Error: " . socket_strerror(socket_last_error());
  }else{
    return "OK";
  }

?>
