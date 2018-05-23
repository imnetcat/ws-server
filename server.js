'use strict';

const net = require('net');
const port = process.env.PORT || 3000;
const path = require('path');
const host = path.join(__dirname, 'index.html');

const server = net.createServer((connection) => {
  // 'connection' listener
  console.log('Client connected');
  connection.on('End', () => {
    console.log('Client disconnected');
  });
  connection.write('Hello\r\n');
  connection.pipe(connection);
});

server.listen(port, host, () => {
  console.log('Server opened on ', server.address().address + ':' + server.address().port );
});
