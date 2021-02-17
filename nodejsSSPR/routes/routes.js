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

//просмотр отдельного продукта
router.get('/productinfo_:id', function(req, res) {
    Car.findOne({
        include: [
            {model: Superstructure},
            {model: AvtoCategory},
            {model: BaseAvto,
                include:[AvtoFirm]
            }],
        where: {
            PK_Car: req.params.id
        }
    }).then(data =>
    {
        res.render("productinfo", {title:"Подробности продукта", thisCar: data});
    }).
    catch(err => console.log(err));
});

//удаление
router.post('/delete_:id', async function(req, res) {
    await Car.destroy({
        where: {
            PK_Car : req.params.id
        }
    });
    res.redirect("/pageadmin");
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
