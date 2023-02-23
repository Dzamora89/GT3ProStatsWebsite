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

$car->carTeamID = $_GET['carTeamID'] ?? die();

//Get Car

$result = $car->getCarByCarTeamID();

$rowNumber = $result->rowCount();


// Check if any Car

if ($rowNumber > 0) {
    //Car Array
    $car_Array = array();
//    $post_Array['Data'] = [];
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $car_item = array(
            'carID' => $carID,
            'carManufacturer' => $carManufacturer,
            'TeamName' => $teamName,
            'carNumber' => $carNumber,
            'carClass' => $carClass);
        $car_Array[] = $car_item;
    }
    //Turn into Json & Output
    echo json_encode($car_Array);

} else {
    //No found
    echo json_encode(array(
        'message' => 'No Car found'
    ));
}