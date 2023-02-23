<?php
//Header
use Model\Championship;

header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');


include_once '../../config/database.php';
include_once '../../Model/Championship.php';
// Instate the DB and Connection
$database = new Database();
$db = $database->connect();

//Initialize the driver
$championship = new Championship($db);

//Car  Query

$result = $championship->getAllChampionship();
//Get Row count
$rowNumber = $result->rowCount();

// Check if any post

if ($rowNumber > 0) {
    //Driver Array
    $championship_Array = array();
//    $post_Array['Data'] = [];
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $championship_item = array(
            'championshipID' => $championshipID,
            'championshipName' => $championshipName,
            'championshipYoutube' => $championshipYoutube,
            'championshipFacebook' => $championshipFacebook,
            'championshipTwitter' => $championshipTwitter,
            'championshipWebsite' => $championshipWebsite,
            'championshipCountry' => $championshipCountry,
            'championshipSeason' => $championshipSeason);
        // Push Data This work the same as array_push() https://www.php.net/manual/es/function.array-push.php
//        $post_Array['Data'][] = $driver_item;
        $championship_Array[] = $championship_item;
    }
    //Turn into Json & Output
    echo json_encode($championship_Array);

} else {
    //No found
    echo json_encode(array(
        'message' => 'No post found'
    ));
}