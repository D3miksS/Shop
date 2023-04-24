<?php
	$dbuser = "root";
	$dbpass = "";
	$dbhost = "localhost";
	$dbname = "dominik";
	$link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if(!$link){
		echo "Website";
		exit;
	}
?>