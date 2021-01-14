const express = require('express')
const path = require('path')
const PORT = process.env.PORT || 5000
const app = express()
require('dotenv').config()
const db = require('./db/mysql').db;
const up = "1.1.2.2";

app.use(express.static('./'))
app.set('views', path.join(__dirname))
app.set('view engine', 'ejs')

app.get('/', function(req, res) {
    res.render('ejs/home')

    	
 })
 app.get('/daten', function(req, res) {
  db.getConnection(function(err, connection) {
    if (err) {
        connection.release();
          console.log(' Error getting db connection: ' + err);
          throw err;
      }

  connection.query('SELECT * FROM orte', function(error, results, fields) {
    res.send(results);


res.end();
});
  })
 })
 app.get('/uber', function(req, res) {
  res.render('ejs/uber')
})
 app.get('/infos', function(req, res) {
      const id = req.query.sub
      console.log("id: ", id);

      db.getConnection(function(err, connection) {
        if (err) {
            connection.release();
              console.log(' Error getting db connection: ' + err);
              throw err;
          }
    connection.query('SELECT * FROM orte WHERE id = ?', [id], function(error, results, fields) {
            const wo = results[0].was;
            const von = results[0].von;
            const reise_zeit = results[0].zeit;
            const dist = results[0].dist;
            const staat = results[0].staat;
            const gruend = results[0].gruend;
            const aufenthalt = results[0].auenthalt;
            const anreise_datum = results[0].dat;
            const beschaeft = results[0].was_machen;
            const geld = results[0].geld;
            const hotel = results[0].hotel;
            console.log("geld: ", geld);


            res.render('ejs/infos', {von: von, wo: wo, zeit: reise_zeit, dist: dist, dat: anreise_datum, staat: staat, gruend: gruend, was_mach: beschaeft, auf_zeit: aufenthalt, geld: geld, hotel: hotel})
        res.end();
    });	
    });
	
});


  app.listen(PORT, () => console.log(`Listening on ${ PORT }`))