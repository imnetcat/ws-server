<?

function create($addr, $port){
  if(!$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)){
    return "Error";
  } else {
    return "Success";
  }
}

?>
