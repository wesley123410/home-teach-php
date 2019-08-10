<?php
date_default_timezone_set("Asia/Taipei");
header("Content-Type:text/html; charset=utf-8");

require('../database.php');

try 
{
	if(!isset($_POST['title']) || empty(trim($_POST['title'])))
	{
		throw new Exception("標題不可為空", "400");
	}
	else if(!isset($_POST['publish_date']) || empty(trim($_POST['publish_date'])))
	{
		throw new Exception("日期不可為空", "400");
	}
	else if(!isset($_POST['category']) || empty(trim($_POST['category'])))
	{
		throw new Exception("分類不可為空", "400");
	}
	else if(!isset($_POST['content']) || empty(trim($_POST['content'])))
	{
		throw new Exception("內容不可為空", "400");
	}

	$title = htmlspecialchars($_POST['title']);
	$publish_date = htmlspecialchars($_POST['publish_date']);
	$category = htmlspecialchars($_POST['category']);
	$content = htmlspecialchars($_POST['content']);

	$sql = sprintf("INSERT INTO article (title, content, category_id, publish_date, datetime) VALUES ('%s', '%s', '%s', '%s', '%s')", 
		$mysqli->real_escape_string($title), 
		$mysqli->real_escape_string($content), 
		$mysqli->real_escape_string($category), 
		$mysqli->real_escape_string($publish_date), 
		date("Y-m-d H:i:s", time() )
	);

	echo $sql;

	if ($mysqli->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $mysqli->error;
	}
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