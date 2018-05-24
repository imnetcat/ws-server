'use strict';

const net = require('net');
const port = process.env.PORT || 3000;

const server = net.createServer((connection) => {
  console.log('Client connected');
  connection.on('end', () => {
    console.log('Client disconnected');
  });
  connection.write('Hello\r\n');
  connection.pipe(connection);
});

server.listen(port, '/echo.sock', () => {
  console.log('Server opened on ', server.address().address + ':' + server.address().port );
});
