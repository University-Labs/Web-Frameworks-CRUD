const { Sequelize } = require('sequelize');
module.exports = sequelize = new Sequelize('speccars', 'root', '', {
	dialect: 'mysql',
	host: "localhost",
    logging: false,
    define: {
    	timestamps: false
    }
});
