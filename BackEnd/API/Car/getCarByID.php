<?php
//Header
use Model\Car;

header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');


include_once '../../config/database.php';
include_once '../../Model/Car.php';
// Instate the DB and Connection
$database = new Database();
$db = $database->connect();
//Initialize the Car
$car = new Car($db);
//Get the ID

$car->carID = $_GET['carID'] ?? die();

//Get Car

$car->getCarByID();

$car_Array = array(
    'carID' => $car->carID,
    'carManufacturer' => $car->carManufacturer,
    'carTeamID' => $car->carTeamID,
    'carNumber' => $car->carNumber,
    'carClass' => $car->carClass);

print_r(json_encode($car_Array));