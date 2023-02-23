<?php
//Header
use Model\Car;

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

// Authorization and Requested with TODO for later on
include_once '../../config/database.php';
include_once '../../Model/Car.php';
// Instate the DB and Connection
$database = new Database();
$db = $database->connect();

//Initialize the Car
$car = new Car($db);

// Get de raw posted data
$data = json_decode(file_get_contents("php://input"));
$car->carID = $data->carID;
$car->carClass = $data->carClass;
$car->carNumber = $data->carNumber;
$car->carTeamID = $data->carTeamID;
$car->carManufacturer = $data->carManufacturer;

// Create the driver

if ($car->updateCar()) {
    echo json_encode(
        array('message' => 'Car Updated')
    );
} else {
    echo json_encode(
        array('message' => 'Car Not Updated')
    );
}