<?php
$now = new DateTime();

$d = array();
$d["gyms"]          = "";
$d["timestamp"]     = $now->getTimestamp();
$d["lastgyms"]     = true;
$d["lastpokemon"]   = true;
$d["lastpokestops"] = true;
$d["lastslocs"]     = true;

$swLat         = isset($_GET['swLat'])         ? $_GET['swLat']           : 0;
$neLng         = isset($_GET['neLng'])         ? $_GET['neLng']           : 0;
$swLng         = isset($_GET['swLng'])         ? $_GET['swLng']           : 0;
$neLat         = isset($_GET['neLat'])         ? $_GET['neLat']           : 0;
$oSwLat        = isset($_GET['oSwLat'])        ? $_GET['oSwLat']          : 0;
$oSwLng        = isset($_GET['oSwLng'])        ? $_GET['oSwLng']          : 0;
$oNeLat        = isset($_GET['oNeLat'])        ? $_GET['oNeLat']          : 0;
$oNeLng        = isset($_GET['oNeLng'])        ? $_GET['oNeLng']          : 0;
$lastpokestops = isset($_GET['lastgyms'])      ? $_GET['lastgyms']        : false;
$lastgyms      = isset($_GET['lastpokestops']) ? $_GET['lastpokestops']   : false;
$lastslocs     = isset($_GET['lastslocs'])     ? $_GET['lastslocs']       : false;
$lastspawns    = isset($_GET['lastspawns'])    ? $_GET['lastspawns']      : false;
$lastpokemon   = isset($_GET['lastpokemon'])   ? $_GET['lastpokemon']     : true;

$d["oSwLat"]     = $swLat;
$d["oSwLng"]     = $swLng;
$d["oNeLat"]     = $neLat;
$d["oNeLng"]     = $neLng;

if (isset($_GET['gyms']))        $d["lastgyms"]      = ($_GET['gyms']         == "true");
if (isset($_GET['pokestops']))   $d["lastpokestops"] = ($_GET['pokestops']    == "true");
if (isset($_GET['pokemon']))     $d["lastpokemon"]   = ($_GET['pokemon']      == "true");
if (isset($_GET['scanned']))     $d["lastslocs"]     = ($_GET['scanned']      == "true");
if (isset($_GET['spawnpoints'])) $d["lastspawns"]    = !($_GET['spawnpoints'] == "false");

$newarea = false;

if (($oSwLng < $swLng) && ($oSwLat < $swLat) && ($oNeLat > $neLat) && ($oNeLng > $neLng)) {
    $newarea = false;
} elseif (($oSwLat != $swLat) && ($oSwLng != $swLng) && ($oNeLat != $neLat) && ($oNeLng != $neLng)) {
    $newarea = true;
} else {
    $newarea = false;
}

$ids   = array();
$eids  = array();
$reids = array();

if (isset($_GET['pokemon'])) {
    if ($_GET['pokemon'] == "true") {

        if (isset($_GET['ids'])) {
            $ids = explode(",", $_GET['ids']);
            $d["pokemons"] = get_active_by_id($ids, $swLat, $swLng, $neLat, $neLng);
        } elseif ($lastpokemon != 'true') {
            $d["pokemons"] = get_active($swLat, $swLng, $neLat, $neLng);
        } else {
            $timestamp = 0;
            if (isset($_GET['timestamp'])) {
                $timestamp = $_GET['timestamp'];
                $timestamp = $timestamp - 100;
            }

            $d["pokemons"] = get_active($swLat, $swLng, $neLat, $neLng, $timestamp);

            if ($newarea) {
                $d["pokemons"] = get_active($swLat, $swLng, $neLat, $neLng, 0, $oSwLat, $oSwLng, $oNeLat, $oNeLng);
            }
        }

        if (isset($_GET['eids'])) {
            $ids = explode(",", $_GET['eids']);

            foreach($d['pokemons'] as $elementKey => $element) {
                foreach($element as $valueKey => $value) {
                    if($valueKey == 'pokemon_id'){
                        if (in_array($value, $ids)) {
                            //delete this particular object from the $array
                            unset($d['pokemons'][$elementKey]);
                        }
                    }
                }
            }
        }
        if (isset($_GET['reids'])) {
        }

    }
}

$jaysson = json_encode($d);
echo $jaysson;

