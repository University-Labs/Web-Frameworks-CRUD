const { Sequelize, DataTypes, Model } = require('sequelize');
const sequelize = require("../config/db");


//Model AvtoCategory:
//PK_Category: primary key
//nameCategory: varchar
class AvtoCategory extends Model{}

AvtoCategory.init({
	PK_Category: {
		type: DataTypes.INTEGER,
		primaryKey: true,
		autoIncrement: true,
	},
	nameCategory: {
		type: DataTypes.STRING,
	}
}, {
	sequelize,
	modelName: 'AvtoCategory',
	tableName: "avtocategory"
})

module.exports = AvtoCategory