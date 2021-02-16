const { EPIPE } = require("constants");

var express = require("express"),
app = express(),
path = require("path"),
mysql = require('mysql2');
routes = require('./routes/routes')

app.use(express.static(path.join(__dirname, "public")));

app.set("view engine", "ejs");
app.set("views", path.join(__dirname, "views"));

//подключение маршрутизации
app.use("/", routes);

app.listen(3000,function () {
    console.log("Work on port 3000");
});

