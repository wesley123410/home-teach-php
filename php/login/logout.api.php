<?php
session_start();

try 
{	
	if(!isset($_SESSION['UserId']) || !isset($_SESSION['UserName']) || !isset($_SESSION['UserAccount']))
	{
		throw new Exception("尚未登入", "400");
	}

	session_destroy();
	header("Location: login.html"); 
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