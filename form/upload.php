<!DOCTYPE html>


<?php

require_once("config.php");
if(isset($_POST['upload']))
{
	$username=$_POST['login_var'];
	$usertype=$_POST['usertype'];
	$sub="";
	if (isset($_POST['sub'])) {
		$sub=implode(",",$_POST['sub']);
	}


	$file=$_FILES['file']['name'];
	$tmp=$_FILES['file']['tmp_name'];
	
	move_uploaded_file($tmp, "upload/".$file);

	$ins="INSERT INTO tupload SET username='$username',subject='$sub',usertype='$usertype',upload_files='$file'";

	$dbc->query($ins);
	


}

?>



<html>
<head>
	<title>Upload assignment</title>
	
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
				<h2 style="color:red;">Upload <span class="h1_school" style="color: blue;">Assignment</span></h2>			

				
			<form action="upload.php" method="POST" enctype="multipart/form-data" >
			  <div class="form-group">
			    <label class="label_text">User Name</label>
			    <input type="text" name="login_var" class="form-control"  >			    
			  </div>
			
			  <div class="form-group">
			  	<label class="label_text" class="form-control" >File</label>
			  		<input type="file" name="file">
			  </div>  
			  <br>

			   <div class="form-group">
			    <label class="subject" >Subject</label>
			    <input type="checkbox" name="sub[]" value="c">C &nbsp;&nbsp;
			    <input type="checkbox" name="sub[]" value="java">Java&nbsp;&nbsp;
			    <input type="checkbox" name="sub[]" value="php">PHP
			  </div> <br>
			  
			

			   <div class="form-group">
			    <label class="label_text" >User Type</label>
			    <select name="usertype">
			    	<option value="none">None</option>
			    	<option value="teacher">Teacher</option>
			    	<option value="student">Student</option>
			    </select>
			  </div>  

			  
			  <br>
			  <button type="submit" name="upload" class="form_btn btn btn-primary">upload</button>
			</form>
			
		</div>
		</div>

		<div class="col-md-4">
		</div>
	</div>
</div>
</body>
</html>