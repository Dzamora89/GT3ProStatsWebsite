<?php
//Header
use Model\Driver;

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

// Authorization and Requested with TODO for later on
include_once '../../config/database.php';
include_once '../../Model/Driver.php';
// Instate the DB and Connection
$database = new Database();
$db = $database->connect();

//Initialize the driver
$driver = new Driver($db);


// Get de raw posted data


$data = json_decode(file_get_contents("php://input"));

$driver->driverFirstName = $data->driverFirstName;
$driver->driverLastName = $data->driverLastName;
$driver->driverCountry = $data->driverCountry;
$driver->dateOfBirth = $data->dateOfBirth;
$driver->driverWebsite = $data->driverWebsite;
$driver->driverTwitter = $data->driverTwitter;
$driver->driverStatus = $data->driverStatus;
$driver->driverLicenseLevel = $data->driverLicenseLevel;
$driver->driverELO = $data->driverELO;

// Create the driver

if ($driver->createDriver()) {
    echo json_encode(
        array('message' => 'Driver Created')
    );
} else {
    echo json_encode(
        array('message' => 'Driver Not created')
    );
}