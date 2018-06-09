'use strict';

const express = require('express');
const SocketServer = require('ws').Server;
const path = require('path');

const PORT = process.env.PORT || 3000;
const INDEX = path.join(__dirname, 'index.html');

const server = express()
  .use((req, res) => res.sendFile(INDEX) )
  .listen(PORT, () => console.log('[S]  Listening on ' + PORT ));

const wss = new SocketServer({ server });

wss.on('connection', (sock) => {
  var annonimusId = '[C]-' + (wss.clients.size + 1);
  console.log('[S] ---> Client ' + annonimusId +' connected');
  sock.on('message', (sock) => {
    var sock = JSON.parse(sock);
    if(sock.towho == "server"){
    }else{
      console.log( user + ' ---> ' + sock.towho + ' |:| ' + sock.data );
    }
  });
  
  sock.on('close', (sock) => {
    event = JSON.parse(sock);
    console.log('[S] ' + annonimusId+"@"+sock.who + ' disconnected');
  });
});

setInterval(() => {
  wss.clients.forEach((client) => {
    client.send(wss.clients.toString());
  });
}, 1000);
