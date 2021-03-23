<?php

require_once("config.php");

if(!empty($_GET['upload'])){
	$filename=basename($_GET['upload']);
	$filepath="upload/".$filename;

	if(!empty($filename) && file_exists($filepath)){
		header("Cache-Control: public");
		header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename=$filename");
		header("Content-Type: application/zip");
		header("content-Transfer-Encoding: binary");


		readfile($filepath);
		exit;

	}
	else{
		echo "file not exit";
	}
}





?>