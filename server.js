"use strict";
const path = require("path");
const express = require("express");
const http = require("http");
const net = require("net");
const app = express();

const port = process.env.PORT || 3000;
const host = 'https://ws-server-top.herokuapp.com'; //process.env.HOST || '0.0.0.0';
concole.log('Server  open on ' + host + ':' + port);

var socket = new net.Socket();
socket.connect(port, host, () => {
  concole.log('Server opened!');
}
               


