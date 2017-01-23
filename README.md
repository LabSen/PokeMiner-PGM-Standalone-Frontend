# PokeMiner-PGM-Standalone-Frontend
PHP Standalone frontend for Pokeminer using the Pokemongo-Map Frontend

## First Things First

This is not a "Ready for Public" project.  The code needs a little more optimization and the structure needs a little work.

This is designed for any other Devs familiar with the Code to get something working.

This is a temporary "Proof of Concept" solution that will continue to be worked on.

There are certain aspects that need modifying and the way the current raw_data.php works could be swapped over to url_rewrite style functions.

Currently Pokemon Rareity is set in the pokedex table in the database along with Pokemon Name, this could be optimized but works at the moment and was done this way so I could change Rareity/Names on the fly without restarting.

## Installation

The PokeMiner included has been updated to add a last_modified to the sightings.  If you do not use this pokeminer you could run into issues.

**Note**: This will only work with MySQL at the moment!

### Setup PokeMiner

1. Copy the contents of PokeMiner to a folder of your choice, for example C:/map or /home/map

2. Install Python 3.5 or later (3.6 is recommended)

3. Copy `config.example.py` to `pokeminer/config.py` and customize it with your accounts, location, database information, and any other relevant settings. The comments in the config example provide some information about the options.

4. `pip3 install -r requirements.txt`
  * Optionally `pip3 install` additional packages listed in optional-requirements
    * *pushbullet.py* is required for pushbullet notifications
    * *python-twitter* is required for twitter notifications
    * *stem* is required for proxy circuit swapping
    * *shapely* is required for landmarks or spawnpoint scan boundaries
    * *selenium* (and [ChromeDriver](https://sites.google.com/a/chromium.org/chromedriver/)) are required for solving CAPTCHAs
    * *uvloop* provides better event loop performance
    * *pycairo* is required for generating IV/move images
    * *mysqlclient* is required for using a MySQL database
    * *psycopg2* is required for using a PostgreSQL database
    * *requests* is required for using webhooks
    * *aiosocks* is required for using SOCKS proxies
    * *cchardet* and *aiodns* provide better performance with aiohttp
    * *numba* provides better performance through JIT compilation
5. Run `python3 scripts/create_db.py` from the command line

6. Using an SQL Broswer/Editor connect to your database and run the /SQL Files/`Database_Type`.sql

7. Run `python3 scan.py` from your PokeMiner directory

**Note**: At this point you should have a working scanner finding pokemon.

8. Copy the contents of `Web Frontend` to your preferred web hosting.

9. Modify `config.php` to include your Google API key, Database Details and Starting Location.

10. Browse to your URL to check things are working