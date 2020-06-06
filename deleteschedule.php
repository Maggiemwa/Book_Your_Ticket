<?php

include "include.php";

$schID=$_GET['schid'];

$sel=mysqli_query($connect,"DELETE FROM bus_schedule WHERE id='$schID'" )or die(mysqli_error($connect));
if($sel)
{
header("location:../OBRS/manage_schedule.php");
}



?>
