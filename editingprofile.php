<?php

include "include.php";

$custID=$_GET['custid'];
$fname=$_POST['firstname'];
$sname=$_POST['lastname'];

$email=$_POST['email'];
$number=$_POST['mobilenumber'];

$sel=mysqli_query($connect,"UPDATE user SET Fname='$fname' ,Lname='$sname',Email='$email',mobilenumber='$number'  WHERE UserID='$custID'" )or die(mysqli_error($connect));
if($sel)
{
header("location:../OBRS/profile.php");
}



?>
