var express = require('express'),
router = express.Router(),
path = require('path');


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
    res.status(404).send('<h1>Sorry cant find that!</h1>');
});

module.exports = router;
