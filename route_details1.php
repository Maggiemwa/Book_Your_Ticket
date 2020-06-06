<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Bus_schedule</title>
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
height:450px;
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
				<h1><a href="">SOSOSO COACHES</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="generic.php">Home</a></li>
					<li><a href="viewall.php">View Buses</a></li>
						<li><a href="history1.php">Booking History</a></li>
						<li><a href="profile.php">View Profile</a></li>
					<!--	<li><a href="update.php">Update Profile</a></li>	-->
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</nav>
			</header>
			<div class="container">
			<?php
		session_start();

	/*	echo '<h3 style="text-align:left;"> <font color="red"> <i> Hello ';
		echo $_SESSION['user'];
		echo "</i> </font>";
		echo '</h3>';*/
		?>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<center><i><font size="35"><strong>Hello <em><?php echo $_SESSION['user']?></em></font></i></strong></center>
						<br>
						<h3>Welcome to SOSOSO Bus Ticket Reservation System</h3>
					</header>

			</section>


				<!--	<a href="#" class="image fit"><img src="images1/bus3.jpg" alt="" /></a>-->
					</div>

<?php
include "include.php";
//$req=$_POST["Seats"];
//$Bus_id;
$route=$_POST["route"];
$date=$_POST["Date"];
$sel="SELECT * FROM `bus_schedule` where route='".$route."' and departuredate='".$date."'" ;
$str= mysqli_query($connect,$sel) or die(mysqli_error($connect));
$rows= mysqli_num_rows($str) ;
if($rows==0)
{
//	header('Refresh:5; url=generic.php');

	echo '<h3 style= "text-align:center;"> <font color="red">No Buses scheduled for '; echo $route; echo" on ";  echo $date; echo '</font></h3>';
	echo "<br>";
//	echo '<p style= "text-align:center">Redirecting to the home page in 5 seconds</p>';
}
else
{

	echo '<h3 style= "text-align:center;"> <font color="red"><center>Available Buses </center></font></h3>';
echo '<table align="center" border=1 >
<tr>
<th>Bus name</th>
<th> Departure date </th>
<th>Route</th>
<th> Departure Time </th>
<th> Estimated Arrival time</th>

<th>Book</th>
</tr>';
while($row=mysqli_fetch_array($str))
{
	/**$Date= $row['Date'];
	$Fare= $row['Total_fare'];
	$id= $row['Bus_id'];
	$req=$row['Seats_no'];
	$book_id=$row['Booking_id'];**/
	$schid=$row['id'];
	$name= $row['busname'];
	$date= $row['departuredate'];
	$route= $row['route'];
	$dtime=$row['departuretime'];
	$atime=$row['arrivaltime'];
	echo "<tr>";

	echo "<td>".$name."</td>";
	echo "<td>".$date."</td>";
	echo "<td>".$route."</td>";
	echo "<td>".$atime."</td>";
	echo "<td>".$dtime."</td>";

//	echo "<td>";
//	echo '<a href="cancel.php?Date='.$Date.' & Fare='.$Fare.'& id='.$id.'& req='.$req.'">Cancel Now</a>';
//	echo "</td>";

	//echo "<td>";
	//echo '<a href="editbus.php? schid='.$schid.'" class="button small">Edit</a>';
	//echo "</td>";
	echo "<td>";
	$usern=$_SESSION['user'];
	echo '<a href="book_bus.php?schid='.$schid.' & userid='.$_SESSION['user'].'" class="button small">Book</a>';
	echo "</td>";
	echo "</tr>";
}
echo "</table>";
}
?>
<br>

</div>
		<!-- Footer --><footer id="footer">
				<div class="container">
					<div class="row">
						<section class="4u 6u(medium) 12u$(small)">
							<h3>BoookMyTicket</h3>
							<ul class="alt">
								<li>Quick Search</li>
								<li>Online Booking</li>
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
