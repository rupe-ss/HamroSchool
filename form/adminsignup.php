<!DOCTYPE html>
<?php require_once("config.php"); ?>
<html>
<head>
	<title>Admin Signup - Hamro School</title>
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

</head>
<body>

	<div class="container">
	<div class="row">
		<div class="col-md-4">
		</div>

		<div class="col-sm-4 col-md-4">
			<h1 style="color:red; text-align: center;">Hamro <span class="h1_school" style="color: blue;">School Admin</span></h1>
		</div>

		<div class="col-sm-4">
		</div>
	</div>

		<div class="row">
			<?php
			if (isset($_POST['a_signup']))
			{
				extract($_POST);
				if (strlen($fname)<3)
				 {
					$error[]= ' Please enter first name using atlist 3 character';
				}

				if (strlen($fname)>20)
				 {
				 	//max
					$error[]= ' First Name: Max length 20 characters not allowed';

				}

				if (!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/",$fname)){

					$error[] = 'Invalid Entry First Name. Please enter letters without any digits or special symbols like(1,2,3,#,$,%,*,!,~,-)';
				}


				if (strlen($lname)<3)
				 {
					$error[]= ' Please enter last name using atlist 3 character';
				}

				if (strlen($fname)>20)
				 {
				 	//max
					$error[]= ' Last Name: Max length 20 characters not allowed';

				}

				if (!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/",$lname)){

					$error[] = 'Invalid Entry First Name. Please enter letters without any digits or special symbols like(1,2,3,#,$,%,*,!,~,-)';
				}


				if (strlen($username)<3)
				 {
					$error[]= ' Please enter username using atlist 3 character';
				}

				if (strlen($username)>20)
				 {
				 	//max
					$error[]= ' Username: Max length 20 characters not allowed';

				}

				if (!preg_match("/^^[^0-9][a-z0-9]+[_-]?[a-z0-9]*$/",$username)){

					$error[] = 'Invalid Entry For Username. Enter lowercase letters without any space and no numbers at the start - Eg - myusername, okuniqueuser or myusername123';
				}


				if(strlen($email)>50)
				{
					//max
					$error[] = 'Email : Max length 50 character not allowed';

				}

				if ($passwordConfirm =='') {
					$error[] ='Please confirm the password.';

					}
					if ($password !=$passwordConfirm) {
						$error[] = 'Password not match';
					}

					if (strlen($password)<8)
				 {

				 	//min
					$error[]= ' Password must have 8 characters.';
				}

				if (strlen($password)>15)
				 {
				 	//max
					$error[]= ' Password: Max length 20 characters not allowed';

				}

				$sql= "select * from admin where (username='$username' or email='$email');";

				$res=mysqli_query($dbc,$sql);

				if (mysqli_num_rows($res) > 0)
				 {
					$row = mysqli_fetch_assoc($res);
					if ($username==$row['username'])
					 {
						$error[]='Username already exists.';
					}
					if ($email==$row['email'])
					 {
						$error[] = 'Email already exists.';
					}

					
				}



				if (!isset($error)) {
					$date=date('y-m-d');
					$options = array("cost"=>4);
					$password= password_hash($password,PASSWORD_BCRYPT,$options);

					$result = mysqli_query($dbc, "INSERT into admin value('','$fname','$lname','$username','$email','$password','$usertype','$date')");

					if($result)
					{
						$done=2;
					}
					else{
						$error[] = 'Failed: something went wrong';
					}
				}



			}

			?>
			<div class="col-sm-4" style="padding: 10px;">
				<?php
					if (isset($error)) 
					{
						foreach ($error as $error) 
						{
							echo '<p class="errmsg" style="margin: 2px auto;border-radius: 5px;border:1px solid red;background:pink;text-align: left;color: brown;padding: 1px;">&#x26A0;'.$error.'</p>';
						}
					}
				?>
			</div>

		<div class="col-md-4">
			<?php
			if (isset($done))
			 {
				
			?>
			<div class="successmsg"><span style="font-size: 100px;">&#9989;</span><br> You have registered successfully.<br> <a href="loginadmin.php" style="color:#fff;">Login here...</a></div>
		<?php } else { ?>


			<div class="signup_form" style="background:#fff; padding-left: 25px;padding-right: 25px; padding-bottom: 5px;box-shadow: 0px 1px 36px 5px rgba(0,0,0,0.28); border-radius: 5px;margin-top: 20px;">
				
			<form action="" method="POST">
			  <div class="form-group">
			    <label class="label_text">First Name</label>
			    <input type="text" class="form-control" name="fname" value="<?php if(isset($error)) {echo $fname;} ?>" required="">
			    
			  </div>
			  <div class="form-group">
			    <label class="label_text" >Last Name</label>
			    <input type="text" class="form-control" name="lname" value="<?php if(isset($error)) {echo $lname;} ?>" required="" >
			  </div>

			  <div class="form-group">
			    <label class="label_text" >Username</label>
			    <input type="text" class="form-control" name="username" value="<?php if(isset($error)) {echo $username;} ?>" required="" >
			  </div>

			  <div class="form-group">
			    <label class="label_text" >Email</label>
			    <input type="email" class="form-control" name="email" value="<?php if(isset($error)) {echo $email;} ?>" required >
			  </div>

			  <div class="form-group">
			    <label class="label_text" >Password</label>
			    <input type="password" class="form-control" name="password" required="" >
			  </div>

			  <div class="form-group">
			    <label class="label_text" >Confirm Password</label>
			    <input type="password" class="form-control" name="passwordConfirm" required="" >
			  </div>
			  <br>

			  <div class="form-group">
			    <label class="label_text" >User Type</label>
			    <select name="usertype">
			    	<option value="admin" >admin</option>
			    	
			    </select>
			  </div>

			   
			  <br>
			  
			  <button type="submit" class="btn btn-primary btn-group-lg form_btn" name="a_signup">SignUp</button>
			
			
			<p>Have an account? <a href="loginadmin.php">Log in</a></p>	
		<?php } ?> 
			</form>
		</div>
		</div>

		<div class="col-md-4">
		</div>
	</div>
</div>

</body>
</html>