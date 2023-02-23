<?php

namespace Model;
class RaceResult
{
// DB Stuff
    private $conn;
    private string $table = 'raceResult';


    // Properties

    public int $raceResultID;
    public int $raceResultCarID;
    public int $raceResultRaceID;
    public int $raceResultTotalTime;
    public int $raceResultLaps;
    public int $raceResultPointScored;
    public int $raceResultEloChanged;


    public function __constructor($db): void
    {
        $this->conn = $db;
    }

    // Todo: Looks if it needs to get use
    public function getAllRaceResult()
    {
        //Create Query
        $query = 'SELECT * 
                  FROM ' . $this->table . '
                  ORDER BY raceResultID ASC';

        // Prepared Statement

        $stmt = $this->conn->prepare($query);

        // Execute Query
        $stmt->execute();
        return $stmt;
    }


    public function createRaceResult(): bool
    {
        $query = 'INSERT INTO ' . $this->table . ' 
        SET 
        raceResultCarID = :raceResultCarID, 
        raceResultRaceID = :raceResultRaceID, 
        raceResultTotalTime = :raceResultTotalTime, 
        raceResultLaps = :raceResultLaps,
        raceResultPointScored = :raceResultPointScored,
        raceResultEloChanged = :raceResultEloChanged';

        //Statment
        $stmt = $this->conn->prepare($query);

        //Clean UP data

        $this->raceResultCarID = htmlspecialchars(strip_tags($this->raceResultCarID));
        $this->raceResultRaceID = htmlspecialchars(strip_tags($this->raceResultRaceID));
        $this->raceResultTotalTime = htmlspecialchars(strip_tags($this->raceResultTotalTime));
        $this->raceResultLaps = htmlspecialchars(strip_tags($this->raceResultLaps));
        $this->raceResultPointScored = htmlspecialchars(strip_tags($this->raceResultPointScored));
        $this->raceResultEloChanged = htmlspecialchars(strip_tags($this->raceResultEloChanged));

        //Bind the dada
        $stmt->bindParam(':raceResultCarID', $this->raceResultCarID);
        $stmt->bindParam(':raceResultRaceID', $this->raceResultRaceID);
        $stmt->bindParam(':raceResultTotalTime', $this->raceResultTotalTime);
        $stmt->bindParam(':raceResultLaps', $this->raceResultLaps);
        $stmt->bindParam(':raceResultPointScored', $this->raceResultPointScored);
        $stmt->bindParam(':raceResultEloChanged', $this->raceResultEloChanged);

        //Execute Query

        if ($stmt->execute()) {
            return true;
        } else {
            //Print error
            printf("Error: %s. \n ", $stmt->error);
            return false;
        }
    }

    public function updateRaceResult(): bool
    {
        $query = 'UPDATE ' . $this->table . ' 
        SET 
        raceResultCarID = :raceResultCarID, 
        raceResultRaceID = :raceResultRaceID, 
        raceResultTotalTime = :raceResultTotalTime, 
        raceResultLaps = :raceResultLaps,
        raceResultPointScored = :raceResultPointScored,
        raceResultEloChanged = :raceResultEloChanged
        WHERE
        raceResultID = :raceResultID';

        //Statment
        $stmt = $this->conn->prepare($query);

        //Clean UP data
        $this->raceResultID = htmlspecialchars(strip_tags($this->raceResultID));
        $this->raceResultCarID = htmlspecialchars(strip_tags($this->raceResultCarID));
        $this->raceResultRaceID = htmlspecialchars(strip_tags($this->raceResultRaceID));
        $this->raceResultTotalTime = htmlspecialchars(strip_tags($this->raceResultTotalTime));
        $this->raceResultLaps = htmlspecialchars(strip_tags($this->raceResultLaps));
        $this->raceResultPointScored = htmlspecialchars(strip_tags($this->raceResultPointScored));
        $this->raceResultEloChanged = htmlspecialchars(strip_tags($this->raceResultEloChanged));

        //Bind the dada
        $stmt->bindParam(':raceResultID', $this->raceResultID);
        $stmt->bindParam(':raceResultCarID', $this->raceResultCarID);
        $stmt->bindParam(':raceResultRaceID', $this->raceResultRaceID);
        $stmt->bindParam(':raceResultTotalTime', $this->raceResultTotalTime);
        $stmt->bindParam(':raceResultLaps', $this->raceResultLaps);
        $stmt->bindParam(':raceResultPointScored', $this->raceResultPointScored);
        $stmt->bindParam(':raceResultEloChanged', $this->raceResultEloChanged);

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
    public function getRaceResultByID(): void
    {
        $query = 'SELECT * 
                  FROM ' . $this->table . '
                  WHERE raceResultID = :raceResultID';
        //Prepare Statement

        $stmt = $this->conn->prepare($query);

        //Bind ID

        $stmt->bindParam(':raceResultID', $this->raceResultID);

        // Execute Query
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //SetProperties
        $this->raceResultID = $row['raceResultID'];
        $this->raceResultCarID = $row['raceResultCarID'];
        $this->raceResultRaceID = $row['raceResultRaceID'];
        $this->raceResultTotalTime = $row['raceResultTotalTime'];
        $this->raceResultLaps = $row['raceResultLaps'];
        $this->raceResultPointScored = $row['raceResultPointScored'];
        $this->raceResultEloChanged = $row['raceResultEloChanged'];


    }


    public function deleteRaceResult(): bool
    {

        //Create the Query
        $query = 'DELETE FROM ' . $this->table . '
                WHERE raceResultID = :raceResultID';
        //Prepare Statment
        $stmt = $this->conn->prepare($query);

        //Clean Data
        $this->raceResultID = htmlspecialchars(strip_tags($this->raceResultID));

        //Bind Data
        $stmt->bindParam(':raceResultID', $this->raceResultID);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }
}