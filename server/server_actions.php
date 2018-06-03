<?

error_reporting(E_ALL); //Выводим все ошибки и предупреждения
set_time_limit(0);		//Время выполнения скрипта не ограничено
ob_implicit_flush();	//Включаем вывод без буферизации

inlude_once "server_functions.php";

switch ($_POST['action']){
      case 'create':
      $addr = $_POST['addr'];
      $port = $_POST['port'];
      $sock = create($addr, $port);
      if($sock == "Error"){
        echo "Error: " . socket_strerror(socket_last_error()) . "<br>";
      }else{
        echo "Ok <br>";
      break;
    case '':
      break;
};

?>
