
<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Edit bus detais</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />

		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
		<!--<style >
		body {
				background: #7f9b4e url(images1/bus3.jpg) no-repeat center top;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				background-size: cover;
			}
		</style>-->
		<style type="text/css">

input    {
width:375px;
display:block;
border: 1px solid #999;
height: 25px;
-webkit-box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
-moz-box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
}
input.button {
width:100px;
position:absolute;
right:20px;
bottom:20px;
background:#09C;
color:#fff;
font-family: Tahoma, Geneva, sans-serif;
height:30px;
-webkit-border-radius: 15px;
-moz-border-radius: 15px;
border-radius: 15px;
border: 1p solid #999;
}
input.button:hover {
background:#fff;
color:#09C;
}
form    {
background: -webkit-gradient(linear, bottom, left 175px, from(#CCCCCC), to(#EEEEEE));
background: -moz-linear-gradient(bottom, #CCCCCC, #EEEEEE 175px);
margin:auto;
position:relative;
width:550px;
height:auto;
font-family: Tahoma, Geneva, sans-serif;
font-size: 14px;
font-style: italic;
line-height: 24px;
font-weight: bold;
color: #000000;
text-decoration: none;
-webkit-border-radius: 10px;
-moz-border-radius: 10px;
border-radius: 10px;
padding:10px;
border: 1px solid #999;
border: inset 1px solid #333;
-webkit-box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
-moz-box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
}

input::-webkit-input-placeholder {
  color: 	#f00;
}
textarea#feedback {
width:375px;
height:150px;
}
textarea.message {
display:block;
}
h2{
	color:red;
}
h4
{
	color:white;
}
td{
	color:white;
}
		</style>
	</head>
	<body style="background:-webkit-linear-gradient(left top,BurlyWood,Chocolate,Darkkhaki,BlanchedAlmond,BurlyWood); background: linear-gradient(to bottom right,BurlyWood,CadetBlue,Darkkhaki,BlanchedAlmond,BurlyWood);">

		<!-- Header -->
			<header id="header">
				<h1><a href=""><?php //echo $_SESSION['admin']?>ADMIN</a></h1>
				<nav id="nav">
					<ul>
							<li><a href="admin_home1.php">Home</a></li>
					<li><a href="manage_buses.php">Bus Management</a></li>
					<li><a href="available_routes.php">Route Details</a></li>
					<li><a href="manage_schedule.php">Schedule management</a></li>

						<li><a href="admin_logout.php">Logout</a></li>
					</ul>
				</nav>
			</header>
			<div class="container">
			<?php
		session_start();

			if(isset($_SESSION['del']))
		{
			echo '<p class="message"> <font size="4" color="MediumMagenta"><center> <i>';
			echo $_SESSION['del'];
			echo $_SESSION['refund'];
			echo $_SESSION['mesg'];
			echo "</i></center></font></p>";
			unset($_SESSION['del']);
		}
	/*	echo '<h3 style="text-align:left;"> <font color="red"> <i> Hello ';
		echo $_SESSION['user'];
		echo "</i> </font>";
		echo '</h3>';*/
		?>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<!--<header class="major">
						<center><i><font size="35"><strong>Hello <em><?php //echo $_SESSION['admin']?></em></font></i></strong></center>
						<br>
					</header>-->

				<!--	<a href="#" class="image fit"><img src="images1/bus3.jpg" alt="" /></a>-->
					</div>
<center>	<h2>Edit bus details</h2> </center>


<?php
include "include.php";

$BusID=$_GET['Bus_id'];
$sel="SELECT * FROM bus_details WHERE busID='$BusID'" ;
$str= mysqli_query($connect,$sel);
$rows= mysqli_fetch_array($str);
$busname=$rows['busname'];
$type=$rows['type'];
$seats=$rows['numberofseats'];
$make=$rows['make'];
$year=$rows['year'];
$btype=$rows['bustype'];
echo '<form action="editingbus.php?Bus_id='.$BusID.'" method="POST">';
echo"Name";
 echo '<input class="form-control"  type="text" value="'.$busname.'" name="busname" >
 <br> Type';
 echo '<input class="form-control" type="text" value="'.$type.'" name="type" >
 <br> Number of seats';
 echo '<input class="form-control" type="text" value="'.$seats.'" name="seats" ><br>
 <br> Manufacturer';
 echo '<input class="form-control" type="text" value="'.$make.'" name="make" ><br>
 <br>Year of make';
 echo '<input class="form-control" type="text" value="'.$year.'" name="year" ><br>
 <br> Bus Type';
 echo '<input class="form-control" type="text" value="'.$btype.'" name="bustype" ><br>';
 echo ' <center><input class="btn btn-primary" type="submit" value="Edit"></center>';
echo '</form>';
echo '<br>';
?>
		</section>

<br>

</div>
		<!-- Footer --><footer id="footer">
				<div class="container">
					<div class="row">
						<section class="4u 6u(medium) 12u$(small)">
							<h3>BoookMyTicket</h3>
							<ul class="alt">
								<li>Quick Search</li>
								<li>Online Bookings</li>
								<li>Pay Online</li>
								<li>Hassle Free Bus Booking</li>
							</ul>
						</section>
						<section class="4u 6u$(medium) 12u$(small)">
							<h3>Top Bus Routes</h3>
							<ul class="alt">
<li>LILONGWE - BLANTYRE</li>
								<li>LILONGWE - MZUZU</li>
								<li>BLANTYRE - MZUZU</li>
								<li>NSANJE - CHITIPA</li>
							</ul>
						</section>
					<section class="4u$ 12u$(medium) 12u$(small)">
							<h3>Contact Us</h3>
			<!--				<ul class="icons">
								<li><a href="#" class="icon rounded fa-twitter"><span class="label">Twitter</span></a></li>
								<li><a href="#" class="icon rounded fa-facebook"><span class="label">Facebook</span></a></li>
								<li><a href="#" class="icon rounded fa-pinterest"><span class="label">Pinterest</span></a></li>
								<li><a href="#" class="icon rounded fa-google-plus"><span class="label">Google+</span></a></li>
								<li><a href="#" class="icon rounded fa-linkedin"><span class="label">LinkedIn</span></a></li>
							</ul>
					-->		<ul class="tabular">
								<li>
										<h3>Address</h3>
									Blantyre Road<br>

									Lilongwe Road<br>

									Mzuzu Road<br>

								</li>
								<li>
									<h3>Mail</h3>
									<a href="#">sososocoaches@gmail.com</a>
								</li>
								<li>
									<h3>Phone</h3>
									+265  994 193 745
								</li>
							</ul>
						</section>
					</center>
					</div>
					<ul class="copyright">
						<li>&copy; 2018 Sososo coaches. All rights reserved. Brought To You By <a href="www.facebook.com/tressietk/">Margaret Kasonya</a></li>
			<!--			<li>Design: <a href="http://templated.co">TEMPLATED</a></li>
						<li>Images: <a href="http://unsplash.com">Unsplash</a></li>
				-->	</ul>
				</div>
			</footer>
	</body>
</html>
