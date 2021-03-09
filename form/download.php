<?php
require_once("config.php");

if (isset($_GET['sn'])) {

$sn=$_GET['sn'];
$stat=$dbc->prepare("select * from tupload where sn=?");
$stat->bindParam(1, $sn);
$stat->execute();
$data= $stat->fetch();

$file='upload/'.$data['filename'];

if (file_exists($file)) {
	header('Content-Description: '.$data['description']);
	header('Content-Type: '.$data['type']);
	header('Content-Disposition: '.$data['disposition'].'; filename="'.basename($file).'"');
	header('Expires: ',$data['expires']);
	
	header('Content-Length: '.filesize($file));
	readfile($file);
	exit;
}
}
?>