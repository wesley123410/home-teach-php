<?php
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

	echo 'Name: '.$name.'<br/>'; 
	echo 'Email: '.$email.'<br/>'; 
	echo 'Subject: '.$subject.'<br/>'; 
	echo 'Content: '.$content.'<br/>'; 
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