<?php
//Header
use Model\Race;

header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');


include_once '../../config/database.php';
include_once '../../Model/Race.php';
// Instate the DB and Connection
$database = new Database();
$db = $database->connect();
//Initialize the Car
$race = new Race($db);
//Get the ID

$race->raceChampionshipID = $_GET['raceChampionshipID'] ?? die();

//Get Car
$result = $race->getRaceBychampionshipID();
//Get Row count
$rowNumber = $result->rowCount();

// Check if any post

if ($rowNumber > 0) {
    //Race Array
    $race_Array = array();
//    $post_Array['Data'] = [];
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $race_item = array(
            'raceID' => $raceID,
            'raceTrack' => $raceTrack,
            'raceDateOfRace' => $raceDateOfRace,
            'raceCountry' => $raceCountry,
            'raceChampionshipID' => $raceChampionshipID
        );
        $race_Array[] = $race_item;
    }
    //Turn into Json & Output
    echo json_encode($race_Array);

} else {
    //No found
    echo json_encode(array(
        'message' => 'No post found'
    ));
}