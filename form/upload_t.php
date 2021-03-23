<?php
require_once("config.php");

		$selectquery= "select * from tupload ";
		$query=mysqli_query($dbc,$selectquery);

		?>

<!DOCTYPE html>
<html>
<head>
	<title>Teacher Uploaded Assignment</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/fontawesome.css">
	
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>

	<div class="container" style="padding:20px; background-color: blue;">
		<h2 style="text-align: center; color:#ffffff;"> Assignment Uploaded by Teachers</h2>
		<table class="table table-striped table-dark">
  <thead>
    <tr style="text-align: center">
    
      <th scope="col">username</th>
      <th scope="col">subject</th>
      <th scope="col">usertype</th>
      <th scope="col">upload_files</th>
      <th scope="col">Action</th>
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

	    
	    
	    </tr>

	    <?php
		}
		?>


    
    
  </tbody>
</table>
	</div>



	

</body>
</html>