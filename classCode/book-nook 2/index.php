<?php
	$book_inventory = array(
		array(
			"title" => "101 Everyday Spells",
			"category" => "book",
			"used" => TRUE,
			"numAvailable" => 3
		),
		array(
			"title" => "Cleaning Up Magical Messes",
			"category" => "book",
			"used" => FALSE,
			"numAvailable" => 5
		),
		array(
			"title" => "Wizarding Whatsits",
			"category" => "magazine",
			"used" => FALSE,
			"numAvailable" => 1
		),
		array(
			"title" => "Popular Spell Mechanics",
			"category" => "magazine",
			"used" => FALSE,
			"numAvailable" => 10
		),
		array(
			"title" => "To Wand or Not to Wand",
			"category" => "book",
			"used" => TRUE,
			"numAvailable" => 7
		),
		array(
			"title" => "Alchemy for Dummies",
			"category" => "book",
			"used" => FALSE,
			"numAvailable" => 13
		),
		array(
			"title" => "The Origins of Magic",
			"category" => "book",
			"used" => TRUE,
			"numAvailable" => 0
		),
		array(
			"title" => "Reflections on Magical Mirrors",
			"category" => "book",
			"used" => FALSE,
			"numAvailable" => 8
		),
		array(
			"title" => "A Beginner's Guide to Dragon Watching",
			"category" => "book",
			"used" => TRUE,
			"numAvailable" => 1
		),
		array(
			"title" => "Influential Warlocks",
			"category" => "magazine",
			"used" => FALSE,
			"numAvailable" => 0
		),
		array(
			"title" => "Irish Wails: Banshee or Confused Geography?",
			"category" => "book",
			"used" => TRUE,
			"numAvailable" => 0
		),
		array(
			"title" => "Caring for your SpellPhone",
			"category" => "book",
			"used" => FALSE,
			"numAvailable" => 24
		),
		array(
			"title" => "Finding Love in the Bermuda Triangle",
			"category" => "book",
			"used" => TRUE,
			"numAvailable" => 2
		),
		array(
			"title" => "Which Witch",
			"category" => "magazine",
			"used" => FALSE,
			"numAvailable" => 9
		),
		array(
			"title" => "Mystical Geographic",
			"category" => "magazine",
			"used" => FALSE,
			"numAvailable" => 10
		)
	);
?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Shadows+Into+Light+Two|Inconsolata' />
		<link rel="stylesheet" href="css/normalize.css" />
		<link rel="stylesheet" href="css/book-nook.css" />
		<title>Terrific Tim's Magical Book Nook</title>
	</head>
	<body>
		<h1>Terrific Tim's Magical Book Nook</h1>
		<section>
			<pre>
<?php 
	print_r($book_inventory);
?>
			</pre>
		</section>
	</body>
</html>