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
//Initialize the Car
$team = new Team($db);
//Get the ID

$team->teamID = $_GET['teamID'] ?? die();

//Get Car
$team->getTeamByID();

$team_Array = array(
    'teamID' => $team->teamID,
    'teamName' => $team->teamName,
    'teamOwner' => $team->teamOwner,
    'teamCountry' => $team->teamCountry,
    'teamTwitter' => $team->teamTwitter,
    'teamWebsite' => $team->teamWebsite,
    'teamCarBrand' => $team->teamCarBrand);

print_r(json_encode($team_Array));