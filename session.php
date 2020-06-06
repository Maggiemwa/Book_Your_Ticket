<?php
	//Start session
	session_start();
	
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['user']) ||  ($_SESSION['admin']) ) {
		header("location: index4.php");
		exit();
	}
	
?>