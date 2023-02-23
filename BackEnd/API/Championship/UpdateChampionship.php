<?php
//Header
use Model\Championship;

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

// Authorization and Requested with TODO for later on
include_once '../../config/database.php';
include_once '../../Model/Championship.php';
// Instate the DB and Connection
$database = new Database();
$db = $database->connect();

//Initialize the Championship
$championship = new Championship($db);


// Get de raw posted data


$data = json_decode(file_get_contents("php://input"));
$championship->championshipID = $data->championshipID;
$championship->championshipName = $data->championshipName;
$championship->championshipYoutube = $data->championshipYoutube;
$championship->championshipFacebook = $data->championshipFacebook;
$championship->championshipTwitter = $data->championshipTwitter;
$championship->championshipWebsite = $data->championshipWebsite;
$championship->championshipCountry = $data->championshipCountry;
$championship->championshipSeason = $data->championshipSeason;

// Update

if ($championship->updateChampionship()) {
    echo json_encode(
        array('message' => 'Championship Updated')
    );
} else {
    echo json_encode(
        array('message' => 'Championship not Updated')
    );
}