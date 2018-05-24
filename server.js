"use strict";
var app = require('express')();
var http = require('http').Server(app).listen(80);
var io = require('sockt.io')(http);
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
