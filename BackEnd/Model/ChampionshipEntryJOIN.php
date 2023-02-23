<?php

namespace Model;
class ChampionshipEntryJOIN
{
// DB Stuff
    private $conn;


    // ChampinoshipEntry Stuff
    public $championshipEntryID;
    public $championshipEntryChampionshipID;
    public $championshipEntryTotalPoints;
    public $championshipEntryPosition;
    public $championshipEntryClass;
    public $championshipEntryDriverID;
    public $championshipEntryCarID;
    public $championshipEntryTeamID;

    // Championship Stuff

    public $championshipID;
    public $championshipName;
    public $championshipCountry;
    public $championshipWebsite;
    public $championshipTwitter;
    public $championshipFacebook;
    public $championshipYoutube;
    public $championshipSeason;

    //Team properties
    public $teamID;
    public $teamName;
    public $teamOwner;
    public $teamCountry;
    public $teamTwitter;
    public $teamWebsite;
    public $teamCarBrand;

    //Car Properties
    public $carID;
    public $carManufacturer;
    public $carTeamID;
    public $carNumber;
    public $carClass;

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


    public function __construct($db)
    {
        $this->conn = $db;
    }


    public function getChampionshipEntryByChampionshipID(): void
    {
        $query = 'select *
    from championshipentry
    join car c on c.carID = championshipentry.championshipEntryCarID
    join championship c2 on c2.championshipID = championshipentry.championshipEntryChampionshipID
    join driver d on d.driverID = championshipentry.championshipEntryDriverID
    join team t on championshipentry.championshipEntryTeamID = t.teamID
    where championshipEntryChampionshipID = :championshipID';
        //Prepare Statement and bind Param

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':championshipID', $this->championshipEntryChampionshipID);

        //Execute Query
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);


        //SetProperties
        // I can get more data if I need
        $this->championshipEntryID = $row['championshipEntryID'];
        $this->championshipEntryTotalPoints = $row['championshipEntryTotalPoints'];
        $this->championshipEntryPosition = $row['championshipEntryPosition'];
        $this->championshipEntryClass = $row['championshipEntryClass'];
        $this->championshipEntryDriverID = $row['championshipEntryDriverID'];
        $this->championshipEntryCarID = $row['championshipEntryCarID'];
        $this->championshipEntryTeamID = $row['championshipEntryTeamID'];

        // TODO MUCHO MAS DE ESTA MIERDA.


    }
}