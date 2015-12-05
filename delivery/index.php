<?php
session_start();
	require_once 'class.Database.php';
	require_once 'class.blogData.php';
	require_once 'class.CRUDE.php';
	
	//coming from class.CRUDE.php
	$callClass = new Data_Class();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/label.css"/>
	<title>Special Delivery</title>
</head>

<body>

	<h1></h1>
	<section>
		<nav>
			<h2>Order Your Potion! </h2>

		<form action="form.php" method="post">
		Customer Name: <br><input type="text" name="name" required> <br>
		Delivery Address: <br><input type="text" name="address" required><br>

	
		<select name='item' id='item'><br>		
  			<option selected='selected'>--Item--</option>
  			<option id = 'love'>Love Potion</option>
  			<option id = 'hate'>Hate Potion</option>
  			<option id = 'strong'>Strong Potion</option>
  			<option id = 'fast'>Fast Potion </option>
  		</select>
 		<br>

		<select name='method' id='method'><br>		
  			<option selected='selected'>--Method--</option>
  			<option id = 'prime'>Prime (5 days)</option>
  			<option id = 'regular'>Regular (10 days)</option>
  			<option id = 'economy'>Economy (15 days)</option>
  			<option id = 'free'>Free (300 days)</option>
 		 </select>
	
		<br><input align = "center" type="submit" value = "Submit Order">
		</form>
	<h2>Other Options</h2>
	<label>
		<form action='form.php' method='POST'>
		<select name='delete' id='delete'> <br>		
  			<option selected='selected'>--Delete--</option> <br>
  				<?php
  					$names = $callClass->getNames();
					for ($i =0; $i < count($names); $i++){
  						?> <option value="<?= $names[$i]['name'] ?>"><?= $names[$i]['name'] ?></option>
  				<?php }?>
  					<br>
  		<input type = "submit" value = "Delete">
		</select>
	</label>	
	
	<label>
		<form action='form.php' method='POST'>
			<select name='update' id='update'>	<br>			
  				<option selected='selected'>--Change--</option><br>

  				<?php
					$names = $callClass->getNames();
					for ($i =0; $i < count($names); $i++){
  						?> <option value="<?= $names[$i]['name'] ?>"><?= $names[$i]['name'] ?></option>
  				<?php }?>
  				<input type = "submit" value = "Change">
			</select>
	</label>		
  	
  	<label>
  		
  			<form action="form.php" method="post">
  				<select name='status' id='stauts'><br>		
  					<option selected='selected'>--Get Status--</option>
  					<option id = 'assembling'>Still Assembling</option>
  					<option id = 'prepared'>Being Prepared</option>
  					<option id = 'shipped'>Shipped</option>
  					<option id = 'arrived'>Arrived</option>
  					
 				 </select>
	
		<br><input align = "center" type="submit" value = "Get Status">
		</form>
  	</label>
		</nav>




		<?php // To Sort Entries 

			if(isset($_POST['updating'])){

				$callUpdate = new Data_Class();
				$callUpdate->updateData($_POST["nameU"], $_POST["addressU"], $_POST["itemU"], $_POST["idU"], $_POST["dueDateU"]);
			
			}

			?>
<?php include 'text.php' ?>
</section>
<footer>
	<h2><center>Database Information</center><h2>
		
</footer>
	
</body>

</html>



