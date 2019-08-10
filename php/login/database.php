<?php
	$servername = "localhost";
	$dbname = "home_teach";
	$username = "root";
	$password = "";

	$mysqli = new mysqli($servername, $username, $password, $dbname);
	mysqli_set_charset($mysqli, "UTF8");

	if ($mysqli->connect_error) {
	    die("Connection failed: " . $mysqli->connect_error);
	} 
?>