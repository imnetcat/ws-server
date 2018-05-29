"use strict";

const express = require("express");
const http = require("http");
const WebSocket = require("ws");
const path = require("path");
const app = express();
const PORT = process.env.PORT;
const INDEX = path.join(__dirname, "index.html");

//initialize a simple http server
const server = express()
  .use((req, res) => res.sendFile(INDEX) )
  .listen(PORT, () => console.log('Listening on ' + PORT + ' in ' + INDEX));
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
