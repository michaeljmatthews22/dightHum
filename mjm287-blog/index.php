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
	<title>Blog Central</title>
</head>

<body>
	<h1></h1>
	<section>

	<nav>
		<h3>New Blog</h3>

	<form action="form.php" method="post">
		Name: <br><input type="text" name="name" required> <br>
		Blog: <br><textarea style="width: 290px; height: 150px;" name="comments" id="comments"></textarea><br>

	<h4>Categories</h4>
	<input type="radio" name="art" value="1">Art
	<br><input type="radio" name="left_brain" value="2">Left Brain
	<br><input type="radio" name="diversity" value="3">Diversity
	
	<br><input align = "center" type="submit" value = "Add Blog">
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

  	$names = $callClass->getNames();
	for ($i =0; $i < count($names); $i++){
  			?> <option value="<?= $names[$i]['name'] ?>"><?= $names[$i]['name'] ?></option>
  		<?php }?>
  	<input type = "submit" value = "Change">
	</select>
</label>


<?php // To Sort Entries 

if(isset($_POST['updating'])){

		$callUpdate = new Data_Class();
		$callUpdate->updateData($_POST["nameU"], $_POST["commentsU"], $_POST["idU"]);
			
	}

?>
	<label>
		
	<form action='form.php' method='POST'>
	<select name='sort' id='sort'><br>	
  	<option selected='selected'>--Sort by Category--</option><br>
  	<option value="art">Art</option>
  	<option value="left_brain">Left Brain</option>
  	<option value="diversity">Diversity</option>
  	<option value="all">Get All Posts</option>
  	
  	<input type = "submit" value = "Sort">

	</select>
</label>

<?php include 'meaning.php'; ?>
<br><br><h2><center>Michael Matthews -- Digital Humanities</center></h2>
<?php echo $whatItMeans; ?>
</section>
<footer>
	<h2><center>Past Blogs</center><h2>
</footer>
	
</body>

</html>



