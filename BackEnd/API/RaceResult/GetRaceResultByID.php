<?php
//Header
use Model\RaceResult;

header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');


include_once '../../config/database.php';
include_once '../../Model/RaceResult.php';
// Instate the DB and Connection
$database = new Database();
$db = $database->connect();
//Initialize the Car
$raceResult = new RaceResult($db);
//Get the ID

$raceResult->raceResultID = $_GET['raceResultID'] ?? die();

//Get Car
$raceResult->getRaceResultByID();

$raceResult_Array = array(
    'raceResultID' => $raceResult->raceResultID,
    'raceResultCarID' => $raceResult->raceResultCarID,
    'raceResultRaceID' => $raceResult->raceResultRaceID,
    'raceResultTotalTime' => $raceResult->raceResultTotalTime,
    'raceResultLaps' => $raceResult->raceResultLaps,
    'raceResultPointScored' => $raceResult->raceResultPointScored,
    'raceResultEloChanged' => $raceResult->raceResultEloChanged);

print_r(json_encode($raceResult_Array));