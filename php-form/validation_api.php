<?php
function _throwException($errCode, $errMsg){
	throw new Exception(sprintf("(%s) %s", $errCode, $errMsg), $errCode);
}

try 
{
	if(!isset($_POST['user_name']) || empty(trim($_POST['user_name'])))
	{
		_throwException("400", "姓名不可為空");
	}
	else if(!isset($_POST['user_email']) || empty(trim($_POST['user_email'])))
	{
		_throwException("400", "信箱不可為空");
	}
	else if(!isset($_POST['user_subject']) || empty(trim($_POST['user_subject'])))
	{
		_throwException("400", "主題不可為空");
	}
	else if(!isset($_POST['user_content']) || empty(trim($_POST['user_content'])))
	{
		_throwException("400", "內容不可為空");
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
		echo $e->getMessage();
		break;
	}
}

?>