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

//Initialize the driver
$car = new Car($db);


$data = json_decode(file_get_contents("php://input"));
$car->carID = $data->carID;

// Delete the Car

if ($car->deleteDriver()) {
    echo json_encode(
        array('message' => 'Car Deleted')
    );
} else {
    echo json_encode(
        array('message' => 'car Not Deleted')
    );
}