require('dotenv').config();
var _key = process.env.NODE_SERVER_KEY;
var _cert = process.env.NODE_SERVER_CERT;

var express = require('express');
const http = require('http');
var bodyParser = require('body-parser');

var app = express();
app.use(bodyParser.urlencoded({
    extended: true
}));
app.use(bodyParser.json());

const options = {
    // key: fs.readFileSync(_key),
    // cert: fs.readFileSync(_cert)
};
var httpServer = http.createServer(options, app);

httpServer.listen(3000, function () {
    console.log('Listening on *:3000');
});

var io = require('socket.io').listen(httpServer);

app.get('/', (req, res) => res.send('Hello World!'));

app.get('/bills-updated', (req, res) => {
    io.emit('billsChange', {status: 'updated'});

    res.json({ status: 'OK' })
});
