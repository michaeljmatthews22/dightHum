<?php
session_start();
	require_once 'class.Database.php';
	require_once 'class.Potion.php';
	require_once 'class.CRUDE.php';
	
	//coming from class.CRUDE.php
	$callClass = new Data_Class();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/label.css"/>
	<title>Potion Database</title>
</head>
<body>
	<h1></h1>
	<section>

	<nav>
		<h3>Add to Database</h3>

	<form action="form.php" method="post">
		Name: <br><input type="text" name="name" required> <br>
		Effects: <br><input type="text" name="effects" required><br>
		Ingredients: <br><input type="text" name="ingredients" required><br>
		Quantity: <br><input type="text" name="stock" required><br>
	<br>
		<input align = "center" type="submit" value = "Add Potion to Database">
	</form>
	<?php // To Search Entries ?>
	<br>
	<form action='form.php' method='POST'>
				
  	Search:<br> <input type="text" name="search"><br>
  	<input type = "submit" value = "Search">
</nav>


<label>
<?php // To delete entries ?>

	<form action='form.php' method='POST'>
	<select name='delete' id='delete'><br>		
  	<option selected='selected'>--Delete--</option>
  	

  	<?php
  	$names = $callClass->getNames();
	for ($i =0; $i < count($names); $i++){
  			?> <option value="<?= $names[$i]['name'] ?>"><?= $names[$i]['name'] ?></option>
  		<?php }?>
  	<input type = "submit" value = "Delete">

	</select>
	</label>	
	
	<label>
	<form action='form.php' method='POST'>
	<select name='update' id='update'>	<br>			
  	<option selected='selected'>--Change--</option><br>

  	<?php

  	if(isset($_POST['updating'])){
				
		$callUpdate = new Data_Class ();
		$callUpdate->updateData($_POST["nameU"], $_POST["effectsU"], $_POST["ingredientsU"], $_POST["stockU"], $_POST["idU"]);
			
	}
  	$names = $callClass->getNames();
	for ($i =0; $i < count($names); $i++){
  			?> <option value="<?= $names[$i]['name'] ?>"><?= $names[$i]['name'] ?></option>
  		<?php }?>
  	<input type = "submit" value = "Change">
	</select>
</label>


<?php // To Sort Entries ?>
	<label>
		
	<form action='form.php' method='POST'>
	<select name='sort' id='sort'><br>	
  	<option selected='selected'>--Sort--</option><br>
  	<option value="startA">A-Z</option>
  	<option value="startZ">Z-A</option>
  	<option value="stockMost">Most in Stock</option>
  	<option value="stockLeast">Least in Stock</option>
  	<option value="idBackwards">Last Updated</option>
  	
  	<input type = "submit" value = "Sort">

	</select>
</label>

<br><br><h2><center>Tim's Potion Database</center></h2>
<p>In order to create a new potion and add it to the database, simply go the the left side of the menu.
Make sure that you fill out the necessary fields so that it can accurately store your information. If you 
wish to search for a specific potion, that can also be found on the left hand side. </p>
<p>Another feature that has been added is the Delete. As you can see, there is a drop down menu that lets you
search for potions within the database and then you can delete them. Make sure that you are positive that you 
want to delete that potion though, because once you delete there is no going back!</p>
<p>If you notice, just right to the delete feature we have the change feature. If you would like to change a certain
aspect of your data in the database, select which one you would like to change. Make sure you scroll down to see
your options to change!</p>
<p> Lastly we have the sort feature. Sometimes it is nice to know which one comes first or last, biggest or smallest, etc. 
The sort feature is designed to give you exactly that. </p>
<h3><center>Scroll Down to see the results of your Search, Sort or Change</center></h3>
</section>
<footer>
	<h2><center>Search or Sort</center><h2>
</footer>

	


	
</body>
</html>



