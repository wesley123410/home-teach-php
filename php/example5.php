<?php
	$text = "<script>alert('Attack')</script>";
	echo $text;
	echo "line 2. ".htmlspecialchars($text);
	echo "<br/>";
	echo "line 3. "."&lt;script&gt;alert('Attack')&lt;/script&gt";

	/*
		&lt; <
		&gt; >
	*/
?>

