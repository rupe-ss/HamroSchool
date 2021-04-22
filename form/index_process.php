<!DOCTYPE html>



<?php

require_once("config.php");

if (!isset($_SESSION["login_sess"])) 

{

	header("location:login.php");

}

$email=$_SESSION["login_email"];

$findresult = mysqli_query($dbc, "SELECT * FROM users WHERE email='$email' ");

if ($res = mysqli_fetch_array($findresult)) 

{

	$username = $res['username'];

	$usertype = $res['usertype'];

	

}





?>

<html>

<head>

	<title>Home - Hamro School</title>

	

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

	<link rel="stylesheet" type="text/css" href="css/style.css">

	<link rel="stylesheet" type="text/css" href="css/fontawesome.css">

	

	<script src="js/jquery.min.js"></script>

	<script src="js/bootstrap.min.js"></script>

</head>

<body>



	<!--starting of top-->

	<div class="container">

		<div class="row top">

			<div class=" col-lg-6 col-md-8 left">

				<li>+911 68686868</li>

				<li>hamroschool@gmail.com</li>

			</div>



			<div class=" col-lg-2 col-md-1 middle">

				

			</div>



			<div class=" col-lg-4  right">

				

				<li> <a href="logout.php"> <span style="color:red; float: right; ">Logout </span> </a> </li>

				<li>Welcome! <span style="color:#33CC00; "><?php echo $username; ?> (<?php echo $usertype;?>)</span></p></li>



					

				

				

			</div>

		</div>



	</div>

	<!--closing of top-->



	<!--starting of nav-->

	<div class="container">

		<div class="row menu">

			<nav class="navbar fixed navbar-expand-lg navbar-light bg-light">

			  <div class="container">

			    <a class="navbar-brand" href="index.php"><h3 style="color:red;">Hamro <span class="h1_school" style="color: blue;">School</span></h1></a>

			    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">

			      <span class="navbar-toggler-icon"></span>

			    </button>

			    <div class="collapse navbar-collapse" id="navbarNavDropdown">

			      <ul class="navbar-nav">

			        <li class="nav-item">

			          <a class="nav-link active" aria-current="page" href="index.php">Home</a>

			        </li>

			        <li class="nav-item">

			          <a class="nav-link" href="#">About</a>

			        </li>

			        

			        <li class="nav-item dropdown">

			          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">

			            Courses

			          </a>

			          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

			            <li><a class="dropdown-item" href="#">PHP & MYSQL</a></li>

			            <li><a class="dropdown-item" href="#">Java Programming</a></li>

			            <li><a class="dropdown-item" href="#">Python</a></li>

			          </ul>

			        </li>



			        <li class="nav-item">

			          <a class="nav-link" href="#">Blog</a>

			        </li>



			        <li class="nav-item">

			          <a class="nav-link" href="#">Events</a>

			        </li>



			        <li class="nav-item">

			          <a class="nav-link" href="#">Our Teachers</a>

			        </li>



			        <li class="nav-item dropdown">

			          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">

			            Assignment

			          </a>

			          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

			            <li><a class="dropdown-item" href="upload_t.php">Teacher</a></li>

			            <li><a class="dropdown-item" href="upload_s.php">Student</a></li>

			            

			          </ul>



			          <li class="nav-item">

			          <a class="nav-link" href="upload.php">Upload</a>

			        </li>

			        </li>

			      </ul>

			    </div>

			  </div>

			</nav>

		</div>

	</div>



	<!--closing of nav-->



	<!--starting of banner-->

	<?php

$sliderquery= "select * from dynamicslider";
$query=mysqli_query($dbc,$sliderquery);	

		$rowcount=mysqli_num_rows($query);
		

?>
	<div class="container banner_out">
		<div class="row banner">

			<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
				  <ol class="carousel-indicators">
				    <li data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"></li>
				    <li data-bs-target="#carouselExampleDark" data-bs-slide-to="1"></li>
				    <li data-bs-target="#carouselExampleDark" data-bs-slide-to="2"></li>
				  </ol>
				  <div class="carousel-inner">
				  	<?php
				  	for ($i=1; $i<=$rowcount; $i++)
				  	{
				  		$row=mysqli_fetch_array($query);
				  	?>

				  	<?php
				  	if($i==1)
				  	{
				  	?>
				  	<div class="carousel-item active" data-bs-interval="10000">
				      <img src="slider/<?php echo $row["image"]?>" class="d-block w-100" alt="...">
				      <div class="carousel-caption d-none d-md-block">
				        <h5>First slide label</h5>
				        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
				      </div>
				    </div>	
				    <?php
				  	}else
				  	{
				  		?>
				  		<div class="carousel-item" data-bs-interval="2000">
				      <img src="slider/<?php echo $row["image"]?>" class="d-block w-100" alt="...">
				      
				    </div>
				    <?php
				  	}
				  	?>
				    
				    <?php
						}
					?>

				    
				  <a class="carousel-control-prev" href="#carouselExampleDark" role="button" data-bs-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="visually-hidden">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselExampleDark" role="button" data-bs-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="visually-hidden">Next</span>
				  </a>
				</div>
		</div>
