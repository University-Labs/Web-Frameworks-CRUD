var Car = require('../models/car')
var express = require('express'),
    router = express.Router(),
    path = require('path'),
    ejs = require("ejs");

//главная страница
router.get('/', function(req, res, next) {
    res.render("index", {title:"Главная"});
});

router.get('/index', function(req, res, next) {
    Car.findAll().then(data =>
        {
            console.log(data);
            res.render("index", {title:"Главная"});
        }).
    catch(err => console.log(err));
});


//каталог
router.get('/catalog', function(req, res) {
    res.render("catalog", {title:"Каталог"});
});


//админ-каталог
router.get('/pageadmin', function(req, res) {
    res.render("pageadmin", {title:"Admin-Каталог"});
});


router.use(function(req, res, next) {
    res.status(404).send('<h1>Error 404<br> Wrong path. Page does not exist!</h1>');
});

module.exports = router;
