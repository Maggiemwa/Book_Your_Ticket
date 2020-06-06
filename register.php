<?php
include "include.php";

$pass=$_POST["Password"];
//$ins="INSERT INTO `user`(`Fname`,`Lname`,`Email`,`Username`,`Password`)VALUES('".$_POST['Fname']."','".$_POST['Lname']."','".$_POST['Email']."','".$_POST['Username']."','".$_POST['Password']."')";
$sel="SELECT * FROM `user` where Email='".$_POST["Email"]."'";

$res=mysqli_query($connect,$sel) or die(mysqli_error($connect));
if(mysqli_num_rows($res) == 0)
{
	$mail=$_POST["Email"];
if(empty($mail)==false)
{

$ins="INSERT INTO `user`(`Fname`,`Lname`,`Email`,`Username`,`Password`,`mobilenumber`,`usertype`)VALUES('".$_POST['Fname']."','".$_POST['Lname']."','".$_POST['Email']."','".$_POST['Username']."','$pass','".$_POST['number']."','customer')";

$ins2=mysqli_query($connect,$ins) or die(mysqli_error($connect));

//echo "registered succesfully";
if($ins2)
{
session_start();
	//$_SESSION['user']=$_POST["Username"];
	$_SESSION['reg'] = 'Registered succesfully...Login now!!';
	header('location: index4.php');
	}
}
	else
{
session_start();
	$_SESSION['reg_error'] = 'Invalid email!!';
	header('location: index4.php');
}
//echo '<script language="javascript">document.location.href="web_home.php"</script>';
}
else
{
 mysqli_error($connect);
}
?>