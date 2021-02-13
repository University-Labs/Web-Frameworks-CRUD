var express = require("express"),
app = express(),
path = require("path"),
mysql = require('mysql2');


const pool = mysql.createPool({
    host: "localhost",
    user: "root",
    password: "",
    database: "speccars",
  });


app.listen(3000,function () {
    console.log("Work on port 3000");
});

