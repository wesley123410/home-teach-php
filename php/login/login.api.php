<?php
session_start();

date_default_timezone_set("Asia/Taipei");
header("Content-Type:text/html; charset=utf-8");

// 連線資料庫
require('database.php');

try 
{	
	// 確認帳號密碼格式
	if(!isset($_POST['account']) || empty(trim($_POST['account'])))
	{
		throw new Exception("帳號不可為空", "400");
	}
	else if(!isset($_POST['password']) || empty(trim($_POST['password'])))
	{
		throw new Exception("密碼不可為空", "400");
	}


	// 過濾特殊字元
	$account = htmlspecialchars($_POST['account']);
	$password = htmlspecialchars($_POST['password']);

	$sql = "SELECT * FROM `account` WHERE `account` = '".$account."' AND `password` = '".md5($password)."'";
	$result = $mysqli->query($sql);

	// echo $sql;

	if ($result->num_rows == 1) 
	{
		$row = $result->fetch_assoc();
	 	$_SESSION['UserId'] = $row['user_id'];
	 	$_SESSION['UserName'] = $row['name'];
		$_SESSION['UserAccount'] = $row['account'];
		
		header('HTTP/1.1 204: NO CONTENT');
	}
	else 
	{
	    throw new Exception("帳號或密碼錯誤", "400");
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