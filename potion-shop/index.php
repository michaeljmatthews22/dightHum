<?php
require 'potion_shop_inventory.php';
?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>G'Zmort's Potion Shop</title>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  		<link rel="stylesheet" href="css/potion101.css" >
  			<script>
  				$(function() {
    				$( "#tabs" ).tabs();
  				});
  			</script>
	</head>
		<body>
			<h1>Potent Potion Shop</h1>
 			<section>
 				<div class="scroll">
			</section>

				<div id="tabs">
  					<ul>
    					<li><a href="#tab1">She Loves Me</a></li>
    					<li><a href="#tab2">Veni, Vidi, Vici</a></li>
    					<li><a href="#tab3">Float Like a Butterfly</a></li>
    					<li><a href="#tab4">Look Down</a></li>
    					<li><a href="#tab5">Nobody's Perfect</a></li>
  					</ul>
  
  <?php
  //Set forth the function to display the array 
  
  function potionFunction($potion){
			print_r ($potion["title"]); ?>
			<p>Effects: <?php print_r ($potion["effect"]); ?>
			<p>Side-Effects: <?php print_r ($potion["side-effect"]); ?>

			<p>Condition: <?php
			if ($potion1["inStock"] === "TRUE"){
					echo "In Stock!";
				}
				else {
					echo "Out of Stock";
				}?> 

			<p>This potion contains: <?php print_r ($potion["chemicals_contained"]);
			} ?>

		<div id="tab1">
   		 <p>
				<?php
					potionFunction($potion1);
				?>
  		 <p>
  		</div>

		<div id="tab2">
			<p>
				<?php
					potionFunction($potion2);
				?>		
			<p>	
		</div>

		<div id="tab3">
			<p>
				<?php
					potionFunction($potion3);
				?>	
			<p>
		</div>
	
		<div id="tab4">
				<p>
				<?php
					potionFunction($potion4);
				?>
			<p>
		</div>
	
		<div id="tab5"> 
			<p>
				<?php
					potionFunction($potion5);
				?>
			<p>
		</div>
	
	</body>
</html>