<?php

	$servername = "localhost";
	$dbname = "test";
	$username = "root";
	$password = "";

	$mysqli = new mysqli($servername, $username, $password, $dbname);
	mysqli_set_charset($mysqli, "UTF8");

	if ($mysqli->connect_error) {
	    die("Connection failed: " . $mysqli->connect_error);
	} 
	
	$sql = "SELECT * FROM `contact`";

	$result = $mysqli->query($sql);

	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	        // echo $row['email'];
	        // echo $row['content'];
	    }
	} else {
	    echo "0 results";
	}

	$mysqli->close();
?>

