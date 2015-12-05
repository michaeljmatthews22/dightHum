<!DOCTYPE html>

<html>
<title>New Posts</title>
<body></body>
</html>

<?php
$title = "New Posts";
$content = '

	<h3>Add Blog</h3>

	<form action="index.php" method="post">
		Person Who Entered: <br><input type="textarea" name="name" required><br><br>
		Blog: <br><br><textarea style="width: 300px; height: 150px;" name="comment" id="comment"></textarea><br>
		
	<br>
	<h4>Categories</h4>
	<input type="radio" name="art" value="1">Art
	<input type="radio" name="left_brain" value="2">Left Brain
	<input type="radio" name="diversity" value="3">Diversity

	<br>
	<input align = "center" type="submit" value = "Add Blog">
	</form>

'
 ?>         
<?php

include 'template.php';