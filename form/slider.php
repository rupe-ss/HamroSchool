
<!DOCTYPE html>
<?php

require_once("config.php");
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
	<title></title>
</head>
<body>

	<form method="post" enctype="multipart/form-data">
		Image Upload: <input type="file" name="file">

		<input type="submit" name="slider_submit" value="Upload Image">

	</form>

</body>
</html>