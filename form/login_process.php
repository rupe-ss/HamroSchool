<?php
require_once("config.php");
if (isset($_POST['sublogin']))
 {
	$login =$_POST['login_var'];
	$password=$_POST['password'];
	// $usertype=$_POST['usertype']; <!--yo mileko chaina-->

	$query="select * from users where (username='$login' OR email='$login')";
	$res=mysqli_query($dbc,$query);
	$numRows=mysqli_num_rows($res);
	


	
	if ($numRows == 1)
	 {
		$row = mysqli_fetch_assoc($res);
		if (password_verify($password,$row['password'])) 
		{
			$_SESSION["login_sess"]="1";
				$_SESSION["login_email"]= $row['email'];
			header("location:index_process.php"); 
			//note:yesma maile account.php hatayera index_process or home_process ma  page lai connect gareko//

		}

		else
		{
			header("location:login.php?loginerror=".$login);

		}
	}
	else
	{

	header("location:login.php?loginerror=".$login);
	}

}

?>