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
//Initialize the Car
$championship = new Championship($db);
//Get the ID

$championship->championshipID = $_GET['championshipID'] ?? die();

//Get Car

$championship->getChampionshipByID();

$championship_Array = array(
    'championshipID' => $championship->championshipID,
    'championshipCountry' => $championship->championshipCountry,
    'championshipYoutube' => $championship->championshipYoutube,
    'championshipTwitter' => $championship->championshipTwitter,
    'championshipWebsite' => $championship->championshipWebsite,
    'championshipName' => $championship->championshipName,
    'championshipFacebook' => $championship->championshipFacebook,
    'championshipSeason' => $championship->championshipSeason);

print_r(json_encode($championship_Array));