var Car = require('../models/car'),
    Superstructure = require('../models/superstructure'),
    AvtoCategory = require('../models/avtocategory'),
    BaseAvto = require('../models/baseavto'),
    AvtoFirm = require('../models/avtofirm');

var express = require('express'),
    router = express.Router(),
    path = require('path'),
    ejs = require("ejs"),
    multer  = require('multer');

//устснавливаем хранилище для изображений
var storage = multer.diskStorage({
  destination: function (req, file, cb) {
    cb(null, './public/products/');
  },
  filename: function (req, file, cb) {
    cb(null, Date.now() + file.originalname);
  }
});

//настраиваем загрузчик
var upload = multer({ storage: storage });


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
    })
    .catch(err => console.log(err));
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

//добавление нового продукта
router.get('/createcar', async function (req, res) {
    var bases = await BaseAvto.findAll({
            include: [AvtoFirm]
        });
    var categories = await AvtoCategory.findAll();
    var superstructures = await Superstructure.findAll();
    res.render('productedit', {title: "Новый ааавтомобиль", curObj: {}, bases : bases, categories: categories, superstructures: superstructures});
});


router.post('/createcar', upload.single('wallpaper'), async function(req, res) {
    if(req.file)
        var pathInSystem = req.file.path.replace(/^public/, '');
    else
        var pathInSystem = "";
    var obj = await Car.create({
        PK_BaseAvto : req.body.baseavto,
        PK_Superstructure : req.body.superstructure,
        PK_Category : req.body.category,
        yearissue : req.body.yearissue,
        price: req.body.price,
        imagepath : pathInSystem,
        description : req.body.description
    }).then(function (Cars) {
        if(!Cars)
        {
            res.status(400).send("ERRORs");
        }
    });
    res.redirect('/pageadmin');
});

//обновление существующего продукта
router.get('/updatecar_:id', async function(req,res) {
    var bases = await BaseAvto.findAll({
            include: [AvtoFirm]
        });
    var categories = await AvtoCategory.findAll();
    var superstructures = await Superstructure.findAll();

    await Car.findOne({
            where: {
                PK_Car: req.params.id
            }
        })
    .then(data => {
        res.render("productedit", {title: "Обновление автомобиля",
                                    curObj : data,
                                    bases : bases,
                                    categories: categories,
                                    superstructures: superstructures
                                    })
    })
    .catch(err => console.log(err));
});

router.post('/updatecar:id', upload.single('wallpaper'), async function(req,res) {
    if(req.body.pk_car)
    {
        if(req.file)
            var pathInSystem = req.file.path.replace(/^public/, '');
        else
            var pathInSystem = "";
        await Car.update({
            yearissue: req.body.yearissue,
            price: req.body.price,
            imagepath: pathInSystem,
            description: req.body.description,
            PK_BaseAvto: req.body.baseavto,
            PK_Superstructure: req.body.superstructure,
            PK_Category: req.body.category
        },{
            where: {PK_Car : req.body.pk_car}
        });
    }
    res.redirect('/pageadmin');
})


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