</div>

	<!--closing of banner-->



<!--starting welcome div-->

	<div class="container welcome">

		<div class="row ">

			<div class="col-md-8 welcome-left">

				<h2>Welcome</h2>

				<p>HamroSchool is a school management web application that is designed to be used in colleges and universities by students, professors, and administration staff. HamroSchool was created in response to the COVID-19 pandemic after witnessing how teaching methods drastically changed. After the switch from traditional classroom lectures to online, it became difficult for students and staff to be able to make the drastic shift since there was little to no online portal(s) established to handle so many people at once. <br>
	Some of the issues that affected students and staff were technical difficulties with using other school management web apps or creating a web app on a rocky foundation with a rushed deadline. With the sudden change in teaching, some schools opted to use school web apps with little to no understanding since they were readily available. Problems would later emerge from these systems being hard to use because of a poor user interface, being overloaded since they were not designed to handle a lot of traffic at once, or being breached due to poor security. <br>
	HamroSchool is designed with the intent to be user friendly for students and staff as well as allowing administration staff perform school functions with ease. A few of the functionalities that HamroSchool will have are:<br>
<li> Registering for courses </li>
<li>Uploading assignments for courses </li>
<li>Sending notifications to students/staff about course work </li>
<li>Updating students&#39; grades </li>
With these functionalities, it is HamroSchool&#39;s goal to make school management more efficient and convenient.
</p><br>

			<button type="button" class="btn btn-danger" href=""> Read More</button>

			</div>



			<div class="col-md-4 welcome-right">

				<img src="images/b.jpg">

			</div>

		</div>

		<hr>

	</div>



	<!-- closing welcome div-->	



	



	<!--starting of features-->



	<div class="container">

		<div class="row feature">

			<h2>Features</h2>

			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod

			tempor incididunt ut labore et dolore magna aliqua. </p>

			<hr>

			<div class="col-md-3 col-sm-6 one">



				<img src="images/university.png"><br>

				<h4>Join Our University</h4>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod

				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,

				quis nostrud exercitation. </P>



			</div>



			<div class="col-md-3 col-sm-6 two">

				<img src="images/student.png"><br>

				<h4>International Students</h4>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod

				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,

				quis nostrud exercitation. </P>

			</div>



			<div class="col-md-3 col-sm-6  three">

				<img src="images/world.png"><br>

				<h4>Progressive Programs</h4>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod

				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,

				quis nostrud exercitation. </P>

			</div>



			<div class="col-md-3 col-sm-6  four">

				<img src="images/browser.png"><br>

				<h4>Online Education</h4>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod

				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,

				quis nostrud exercitation. </P>

			</div>

		</div>

	</div>



	<!--closing of features-->



	<!--starting of footer-->

	<div class="container">

		<div class="row footer">

			<div class="col-md-3 footer_first">

				<h3>About</h3>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod

				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,

				quis nostrud exercitation. </P>

			</div>



			<div class="col-md-3 footer_second">

				<h3>Recent News</h3>

				<li style="padding: 5px;"><a href=" ">About College</a></li>

				<li style=" padding: 5px; margin-top: 5px; "><a href="">New Student Admition</a></li>

				<li style=" padding: 5px; margin-top: 5px; "><a href="">Winter camp</a></li>

			</div>



			<div class="col-md-3 footer_third">

				<h3>Contact Us</h3>

				<p>Address: New Baneshwor, Nepal</p>

				<p>Contact: 4444444/4545454</p>

				<p>Email: info@hamroschool. com</p>

			</div>



			<div class="col-md-3 footer_fourth">

				<h3>Map</h3>

				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14130.924577445074!2d85.33106357370615!3d27.694703324260402!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb199a06c2eaf9%3A0xc5670a9173e161de!2z4KSo4KSv4KS-4KSBIOCkrOCkvuCkqOClh-CktuCljeCkteCksCwg4KSV4KS-4KSg4KSu4KS-4KSh4KWM4KSBIDQ0NjAw!5e0!3m2!1sne!2snp!4v1613049446569!5m2!1sne!2snp" width="100%" height="auto"  frameborder="0" style="border:3px solid white;padding:5px;"  allowfullscreen="" aria-hidden="false" tabindex="0" ></iframe>



			</div>

		</div>

	</div>

		<!--closing of footer-->

		<div class="container">

			<div class="row last-row">

				<h3>Follow Us </h3>

				<ul>

				<li><a href=" "><img src="images/fb.png"></a></li>

				<li><a href=""><img src="images/twitter.png"></a></li>

				<li><a href=" "><img src="images/yt.png"></a></li>

			</ul>

				

			</div>

		</div>



</body>

</html>