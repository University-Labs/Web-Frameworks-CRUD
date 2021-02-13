var express = require('express'),
router = express.Router(),
path = require('path'),
mysql = require('mysql');


const dateBase = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "speccars"
});

//соединение с бд
dateBase.connect((err) =>{
    if(err) throw err;
    console.log("Db successfully connected");
});


router.get('/', function(req, res) {
    res.sendFile(path.join(__dirname, "../views/index.html"));
});

router.get('/index', function(req, res) {
    res.sendFile(path.join(__dirname, "../views/index.html"));
});


router.get('/catalog', function(req, res) {
    res.sendFile(path.join(__dirname, "../views/catalog.html"));
});

router.get('/pageadmin', function(req, res){
    res.sendFile(path.join(__dirname, "../views/pageadmin.html"));
});

router.use(function(req, res, next) {
    res.status(404).send('<h1>Error 404<br> Wrong path. Page does not exist!</h1>');
});

module.exports = router;
