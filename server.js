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
  sock = JSON.parse(sock);
  var annonimusId = Math.random() + Math.random() + Math.random() + Math.random() + Math.random() + Math.random() + Math.random() + Math.random() + Math.random() + Math.random();
  console.log('[+]SERVER[+] ---> Client ' + annonimusId +' connected');
  sock.on('message', (sock) => {
    sock = JSON.parse(sock);
    if(sock.towho == "server"){
      console.log(annonimusId + ' ---> [+]SERVER[+] \n\r I am ' + sock.who);
      annonimusId = null;
      var user = sock.who;
    }else{
      console.log( user + ' ---> ' + sock.towho + ' \n\r ' + sock.data );
    }
  });
  
  sock.on('close', (sock) => {
    sock = JSON.parse(sock);
    console.log('[+]SERVER[+] ---> Client ' + annonimusId+"@"+sock.who + ' disconnected');
  });
});

setInterval(() => {
  wss.clients.forEach((client) => {
    client.send(wss.clients.toString());
  });
}, 1000);
