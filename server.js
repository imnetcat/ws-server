'use strict';

const express = require('express');
const SocketServer = require('ws').Server;
const path = require('path');

const PORT = process.env.PORT || 3000;
const INDEX = path.join(__dirname, 'index.html');

const server = express()
  .use((req, res) => res.sendFile(INDEX) )
  .listen(PORT, () => console.log('[+]SERVER[+] ---> Listening on ' + PORT ));

const wss = new SocketServer({ server });

wss.on('connection', (sock) => {
  var annonimusId = '[C]-' + Math.floor(Math.random() * (99999 - 10000) + 10000);
  console.log('[+]SERVER[+] ---> Client ' + annonimusId +' connected');
  sock.on('message', (sock) => {
    console.log(sock);
    var sock = JSON.parse(sock);
    console.log(sock);
    console.log(sock.towho);
    if(sock.towho == "server"){
      console.log(annonimusId + ' ---> [S]  |:|  I am ' + sock.who);
      annonimusId = null;
      var user = '[C]-' + sock.who;
    }else{
      console.log( user + ' ---> ' + sock.towho + ' |:| ' + sock.data );
    }
  });
  
  sock.on('close', (sock) => {
    event = JSON.parse(sock);
    console.log('[S] ---> ' + annonimusId+"@"+sock.who + ' disconnected');
  });
});

setInterval(() => {
  wss.clients.forEach((client) => {
    client.send(wss.clients.toString());
  });
}, 1000);
