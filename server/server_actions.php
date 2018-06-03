<?

require_once "server_functions.php";

switch ($_POST['action']){
      case 'create':
      $addr = $_POST['addr'];
      $port = $_POST['port'];
      echo create($addr, $port);
      break;
      case 'bind':
      break;
      case 'listen':
      break;
      
};

?>
