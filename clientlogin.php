
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
$log = "SELECT Name, Password FROM Users WHERE Name='$Name' AND Title = 'Customer';";
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


$sql="select * from Cars";
$records=$mysql->query($sql);
?>

<html>
<head>
<title>Client Page</title>
</head>
<h1>Available Cars & Sales Reps Information</h1>
<body>

<table width="600" border="1" cellpadding="1" cellspacing="1">
<tr>

<th>CarID</th>
<th>CarModel</th>
<th>Year</th>
<th>MilesUsed</th>
<th>Availability</th>
<th>Price</th>
<th>SalesRep</th>
<th>Age</th>
<tr>

<?php

while($car = $records->fetch_assoc())
{
echo "<tr>";
echo "<td>".$car['CarID']."</td>";
echo "<td>".$car['CarModel']."</td>";
echo "<td>".$car['Year']."</td>";
echo "<td>".$car['MilesUsed']."</td>";
echo "<td>".$car['Availability']."</td>";
echo "<td>".$car['Price']."</td>";
echo "<td>".$car['SalesRep']."</td>";
echo "<td>".$car['Age']."</td>";
echo "</tr>";

}


?>
</table>
</body>
</html>






<html>
<head>
</head>
<h1>Schedule a visit here:</h1>

<body>
<form action="clientlogin.php" method="post">
CustomerName: <input type="varchar(20)" name="CustomerName"><br />
ScheduleDate: <input type="date" name="ScheduleDate"><br />
ScheduleTime: <input type="time" name="ScheduleTime"><br />
CarID: <input type="int(10)" name="CarID"><br />
<input type="submit" name="submit">
</form>

<?php

if ($_POST['CustomerName']){
$mysql = new mysqli("localhost","root","Crystalzxcxx12","IT635");
if ($mysql->errno != 0)
{
        echo "error connecting to database: ".$mysql->error.PHP_EOL;
        exit(0);
}
$CustomerName = $_POST['CustomerName'];
$ScheduleDate = $_POST['ScheduleDate'];
$ScheduleTime = $_POST['ScheduleTime'];
$CarID        = $_POST['CarID'];


//$sql1 = "insert into Appointments (AppointID, CustomerName, ScheduleDate, ScheduleTime, CarID) Values ('$AppointID','$CustomerName','$ScheduleDate','$ScheduleTime','$CarID';)";

$sql1 = "insert into Appointments (CustomerName, ScheduleDate, ScheduleTime, CarID) Values ('$CustomerName','$ScheduleDate','$ScheduleTime','$CarID');";


 if(mysqli_query($mysql, $sql1))
 	{
	echo "Please insert information";
 	}
 	else
 	{
 	echo "Can't Insert Information>";
 	}


//$response1= $mysql->query($sql1);



//mysql_close($mysql);


}
?>

<form action="logout.php">
<button type="submit">Logout </button>
</form>




</body>
</html>











