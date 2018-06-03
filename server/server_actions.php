<?

require_once "server_functions.php";

switch ($_POST['action']){
      case 'create':
      $addr = $_POST['addr'];
      $port = $_POST['port'];
      $create_log = create($addr, $port);
      if($create_log == "Error"){
        echo "Error: " . socket_strerror(socket_last_error()) . "<br>";
      }else{
        echo $create_log;
      break;
      case 'bind':
      break;
      case 'listen':
      break;
};

?>
