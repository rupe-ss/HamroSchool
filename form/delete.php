<?php

require_once("config.php");

$id = $_GET['delete'];

$q = "DELETE FROM `tupload` WHERE sn= $id";

$query = mysqli_query($dbc, $q);
header('location:adminpanel.php');

?>