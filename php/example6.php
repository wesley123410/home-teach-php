<?php
$user = array("Peter"=>array("Volvo", "BMW", "Toyota"), "Ben"=>"37", "Joe"=>"43");
$user_encode = json_encode($user);
echo $user_encode;
?>

<script>
	var response = JSON.parse('<?=$user_encode?>');
	console.log(response);
	console.log("Peter", response.Peter); 
	console.log("Ben", response.Ben);
	console.log("Joe", response.Joe);

	console.log("Peter's car[0]", response.Peter[0]); 

	console.log("Peter's cars:")
	response.Peter.forEach(
		function(res, i)
		{
			console.log(i, res); 
		}
	)
</script>