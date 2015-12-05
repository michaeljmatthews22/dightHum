<?php
session_start();

require_once 'class.php';
require_once 'index.php';


//going through the logic and creating new objects from the class LabelGenerator

if ($_POST["type"] == "artist"){
	?><h3>This potion was made by: </h3><?
	$obj = new LabelGenerator();
	$obj->randomizeType("artist");
}
elseif($_POST["type"] == "ruler"){
	?><h3>This potion was made by: </h3><?
	$obj = new LabelGenerator();
	$obj->randomizeType("ruler"); 	
}

if ($_POST["location"] == "North America"){
	?><br><h3>This potion was made in: </h3><?
	$obj = new LabelGenerator();
	$obj->randomizeLocation("North America");
	
}
elseif($_POST["location"] == "South America"){
	?><h3>This potion was made in: </h3><?
	$obj = new LabelGenerator();
	$obj->randomizeLocation("South America");
	
}
//Trying to output Session information
?> 
<h3>Past Searches </h3><?
echo $_SESSION["pastHistory"];

?>	
<br><br>Information provided by: http://listovative.com/top-15-greatest-history-leaders-of-all-time/


