const { EPIPE } = require("constants");

var express = require("express"),
app = express(),
path = require("path"),
mysql = require('mysql');
routes = require('./routes/routes')


//подключение маршрутизации
app.use("/", routes);

app.listen(3000,function () {
    console.log("Work on port 3000");
});

