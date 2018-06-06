<?
require_once "client_functions.php";
switch ($_POST['action']){
  case 'create':
    if(!$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)){
      echo "Error";
    } else {
      socket_close($socket);
      echo "OK";
    }
  break;
  case 'connect':
    if(!$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)){
      echo "Error";
    } else {
      echo connect($socket, $_POST['address'], $_POST['port']);
      socket_close($socket);
    }
  break;
};
?>
