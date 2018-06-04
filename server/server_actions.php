<?

require_once "server_functions.php";

switch ($_POST['action']){
  case 'create':
    if(!$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)){
      echo "Error: " . socket_strerror(socket_last_error());
    } else {
      echo "Success";
    }
  break;
  case 'bind':
    echo bind($socket, $_POST['address'], $_POST['port']);
  break;
  case 'listen':
    echo listen($socket);
  break;
  case 'connect':
    echo connect($socket);
  break; 
};

?>
