<?php

include "include.php";

$BusID=$_GET['Bus_id'];
$name=$_POST['busname'];
$type=$_POST['type'];
$seats=$_POST['seats'];
$make=$_POST['make'];
$year=$_POST['year'];
$btype=$_POST['bustype'];
$sel=mysqli_query($connect,"UPDATE bus_details SET busname='$name' ,type='$type',numberofseats='$seats',make='$make',year='$year',bustype='$btype' WHERE busID='$BusID'" )or die(mysqli_error($connect));
if($sel)
{
header("location:../OBRS/manage_buses.php");
}



?>
