<?php

include "include.php";

$BusID=$_GET['Bus_id'];

$sel=mysqli_query($connect,"DELETE FROM bus_details WHERE busID='$BusID'" )or die(mysqli_error($connect));
if($sel)
{
header("location:../OBRS/manage_buses.php");
}



?>
