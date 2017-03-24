var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var Redis = require('ioredis');
var redis = new Redis();
var users = {};

io.sockets.on('connection', function(socket){
    console.log('user connected');
    socket.on('login', function(data){
        socket.username = data;
        users[socket.username] = socket;
        updateUsers();
    });

    socket.on('disconnect', function(data){
        delete users[socket.username];
        updateUsers();
    });

});

redis.subscribe('test-channel', function(err, count) {});

redis.on('message', function(channel, message) {
    console.log('Whisper Recieved: ' + message);
     message = JSON.parse(message);
    users[message.data.data.whisper.to].emit('whisper', message.data.data);
});

http.listen(3000, function(){
    console.log('Listening on Port 3000');
});

function updateUsers(){
    console.log(Object.keys(users));
    io.sockets.emit('users', Object.keys(users));
}
