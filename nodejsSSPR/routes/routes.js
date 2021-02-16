var express = require('express'),
    router = express.Router(),
    path = require('path'),
    mysql = require('mysql2'),
    ejs = require("ejs");


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


//главная страница
router.get('/', function(req, res, next) {
    res.render("index", {title:"Главная"});
});

router.get('/index', function(req, res, next) {
    res.render("index", {title:"Главная"});
});


//каталог
router.get('/catalog', function(req, res) {
    dateBase.query("SELECT * FROM car",
        function(err, cars){
            if(err) throw err;
            else
            {
                dateBase.query("SELECT * from superstructure",
                    function (err, superstructure){
                        if(err) throw err;
                        else
                        {
                            dateBase.query("SELECT * from baseavto",
                                function (err, baseavto){
                                    if(err) throw err;
                                    else
                                    {
                                        dateBase.query("SELECT * from avtofirm",
                                            function(err, avtofirm){
                                                if(err) throw err;
                                                else
                                                {
                                                    res.render("catalog", {title:"Каталог",
                                                        cars: cars,
                                                        superstructure: superstructure,
                                                        baseavto: baseavto,
                                                        avtofirm: avtofirm,
                                                    });
                                                }
                                            });
                                    }
                                });

                        }
                    });
            }
    });
});


//админ-каталог
router.get('/pageadmin', function(req, res) {
    dateBase.query("SELECT * FROM car",
        function(err, results){
            if(err) throw err;
            else
            {
                res.render("pageadmin", {title:"Admin-Каталог", cars: results});
            }
    });
});

router.get('/pageadmin', function(req, res){
    res.sendFile(path.join(__dirname, "../views/pageadmin.html"));
});

router.use(function(req, res, next) {
    res.status(404).send('<h1>Error 404<br> Wrong path. Page does not exist!</h1>');
});

module.exports = router;
