<?php

namespace Model;
class Car
{
// DB Stuff
    private $conn;
    private $table = 'car';

    //Properties
    public $carID;
    public $carManufacturer;
    public $carTeamID;
    public $carNumber;
    public $carClass;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAllCar()
    {
        //Create Query
        $query = 'SELECT * 
                  FROM car join team on car.carTeamID = team.TeamID 
                  ORDER BY carID ASC';

        // Prepared Statement

        $stmt = $this->conn->prepare($query);

        // Execute Query
        $stmt->execute();
        return $stmt;
    }


    public function createCar(): bool
    {
        $query = 'INSERT INTO ' . $this->table . ' 
        SET 
        carManufacturer = :carManufacturer, 
        carTeamID = :carTeamID, 
        carNumber = :carNumber, 
        carClass = :carClass';

        //Statment
        $stmt = $this->conn->prepare($query);

        //Clean UP data

        $this->carManufacturer = htmlspecialchars(strip_tags($this->carManufacturer));
        $this->carNumber = htmlspecialchars(strip_tags($this->carNumber));
        $this->carTeamID = htmlspecialchars(strip_tags($this->carTeamID));
        $this->carClass = htmlspecialchars(strip_tags($this->carClass));


        //Bind the dada
        $stmt->bindParam(':carManufacturer', $this->carManufacturer);
        $stmt->bindParam(':carNumber', $this->carNumber);
        $stmt->bindParam(':carTeamID', $this->carTeamID);
        $stmt->bindParam(':carClass', $this->carClass);


        //Execute Query

        if ($stmt->execute()) {
            return true;
        } else {
            //Print error
            printf("Error: %s. \n ", $stmt->error);
            return false;
        }
    }

    public function updateCar(): bool
    {
        $query = 'UPDATE ' . $this->table . ' 
        SET 
        carManufacturer = :carManufacturer, 
        carTeamID = :carTeamID, 
        carNumber = :carNumber, 
        carClass = :carClass
        WHERE
        carID = :carID';

        //Statment
        $stmt = $this->conn->prepare($query);

        //Clean UP data

        $this->carManufacturer = htmlspecialchars(strip_tags($this->carManufacturer));
        $this->carNumber = htmlspecialchars(strip_tags($this->carNumber));
        $this->carTeamID = htmlspecialchars(strip_tags($this->carTeamID));
        $this->carClass = htmlspecialchars(strip_tags($this->carClass));
        $this->carID = htmlspecialchars(strip_tags($this->carID));

        //Bind the dada
        $stmt->bindParam(':carManufacturer', $this->carManufacturer);
        $stmt->bindParam(':carNumber', $this->carNumber);
        $stmt->bindParam(':carTeamID', $this->carTeamID);
        $stmt->bindParam(':carClass', $this->carClass);
        $stmt->bindParam(':carID', $this->carID);

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
    public function getCarByID(): void
    {
        $query = 'SELECT * 
                  FROM ' . $this->table . '
                  WHERE carID = :carID';
        //Prepare Statement

        $stmt = $this->conn->prepare($query);

        //Bind ID

        $stmt->bindParam(':carID', $this->carID);

        // Execute Query
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //SetProperties
        $this->carID = $row['carID'];
        $this->carManufacturer = $row['carManufacturer'];
        $this->carTeamID = $row['carTeamID'];
        $this->carClass = $row['carClass'];
        $this->carNumber = $row['carNumber'];

    }

    public function getCarByCarTeamID()
    {
        $query = 'SELECT * 
                  FROM car join team on car.carTeamID = team.TeamID 
                  WHERE carTeamID = :carTeamID ;';
        //Prepare Statement

        $stmt = $this->conn->prepare($query);

        //Bind ID

        $stmt->bindParam(':carTeamID', $this->carTeamID);

        // Execute Query
        $stmt->execute();
        return $stmt;

    }


    public function deleteDriver(): bool
    {

        //Create the Query
        $query = 'DELETE FROM ' . $this->table . '
                WHERE carID = :carID';
        //Prepare Statment
        $stmt = $this->conn->prepare($query);

        //Clean Data
        $this->carID = htmlspecialchars(strip_tags($this->carID));

        //Bind Data
        $stmt->bindParam(':carID', $this->carID);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }
}