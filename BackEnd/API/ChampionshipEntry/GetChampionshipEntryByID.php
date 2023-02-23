<?php
//Header
use Model\ChampionshipEntry;

header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');


include_once '../../config/database.php';
include_once '../../Model/ChampionshipEntry.php';
// Instate the DB and Connection
$database = new Database();
$db = $database->connect();
//Initialize the Car
$championshipEntry = new ChampionshipEntry($db);
//Get the ID

$championshipEntry->championshipEntryID = $_GET['championshipEntryID'] ?? die();

//Get Car

$championshipEntry->getChampionshipEntryByID();

$championshipEntry_Array = array(
    'championshipEntryID' => $championshipEntry->championshipEntryID,
    'championshipEntryChampionshipID' => $championshipEntry->championshipEntryChampionshipID,
    'championshipEntryTotalPoints' => $championshipEntry->championshipEntrytotalPoints,
    'championshipEntryPosition' => $championshipEntry->championshipEntryPosition,
    'championshipEntryClass' => $championshipEntry->championshipEntryClass);

print_r(json_encode($championshipEntry_Array));