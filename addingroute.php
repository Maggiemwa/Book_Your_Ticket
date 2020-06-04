<?php

include "include.php";
$dept=$_POST['departure'];
$dest=$_POST['destination'];
$to= "to";
$route=$dept." ". $to." " .$dest;
$ins=mysqli_query($connect,"INSERT INTO route (routename)VALUES('".$route."')")or die(mysqli_error($connect));


if($ins)
	{
	header("location:../OBRS/available_routes.php");
}


?>