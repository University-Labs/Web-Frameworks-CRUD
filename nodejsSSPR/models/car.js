const { Sequelize, DataTypes, Model } = require('sequelize');
const sequelize = require("../config/db");

var BaseAvto = require("./baseavto");
var Superstructure = require("./superstructure");
var AvtoCategory = require("./avtocategory");


//Model Car
//PK_Car: primary key
//yearissue: varchar
//price: decimal
//imagepath: varchar
//description: text
//
//PK_BaseAvto: foreign key to BaseEvto
//PK_Superstructure: foreign key to Superstructure
//PK_Category: foreign key to AvtoCategory
class Car extends Model{}


Car.init({
	PK_Car: {
		type: DataTypes.INTEGER,
		primaryKey: true,
		autoIncrement: true,
	},
	yearissue: {
		type: DataTypes.STRING
	},
	price: {
		type: DataTypes.DECIMAL(15, 2),
		allowNull: false
	},
	imagepath: {
		type: DataTypes.STRING
	},
	description: {
		type: DataTypes.TEXT,
	},
	PK_BaseAvto: {
		type: DataTypes.INTEGER,
		allowNull: false
	},
	PK_Superstructure: {
		type: DataTypes.INTEGER,
		allowNull: false,
	},
	PK_Category: {
		type: DataTypes.INTEGER,
	}
},{
	sequelize,
	modelName:'Car',
	tableName: "car",
});


BaseAvto.hasMany(Car, {
	foreignKey: "PK_BaseAvto"
});
Car.belongsTo(BaseAvto,
{
	foreignKey: "PK_BaseAvto"
});

Superstructure.hasMany(Car, {
	foreignKey: "PK_Superstructure"
});
Car.belongsTo(Superstructure,
{
	foreignKey: "PK_Superstructure"
});

AvtoCategory.hasMany(Car, {
	foreignKey: "PK_Category"
});
Car.belongsTo(AvtoCategory,
{
	foreignKey: "PK_Category"
});

module.exports = Car;