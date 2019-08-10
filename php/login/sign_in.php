<?php

// 確認是否重複註冊
	$sql = "SELECT * FROM `account` WHERE `account` = '".$account."'";
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
	    throw new Exception("該帳號已註冊過", "400");
	}
	
// 新增至資料庫
	$sql = sprintf(
		"INSERT INTO account (account, password, name, register_time, permission, token, token_time) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s')", 
		$mysqli->real_escape_string($account), 
		md5($password), 
		$mysqli->real_escape_string($name), 
		date("Y-m-d H:i:s", time()), 
		1, 
		md5($account.date("Y-m-d H:i:s", time())),
		date("Y-m-d H:i:s", time())
	);

?>