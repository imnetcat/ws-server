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

wss.on('connection', (event) => {
  annonimusId = Math.random() + Math.random() + Math.random() + Math.random() + Math.random() + Math.random() + Math.random() + Math.random() + Math.random() + Math.random();
  console.log('[+]SERVER[+] ---> Client ' + annonimusId +' connected');
  ws.on('message', (event) => {
    if(event.towho == "server"){
      console.log(annonimusId + ' ---> [+]SERVER[+] \n\r I am ' + event.who);
      annonimusId = null;
      user = event.who;
    }else{
      console.log( user + ' ---> ' + event.towho + ' \n\r ' + event.data )
  });
  
  ws.on('close', (event) => {
    console.log('[+]SERVER[+] ---> Client ' + annonimusId+"@"+event.who + ' disconnected');
  });
});

setInterval(() => {
  wss.clients.forEach((client) => {
    client.send(wss.clients.toString());
  });
}, 1000);
