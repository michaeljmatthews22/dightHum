 <?php session_start();?>

<html>
	<head>
		<meta charset="utf-8" />
			<title> Potion Shop - Level 2 </title>
		<link rel="stylesheet" href="css/label.css">
	</head>
		<body>
			<h1>Potion Shop</h1>
			<h2>Add Potions to Inventory or Sell them!</h2>
		</body>
			<section>
				<h3>Add to Inventory</h3>
					<form action="form.php" method="post">
						Name of Potion: <input type="text" name="name"><br>
						Quantity (i.e. 1,2,3...): <input type="text" name="quantity"><br>
						<br>
						<input type="submit" value = "Add Potion to Inventory">
					</form>

					<table style="width:100%">
						<?
						/*this goes through and gets all the items in the $_SESSION["allPotions"]
						array and then loops through the main array that stores the info of name and 
						quantity */
						echo "<tr>";
						echo "<td>";
						echo "<h2>Potion Type<h2>";
						echo "</td>";
						echo "<td>";
						echo "<h2>Quantity<h2>";
						echo "</tr>";
							$_SESSION["allPotions"] = array();
							foreach ($_SESSION["potions"] as $value){
								$length = $_SESSION["$value"]["name"];
								if (strlen($length) > 2){
									echo "<tr>";
									echo "<td>";
									echo $_SESSION["$value"]["name"];
									echo "</td>";
									echo "<td>";
									echo $_SESSION["$value"]["quantity"];
									echo "</tr>";
									array_push($_SESSION["allPotions"], $_SESSION["$value"]["name"]);
								}
								
							}

					//I can't quite figure this out
					//header("location:index.php");?>
					

					</table>
					<h3>Sell Potions<h3>

					<form action="form.php" method="POST">
					<select name="sell" id="sell">
  						<option selected="selected">Choose one</option>
  							<?php
  							//This logic goes and get's the data on the specific Potion choosen
  							//for each potion made they get their own $_SESSION variable and a list of those
  							//variable names is stored in $_SESSION["allPotions"]

   							 foreach($_SESSION["allPotions"] as $value) { ?>
     							 <option value="<?= $_SESSION[$value]["name"] ?>"><?= $_SESSION[$value]["name"] ?></option>
  							<?php
    						} ?>
					</select>

					<form action="form.php" method="POST">
					
					<select name="howMany" id="howMany">
  					<option selected="selected">Choose #</option>
  							<?php
  							//Display 100 options to the number of quantity to remove
   							 for($i = 0; $i < 100; $i++) { ?>
     						 <option value="<?= $i ?>"><?= $i ?></option>
  							<?php
    						} ?>
							</select>
						<input type = "submit" value = "Sell Potion">
					</form>

					<center><h3> Generate </h3></center>
							<form action = "index.php" method = "">
							<center><input type= "submit" value= "Generate!">
							<div align="center">
						</form>
					</center>

					<form action = "clearSession.php" method = "">
						<right><small>Clear Session</small><br><right>
						<input type= "submit" value= "Clear the Session">
					</form>

</html>

