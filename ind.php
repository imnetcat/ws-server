<?php
echo  $_SERVER['SERVER_ADDR'];
$fp = fsockopen($_SERVER['SERVER_ADDR'], 80, $errno, $errstr, 30);
if (!$fp) {
      echo "$errstr ($errno)
";
} else {
      $query = "GET / HTTP/1.1 ";
      $query .= "Upgrade: WebSocket ";
      $query .= "Connection: Upgrade ";
      $query .= "Host: logs.net-cat-server.online ";
      $query .= "Origin: http://site.com ";
      fwrite($fp, $query);
      $page = '';
      while (!feof($fp)) {
         $page .= fgets($fp, 4096);
      }
   fclose($fp);
   if (!empty($page)) echo '<pre>'.$page.'</pre>';
}
?>
