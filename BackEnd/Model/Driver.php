<?php

namespace Model;
class Driver
{
// DB Stuff
    private $conn;
    private $table = 'driver';


    //Driver properties
    public $driverID;
    public $driverFirstName;
    public $driverLastName;
    public $driverCountry;
    public $dateOfBirth;
    public $driverWebsite;
    public $driverTwitter;
    public $driverStatus;
    public $driverLicenseLevel;
    public $driverELO;

    // Constructor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAllDriver()
    {
        //Create Query
        $query = 'SELECT * 
                  FROM ' . $this->table . '
                  ORDER BY driverID ASC';

        // Prepared Statement

        $stmt = $this->conn->prepare($query);

        // Execute Query
        $stmt->execute();
        return $stmt;
    }

    public function createDriver(): bool
    {
        $query = 'INSERT INTO ' . $this->table . ' 
        SET 
        driverFirstName = :driverFirstName, 
        driverLastName = :driverLastName, 
        driverCountry = :driverCountry, 
        dateOfBirth = :dateOfBirth,
        driverWebsite = :driverWebsite,
        driverTwitter = :driverTwitter, 
        driverStatus = :driverStatus,
        driverLicenseLevel = :driverLicenseLevel,
        driverELO = :driverELO';

        //Statment
        $stmt = $this->conn->prepare($query);

        //Clean UP data

        $this->driverFirstName = htmlspecialchars(strip_tags($this->driverFirstName));
        $this->driverLastName = htmlspecialchars(strip_tags($this->driverLastName));
        $this->driverCountry = htmlspecialchars(strip_tags($this->driverCountry));
        $this->dateOfBirth = htmlspecialchars(strip_tags($this->dateOfBirth));
        $this->driverWebsite = htmlspecialchars(strip_tags($this->driverWebsite));
        $this->driverTwitter = htmlspecialchars(strip_tags($this->driverTwitter));
        $this->driverStatus = htmlspecialchars(strip_tags($this->driverStatus));
        $this->driverLicenseLevel = htmlspecialchars(strip_tags($this->driverLicenseLevel));
        $this->driverELO = htmlspecialchars(strip_tags($this->driverELO));


        //Bind the dada
        $stmt->bindParam(':driverFirstName', $this->driverFirstName);
        $stmt->bindParam(':driverLastName', $this->driverLastName);
        $stmt->bindParam(':driverCountry', $this->driverCountry);
        $stmt->bindParam(':dateOfBirth', $this->dateOfBirth);
        $stmt->bindParam(':driverWebsite', $this->driverWebsite);
        $stmt->bindParam(':driverTwitter', $this->driverTwitter);
        $stmt->bindParam(':driverStatus', $this->driverStatus);
        $stmt->bindParam(':driverLicenseLevel', $this->driverLicenseLevel);
        $stmt->bindParam(':driverELO', $this->driverELO);


        //Execute Query

        if ($stmt->execute()) {
            return true;
        } else {
            //Print error
            printf("Error: %s. \n ", $stmt->error);
            return false;
        }
    }

    public function updateDriver(): bool
    {
        $query = 'UPDATE ' . $this->table . ' 
        SET 
        driverFirstName = :driverFirstName, 
        driverLastName = :driverLastName, 
        driverCountry = :driverCountry, 
        dateOfBirth = :dateOfBirth,
        driverWebsite = :driverWebsite,
        driverTwitter = :driverTwitter, 
        driverStatus = :driverStatus,
        driverLicenseLevel = :driverLicenseLevel,
        driverELO = :driverELO
        WHERE
        driverID = :driverID';

        //Statment
        $stmt = $this->conn->prepare($query);

        //Clean UP data

        $this->driverFirstName = htmlspecialchars(strip_tags($this->driverFirstName));
        $this->driverLastName = htmlspecialchars(strip_tags($this->driverLastName));
        $this->driverCountry = htmlspecialchars(strip_tags($this->driverCountry));
        $this->dateOfBirth = htmlspecialchars(strip_tags($this->dateOfBirth));
        $this->driverWebsite = htmlspecialchars(strip_tags($this->driverWebsite));
        $this->driverTwitter = htmlspecialchars(strip_tags($this->driverTwitter));
        $this->driverStatus = htmlspecialchars(strip_tags($this->driverStatus));
        $this->driverLicenseLevel = htmlspecialchars(strip_tags($this->driverLicenseLevel));
        $this->driverELO = htmlspecialchars(strip_tags($this->driverELO));
        $this->driverID = htmlspecialchars(strip_tags($this->driverID));

        //Bind the dada
        $stmt->bindParam(':driverFirstName', $this->driverFirstName);
        $stmt->bindParam(':driverLastName', $this->driverLastName);
        $stmt->bindParam(':driverCountry', $this->driverCountry);
        $stmt->bindParam(':dateOfBirth', $this->dateOfBirth);
        $stmt->bindParam(':driverWebsite', $this->driverWebsite);
        $stmt->bindParam(':driverTwitter', $this->driverTwitter);
        $stmt->bindParam(':driverStatus', $this->driverStatus);
        $stmt->bindParam(':driverLicenseLevel', $this->driverLicenseLevel);
        $stmt->bindParam(':driverELO', $this->driverELO);
        $stmt->bindParam(':driverID', $this->driverID);

        //Execute Query

        if ($stmt->execute()) {
            return true;
        } else {
            //Print error
            printf("Error: %s. \n ", $stmt->error);
            return false;
        }
    }

    // Get Single Object
    public function getDriverByID(): void
    {
        $query = 'SELECT * 
                  FROM ' . $this->table . '
                  WHERE driverID = :driverID';
        //Prepare Statement

        $stmt = $this->conn->prepare($query);

        //Bind ID

        $stmt->bindParam(':driverID', $this->driverID);

        // Execute Query
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //SetProperties
        $this->driverID = $row['driverID'];
        $this->driverFirstName = $row['driverFirstName'];
        $this->driverLastName = $row['driverLastName'];
        $this->driverCountry = $row['driverCountry'];
        $this->dateOfBirth = $row['dateOfBirth'];
        $this->driverWebsite = $row['driverWebsite'];
        $this->driverTwitter = $row['driverTwitter'];
        $this->driverStatus = $row['driverStatus'];
        $this->driverLicenseLevel = $row['driverLicenseLevel'];
        $this->driverELO = $row['driverELO'];
    }


    public function deleteDriver(): bool
    {

        //Create the Query
        $query = 'DELETE FROM ' . $this->table . '
                WHERE driverID = :driverID';
        //Prepare Statment
        $stmt = $this->conn->prepare($query);

        //Clean Data
        $this->driverID = htmlspecialchars(strip_tags($this->driverID));

        //Bind Data
        $stmt->bindParam(':driverID', $this->driverID);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    //TODO This function dont work yet
    public function getDriverByCarID()
    {
        $query = 'SELECT * 
                  FROM driver join drives on driver.drivesDriverID = driver.driverID
                  WHERE driverID = :driverID';
        //Prepare Statement

        $stmt = $this->conn->prepare($query);

        //Bind ID

        $stmt->bindParam(':driverID', $this->driverID);

        // Prepared Statement


        // Execute Query
        $stmt->execute();
        return $stmt;

    }
}