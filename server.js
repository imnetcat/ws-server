"use strict";
var Hapi = require('hapi');

var server = new Hapi.Server(~~process.env.PORT || 3000, '0.0.0.0');

server.start(function () {

    console.log('Server started at [' + server.info.uri + ']');
});
