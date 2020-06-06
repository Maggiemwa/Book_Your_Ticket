<?php

include "include.php";
$depttime=$_POST['depttime'];
$arrtime=$_POST['arrivaltime'];
$dtime=date('H:i ', strtotime($depttime));
$artime=date('H:i ', strtotime($arrtime));
$busname=$_POST['bus'];
$subname=substr($busname,0,8);
$seluser="SELECT * FROM bus_details where busname='".$subname."' ";
$str= mysqli_query($connect,$seluser) or die(mysqli_error($connect));
$rows= mysqli_fetch_array($str);
$seats=$rows['numberofseats'];
$ins=mysqli_query($connect,"INSERT INTO `bus_schedule`(`busname`,`route`,`departuredate`,`departuretime`,`arrivaltime`,`Fare`,`Totalseats`)VALUES('".$_POST['bus']."','".$_POST['route']."','".$_POST['deptdate']."','".$dtime."','".$artime."','".$_POST['Fare']."','".$seats."')")or die(mysqli_error($connect));

if($ins)
	{
	header("location:../OBRS/manage_schedule.php");
}


?>