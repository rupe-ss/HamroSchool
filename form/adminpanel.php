<!DOCTYPE html>

<?php
require_once("config.php");
if (!isset($_SESSION["login_sess"])) 
{
	header("location:login.php");
}
$email=$_SESSION["login_email"];
$findresult = mysqli_query($dbc, "SELECT * FROM admin WHERE email='$email' ");
if ($res = mysqli_fetch_array($findresult)) 
{
	$username = $res['username'];

	
}

$selectquery= "select * from tupload ";
		$query=mysqli_query($dbc,$selectquery);


?>

<?php


if(isset($_POST['slider_submit'])){
	$file=$_FILES['file']['name'];
	$tmp=$_FILES['file']['tmp_name'];
	
	move_uploaded_file($tmp, "slider/".$file);

	$ins="INSERT INTO dynamicslider SET image='$file'";

	$dbc->query($ins);
	

	
}
?>


<html>
<head>
	<title>Home - Hamro School Admin Panel</title>
	
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
				
				<li> <a href="logoutadmin.php"> <span style="color:red; float: right; ">Logout </span> </a> </li>
				<li>Welcome! <span style="color:#33CC00; "><?php echo $username; ?></span></p></li>

					
				
				
			</div>
		</div>

	</div>
	<!--closing of top-->


	<!--starting of sidebar-->

	<div class="container">

  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-4 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="adminpanel.php">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
          	<li>Pages</li>
           <li> <a class="nav-link" href="#">
              <span data-feather="home"></span>
              Home
            </a></li>
            <li><a class="nav-link" href="#">
              <span data-feather="home"></span>
              About
            </a></li>
            <li><a class="nav-link" href="#">
              <span data-feather="home"></span>
              Blogs
            </a>
        	</li>
          </li>
          <hr>

          <li class="nav-item">
            <a class="nav-link" href="upload_t.php">
              <span data-feather="teachers_record"></span>
              Teachers 
            </a>
          </li> 

          <li class="nav-item">
            <a class="nav-link" href="upload_s.php">
              <span data-feather="student_record"></span>
              Students 
            </a>
          </li>

          <li>
          	<form method="post" enctype="multipart/form-data">
				Slider: <input type="file" name="file">

				<input type="submit" name="slider_submit" value="Upload ">

				</form>
			</li>

          
        
        </ul>

        
      </div>
    </nav>

    <main class="col-md-8 ms-sm-auto col-lg-8 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        
      </div>

      
      	<div class="row">
      		<div class="col-xl-4 col-md-6 mb-4">
      			<div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
				  <div class="card-header" style="text-align: center;"><b>Total No. of User</b></div>
					  <div class="card-body" style="text-align: center;">
					       <?php

					       $inq = "SELECT id FROM users ORDER BY id ";
					       $run_query = mysqli_query($dbc, $inq);
					       $row = mysqli_num_rows($run_query);

					       echo '<h1>'.$row.'</h1>' ;
					       ?>
					  </div>
				</div>
      		</div>

      		<div class="col-xl-4 col-md-6 mb-4">
      			<div class="card text-white bg-success mb-3" style="max-width: 18rem;">
				  <div class="card-header" style="text-align: center;"><b>Total File Uploaded</b></div>
					  <div class="card-body" style="text-align: center;">

					  	<?php

					       $inq = "SELECT sn FROM tupload ORDER BY sn ";
					       $run_query = mysqli_query($dbc, $inq);
					       $row = mysqli_num_rows($run_query);

					       echo '<h1>'.$row.'</h1>' ;
					       ?>
					       
					  </div>
				</div>
      		</div>

      		<div class="col-xl-4 col-md-6 mb-4">
      			<div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
				  <div class="card-header" style="text-align: center;"><b>Total No. of Admin</b></div>
					  <div class="card-body" style="text-align: center;">
					       <?php

					       $inq = "SELECT id FROM admin ORDER BY id ";
					       $run_query = mysqli_query($dbc, $inq);
					       $row = mysqli_num_rows($run_query);

					       echo '<h1>'.$row.'</h1>' ;
					       ?>
					  </div>
				</div>
      		</div>
      	</div>



      

    <div class="container " style="padding:20px;  ">
		<h2 style="text-align: center; color:red;"> Assignment Uploaded </h2>
		
		<table class="table table-striped table-dark" >
		  <thead>
		    <tr style="text-align: center">
		    
		      <th scope="col">username</th>
		      <th scope="col">subject</th>
		      <th scope="col">usertype</th>
		      <th scope="col">upload_files</th>
		      <th scope="col" colspan="2">Action</th>
		    </tr>
		  </thead>
		  <tbody>

				  	

				<?php    

			    while ($rows=mysqli_fetch_assoc($query))
			    {
			    	?>	



				<tr class="text-center">
			      
			      <td><?php echo $rows['username'];?></td>
			      <td><?php echo $rows['subject'];?></td>
			      <td><?php echo $rows['usertype'];?></td>
			      <td><?php echo $rows['upload_files'];?></td>
			      
			      

			      <td><a href="download.php?upload=<?php echo $rows['upload_files'] ?>" class="btn btn-primary">Download</a></td>
			      <td><a href="delete.php?delete=<?php echo $rows['sn'] ?>" class="btn btn-danger">Delete</a></td>

			    
			    
			    </tr>

			    <?php
				}
				?>


		    
		    
		  </tbody>
		</table>

	</div>
    </main>
  </div>
</div>
	</div>

	<!--closing of sidebar-->

	

</body>
</html>