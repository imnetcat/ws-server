<?
$request = "GET /chat HTTP/1.1";
$request .= "Host: logs.net-cat-server.online/simple.php";
$request .= "Upgrade: websocket";
$request .= "Connection: Upgrade";
$request .= "User-Agent: Mozilla/5.0";
$request .= "Sec-WebSocket-Key: dGhlIHNhbXBsZSBub25jZQ==";
$request .= "Sec-WebSocket-Protocol: chat, superchat";
$request .= "Sec-WebSocket-Version: 13";
header($request);
?>
