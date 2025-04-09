<?php
    require('includes/pgconfig.php');
 
    $query = "DROP TABLE IF EXISTS RaceType;";
    $dbCreate = pg_query($pgCon, $query);
 
    $query = "CREATE TABLE IF NOT EXISTS RaceType(
        RaceID serial Primary Key,
        RaceTitle varchar(50),
        RaceDistance numeric(10,5));";
    $dbCreate = pg_query($pgCon, $query);
 
    $query = "DROP TABLE IF EXISTS RaceResult;";
    $dbCreate = pg_query($pgCon, $query);
 
    $query = "CREATE TABLE IF NOT EXISTS RaceResult(
        ResultID serial Primary Key,
        RaceDate date,
        RaceTime time,
        RaceResult varchar(150),
        RacePosition integer,
        AthleteID integer,
        RaceID integer);";
    $dbCreate = pg_query($pgCon, $query);
 
    $query = "DROP TABLE IF EXISTS Athlete;";
    $dbCreate = pg_query($pgCon, $query);
 
    $query = "CREATE TABLE IF NOT EXISTS Athlete(
        AthleteID serial Primary Key,
        firstName varchar(100),
        lastName varchar(100),
        AthleteDOB date);";
    $dbCreate = pg_query($pgCon, $query);
 
    //INSERT SOME EXAMPLE DATA
    $query = "INSERT INTO RaceType (RaceTitle, RaceDistance) VALUES ('100m', 100);";
    $dbInsert = pg_query($pgCon, $query);
    $query = "INSERT INTO RaceType (RaceTitle, RaceDistance) VALUES ('200m', 200);";
    $dbInsert = pg_query($pgCon, $query);
    $query = "INSERT INTO RaceType (RaceTitle, RaceDistance) VALUES ('400m', 400);";
    $dbInsert = pg_query($pgCon, $query);
 
    $query = "INSERT INTO Athlete (firstName, lastName, AthleteDOB) VALUES ('Alex', 'Bobbington', '2020/03/15');";
    $dbInsert = pg_query($pgCon, $query);
    $query = "INSERT INTO Athlete (firstName, lastName, AthleteDOB) VALUES ('Paul', 'Jackson', '2004/09/03');";
    $dbInsert = pg_query($pgCon, $query);
 
    $d = date("Y/m/d");
    $t = date("h:i:s");
    echo $d;
    echo $t;
    $query = "INSERT INTO RaceResult (RaceDate, RaceTime, raceresult, RacePosition, AthleteID, RaceID) VALUES ('$d', '$t', '12.3542', 1,1,1);";
    $dbInsert = pg_query($pgCon, $query);
 
    $d = date("Y/m/d h:i");
    $t = date("h:i:s");
    $query = "INSERT INTO RaceResult (RaceDate, RaceTime, raceresult, RacePosition, AthleteID, RaceID) VALUES ('$d', '$t', '15.4125', 2,2,1);";
    $dbInsert = pg_query($pgCon, $query);

    $d = date("Y/m/d h:i");
    $t = date("h:i:s");
    $query = "INSERT INTO RaceResult (RaceDate, RaceTime, raceresult, RacePosition, AthleteID, RaceID) VALUES ('$d', '$t', '15.4125', 2,1,2);";
    $dbInsert = pg_query($pgCon, $query);
   

    $d = date("Y/m/d h:i");
    $t = date("h:i:s");
    $query = "INSERT INTO RaceResult (RaceDate, RaceTime, raceresult, RacePosition, AthleteID, RaceID) VALUES ('$d', '$t', '15.4125', 1,1,2);";
    $dbInsert = pg_query($pgCon, $query);

    $d = date("Y/m/d h:i");
    $t = date("h:i:s");
    $query = "INSERT INTO RaceResult (RaceDate, RaceTime, raceresult, RacePosition, AthleteID, RaceID) VALUES ('$d', '$t', '15.4125', 2,1,3);";
    $dbInsert = pg_query($pgCon, $query);

    $d = date("Y/m/d h:i");
    $t = date("h:i:s");
    $query = "INSERT INTO RaceResult (RaceDate, RaceTime, raceresult, RacePosition, AthleteID, RaceID) VALUES ('$d', '$t', '15.4125', 1,1,3);";
    $dbInsert = pg_query($pgCon, $query);
   
   
?>
