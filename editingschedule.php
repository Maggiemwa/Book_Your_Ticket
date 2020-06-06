<?php

include "include.php";

$schID=$_GET['sch_id'];
$name=$_POST['busname'];
$date=$_POST['date'];
$route=$_POST['route'];
$dptime=$_POST['dptime'];
$arrtime=$_POST['arrtime'];
$fare=$_POST['fare'];

$sel=mysqli_query($connect,"UPDATE bus_schedule SET busname='$name' ,departuredate='$date',route='$route',departuretime='$dptime',arrivaltime='$arrtime',Fare='$fare' WHERE id='$schID'" )or die(mysqli_error($connect));
if($sel)
{
header("location:../OBRS/manage_schedule.php");
}



?>
