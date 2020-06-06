<?php
include "include.php";

$ins="INSERT INTO `bus`(`Name`,`Origin`,`Destination`,`Seats`,`Arrival_time`,`Departure_time`,`Date`,`Fare`)VALUES('".$_POST['Name']."','".$_POST['Origin']."','".$_POST['Destination']."','".$_POST['Seats']."','".$_POST['Arrival_time']."','".$_POST['Departure_time']."','".$_POST['Date']."','".$_POST['Fare']."')";

mysqli_query($connect,$ins) or die(mysqli_error($connect));

//echo "registered succesfully";
session_start();
	//$_SESSION['user']=$_POST["Username"];
//	if($ins==1)
	{

	$_SESSION['updt'] = 'Added succesfully..';
	header('location: admin_home1.php');
}
//else
{
//	echo ":failed";
}
//echo '<script language="javascript">document.location.href="web_home.php"</script>';
?>