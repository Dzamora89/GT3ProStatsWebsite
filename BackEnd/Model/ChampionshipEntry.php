<?php

namespace Model;
class ChampionshipEntry
{
// DB Stuff
    private $conn;
    private $table = 'championshipEntry';

    //
    public $championshipEntryID;
    public $championshipEntryChampionshipID;
    public $championshipEntryTotalPoints;
    public $championshipEntryPosition;
    public $championshipEntryClass;
    public $championshipEntryDriverID;
    public $championshipEntryCarID;
    public $championshipEntryTeamID;

    public function __constructor($db)
    {
        $this->conn = $db;
    }

    public function createChampionshipEntry(): bool
    {
        $query = 'INSERT INTO ' . $this->table . ' 
        SET 
        championshipEntryChampionshipID = :championshipEntryChampionshipID, 
        championshipEntryTotalPoints = :championshipEntryTotalPoints, 
        championshipEntryPosition = :championshipEntryPosition, 
        $championshipEntryClass = :$championshipEntryClass,
        championshipEntryDriverID = :championshipEntryDriverID,
        championshipEntryCarID = :championshipEntryCarID,
        championshipEntryTeamID = :championshipEntryTeamID';

        //Statment
        $stmt = $this->conn->prepare($query);

        //Clean UP data

        $this->championshipEntryChampionshipID = htmlspecialchars(strip_tags($this->championshipEntryChampionshipID));
        $this->championshipEntryTotalPoints = htmlspecialchars(strip_tags($this->championshipEntryTotalPoints));
        $this->championshipEntryPosition = htmlspecialchars(strip_tags($this->championshipEntryPosition));
        $this->championshipEntryClass = htmlspecialchars(strip_tags($this->championshipEntryClass));
        $this->championshipEntryDriverID = htmlspecialchars(strip_tags($this->championshipEntryDriverID));
        $this->championshipEntryCarID = htmlspecialchars(strip_tags($this->championshipEntryCarID));
        $this->championshipEntryTeamID = htmlspecialchars(strip_tags($this->championshipEntryTeamID));

        //Bind the dada
        $stmt->bindParam(':championshipEntryChampionshipID', $this->championshipEntryChampionshipID);
        $stmt->bindParam(':championshipEntryTotalPoints', $this->championshipEntryTotalPoints);
        $stmt->bindParam(':championshipEntryPosition', $this->championshipEntryPosition);
        $stmt->bindParam(':championshipEntryClass', $this->championshipEntryClass);
        $stmt->bindParam(':championshipEntryDriverID', $this->championshipEntryDriverID);
        $stmt->bindParam(':championshipEntryCarID', $this->championshipEntryCarID);
        $stmt->bindParam(':championshipEntryTeamID', $this->championshipEntryTeamID);

        //Execute Query

        if ($stmt->execute()) {
            return true;
        } else {
            //Print error
            printf("Error: %s. \n ", $stmt->error);
            return false;
        }
    }

    public function updateChampionshipEntry(): bool
    {
        $query = 'UPDATE ' . $this->table . ' 
        SET 
        championshipEntryTotalPoints = :championshipEntryTotalPoints, 
        championshipEntryPosition = :championshipEntryPosition, 
        championshipEntryClass = :championshipEntryClass
        WHERE
        championshipEntryID = :championshipEntryID';

        //Statment
        $stmt = $this->conn->prepare($query);

        //Clean UP data

        $this->championshipEntryTotalPoints = htmlspecialchars(strip_tags($this->championshipEntryTotalPoints));
        $this->championshipEntryPosition = htmlspecialchars(strip_tags($this->championshipEntryPosition));
        $this->championshipEntryClass = htmlspecialchars(strip_tags($this->championshipEntryClass));
        $this->championshipEntryID = htmlspecialchars(strip_tags($this->championshipEntryID));
        $this->championshipEntryDriverID = htmlspecialchars(strip_tags($this->championshipEntryDriverID));
        $this->championshipEntryCarID = htmlspecialchars(strip_tags($this->championshipEntryCarID));
        $this->championshipEntryTeamID = htmlspecialchars(strip_tags($this->championshipEntryTeamID));

        //Bind the dada
        $stmt->bindParam(':championshipEntryTotalPoints', $this->championshipEntryTotalPoints);
        $stmt->bindParam(':championshipEntryPosition', $this->championshipEntryPosition);
        $stmt->bindParam(':championshipEntryClass', $this->championshipEntryClass);
        $stmt->bindParam(':championshipEntryID', $this->championshipEntryID);
        $stmt->bindParam(':championshipEntryDriverID', $this->championshipEntryDriverID);
        $stmt->bindParam(':championshipEntryCarID', $this->championshipEntryCarID);
        $stmt->bindParam(':championshipEntryTeamID', $this->championshipEntryTeamID);

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
    public function getChampionshipEntryByID(): void
    {
        //Todo: Revisar la Query
        $query = 'SELECT * 
                  FROM championshipentry join car c on c.carID = championshipentry.championshipEntryCarID,
                       championshipentry join driver d on championshipentry.championshipEntryDriverID = d.driverID,
                       championshipentry join team t on championshipentry.teamID = t.teamID,
                       championshipentry join championship c2 on championshipentry.championshipentryChampionshipID = c2.championshipID               
                  WHERE ChampionshipEntryID = :ChampionshipEntryID';
        //Prepare Statement

        $stmt = $this->conn->prepare($query);

        //Bind ID

        $stmt->bindParam(':ChampionshipEntryID', $this->ChampionshipEntryID);

        // Execute Query
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //SetProperties
        $this->championshipEntryChampionshipID = $row['championshipEntryChampionshipID'];
        $this->championshipEntryID = $row['championshipEntryID'];
        $this->championshipEntryClass = $row['championshipEntryClass'];
        $this->championshipEntryPosition = $row['championshipEntryPosition'];
        $this->championshipEntryTotalPoints = $row['championshipEntryTotalPoints'];

    }


    public function deleteChampionshipEntry(): bool
    {

        //Create the Query
        $query = 'DELETE FROM ' . $this->table . '
                WHERE championshipEntryID = :championshipEntryID';
        //Prepare Statment
        $stmt = $this->conn->prepare($query);

        //Clean Data
        $this->championshipEntryID = htmlspecialchars(strip_tags($this->championshipEntryID));

        //Bind Data
        $stmt->bindParam(':championshipEntryID', $this->championshipEntryID);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }
}