<?

require_once "server_functions.php";

switch ($_POST['action']){
  case 'create':
    if(!$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)){
      echo "Error";
    } else {
      socket_close($socket);
      echo "OK";
    }
  break;
  case 'bind':
    if(!$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)){
      echo "Error";
    } else {
      echo bind($socket, $_POST['address'], $_POST['port']);
      socket_close($socket);
    }
  break;
  case 'listen':
    if(!$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)){
      echo "Error";
    } else {
      bind($socket, $_POST['address'], $_POST['port']);
      echo listen($socket);
      socket_close($socket);
    }
  break;
  case 'connect':
    if(!$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)){
      echo "Error";
    } else {
      bind($socket, $_POST['address'], $_POST['port']);
      listen($socket);
      echo connect($socket);
      socket_close($socket);
    }
  break; 
};

?>
