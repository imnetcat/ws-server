<?

error_reporting(E_ALL); //Выводим все ошибки и предупреждения
set_time_limit(0);		//Время выполнения скрипта не ограничено
ob_implicit_flush();	//Включаем вывод без буферизации

require_once "server_functions.php";

switch ($_POST['action']){
      case 'create':
      $addr = $_POST['addr'];
      $port = $_POST['port'];
      $create_log = "Error";
      if($create_log == "Error"){
        echo "Error: " . socket_strerror(socket_last_error()) . "<br>";
      }else{
        echo $create_log;
      break;
    case '':
      break;
};

?>
