const {Sequelize, DataTypes, Model } = require('sequelize');
const sequelize = require("../config/db");

var AvtoFirm = require("./avtofirm")


//Model BaseAvto:
//PK_BaseAvto: primary key
//modelName: varcher
//
//PK_AvtoFirm: foreign key to AvtoFirm
class BaseAvto extends Model{}

BaseAvto.init({
	PK_BaseAvto: {
		type: DataTypes.INTEGER,
		primaryKey: true,
		autoIncrement: true,
	},
	modelName: {
		type: DataTypes.STRING,
		allowNull: false
	},
	PK_AvtoFirm: {
		type: DataTypes.INTEGER,
		allowNull: false
	}
}, {
	sequelize,
	modelName: "BaseAvto",
	tableName: "baseavto"
});


AvtoFirm.hasMany(BaseAvto, {
	sourceKey: "PK_AvtoFirm",
	foreignKey: "PK_AvtoFirm"
})

module.exports = BaseAvto