<?php

include "include.php";

$ins=mysqli_query($connect,"INSERT INTO `bus_details`(`busname`,`type`,`numberofseats`,`make`,`year`,`bustype`)VALUES('".$_POST['Name']."','".$_POST['Type']."','".$_POST['Seats']."','".$_POST['manufacturer']."','".$_POST['yearmake']."','".$_POST['bustype']."')")or die(mysqli_error($connect));


if($ins)
	{
	header("location:../OBRS/manage_buses.php");
}


?>