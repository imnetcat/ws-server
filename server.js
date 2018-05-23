'use strict';

const net = require('net');
const port = process.env.PORT || 3000;

const server = net.createServer((connection) => {
  // 'connection' listener
  console.log('Client connected');
  connection.on('End', () => {
    console.log('Client disconnected');
  });
  connection.write('Hello\r\n');
  connection.pipe(connection);
});

server.on('Error', (err) => {
  throw err;
});

server.listen(port, () => {
  console.log('Server opened on ', server.address());
});
