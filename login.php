<?php
include "include.php";

/*if($_POST)
	echo "exists";*/
	$pass=$_POST["Password"];
//$sel="SELECT * FROM `user` where Username='".$_POST["Username"]."' and Password='".$_POST["Password"]."'";
$sel="SELECT * FROM `user` where Username='".$_POST["Username"]."' and Password='$pass'";

$result=mysqli_query($connect,$sel) or die(mysqli_error($connect));
$row=mysqli_fetch_array($result);
if($row['usertype'] == 'admin')
{
session_start();
	$_SESSION['admin']=$_POST["Username"];
echo '<script language="javascript">document.location.href="admin_home1.php"</script>';
}
else if($row['usertype'] == 'customer')
{
session_start();
	$_SESSION['user']=$_POST["Username"];
echo '<script language="javascript">document.location.href="generic.php"</script>';
}
else
{
session_start();
	$_SESSION['error'] = 'Invalid username or password';
  	header('Location: index4.php');
}
/**if(mysqli_num_rows($result) == 0 || mysqli_num_rows($result2) == 0 )
{
	session_start();
	$_SESSION['error'] = 'Invalid username or password';
  	header('Location: index4.php');
	//echo "<h3>Invalid username and password combination<br>Go to <a href='home.php'>homepage</a></h3>";
}

//else
	//echo "welcome"
else if($pass="admin $$ 
{
	//echo "welcome";
	session_start();
	$_SESSION['user']=$_POST["Username"];
echo '<script language="javascript">document.location.href="generic.php"</script>';
}
if(mysqli_num_rows($result) == 1)
{
	session_start();
	$_SESSION['user']=$_POST["Username"];
echo '<script language="javascript">document.location.href="generic.php"</script>';
}

else if(mysqli_num_rows($result2) == 1)
{
session_start();
	$_SESSION['admin']=$_POST["Username"];
echo '<script language="javascript">document.location.href="admin_home1.php"</script>';
}
else{
session_start();
	$_SESSION['error'] = 'Invalid username or password';
  	header('Location: index4.php');
	//echo "<h3>Invalid username and password combination<br>Go to <a href='home.php'>homepage</a></h3>";
}**/


?>
