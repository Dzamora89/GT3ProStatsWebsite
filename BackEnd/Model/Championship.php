<?php

namespace Model;
class Championship
{
// DB Stuff
    private $conn;
    private $table = 'championship';


    //Properties
    public $championshipID;
    public $championshipName;
    public $championshipCountry;
    public $championshipWebsite;
    public $championshipTwitter;
    public $championshipFacebook;
    public $championshipYoutube;
    public $championshipSeason;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAllChampionship()
    {
        //Create Query
        $query = 'SELECT * 
                  FROM ' . $this->table . '
                  ORDER BY championshipID ASC';

        // Prepared Statement

        $stmt = $this->conn->prepare($query);

        // Execute Query
        $stmt->execute();
        return $stmt;
    }

    public function createChampionship(): bool
    {
        $query = 'INSERT INTO ' . $this->table . ' 
        SET 
        championshipName = :championshipName, 
        championshipCountry = :championshipCountry, 
        championshipWebsite = :championshipWebsite, 
        championshipTwitter = :championshipTwitter,
        championshipFacebook = :championshipFacebook,
        championshipYoutube = :championshipYoutube,
        championshipSeason = :championshipSeason';

        //Statment
        $stmt = $this->conn->prepare($query);

        //Clean UP data

        $this->championshipName = htmlspecialchars(strip_tags($this->championshipName));
        $this->championshipCountry = htmlspecialchars(strip_tags($this->championshipCountry));
        $this->championshipWebsite = htmlspecialchars(strip_tags($this->championshipWebsite));
        $this->championshipTwitter = htmlspecialchars(strip_tags($this->championshipTwitter));
        $this->championshipFacebook = htmlspecialchars(strip_tags($this->championshipFacebook));
        $this->championshipYoutube = htmlspecialchars(strip_tags($this->championshipYoutube));
        $this->championshipSeason = htmlspecialchars(strip_tags($this->championshipSeason));

        //Bind the dada
        $stmt->bindParam(':championshipName', $this->championshipName);
        $stmt->bindParam(':championshipCountry', $this->championshipCountry);
        $stmt->bindParam(':championshipWebsite', $this->championshipWebsite);
        $stmt->bindParam(':championshipTwitter', $this->championshipTwitter);
        $stmt->bindParam(':championshipFacebook', $this->championshipFacebook);
        $stmt->bindParam(':championshipYoutube', $this->championshipYoutube);
        $stmt->bindParam(':championshipSeason', $this->championshipSeason);

        //Execute Query

        if ($stmt->execute()) {
            return true;
        } else {
            //Print error
            printf("Error: %s. \n ", $stmt->error);
            return false;
        }
    }

    public function updateChampionship(): bool
    {
        $query = 'UPDATE ' . $this->table . ' 
        SET 
        championshipName = :championshipName, 
        championshipCountry = :championshipCountry, 
        championshipWebsite = :championshipWebsite, 
        championshipTwitter = :championshipTwitter,
        championshipFacebook = :championshipFacebook,
        championshipYoutube = :championshipYoutube,
        championshipSeason = :championshipSeason
        WHERE
        championshipID = :championshipID';

        //Statment
        $stmt = $this->conn->prepare($query);

        //Clean UP data
        $this->championshipID = htmlspecialchars(strip_tags($this->championshipID));
        $this->championshipName = htmlspecialchars(strip_tags($this->championshipName));
        $this->championshipCountry = htmlspecialchars(strip_tags($this->championshipCountry));
        $this->championshipWebsite = htmlspecialchars(strip_tags($this->championshipWebsite));
        $this->championshipTwitter = htmlspecialchars(strip_tags($this->championshipTwitter));
        $this->championshipFacebook = htmlspecialchars(strip_tags($this->championshipFacebook));
        $this->championshipYoutube = htmlspecialchars(strip_tags($this->championshipYoutube));
        $this->championshipSeason = htmlspecialchars(strip_tags($this->championshipSeason));

        //Bind the dada
        $stmt->bindParam('championshipID', $this->championshipID);
        $stmt->bindParam(':championshipName', $this->championshipName);
        $stmt->bindParam(':championshipCountry', $this->championshipCountry);
        $stmt->bindParam(':championshipWebsite', $this->championshipWebsite);
        $stmt->bindParam(':championshipTwitter', $this->championshipTwitter);
        $stmt->bindParam(':championshipFacebook', $this->championshipFacebook);
        $stmt->bindParam(':championshipYoutube', $this->championshipYoutube);
        $stmt->bindParam(':championshipSeason', $this->championshipSeason);


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
    public function getChampionshipByID(): void
    {
        $query = 'SELECT * 
                  FROM ' . $this->table . '
                  WHERE championshipID = :championshipID';
        //Prepare Statement

        $stmt = $this->conn->prepare($query);

        //Bind ID

        $stmt->bindParam(':championshipID', $this->championshipID);

        // Execute Query
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //SetProperties
        $this->championshipID = $row['championshipID'];
        $this->championshipName = $row['championshipName'];
        $this->championshipCountry = $row['championshipCountry'];
        $this->championshipWebsite = $row['championshipWebsite'];
        $this->championshipTwitter = $row['championshipTwitter'];
        $this->championshipFacebook = $row['championshipFacebook'];
        $this->championshipYoutube = $row['championshipYoutube'];
        $this->championshipSeason = $row['championshipSeason'];

    }


    public function deleteChampionship(): bool
    {

        //Create the Query
        $query = 'DELETE FROM ' . $this->table . '
                WHERE championshipID = :championshipID';
        //Prepare Statment
        $stmt = $this->conn->prepare($query);

        //Clean Data
        $this->championshipID = htmlspecialchars(strip_tags($this->championshipID));

        //Bind Data
        $stmt->bindParam(':championshipID', $this->championshipID);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }
}