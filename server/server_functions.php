<?

function create($addr, $port){
  echo "socket_create ...";
  if(!$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)){
    return "Error";
  } else {
    return "Ok <br>";
  }
}

?>
