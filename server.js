"use strict";
const path = require("path");
const express = require("express");
const http = require("http");
const WebSocket = require("ws");
const app = express();

const PORT = process.env.PORT || 3000;
const HOST = 'ws-server-top.herokuapp.com';
//initialize a simple http server
const server = http.createServer(app);
//initialize the WebSocket server instance
const wss = new WebSocket.Server({ server });
wss.on('connection', (ws) => {
    //connection is up, let's add a simple simple event
    ws.on('message', (message) => {
        //log the received message and send it back to the client
        console.log('received: %s', message);
        ws.send('Echo -> ' + message);
    });
    //send immediatly a feedback to the incoming connection
    ws.send('Hi there, I am a WebSocket server');
});
//start our server
server.listen(PORT, HOST, () => {
    console.log('Server opened on ' + server.address() +' :3');
});
