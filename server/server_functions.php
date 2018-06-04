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
?>
