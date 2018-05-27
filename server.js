"use strict";

const express = require("express");
const http = require("http");
const WebSocket = require("ws");
const app = express();
const PORT = process.env.PORT;

//initialize a simple http server
const server = express()
  .use((req, res) => res.sendFile(INDEX) )
  .listen(PORT, () => console.log(`Listening on ${ PORT }`));
//initialize the WebSocket server instance
const wss = new WebSocket.Server({ server });
wss.on('connection', (ws) => {
  console.log('Client connected');
  setInterval(() => {
    wss.clients.forEach((client) => {
      client.send(new Date().toTimeString());
    });
  }, 1000);
  ws.on('close', () => console.log('Client disconnected'));
});
