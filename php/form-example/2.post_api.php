<?php
	if(isset($_POST['user_name'])){
		$name = htmlspecialchars($_POST['user_name']);
		echo 'Name: '.$name.'<br/>'; 
	}

	if(isset($_POST['user_email'])){
		$email = htmlspecialchars($_POST['user_email']);
		echo 'Email: '.$email.'<br/>'; 
	}

	if(isset($_POST['user_subject'])){
		$subject = htmlspecialchars($_POST['user_subject']);
		echo 'Subject: '.$subject.'<br/>'; 
	}

	if(isset($_POST['user_content'])){
		$content = htmlspecialchars($_POST['user_content']);
		echo 'Content: '.$content.'<br/>'; 
	}

?>