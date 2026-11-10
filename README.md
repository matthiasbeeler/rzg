# RZG – Roadtrip Poster App

> **One of my first coding projects**, built for a school presentation in 2021.
> It's published here for reference. The code is rough in places, and I've left
> it as it was.

RZG is a small web app that goes with a school poster about a planned
road trip across the USA: **New York → Los Angeles**, roughly following
Route 66. The poster links to the app, and the app shows the details of each
stop on the route.

The app's content is in German, because it was made for a Swiss school.

## What it does

- **Home page:** a map of the USA (`map.jpg`) with a clickable marker for each
  of the 18 stops, from New York City through Chicago, St. Louis, Tulsa,
  Albuquerque, Sedona and Las Vegas to Los Angeles.
- **Stop page (`/infos?sub=<id>`):** shows the details for one stop: route
  segment image, distance and driving time, state, year the city was founded,
  planned activities, length of stay, hotel, and the budget for hotel and
  excursions. The data comes from a MySQL table.
- **About page (`/uber`):** trip statistics (kilometres, hours in the car,
  states visited) and a full budget table with a total.
- **Installable (PWA):** a web app manifest and a service worker generated with
  [PWABuilder](https://www.pwabuilder.com/), so the page can be added to a
  phone's home screen and shows `offline.html` when there's no connection.

## Tech stack

| Part | Used |
|---|---|
| Server | Node.js, [Express](https://expressjs.com/) |
| Templates | [EJS](https://ejs.co/) (`ejs/`) |
| Database | MySQL via the [`mysql`](https://www.npmjs.com/package/mysql) package |
| Config | [`dotenv`](https://www.npmjs.com/package/dotenv) |
| PWA | Service worker and manifest from PWABuilder |
| Frontend | Plain HTML and CSS, no framework |

## Project structure

```
index.js        Express app: routes /, /daten, /uber, /infos
db/mysql.js     MySQL connection pool, configured from environment variables
ejs/            Page templates (home, infos, uber)
routen/         Route images per stop
img/            Photos and map markers
manifest/       PWA manifest and icons
pwabuilder-*.js Service worker and its registration
```

## Running it locally

You need Node.js and a MySQL database.

```bash
npm install
```

Create a `.env` file in the project root. **Never commit it**; it is in
`.gitignore`.

```
host=localhost
user=your_db_user
password=your_db_password
db=your_db_name
portt=3306
```

The port variable really is spelled `portt`; that's how `db/mysql.js` reads it.

Then start the server:

```bash
npm start
```

It listens on `http://localhost:5000`, or on `PORT` if you set that variable.

### Database

The app reads from a table called `orte` (German for "places"). The SQL dump
is not included in this repository, so the schema below is reconstructed from
what the code reads, and the column types are guesses:

`id`, `was` (stop name), `von` (previous stop), `zeit` (driving time), `dist`
(km), `staat` (state), `gruend` (founding year), `auenthalt` (length of stay),
`dat` (arrival date), `was_machen` (activities), `ausflug_geld`, `hotel_geld`,
`hotel`

Stop IDs go up in steps of 10 from 31, and each ends in `1`. The map buttons
in `ejs/home.ejs` use those IDs.

## Known rough edges

This was a learning project, so some things are not great. They are left here
as a record of where I started:

- `db.php` and part of `ejs/infos.ejs` are leftovers from an early PHP version
  of the app. The Node app does not use them.
- `node_modules/` was committed in the early history.
- There are no tests, and the stop page does no error handling if an ID is
  missing from the database.
- The `/daten` route returns the whole table as JSON with no limit.

## Credits

- PWA service worker and manifest generated with [PWABuilder](https://www.pwabuilder.com/).
- Everything else was written by me for school.
