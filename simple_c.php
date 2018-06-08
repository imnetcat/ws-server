<?php

$fp = fsockopen("master-web.com.ua", 80, $errno, $errstr, 30);
if (!$fp) {
      echo "$errstr ($errno)
";
} else {
      $query = "GET / HTTP/1.1 ";
      $query .= "Host: master-web.com.ua ";
      $query .= "Connection: Close ";
      fwrite($fp, $query);
      $page = '';
      while (!feof($fp)) {
         $page .= fgets($fp, 4096);
      }
   fclose($fp);
   if (!empty($page)) echo '<pre>'.$page.'</pre>';

?>
