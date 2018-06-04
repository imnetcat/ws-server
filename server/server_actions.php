<?

require_once "server_functions.php";

switch ($_POST['action']){
  case 'create':
    if(!$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)){
      echo "Error: " . socket_strerror(socket_last_error());
    } else {
      echo "Success";
      $_SERVER['socket'] = $socket;
    }
  break;
  case 'bind':
    echo bind($_SERVER['socket'], $_POST['address'], $_POST['port']);
  break;
  case 'listen':
    echo listen($_SERVER['socket']);
  break;
  case 'connect':
    echo connect($_SERVER['socket']);
  break; 
};

?>
