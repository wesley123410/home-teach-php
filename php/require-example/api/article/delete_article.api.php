<?php
date_default_timezone_set("Asia/Taipei");
header("Content-Type:text/html; charset=utf-8");

require('../database.php');

try 
{
	if(isset($_POST['id']))
	{
		$sql .= sprintf("DELETE FROM `article`WHERE `id` = '%s'", $_POST['id']);
	}else
	{
		return False;
	}

	echo $sql;

	if ($mysqli->query($sql) === TRUE) {
	    echo "Record deleted successfully";
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