<?php
	if(isset($_GET['user_name'])){
		$name = htmlspecialchars($_GET['user_name']);
		echo 'Name: '.$name.'<br/>'; 
	}

	if(isset($_GET['user_email'])){
		$email = htmlspecialchars($_GET['user_email']);
		echo 'Email: '.$email.'<br/>'; 
	}

	if(isset($_GET['user_subject'])){
		$subject = htmlspecialchars($_GET['user_subject']);
		echo 'Subject: '.$subject.'<br/>'; 
	}

	if(isset($_GET['user_content'])){
		$content = htmlspecialchars($_GET['user_content']);
		echo 'Content: '.$content.'<br/>'; 
	}

?>