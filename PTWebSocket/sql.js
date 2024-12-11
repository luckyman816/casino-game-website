var mysql = require('mysql2/promise');
var con = mysql.createConnection({
    host: "localhost",
    user: "api_01",
    password: "gtQuoqv8lrtGNLzb",
    database: "api_gold_03"
});
con.connect(function (err) {
    if (err) throw err;
    console.log("Connected!");
});  
