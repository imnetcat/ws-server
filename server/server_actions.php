<?

require_once "server_functions.php";

switch ($_POST['action']){
  case 'bind':
    echo bind($_POST['socket'], $_POST['address'], $_POST['port']);
  break;
  case 'listen':
    echo listen($_POST['socket']);
  break;
  case 'connect':
    echo connect($_POST['socket']);
  break; 
};

?>
