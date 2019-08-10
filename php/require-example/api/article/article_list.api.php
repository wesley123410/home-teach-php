<?php
date_default_timezone_set("Asia/Taipei");
header("Content-Type:text/html; charset=utf-8");

require('../database.php');
try 
{
	// 資料庫語法
	$sql = "SELECT * FROM `article`";

	// 如果指定特定ID
	if(isset($_POST['id']))
	{
		$sql .= sprintf(" WHERE `id` = '%s'", $_POST['id']);
	}

	$result = $mysqli->query($sql);
	$articles = array();

	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	        $articles[] = $row;
	    }
	} else {
	    echo "0 results";
	}

	echo json_encode($articles);
	$mysqli->close();

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