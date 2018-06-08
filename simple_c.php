<?
$request = "GET /simple.php HTTP/1.1";
$request .= "Host: logs.net-cat-server.online";
$request .= "Upgrade: websocket";
$request .= "Connection: Upgrade";
$request .= "User-Agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.170 Safari/537.36 OPR/53.0.2907.88 (Edition Campaign 33)";
$request .= "Sec-WebSocket-Key: dGhlIHNhbXBsZSBub25jZQ==";
$request .= "Sec-WebSocket-Protocol: chat, superchat";
$request .= "Sec-WebSocket-Version: 13";
header($request);
?>
