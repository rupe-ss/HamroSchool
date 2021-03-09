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
	$fname = $res['fname'];
	$lname = $res['lname'];
	$email = $res['email'];
	$usertype=$res['usertype'];
}


?>
<html>
<head>
	<title>My Account - Hamro School</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-sm-3">
			</div>

			<div class="col-sm-6">
				<div class="login_form">
					<h1 style="color:red; text-align: center;">Hamro <span class="h1_school" style="color: blue; text-align: center;">School</span></h1> <br>
					<p> <a href="logout.php"> <span style="color:red; float: right; ">Logout </span> </a></p>

					<p>Welcome! <span style="color:#33CC00; "><?php echo $username; ?></span></p>

					<table class="table">
						<tr>
						<th>First Name</th>
						<td><?php echo $fname; ?></td>
						</tr>

						<tr>
						<th>Last Name </th>
						<td> <?php echo $lname; ?></td>
						</tr>
						<tr>
						<th>Username</th>
						<td> <?php echo $username; ?></td>
						</tr>
						<tr>
							<th>Email</th>
							<td><?php echo $email; ?></td>
						</tr>

						<tr>
							<th>Email</th>
							<td><?php echo $usertype; ?></td>
						</tr>



						

					</table>
				</div>
			</div>

				<div class="col-sm-3">
				</div>
			


		</div>
	</div>

</body>
</html>