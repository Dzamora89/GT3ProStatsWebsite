-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-02-2023 a las 18:39:59
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gt3stats`
--
CREATE DATABASE gt3stats;
USE gt3stats;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `car`
--

CREATE TABLE `car`
(
    `carID`           int(10) UNSIGNED NOT NULL,
    `carManufacturer` varchar(32)      NOT NULL,
    `carNumber`       int(11)          NOT NULL,
    `carTeamID`       int(10) UNSIGNED DEFAULT NULL,
    `carClass`        varchar(32)      NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_general_ci;

--
-- Volcado de datos para la tabla `car`
--

INSERT INTO `car` (`carID`, `carManufacturer`, `carNumber`, `carTeamID`, `carClass`)
VALUES (1, 'Ferrari', 21, 1, 'gt3'),
       (2, 'Ferrari', 52, 1, 'gt3'),
       (3, 'Ferrari', 53, 1, 'gt3'),
       (4, 'Mercedes-AMG', 86, 2, 'gt3'),
       (5, 'Mercedes-AMG', 87, 2, 'gt3'),
       (6, 'Mercedes-AMG', 88, 2, 'gt3'),
       (7, 'Mercedes-AMG', 89, 2, 'gt3'),
       (8, 'Audi ', 66, 3, 'gt3'),
       (9, 'Audi ', 99, 3, 'gt3'),
       (10, 'Mercedes-AMG', 55, 4, 'gt3'),
       (11, 'Mercedes-AMG', 777, 5, 'gt3'),
       (12, 'Aston Martin ', 95, 6, 'gt3'),
       (13, 'Aston Martin ', 97, 6, 'gt3'),
       (14, 'Lamborghini ', 14, 7, 'gt3'),
       (15, 'Lamborghini ', 19, 7, 'gt3'),
       (16, 'Lamborghini ', 63, 7, 'gt3'),
       (17, 'McLaren ', 159, 8, 'gt3'),
       (18, 'McLaren ', 188, 8, 'gt3'),
       (19, 'McLaren ', 38, 9, 'gt3'),
       (20, 'Ferrari ', 51, 10, 'gt3'),
       (21, 'Ferrari ', 71, 10, 'gt3'),
       (22, 'Ferrari ', 83, 11, 'gt3'),
       (23, 'McLaren ', 111, 12, 'gt3'),
       (24, 'McLaren ', 112, 12, 'gt3'),
       (25, 'Mercedes-AMG', 90, 13, 'gt3'),
       (26, 'Audi ', 25, 14, 'gt3'),
       (27, 'Audi ', 26, 14, 'gt3'),
       (28, 'BMW ', 50, 15, 'gt3'),
       (29, 'BMW ', 98, 15, 'gt3'),
       (30, 'Mercedes-AMG ', 2, 16, 'gt3'),
       (31, 'Audi ', 30, 17, 'gt3'),
       (32, 'Audi ', 31, 17, 'gt3'),
       (33, 'Audi ', 32, 17, 'gt3'),
       (34, 'Audi ', 33, 17, 'gt3'),
       (35, 'Audi ', 46, 17, 'gt3'),
       (36, 'BMW ', 34, 18, 'gt3'),
       (37, 'BMW ', 35, 18, 'gt3'),
       (38, 'BMW ', 28, 19, 'gt3'),
       (41, 'Prueba2222', 59, 2, 'gt3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `championship`
--

CREATE TABLE `championship`
(
    `championshipID`       int(10) UNSIGNED NOT NULL,
    `championshipName`     varchar(32)      NOT NULL,
    `championshipSeason`   int(11)          NOT NULL,
    `championshipCountry`  varchar(32) DEFAULT NULL,
    `championshipWebsite`  tinytext    DEFAULT NULL,
    `championshipTwitter`  tinytext    DEFAULT NULL,
    `championshipFacebook` tinytext    DEFAULT NULL,
    `championshipYoutube`  tinytext    DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_general_ci;

--
-- Volcado de datos para la tabla `championship`
--

INSERT INTO `championship` (`championshipID`, championshipName, championshipSeason, championshipCountry,
                            championshipWebsite, championshipTwitter, championshipFacebook, championshipYoutube)
VALUES (1, 'DTM Germany', 2023, 'Germany', 'https://www.dtm.com/en', NULL, NULL, NULL),
       (2, 'IMSA GTD', 2023, 'North America', 'https://www.imsa.com/', NULL, NULL, NULL),
       (3, 'GTWC Sprint Europe', 2023, 'Europe', 'https://www.gt-world-challenge-e', NULL, NULL, NULL),
       (4, 'GTWC Sprint Endurance', 2023, 'Europe', 'https://www.gt-world-challenge-e', 'null///', 'Hola que ase', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `championshipentry`
--

CREATE TABLE `championshipentry`
(
    `championshipEntryID`             int(10) UNSIGNED NOT NULL,
    `championshipEntryChampionshipID` int(10) UNSIGNED DEFAULT NULL,
    `championshipEntryTotalPoints`    int(11)          DEFAULT NULL,
    `championshipEntryPosition`       int(11)          DEFAULT NULL,
    `championshipEntryClass`          varchar(32)      DEFAULT NULL,
    `championshipEntryDriverID`       int(10) UNSIGNED NOT NULL,
    `championshipEntryCarID`          int(10) UNSIGNED NOT NULL,
    `championshipEntryTeamID`         int(10) UNSIGNED NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `driver`
--

CREATE TABLE `driver`
(
    `driverID`           int(10) UNSIGNED NOT NULL,
    `driverFirstName`    varchar(32)      NOT NULL,
    `driverLastName`     varchar(32)      NOT NULL,
    `driverCountry`      varchar(32)      NOT NULL,
    `driverDateOfBirth`  date     DEFAULT NULL,
    `driverWebsite`      tinytext DEFAULT NULL,
    `driverTwitter`      tinytext DEFAULT NULL,
    `driverStatus`       tinytext DEFAULT NULL,
    `driverLicenseLevel` tinytext DEFAULT NULL,
    `driverELO`          int(11)  DEFAULT 1500
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_general_ci;

--
-- Volcado de datos para la tabla `driver`
--

INSERT INTO `driver` (`driverID`, `driverFirstName`, `driverLastName`, driverCountry, `driverDateOfBirth`,
                      `driverWebsite`, `driverTwitter`, `driverStatus`, `driverLicenseLevel`, `driverELO`)
VALUES (3, 'Vincent ', 'Abril ', 'French', '1995-03-01', 'http://vincentabril.com/',
        'https://twitter.com/vinceabril?lang=en', NULL, NULL, 1500),
       (4, 'Jack ', 'Aitken ', 'British', '1995-09-23', NULL, NULL, NULL, NULL, 1500),
       (5, 'Lucas ', 'Auer ', 'Austrian', '1994-11-11', NULL, NULL, NULL, NULL, 1500),
       (6, 'James ', 'Baldwin ', 'British', NULL, NULL, NULL, NULL, NULL, 1500),
       (7, 'Andrea ', 'Bertolini ', 'Italian', '1973-12-01', 'http://andreabertolini.it/',
        'https://twitter.com/abracing73', NULL, NULL, 1500),
       (8, 'Timur ', 'Boguslavskiy ', 'Russian', NULL, 'http://timurboguslavskiy.com/', NULL, NULL, NULL, 1500),
       (9, 'Mirko ', 'Bortolotti ', 'Italian', '1990-01-10', NULL, 'https://twitter.com/M_Bortolotti', NULL, NULL,
        1500),
       (10, 'James ', 'Calado ', 'British', '1989-06-13', NULL, NULL, NULL, NULL, 1500),
       (11, 'Andrea ', 'Caldarelli ', 'Italian', '1990-02-14', '', 'null', 'Active', '', 1500),
       (12, 'Nicky ', 'Catsburg ', 'Dutch', '1988-02-15', 'http://nickcatsburg.nl/', NULL, NULL, NULL, 1500),
       (13, 'Albert ', 'Costa ', 'Spanish', '1990-05-02', NULL, 'https://twitter.com/acostabalboa', NULL, NULL, 1500),
       (14, 'Ulysse ', 'De Pauw', 'Belgium', '2201-09-03', 'null', 'null', 'Active', '', 1500),
       (15, 'Christian ', 'Engelhart ', 'German', '1986-12-13', 'http://christian-engelhart.de/',
        'https://twitter.com/engelhartchris', NULL, NULL, 1500),
       (16, 'Maro ', 'Engel ', 'German', '1985-08-27', 'http://maroengel.com/', 'https://twitter.com/MaroEngel', NULL,
        NULL, 1500),
       (17, 'Philip ', 'Ellis ', 'British', '1992-10-09',
        'http://philip-ellis.com/?fbclid=IwAR2TY5USBL7DLU1Lfo8KHUBhngILko', NULL, NULL, NULL, 1500),
       (18, 'Kevin ', 'Estre ', 'French', '1988-10-28', NULL, NULL, NULL, NULL, 1500),
       (19, 'Augusto ', ' Farfus ', 'Brazilian', '0000-00-00', 'http://farfus.com/',
        'https://twitter.com/augustofarfus', NULL, NULL, 1500),
       (20, 'Chris ', 'Froggatt ', 'British', '1993-12-11', NULL, NULL, NULL, NULL, 1500),
       (21, 'Antonio ', 'Fuoco ', 'Italian', '1996-05-20', 'http://antonio-fuoco.com/',
        'https://twitter.com/Anto_Fuoco', NULL, NULL, 1500),
       (22, 'Maxi ', 'Götz ', 'German', '1986-02-04', 'http://maximilian-goetz.de/',
        'https://twitter.com/max_goetz?lang=de', NULL, NULL, 1500),
       (23, 'Jules ', 'Gounon ', 'French', '1994-12-31', 'http://julesgounon.com/', 'https://twitter.com/julesgounon',
        NULL, NULL, 1500),
       (24, 'Christopher ', 'Haase ', 'German', '1987-09-26', 'http://christopher-haase.de/',
        'https://twitter.com/chhaase', NULL, NULL, 1500),
       (25, 'Daniel ', 'Juncadella ', 'Spanish', '1991-05-07', NULL, NULL, NULL, NULL, 1500),
       (26, 'Dennis ', 'Lind ', 'Danish', '1993-02-03', NULL, 'https://twitter.com/dennislindracin', NULL, NULL, 1500),
       (27, 'Marco ', 'Mapelli ', 'Italian', '1987-08-01', 'http://marcomapelli.net/',
        'https://twitter.com/marcomapelli', NULL, NULL, 1500),
       (28, 'Raffaele ', 'Marciello ', 'Italian', '1994-12-17', 'http://raffaelemarciello.com/',
        'https://twitter.com/real_rmarciello', NULL, NULL, 1500),
       (29, 'Miguel ', 'Molina ', 'Spanish', '1989-02-17', NULL, 'https://twitter.com/miguelmolinam2', NULL, NULL,
        1500),
       (30, 'Christopher ', 'Mies ', 'German', '1989-05-24', 'http://christopher-mies.de/',
        'https://twitter.com/mieschris', NULL, NULL, 1500),
       (31, 'Daniel ', 'Morad ', 'Canadian', '1990-04-24', 'http://moradness.com/', NULL, NULL, NULL, 1500),
       (32, 'Tommaso ', 'Mosca ', 'Italian', '2000-04-10', NULL, NULL, NULL, NULL, 1500),
       (33, 'Nico ', 'Müller ', 'Swiss', '1992-02-25', 'http://nicomueller.ch/', 'https://twitter.com/nico_mueller',
        NULL, NULL, 1500),
       (34, 'Aurélien ', 'Panis ', 'French', '1994-08-29', NULL, 'https://twitter.com/AurelienPanis', NULL, NULL, 1500),
       (35, 'David ', 'Perel ', 'South African', '1985-05-07', 'http://davidperel.net/',
        'https://twitter.com/davidperel', NULL, NULL, 1500),
       (36, 'Jordan ', 'Pepper ', 'South African', '1996-07-31', 'http://jordan-pepper.com/',
        'https://twitter.com/jordanpepper46', NULL, NULL, 1500),
       (37, 'Alessandro ', 'Pierguidi ', 'Italian', '1983-12-18', NULL, NULL, NULL, NULL, 1500),
       (38, 'Alessio ', 'Picariello ', 'Belgium', '1993-08-27', NULL, NULL, NULL, NULL, 1500),
       (39, 'Jim ', 'Pla ', 'French', '1992-10-06', NULL, 'https://twitter.com/PlaJim', NULL, NULL, 1500),
       (40, 'Davide ', 'Rigon ', 'Italian', '1986-08-26', NULL, 'https://twitter.com/rigondavide', NULL, NULL, 1500),
       (41, 'Valentino ', 'Rossi ', 'Italian', '1979-02-16', 'http://valentinorossi.com/', NULL, NULL, NULL, 1500),
       (42, 'Alessio ', 'Rovera ', 'Italian', '1995-06-22',
        'http://.alessiorovera.net/?fbclid=IwAR20J8wq_E4lpnz5bC5WX7D0Z8V9b5dOD8fIEdWZjrGNJc6rMOEKn5MRHAQ', NULL, NULL,
        NULL, 1500),
       (43, 'Daniel ', 'Serra ', 'Brazilian', '1984-02-24', NULL, NULL, NULL, NULL, 1500),
       (44, 'Luca ', 'Stolz ', 'German', '1995-07-29', 'http://luca-stolz.de/', NULL, NULL, NULL, 1500),
       (45, 'Nick ', 'Tandy ', 'British', '1984-11-03', NULL, NULL, NULL, NULL, 1500),
       (46, 'Nicki ', 'Thiim ', 'Danish', '1989-04-17', NULL, NULL, NULL, NULL, 1500),
       (47, 'Kevin ', 'Tse ', '', '1979-01-10', NULL, NULL, NULL, NULL, 1500),
       (48, 'Lopez Isaac', 'Tutumlu ', 'Spanish', '1985-07-05', 'http://isaactutumlu.com/', NULL, NULL, NULL, 1500),
       (49, 'Laurens ', 'Vanthoor ', 'Belgium', '1991-05-08', 'http://laurensvanthoor.be/',
        'https://twitter.com/vanthoorlaurens', NULL, NULL, 1500),
       (50, 'Dries ', 'Vanthoor ', 'Belgium', '1998-04-20', 'http://driesvanthoor.com/',
        'https://twitter.com/dries_vanthoor', NULL, NULL, 1500),
       (51, 'Kelvin ', 'van der Linde', 'South African', '1996-06-20', 'http://kelvinvanderlinde.com/',
        'https://twitter.com/KelvinvdLinde', NULL, NULL, 1500),
       (52, 'Charles ', 'Weerts ', 'Belgium', '2001-03-01', NULL, NULL, NULL, NULL, 1500),
       (53, 'Nick ', 'Wittmer ', 'Canadian', '1985-05-03', NULL, NULL, NULL, NULL, 1500),
       (72, 'Diego', 'Zamora', 'España', '0000-00-00', '', '', 'Active', ' ', 1500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `driverscores`
--

CREATE TABLE `driverscores`
(
    `driverscoresDriverID`     int(10) UNSIGNED NOT NULL,
    `driverscoresRaceResultID` int(10) UNSIGNED NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `drives`
--

CREATE TABLE `drives`
(
    `drivesDriverID` int(10) UNSIGNED NOT NULL,
    `drivesCarID`    int(10) UNSIGNED NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `race`
--

CREATE TABLE `race`
(
    `raceID`             int(10) UNSIGNED NOT NULL,
    `raceTrack`          varchar(32)      NOT NULL,
    `raceDateOfRace`     date             DEFAULT NULL,
    `raceCountry`        varchar(32)      NOT NULL,
    `raceChampionshipID` int(10) UNSIGNED DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_general_ci;

--
-- Volcado de datos para la tabla `race`
--

INSERT INTO `race` (`raceID`, `raceTrack`, `raceDateOfRace`, `raceCountry`, `raceChampionshipID`)
VALUES (1, 'Motorsport Arena Oschersleben', '2023-05-28', 'Germany', 1),
       (2, 'Circuit Zandvoort', '2023-06-25', 'Netherlands', 1),
       (3, 'Norisring', '2023-07-09', 'Germany', 1),
       (4, 'Nürburgring', '2023-08-06', 'Germany', 1),
       (5, 'Lausitzring', '2023-08-20', 'Germany', 1),
       (6, 'Sachsenring', '2023-09-10', 'Germany', 1),
       (7, 'Red Bull Ring', '2023-09-24', 'Austria', 1),
       (8, 'Hockenheimring Baden-Württemberg', '2023-05-22', 'Germany', 1),
       (9, 'Daytona International Speedway', '2023-01-29', 'EEUU', 2),
       (10, 'Sebring International Raceway', '2023-03-15', 'EEUU', 2),
       (11, 'Long Beach Street Circuit', '2023-04-15', 'EEUU', 2),
       (12, 'WeatherTech Raceway Laguna Seca', '2023-05-14', 'EEUU', 2),
       (13, 'Watkins Glen International', '2023-06-25', 'EEUU', 2),
       (14, 'Canadian Tire Motorsport Park', '2023-07-09', 'Canada', 2),
       (15, 'Lime Rock Park', '2023-07-22', 'EEUU', 2),
       (16, 'Road America', '2023-08-27', 'EEUU', 2),
       (17, 'Indianapolis Motor Speedway', '2023-09-17', 'EEUU', 2),
       (18, 'VIRginia International Raceway', '2023-08-27', 'EEUU', 2),
       (19, 'Michelin Raceway Road Atlanta', '2023-10-14', 'EEUU', 2),
       (20, 'Daytona International Speedway', '2023-01-22', 'EEUU', 2),
       (21, 'Brands Hatch', '2023-05-14', 'United Kingdom', 3),
       (22, 'Misano World Circuit', '2023-07-16', 'Italy', 3),
       (23, 'Hockenheimring', '2023-09-03', 'Germany', 3),
       (24, 'Ricardo Tormo, Chester', '2023-09-17', 'Spain', 3),
       (25, 'Zandvoort', '2023-10-15', 'Netherlands', 3),
       (26, 'Monza', '2023-04-23', 'Italy', 4),
       (27, 'Paul Ricard', '2023-06-04', 'France', 4),
       (28, 'Spa-Francorchamps', '2023-07-02', 'Belgium', 4),
       (29, 'Nürburgring', '2023-07-30', 'Germany', 4),
       (30, 'Circuit de Barcelona-Catalunya', '2023-10-01', 'Spain', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raceresult`
