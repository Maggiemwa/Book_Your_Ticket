<?php

include "include.php";
$user=$_GET['userid'];
$seluser="SELECT * FROM `user` where Username='".$user."'";
$str= mysqli_query($connect,$seluser) or die(mysqli_error($connect));
$rows= mysqli_fetch_array($str);
$fname=$rows['Fname'];
$sname=$rows['Lname'];

$customername=$fname." ". $sname;

$bookID=$_GET['bookid'];
$seluserr="SELECT COUNT(*) as numseatsbooked FROM `bus_bookings`WHERE `scheduleid`='".$scheduleid."'";
$strr= mysqli_query($connect,$seluserr) or die(mysqli_error($connect));
$rowz= mysqli_fetch_assoc($strr);
$number=$rowz['numseatsbooked'];

$seluserb="SELECT * FROM `bus_schedule` where scheduleid='".$scheduleid."' and Customername='".$customername."' ";
$strb= mysqli_query($connect,$seluserb) or die(mysqli_error($connect));
$rowsb= mysqli_fetch_array($strb);

$totalseats=$rowsb['Totalseats'];
$seatsbooked=$rowsb['seatsbooked'];
$seatsleft=$rowsb['seatsleft'];
$bookedseats=$seatsbooked-1;
$avseats=$seatsleft+1;

$sel=mysqli_query($connect,"DELETE FROM bus_bookings WHERE bookid='$bookID'" )or die(mysqli_error($connect));
if($sel)
{
$updseats=mysqli_query($connect,"UPDATE bus_schedule SET seatsbooked='$bookedseats', seatsleft='$avseats' WHERE id='$cancschid'")or die(mysqli_error($connect));
if($updseats)
{
header("location:../OBRS/history1.php");
}
}



?>
