<?php
session_start();

//$argv[0].": begin".PHP_EOL;
$mysql = new mysqli("localhost","root","Crystalzxcxx12","IT635");
if ($mysql->errno != 0)
{
	echo "error connecting to database: ".$mysql->error.PHP_EOL;
	exit(0);
}
if (!$_SESSION['Name']){

$Name=$_POST['Name'];
$Password=$_POST['Password'];
$log = "SELECT Name, Password FROM Users WHERE Name='$Name' AND Title = 'SalesRep';";
$response = $mysql->query($log);
if ($response->num_rows==0)
{
        echo "Wrong Username Or Password: ".$mysql->error.PHP_EOL;
        echo $sql.PHP_EOL;
        header ("Location: ./index.html");
}
else if ($response->num_rows==1)
{

while($result = $response->fetch_assoc())
{      if (password_verify($Password,$result['Password']))
{

       $_SESSION['Name']= $result['Name'];
}
else
{ header ("Location: ./index.html");
}
}
}
}
//"SELECT Name, Password FROM Users WHERE Name='$Name' AND Password = '$Password';";
//$sql = "select * from Cars;";
//$response = $mysql->query($sql);
//if ($mysql->errno != 0)
//{
//	echo "error executing sql: ".$mysql->error.PHP_EOL;
//	echo $sql.PHP_EOL;
//	exit(0);
//}
//while($result = $response->fetch_assoc())
//{
//        var_dump($result);
//        echo PHP_EOL;
//}
//echo $argv[0].": end".PHP_EOL;
?>

<html>
<head>
</head>
<h1>You can schedule a visit by filling out the information below:</h1>

<body>
<form action="adminlogin.php" method="post">
CarModel: <input type="varchar(20)" name="CarModel"><br />
Year: <input type="int(10)" name="Year"><br />
MilesUsed: <input type="int(10)" name="MilesUsed"><br />
Availability: <input type="varchar(20)" name="Availability"><br />
Price: <input type="int(10)" name="Price"><br />
SalesRep: <input type="varchar(20)" name="SalesRep"><br />
Age: <input type="int(10)" name="Age"><br />
<input type="submit" name="submit">
</form>





<?php


if ($_POST['CarModel']){

$mysql1 = new mysqli("localhost","root","Crystalzxcxx12","IT635");
if ($mysql->errno != 0)
{
        echo "error connecting to database: ".$mysql->error.PHP_EOL;
        exit(0);
}
$CarModel = $_POST['CarModel'];
$Year = $_POST['Year'];
$MilesUsed = $_POST['MilesUsed'];
$Availability        = $_POST['Availability'];
$Price = $_POST['Price'];
$SalesRep = $_POST['SalesRep'];
$Age = $_POST['Age'];

$sql1 = "insert into Cars (CarModel, Year, MilesUsed, Availability, Price, SalesRep, Age) Values ('$CarModel',$Year,$MilesUsed,'$Availability',$Price,'$SalesRep',$Age);";


 if(mysqli_query($mysql1, $sql1))
    {
      echo "Please insert information";
        }
        else
        {
      echo "Can't Insert Information";
       }
}
?>





</body>
</html>



<html>
<h1>Please Submit a Sale Below:</h1>



<body>
<form action="adminlogin.php" method="post">
AppointID: <input type="varchar(20)" name="AppointID"><br />
<input type="submit" name="submit">
</form>


<?php


if ($_POST['AppointID']){
$mysql = new mysqli("localhost","root","Crystalzxcxx12","IT635");
if ($mysql->errno != 0)
{
        echo "error connecting to database: ".$mysql->error.PHP_EOL;
        exit(0);
}
$AppointID = $_POST['AppointID'];

$sqly = "insert into Sales (AppointID) Values ($AppointID);";


 if(mysqli_query($mysql, $sqly))
        {
        echo "Please insert information";
        }
        else
        {
        echo "Can't Insert Information";
        }
}
?>

</body>
</html>









<?php


//$argv[0].": begin".PHP_EOL;
$mysql = new mysqli("localhost","root","Crystalzxcxx12","IT635");
if ($mysql->errno != 0)
{
        echo "error connecting to database: ".$mysql->error.PHP_EOL;
        exit(0);
}

$sql="select * from Appointments";
$records=$mysql->query($sql);
?>


<html>
<head>
<title>Admin Page</title>
</head>
<h1>Customer Schedule</h1>
<body>

<table width="600" border="1" cellpadding="1" cellspacing="1">
<tr>

<th>AppointID</th>
<th>CustomerName</th>
<th>ScheduleDate</th>
<th>ScheduleTime</th>
<th>CarID</th>

<tr>

<?php


while($car = $records->fetch_assoc())
{
echo "<tr>";
echo "<td>".$car['AppointID']."</td>";
echo "<td>".$car['CustomerName']."</td>";
echo "<td>".$car['ScheduleDate']."</td>";
echo "<td>".$car['ScheduleTime']."</td>";
echo "<td>".$car['CarID']."</td>";
echo "</tr>";

}


?>
</table>
</body>
</html>





<?php


//$argv[0].": begin".PHP_EOL;
$mysql = new mysqli("localhost","root","Crystalzxcxx12","IT635");
if ($mysql->errno != 0)
{
        echo "error connecting to database: ".$mysql->error.PHP_EOL;
        exit(0);
}

$sql="select Sales.SalesID, Appointments.CustomerName, Appointments.CarID from Sales INNER JOIN Appointments ON Sales.AppointID = Appointments.AppointID";
$records=$mysql->query($sql);

?>



<html>
<head>
</head>
<h1>Past Sales</h1>
<body>

<table width="400" border="1" cellpadding="1" cellspacing="1">
<tr>

<th>SalesID</th>
<th>CustomerName</th>
<th>CarID</th>

<tr>

<?php

while($car = $records->fetch_assoc())
{
echo "<tr>";
echo "<td>".$car['SalesID']."</td>";
echo "<td>".$car['CustomerName']."</td>";
echo "<td>".$car['CarID']."</td>";
echo "</tr>";

}


?>

</table>

<form action="logout.php">
<button type="submit">Logout </button>
</form>




</body>
</html>



