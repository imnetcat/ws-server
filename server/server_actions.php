<?

require_once "server_functions.php";

switch ($_POST['action']){
  case 'create':
    $socket = create()
    if($socket == "Error"){
      echo "Error: ext-sockets is unvalible";
    }else{
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
