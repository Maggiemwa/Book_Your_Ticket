<?php

include "include.php";
$scheduleid=$_GET['schid'];
$user=$_GET['userid'];
$seluser="SELECT * FROM `user` where Username='".$user."'";
$str= mysqli_query($connect,$seluser) or die(mysqli_error($connect));
$rows= mysqli_fetch_array($str);
$fname=$rows['Fname'];
$sname=$rows['Lname'];

$customername=$fname." ". $sname;
$ins=mysqli_query($connect,"INSERT INTO `bus_bookings`(`scheduleid`,`Username`)VALUES('".$scheduleid."','".$user."')")or die(mysqli_error($connect));


if($ins)
{
	header("location:../OBRS/history1.php");
}


?>