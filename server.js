'use strict';

const net = require('net');
const port = process.env.PORT || 3000;
const host = location.origin.replace(/^http/, 'ws');
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

server.listen(port, host, () => {
  console.log('Server opened on ', server.address().address + ':' + server.address().port );
});