--

CREATE TABLE `raceresult`
(
    `raceResultID`           int(10) UNSIGNED NOT NULL,
    `raceresultCarID`        int(10) UNSIGNED DEFAULT NULL,
    `raceresultRaceID`       int(10) UNSIGNED DEFAULT NULL,
    `raceresultDriverID`     int(10) UNSIGNED DEFAULT NULL,
    `raceresultTotalTime`    bigint(20)       DEFAULT NULL,
    `raceresultLaps`         int(11)          DEFAULT NULL,
    `raceresultPointsScored` int(11)          DEFAULT NULL,
    `raceresultEloChanged`   int(11)          DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team`
--

CREATE TABLE `team`
(
    `teamID`       int(10) UNSIGNED NOT NULL,
    `teamName`     tinytext         NOT NULL,
    `teamOwner`    tinytext DEFAULT NULL,
    `teamCountry`  tinytext DEFAULT NULL,
    `teamTwitter`  tinytext DEFAULT NULL,
    `teamWebsite`  tinytext DEFAULT NULL,
    `teamCarBrand` tinytext DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_general_ci;

--
-- Volcado de datos para la tabla `team`
--

INSERT INTO `team` (`teamID`, `teamName`, `teamOwner`, `teamCountry`, `teamTwitter`, `teamWebsite`, `teamCarBrand`)
VALUES (1, 'AF Corse', 'Amato Ferrari', 'Italian ', 'https://twitter.com/afcorse', 'http://afcorse.it/', 'Ferrari '),
       (2, 'Akkodis ASP Team', 'Jérôme Policand', 'France', 'https://twitter.com/AKKAASPTEAM',
        'http://akka-asp-team.com/fr/', 'Mercedes-AMG'),
       (3, 'Attempto Racing', NULL, NULL, NULL, NULL, 'Audi '),
       (4, 'AMG Team GruppeM Racing', NULL, NULL, NULL, NULL, 'Mercedes-AMG'),
       (5, 'Al Manar Racing by HRT', NULL, NULL, NULL, NULL, 'Mercedes-AMG'),
       (6, 'Beechdean AMR', 'Andrew Howard', 'British', 'https://twitter.com/beechdeanamr', 'http://beechdeanamr.com/',
        'Aston Martin'),
       (7, 'Emil Frey Racing', 'Walter Frey’s ', 'Germany', NULL, 'https://emilfreyracing.com', 'Lamborghini'),
       (8, 'Garage 59', NULL, 'British', 'https://twitter.com/garage_59', NULL, 'McLaren '),
       (9, 'Jota', NULL, NULL, NULL, 'http://jotasport.com/', 'McLaren '),
       (10, 'Iron Lynx', 'DEBORAH MAYER, CLAUDIO SCHIAVONI, SERGIO PIANEZZOLA AND ANDREA PICCINI', 'ITALY', NULL,
        'http://ironlynx.it/', 'Ferrari '),
       (11, 'Iron Dames', 'Deborah Mayer', 'Italian ', NULL, 'http://irondames.racing/', 'Ferrari '),
       (12, 'JP Motorsport', NULL, NULL, NULL, 'http://jp-motorsport.com/', 'McLaren '),
       (13, 'Madpanda Motorsport', NULL, 'Spain', 'https://twitter.com/Madpanda_Msport', NULL, 'Mercedes-AMG'),
       (14, 'Sainteloc Racing', 'Sébastien Chetail.', 'French ', 'https://twitter.com/TeamSainteloc',
        'http://sainteloc.com/', 'Audi '),
       (15, 'ROWE Racing ', 'ROWE MINERALÖLWERK GMBH', 'Germany', NULL, NULL, 'BMW'),
       (16, 'Mercedes-AMG Team GetSpeed', NULL, NULL, NULL, NULL, 'Mercedes-AMG GT3'),
       (17, 'Team WRT', 'Vincent Vosse, Yves Weerts', 'Belgian ', 'https://twitter.com/followWRT',
        'http://w-racingteam.com/', 'AUDI'),
       (18, 'Walkenhorst Motorsport', NULL, 'Germany', NULL, 'http://walkenhorst-motorsport.de/', 'BMW'),
       (19, 'Samantha Tan Racing', NULL, NULL, NULL, NULL, 'BMW');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `car`
--
ALTER TABLE `car`
    ADD PRIMARY KEY (`carID`),
    ADD KEY `carID_teamID_FK` (`carTeamID`);

--
-- Indices de la tabla `championship`
--
ALTER TABLE `championship`
    ADD PRIMARY KEY (`championshipID`);

--
-- Indices de la tabla `championshipentry`
--
ALTER TABLE `championshipentry`
    ADD PRIMARY KEY (`championshipEntryID`),
    ADD KEY `championshipID_FK` (`championshipEntryChampionshipID`),
    ADD KEY `championshipEntry_driverID_FK` (`championshipEntryDriverID`),
    ADD KEY `championshipEntry_carID_FK` (`championshipEntryCarID`),
    ADD KEY `championshipEntry_teamID_FK` (`championshipEntryTeamID`);

--
-- Indices de la tabla `driver`
--
ALTER TABLE `driver`
    ADD PRIMARY KEY (`driverID`);

--
-- Indices de la tabla `driverscores`
--
ALTER TABLE `driverscores`
    ADD PRIMARY KEY (`driverscoresDriverID`, `driverscoresRaceResultID`),
    ADD KEY `RaceResultID_DriverID_FK` (`driverscoresDriverID`);

--
-- Indices de la tabla `drives`
--
ALTER TABLE `drives`
    ADD PRIMARY KEY (`drivesDriverID`, `drivesCarID`),
    ADD KEY `carID_FK` (`drivesCarID`);

--
-- Indices de la tabla `race`
--
ALTER TABLE `race`
    ADD PRIMARY KEY (`raceID`),
    ADD KEY `race_Championship_FK` (`raceChampionshipID`);

--
-- Indices de la tabla `raceresult`
--
ALTER TABLE `raceresult`
    ADD PRIMARY KEY (`raceResultID`),
    ADD KEY `RaceResult_CarID_FK` (`raceresultCarID`),
    ADD KEY `RaceResult_RaceID_FK` (`raceresultRaceID`);

--
-- Indices de la tabla `team`
--
ALTER TABLE `team`
    ADD PRIMARY KEY (`teamID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `car`
--
ALTER TABLE `car`
    MODIFY `carID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 44;

--
-- AUTO_INCREMENT de la tabla `championship`
--
ALTER TABLE `championship`
    MODIFY `championshipID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 10;

--
-- AUTO_INCREMENT de la tabla `championshipentry`
--
ALTER TABLE `championshipentry`
    MODIFY `championshipEntryID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `driver`
--
ALTER TABLE `driver`
    MODIFY `driverID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 73;

--
-- AUTO_INCREMENT de la tabla `race`
--
ALTER TABLE `race`
    MODIFY `raceID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 36;

--
-- AUTO_INCREMENT de la tabla `raceresult`
--
ALTER TABLE `raceresult`
    MODIFY `raceResultID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `team`
--
ALTER TABLE `team`
    MODIFY `teamID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `car`
--
ALTER TABLE `car`
    ADD CONSTRAINT `carID_teamID_FK` FOREIGN KEY (`carTeamID`) REFERENCES `team` (`teamID`);

--
-- Filtros para la tabla `championshipentry`
--
ALTER TABLE `championshipentry`
    ADD CONSTRAINT `championshipEntry_carID_FK` FOREIGN KEY (`championshipEntryCarID`) REFERENCES `car` (`carID`),
    ADD CONSTRAINT `championshipEntry_driverID_FK` FOREIGN KEY (`championshipEntryDriverID`) REFERENCES `driver` (`driverID`),
    ADD CONSTRAINT `championshipEntry_teamID_FK` FOREIGN KEY (`championshipEntryTeamID`) REFERENCES `team` (`teamID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    ADD CONSTRAINT `championshipID_FK` FOREIGN KEY (`championshipEntryChampionshipID`) REFERENCES `championship` (`championshipID`);

--
-- Filtros para la tabla `driverscores`
--
ALTER TABLE `driverscores`
    ADD CONSTRAINT `DriverID_RaceResultID_Fk2` FOREIGN KEY (`driverscoresDriverID`) REFERENCES `driver` (`driverID`),
    ADD CONSTRAINT `RaceResultID_DriverID_FK2` FOREIGN KEY (`driverscoresRaceResultID`) REFERENCES `raceresult` (`raceResultID`);

--
-- Filtros para la tabla `drives`
--
ALTER TABLE `drives`
    ADD CONSTRAINT `carID_FK` FOREIGN KEY (`drivesCarID`) REFERENCES `car` (`carID`),
    ADD CONSTRAINT `driverID_FK` FOREIGN KEY (`drivesDriverID`) REFERENCES `driver` (`driverID`);

--
-- Filtros para la tabla `race`
--
ALTER TABLE `race`
    ADD CONSTRAINT `race_Championship_FK` FOREIGN KEY (`raceChampionshipID`) REFERENCES `championship` (`championshipID`);

--
-- Filtros para la tabla `raceresult`
--
ALTER TABLE `raceresult`
    ADD CONSTRAINT `RaceResult_CarID_FK` FOREIGN KEY (`raceresultCarID`) REFERENCES `car` (`carID`),
    ADD CONSTRAINT `RaceResult_RaceID_FK` FOREIGN KEY (`raceresultRaceID`) REFERENCES `race` (`raceID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
