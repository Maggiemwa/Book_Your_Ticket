<?php

include "include.php";

$routeID=$_GET['route_id'];

$sel=mysqli_query($connect,"DELETE FROM route WHERE routeID='$routeID'" )or die(mysqli_error($connect));
if($sel)
{
header("location:../OBRS/available_routes.php");
}



?>
