var mysql = require('mysql');
require('dotenv').config()

var db  = mysql.createPool({
    connectionLimit : 9,
    host     : process.env.host,
	user     : process.env.user,
	password : process.env.password,
	database : process.env.db
});

console.log(db);


exports.db = db;
