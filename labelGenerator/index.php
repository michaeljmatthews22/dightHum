<!DOCTYPE html>
<?php

?>
<html>
	<head>
		<meta charset="utf-8" />
			<title>Label Generator</title>
		<link rel="stylesheet" href="css/label.css" >
	</head>
		<body>
			<h1> Label Generator </h1>
			<h2>Please select the options you would like to include in your label: </h2>
		</body>
			<section>
				<form action = "form.php" method = "POST">
					Choose a creator type:
					<br>
					<br>
					<input type="radio" name="type" value="artist" >Artist
					<br>
					<input type="radio" name="type" value="ruler"> Ruler
					<br>
					<br>
					Choose a continent:
					<br>
					<br>
					<input type="radio" name="location" value="North America"> North America
					<input type="radio" name="location" value="South America"> South America
					<br>
					<br>
					<input type = "submit" value = "Get Random Label!!!">
					<br><br>
					</form>
					<form action = "">
					<input type= "submit" value = "Clear">
				</form>
				<h4> Need to Clear the Session? Click Below! <h4>
				<form action = "clearSession.php">
					  <input type = "submit"  value = " Delete Session  ">
				</form>
					<h2> Potion Information </h2>
					
</html>