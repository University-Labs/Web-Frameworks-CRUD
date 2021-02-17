var Car = require('../models/car'),
    Superstructure = require('../models/superstructure'),
    AvtoCategory = require('../models/avtocategory'),
    BaseAvto = require('../models/baseavto'),
    AvtoFirm = require('../models/avtofirm');

var express = require('express'),
    router = express.Router(),
    path = require('path'),
    ejs = require("ejs");

//главная страница
router.get('/', function(req, res, next) {
    res.render("index", {title:"Главная"});
});

router.get('/index', function(req, res, next) {
    res.render("index", {title:"Главная"});

});


//каталог
router.get('/catalog', function(req, res) {
    Car.findAll({
        include: [
            {model: Superstructure},
            {model: AvtoCategory},
            {model: BaseAvto,
                include:[AvtoFirm]}]
    }).then(data =>
    {
        res.render("catalog", {title:"Каталог", cars: data});
    }).
    catch(err => console.log(err));
});


//админ-каталог
router.get('/pageadmin', function(req, res) {
    Car.findAll({
        include: [
            {model: Superstructure},
            {model: AvtoCategory},
            {model: BaseAvto,
                include:[AvtoFirm]}]
    }).then(data =>
    {
        res.render("pageadmin", {title:"Admin-Каталог", cars: data});
    }).
    catch(err => console.log(err));

});


router.use(function(req, res, next) {
    res.status(404).send('<h1>Error 404<br> Wrong path. Page does not exist!</h1>');
});

module.exports = router;
