<?php

session_start();

//$argv[0].": begin".PHP_EOL;
$mysql = new mysqli("localhost","root","Crystalzxcxx12","IT635");
if ($mysql->errno != 0)
{
        echo "error connecting to database: ".$mysql->error.PHP_EOL;
        exit(0);
}
$CarID=$_POST["CarID"];
$CarModel=$_POST["CarModel"];
$Year=$_POST["Year"];
$MilesUsed=$_POST["MilesUsed"];
$Availability=$_POST["Availability"];
$Price=$_POST["Price"];
$SalesRep=$_POST["SalesRep"];
$Age=$_POST["Age"];

$sql = "Insert into Cars (CarID, CarModel, Year, MilesUsed, Availability, Price, SalesRep, Age) Values ($CarID, $CarModel, $Year, $MilesUsed, $Availability, $Price, $SalesRep, $Age);";
$response = $mysql->query($sql);
?>



