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




$seluserr="SELECT COUNT(*) as numseatsbooked FROM `bus_bookings`WHERE `scheduleid`='".$scheduleid."'";
$strr= mysqli_query($connect,$seluserr) or die(mysqli_error($connect));
$rowz= mysqli_fetch_assoc($strr);
$number=$rowz['numseatsbooked'];
$seluserb="SELECT * FROM `bus_schedule` where id='".$scheduleid."'";
$strb= mysqli_query($connect,$seluserb) or die(mysqli_error($connect));
$rowsb= mysqli_fetch_array($strb);
$totalseats=$rowsb['Totalseats'];
$seatsbooked=$rowsb['seatsbooked'];
$bookedseats=$seatsbooked+1;
$avseats=$totalseats-$bookedseats;

$ins=mysqli_query($connect,"INSERT INTO `bus_bookings`(`scheduleid`,`Username`,`seatnumber`)VALUES('".$scheduleid."','".$user."','".$avseats."')")or die(mysqli_error($connect));
if($ins)
{
$inssch=mysqli_query($connect,"UPDATE bus_schedule SET seatsbooked='".$bookedseats."',seatsleft='".$avseats."' WHERE id='".$scheduleid."'" )or die(mysqli_error($connect));
if($inssch)
{
	header("location:../OBRS/history1.php");
	}
}


?>