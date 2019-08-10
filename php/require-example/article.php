<!DOCTYPE html>
<html>
<head>
	<title>Article</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
	<div>
		<lable>編號：</lable>
		<div id="id"></div><br/>
		<lable>標題：</lable>
		<div id="publish_date"></div><br/>
		<lable>日期：</lable>
		<div id="title"></div><br/>
		<lable>分類：</lable>
		<div id="category_id"></div><br/>
		<lable>內容：</lable>
		<div id="content"></div><br/>
	</div>

	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="common.js"></script>
	<script type="text/javascript">
		$(document)
		.ready(function(){
			$.ajax({
				type: "POST",
				url: "api/article/article_list.api.php",
				data: {id: $.urlParam('id')},
				success: function(data)
				{
					var response = JSON.parse(data)[0];

					$("#id").html(response['id']);
					$("#publish_date").html(response['publish_date']);
					$("#title").html(response['title']);
					$("#category_id").html(response['category_id']);
					$("#content").html(htmlDecode(response['content']));
				},
				error:function(exception)
				{
		            console.log(exception.responseText);
		            var response = JSON.parse(exception.responseText);
		            $("#message").html(response.message);
		        }
	         });
		});
	</script>
</body>
</html>