const { Sequelize, DataTypes, Model } = require('sequelize');
const sequelize = require("../config/db");


//Model Superstructure:
//PK_Superstructure: primary key
//superstructureName: varchar
class Superstructure extends Model{}

Superstructure.init({
	PK_Superstructure: {
		type: DataTypes.INTEGER,
		primaryKey: true,
		autoIncrement: true,
	},
	superstructureName: {
		type: DataTypes.STRING,
		allowNull: false
	}
}, {
	sequelize,
	modelName: "Superstructure",
	tableName: "superstructure"
});


module.exports = Superstructure