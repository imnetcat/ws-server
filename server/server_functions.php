<?

function create($addr, $port){
  if(!$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)){
    return "Error" . socket_strerror(socket_last_error());
  }else{
    return "Success";
  }
}

?>
