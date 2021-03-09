<!DOCTYPE html>
<html>
<head>
	<title>Login - Hamro School</title>
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">
	<div class="row signup_frm">
		<div class="col-md-4">
		</div>

		<div class="col-md-4">
			<div class="login_form">
				<h1 style="color:red;">Hamro <span class="h1_school" style="color: blue;">School</span></h1>

				<?php
					if(isset($_GET['loginerror']))
					 {
						$loginerror=$_GET['loginerror'];
					}

					if(!empty($loginerror))
						{
							echo '<p class="errmsg" style="margin: 2px auto;border-radius: 5px;border:1px solid red;background:pink;text-align: left;color: brown;padding: 1px;"> Invalid login credentials, Please try again. </p>';
					
				}
				?>

				
			<form action="login_process.php" method="POST">
			  <div class="form-group">
			    <label class="label_text">User Name or Email</label>
			    <input type="text" name="login_var" value="<?php if(!empty($loginerror)){echo $loginerror; } ?>" class="form-control"  >
			    
			  </div>
			  <div class="form-group">
			    <label class="label_text" >Password</label>
			    <input type="password" name="password" class="form-control" >
			  </div>
			  <br>

			  <!--  <div class="form-group">
			    <label class="label_text" >User Type</label>
			    <select name="usertype">
			    	<option value="none">None</option>
			    	<option value="teacher">Teacher</option>
			    	<option value="student">Student</option>
			    </select>
			  </div> -->    <!--aahile lai yo hide gareko login garda admin or user baata gar bhanyo bhane yaha bata milaune yo mileko chaina aahile-->

			  
			  <br>
			  <button type="submit" name="sublogin" class="form_btn btn btn-primary">Login</button>
			</form>
			<p style="font-size: 12px; text-align: center; margin-top: 10px;"><a href="forgot-password.php" style="color:#00376b">Forgot Password?</a></p>

			<br>

			<p>Don't have an account? <a href="signup.php">Sign up</a></p>	
		</div>
		</div>

		<div class="col-md-4">
		</div>
	</div>
</div>
</body>
</html>