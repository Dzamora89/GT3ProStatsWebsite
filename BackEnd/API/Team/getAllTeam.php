<?php
//Header
use Model\Team;

header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');


include_once '../../config/database.php';
include_once '../../Model/Team.php';
// Instate the DB and Connection
$database = new Database();
$db = $database->connect();

//Initialize the driver
$team = new Team($db);

//Car  Query

$result = $team->getAllTeam();
//Get Row count
$rowNumber = $result->rowCount();

// Check if any post

if ($rowNumber > 0) {
    //Team Array
    $team_Array = array();
//    $post_Array['Data'] = [];
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $team_item = array(
            'teamID' => $teamID,
            'teamName' => $teamName,
            'teamOwner' => $teamOwner,
            'teamCountry' => $teamCountry,
            'teamTwitter' => $teamTwitter,
            'teamWebsite' => $teamWebsite,
            'teamCarBrand' => $teamCarBrand);
        // Push Data This work the same as array_push() https://www.php.net/manual/es/function.array-push.php
//
        $team_Array[] = $team_item;
    }
    //Turn into Json & Output
    echo json_encode($team_Array);

} else {
    //No found
    echo json_encode(array(
        'message' => 'No Team Found'
    ));
}