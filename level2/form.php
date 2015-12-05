<?php

include 'index.php';
require_once 'class.php';

session_start();

//This is the logic for adding a new potion to the shop
if (isset($_POST["name"])){

	$nameAdd = $_POST["name"];
	$quantityAdd = $_POST["quantity"];

	$callClass = new AddPotion();
	$callClass->addPotions($nameAdd, $quantityAdd);
	header("location:index.php");
	
} 
//adding POST into variable.  Is called on last if statement of form.php
if (isset($_POST["sell"])){

	$whichToSell = $_POST["sell"];
	header("location:index.php");
	
}
//adding POST into variable.  Is called on last if statement of form.php
if (isset($_POST["howMany"])){

	$howManyToSell = $_POST["howMany"];
	header("location:index.php");
	
}

//This calls the Class sellThePotion and generates the data and makes adjustments
if (isset($_POST["howMany"])){
	if (isset($_POST["sell"])){

		$callClass = new sellThePotion();
		$callClass->sellPotion($whichToSell, $howManyToSell);

	}
	header("location:index.php");
}


		 	
	




