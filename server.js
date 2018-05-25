"use strict";
var app = require('express')();
var server = require('http').createServer();
var port = process.env.PORT || 3000;

server.listen(port, 'top-ws-server.com', function() {
  console.log('Listening on ' + port);
});

var io = require('socket.io')(server);
console.log('---> Server started!');
app.get('/', (req, res) => {
  res.sendFile(__dirname + '/index.html');
});
io.on('connection', (socket) => {
  console.log('---> A new user connected');
  socket.on('message', (data) => {
    console.log('---> Recieved: ' + data);
    socket.emit('sendresponse', data);
  });
  socket.on('disconnect', () => {
    console.log('---> User is disconnected');
  });
});
