<?php

require_once("config.php");
session_destroy();
header("location:index.php"); //yesma maile logout garepachi login.php ma jane thyo tyo hatayera index page ma jane gari banayeko

?>