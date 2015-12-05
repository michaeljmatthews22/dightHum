<?php
	include "spells.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Spell Catalog</title>
</head>
<body>
	<h1>Spell Catalog</h1>
	<?php 
		include "form-spellcasting.php";
		
		if( !empty($_GET) ):
		
		print_r($_GET);
		
		$spell = $spells [ $_GET["spellType"] ] [ $_GET["spell_element"] ]; 
			echo "
				<h2>
					<img src= '{$spell[icon]}' alt='{$spell[name]}' />
					{$spell[$name]}
					<img src= '' alt='' />
					</h2>
			";
		
		endif;	
		
		
	?>
</form>
</body>
</html>