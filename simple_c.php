<?
$request = "GET /chat HTTP/1.1";
$request .= "Host: logs.net-cat-server.online/simple.php";
$request .= "Upgrade: websocket";
$request .= "Connection: Upgrade";
$request .= "Sec-WebSocket-Key: dGhlIHNhbXBsZSBub25jZQ==";
$request .= "Sec-WebSocket-Protocol: chat, superchat";
$request .= "Sec-WebSocket-Version: 13";
header($request);
?>
