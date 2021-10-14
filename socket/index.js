
var socket = require( 'socket.io' );
var express = require('express');
const fs = require('fs');
var app = express();

var httpsOptions = {
    key: fs.readFileSync('/www/wwwroot/matkaplay7.com/socket/key.pem'),
    cert: fs.readFileSync('/www/wwwroot/matkaplay7.com/socket/certificate.pem')
};
var server = require('https').createServer(httpsOptions,app);
//var  io = new socket(3000);


options={log:false, origins:'*:*'}
var io = require('socket.io')(server,options);

var port = process.env.PORT || 3007;

  console.log(123)
app.get('/', function(req, res){
    //console.log(123)
   res.json({message : "Successful"});
});

io.on('connection', function (socket) {
socket.on( 'new_message', function( data ) {
io.sockets.emit( 'new_message', {
message: data.message,
receiver_id: data.receiver_id,
sender_id: data.sender_id
});
});
});
server.listen(port, function () {
console.log('Server listening at port %d', port);
});

