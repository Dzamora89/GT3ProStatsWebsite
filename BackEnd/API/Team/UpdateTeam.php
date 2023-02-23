<?php
//Header
use Model\Team;

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

// Authorization and Requested with TODO for later on
include_once '../../config/database.php';
include_once '../../Model/Team.php';
// Instate the DB and Connection
$database = new Database();
$db = $database->connect();

//Initialize the Championship
$team = new Team($db);


// Get de raw posted data
$data = json_decode(file_get_contents("php://input"));

$team->teamID = $data->teamID;
$team->teamName = $data->teamName;
$team->teamOwner = $data->teamOwner;
$team->teamCountry = $data->teamCountry;
$team->teamTwitterURL = $data->teamTwitterURL;
$team->teamWebsite = $data->teamWebsite;
$team->teamCarBrand = $data->teamCarBrand;

//Create the race
if ($team->updateTeam()) {
    echo json_encode(array('message' => 'Team Updated'));
} else {
    echo json_encode(
        array('message' => 'Team Not Updated')
    );
}