function get_active($swLat, $swLng, $neLat, $neLng, $tstamp = 0, $oSwLat = 0, $oSwLng = 0, $oNeLat = 0, $oNeLng = 0)
{

    $sql = "";

    if ($swLat == 0) {
        $sql = 'SELECT sightings.last_modified, sightings.expire_timestamp, sightings.encounter_id, sightings.atk_iv, sightings.def_iv, sightings.sta_iv, sightings.move_1, sightings.move_2, sightings.lon, sightings.lat, sightings.pokemon_id, pokedex.identifier, pokedex.rarity, sightings.spawn_id FROM sightings JOIN pokedex ON pokedex.id=sightings.pokemon_id WHERE sightings.expire_timestamp >= unix_timestamp(now())';
        //echo "1 " . $sql;
    } elseif ($tstamp > 0) {
        //If we already know the timestamp from last request only load the new ones!
        $sql = 'SELECT sightings.last_modified, sightings.expire_timestamp, sightings.encounter_id, sightings.atk_iv, sightings.def_iv, sightings.sta_iv, sightings.move_1, sightings.move_2, sightings.lon, sightings.lat, sightings.pokemon_id, pokedex.identifier, pokedex.rarity, sightings.spawn_id  FROM sightings JOIN pokedex ON pokedex.id=sightings.pokemon_id WHERE sightings.last_modified >= ' . $tstamp . ' AND sightings.lat >= ' . $swLat . ' AND sightings.lon >= ' . $swLng . ' AND sightings.lat <= ' . $neLat . ' AND sightings.lon <= ' . $neLng . '';
        //echo "2 " . $sql;
    } elseif ($oSwLat != 0) {
        $sql = 'SELECT sightings.last_modified, sightings.expire_timestamp, sightings.encounter_id, sightings.atk_iv, sightings.def_iv, sightings.sta_iv, sightings.move_1, sightings.move_2, sightings.lon, sightings.lat, sightings.pokemon_id, pokedex.identifier, pokedex.rarity, sightings.spawn_id  FROM sightings JOIN pokedex ON pokedex.id=sightings.pokemon_id WHERE sightings.lat >= ' . $swLat . ' AND sightings.lon >= ' . $swLng . ' AND sightings.lat <= ' . $neLat . ' AND sightings.lon <= ' . $neLng . ' AND sightings.lat >= ' . $oSwLat . ' AND sightings.lon >= ' . $oSwLng . ' AND sightings.lat <= ' . $oNeLat . ' AND sightings.lon <= ' . $oNeLng . ' AND sightings.expire_timestamp >= unix_timestamp(now())';
        //echo "3 " . $sql;
    } else {
        $sql = 'SELECT sightings.last_modified, sightings.expire_timestamp, sightings.encounter_id, sightings.atk_iv, sightings.def_iv, sightings.sta_iv, sightings.move_1, sightings.move_2, sightings.lon, sightings.lat, sightings.pokemon_id, pokedex.identifier, pokedex.rarity, sightings.spawn_id  FROM sightings JOIN pokedex ON pokedex.id=sightings.pokemon_id WHERE sightings.expire_timestamp >= unix_timestamp(now())';
        //echo "4 " . $sql;
    }

    Database::initialize();

    $result = mysqli_query(Database::$conn, $sql);

    $pokemons = array();

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        $p = array();

        $dissapear = $row["expire_timestamp"] * 1000;

        $lat    = floatval($row["lat"]);
        $lon    = floatval($row["lon"]);
        $pokeid = intval($row["pokemon_id"]);

        $atk         = isset($row["atk_iv"])         ? intval($row["atk_iv"])        : null;
        $def         = isset($row["def_iv"])         ? intval($row["def_iv"])        : null;
        $sta         = isset($row["sta_iv"])         ? intval($row["sta_iv"])        : null;
        $mv1         = isset($row["move_1"])         ? intval($row["move_1"])        : null;
        $mv2         = isset($row["move_2"])         ? intval($row["move_2"])        : null;


        $p["last_modified"]      = $row["last_modified"]; //done
        $p["disappear_time"]     = $dissapear; //done
        $p["encounter_id"]       = $row["encounter_id"]; //done
        $p["individual_attack"]  = $atk; //done
        $p["individual_defense"] = $def; //done
        $p["individual_stamina"] = $sta; //done
        $p["latitude"]           = $lat; //done
        $p["longitude"]          = $lon; //done
        $p["move_1"]             = $mv1; //done
        $p["move_2"]             = $mv2;
        $p["pokemon_id"]         = $pokeid;
        $p["pokemon_name"]       = $row["identifier"];
        $p["pokemon_rarity"]     = $row["rarity"];

        $p2          = array();
        $p2["color"] = "#8a8a59";
        $p2["type"]  = "#Normal";

        $p["pokemon_types"] = $p2;
        $p["spawnpoint_id"] = $row["spawn_id"];

        $pokemons[] = $p;
    }

    return $pokemons;
}

function get_active_by_id($ids, $swLat, $swLng, $neLat, $neLng)
{

    $sql = 'SELECT * FROM sightings WHERE `pokemon_id` IN (' . implode(',', array_map('intval', $ids)) . ') AND expire_timestamp >= unix_timestamp(now())';

    Database::initialize();

    $result = mysqli_query(Database::$conn, $sql);

    $pokemons = array();

    /* fetch associative array */

    return $pokemons;
}

class Database
{
    /** TRUE if static variables have been initialized. FALSE otherwise
     */
    private static $init = FALSE;
    /** The mysqli connection object
     */
    public static $conn;

    /** initializes the static class variables. Only runs initialization once.
     * does not return anything.
     */
    public static function initialize()
    {
        if (self::$init === TRUE) return;
        self::$init = TRUE;
        include('config.php');
        self::$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
    }
}