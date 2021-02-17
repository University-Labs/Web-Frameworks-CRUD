const { Sequelize, DataTypes, Model } = require('sequelize');
const sequelize = require("../config/db");


//Model AvtoFirm:
//PK_AvtoFirm: primary key
//firmName: varchar
class AvtoFirm extends Model{}

AvtoFirm.init({
	PK_AvtoFirm: {
		type: DataTypes.INTEGER,
		primaryKey: true,
		autoIncrement: true, // Automatically gets converted to SERIAL for postgres
	},
	firmName: {
		type: DataTypes.STRING,
		allowNull: false
	}
}, {
	sequelize,
	modelName: "AvtoFirm",
	tableName: "avtofirm"
});


module.exports = AvtoFirm