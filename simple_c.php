<!DOCTYPE html>
<html>
<body>
    <div id="root"></div>
    <script>
        var host = 'ws://<? echo $_SERVER['SERVER_ADDR']?>:<? echo getservbyname('socks', 'tcp')?>/simple.php';
        var socket = new WebSocket(host);
        socket.onmessage = function(e) {
            document.getElementById('root').innerHTML = e.data;
        };
    </script>
</body>
</html>
