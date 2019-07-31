<?php
date_default_timezone_set("Asia/Taipei");

try 
{
	if(!isset($_POST['user_name']) || empty(trim($_POST['user_name'])))
	{
		throw new Exception("姓名不可為空", "400");
	}
	else if(!isset($_POST['user_email']) || empty(trim($_POST['user_email'])))
	{
		throw new Exception("信箱不可為空", "400");
	}
	else if(!isset($_POST['user_subject']) || empty(trim($_POST['user_subject'])))
	{
		throw new Exception("主題不可為空", "400");
	}
	else if(!isset($_POST['user_content']) || empty(trim($_POST['user_content'])))
	{
		throw new Exception("內容不可為空", "400");
	}

	$name = htmlspecialchars($_POST['user_name']);
	$email = htmlspecialchars($_POST['user_email']);
	$subject = htmlspecialchars($_POST['user_subject']);
	$content = htmlspecialchars($_POST['user_content']);

	// 

	$servername = "localhost"; // 127.0.0.1
	$dbname = "home_teach";
	$username = "root";
	$password = "";

	$mysqli = new mysqli($servername, $username, $password, $dbname);

	if ($mysqli->connect_error) {
	    die("Connection failed: " . $mysqli->connect_error);
	} 
	
	$sql = sprintf(
		"INSERT INTO contact (name, email, subject, content, datetime) VALUES ('%s', '%s', '%s', '%s', '%s')", 
		$mysqli->real_escape_string($name), 
		$mysqli->real_escape_string($email), 
		$mysqli->real_escape_string($subject), 
		$mysqli->real_escape_string($content), 
		date("Y-m-d H:i:s", time() )
	);

	echo $sql;

	if ($mysqli->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $mysqli->error;
	}

// 

}
catch(Exception $e) 
{
	switch ($e->getCode()) {
		case '400':
			$msg['http_status'] = '400';
			$msg['message'] = $e->getMessage();
			header('HTTP/1.1 400: BAD REQUEST');
			echo json_encode($msg);
			break;
	}
}

?>