<!DOCTYPE html>
<html>
<head>
	<title>Article</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
	<form id="edit_article_form" action="api/article/edit_article.api.php">
		<label>標題: </label>
		<input type="text" name="title" value="">

		<br/><br/>

		<label>發布日期: </label>
		<input type="text" name="publish_date" value="">

		<br/><br/>

		<label>分類: </label>
		<select name="category">
			<option value="1">學測</option>
			<option value="2">面試</option>
		</select>

		<br/><br/>

		<textarea name="content" id="content"></textarea>

		<input type="hidden" name="id">
		<br/><br/>
		<div id="message"></div>

		<input type="submit" name="submit_btn">
	</form>

	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://cdn.tiny.cloud/1/sax9kyzw8twunos9m454wvglvwn4hmonzybe647xv5tvtw5o/tinymce/5/tinymce.min.js"></script>
	<script type="text/javascript">
		$(document)
		.on("submit", "#edit_article_form", function(e){
			e.preventDefault();
			
			var form = $(this);
		    var url = form.attr('action');
		    console.log(form);
		    console.log(form.serialize());

		    $.ajax({
				type: "POST",
				url: url,
				data: form.serialize(),
				success: function(data)
				{
				    document.location.href="article_list.php";
				},
				error:function(exception)
				{
		            console.log(exception.responseText);
		            var response = JSON.parse(exception.responseText);
		            $("#message").html(response.message);
		        }
	         });
		})
		.ready(function(){
			tinymce.init({selector:'#content'});

			$.ajax({
				type: "POST",
				url: "api/article/article_list.api.php",
				data: {id: $.urlParam('id')},
				success: function(data)
				{
					var response = JSON.parse(data)[0];

					$("input[name=id]").val(response['id']);
					$("input[name=publish_date]").val(response['publish_date']);
					$("input[name=title]").val(response['title']);
					/***/
					$("select[name=category]").val(response['category_id']);
					/**/
					$("#content").val(htmlDecode(response['content']));
				},
				error:function(exception)
				{
		            var response = JSON.parse(exception.responseText);
		            $("#message").html(response.message);
		        }
	         });
		});

		$.urlParam = function(name){
		    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
		    if (results==null) {
		       return null;
		    }
		    return decodeURI(results[1]) || 0;
		}

		function htmlEncode ( str ) {
		    var ele = document.createElement('span');
		    ele.appendChild( document.createTextNode( str ) );
		    return ele.innerHTML;
		}
		 
		function htmlDecode ( str ) {
		    var ele = document.createElement('span');
		    ele.innerHTML = str;
		    return ele.textContent || ele.innerText;
		}
	</script>
</body>
</html>