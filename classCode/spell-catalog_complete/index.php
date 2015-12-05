<?php
	session_start();
	require "class.SpellCatalog.php";
	$catalog = new SpellCatalog;

	if( isset($_GET["reset"]) ):
		$catalog->clearSpellHistory();
	endif;
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link href='https://fonts.googleapis.com/css?family=Permanent+Marker|Roboto' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/normalize.css" />
	<link rel="stylesheet" href="css/main.css" />
	<title>Spell Catalog</title>
</head>
<body>
	<main>
		<h1>Spell Catalog</h1>
		<section>
			<?php 
				# Check that the form has been submitted
				if( !empty($_POST) ):
					# Check if casting a selected spell or a random one
					if( isset($_POST["random_cast"]) ):
						$spell_info = $catalog->randomSpell();
					else:
						$spell_info = array(
							"type" => strtolower($_POST["spell_type"]),
							"element" => strtolower($_POST["spell_element"])
						);
					endif;	
					
					$catalog->castSpell($spell_info);
				endif;
			?>
		</section>
		<section><?php include "form-spellcasting.php"; ?></section>
		<section>
			<?php $catalog->showSpellHistory(); ?>
		</section>
		</main>
</body>
</html>