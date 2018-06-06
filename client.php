<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Client</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<br>
<br>
<br>
<button id="to_server">Go to server</button>
<br>
Server address: <? echo $server_address = $_SERVER['SERVER_ADDR']; ?>
Our address: <? echo $our_address = $_SERVER['REMOTE_ADDR']; ?>
Port: <? echo $port = getservbyname('socks', 'tcp'); ?>
Message:
<input id="sock-msg" type="text">
<script async>
$( () => {
  $('#startbtn').click( () => {
    $('#logs').append($("<p>socket_create ...</p>"));
    $.ajax({
      type: "POST",
      url: "client_actions.php",
      data: {
        action: 'create'
      },
      success: function(data){
        $('#logs').append($("<p>" + data + "</p>"));
        $('#logs').append($("<p>socket_bind...</p>"));
        if(data != "OK"){
        }else{
          $.ajax({
            type: "POST",
            url: "server_actions.php",
            data: {
              action: 'bind',
              address: '<? echo $our_address ?>',
              port: <? echo $port ?>
            },
            success: function(data){
              $('#logs').append($("<p>" + data + "</p>"));
              $('#logs').append($("<p>Listening socket...</p>"));
              if(data != "OK"){
              }else{
                $.ajax({
                  type: "POST",
                  url: "server_actions.php",
                  data: {
                    action: 'connect',
                    address: '<? echo $server_address ?>',
                    port: <? echo $port ?>
                  },
                  success: function(data){
                    $('#logs').append($("<p>Connected!</p>"));
                  }
                });
              }
            }
          });
        }
      }
    });
  });
});
 </script>
<input id="sock-send-butt" type="button" value="send">
<br />
<br />
<input id="startbtn" type="button" value="startbtn"><input id="sock-disc-butt" type="button" value="disconnect">
<br />
<br />

Полученные сообщения от веб-сокета: 
<div id="logs" style="border: 1px solid"> <? echo $_SERVER['SERVER_ADDR'] ?> </div>

</body>
</html>
