<?php

require_once("config.php");
session_destroy();
header("location:loginadmin.php"); //yesma maile logout garepachi login.php ma jane thyo tyo hatayera loginadmin.php page ma jane gari banayeko

?>