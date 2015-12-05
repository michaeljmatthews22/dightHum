
<?php
session_start();



include 'index.php'; 
require_once 'class.Database.php';
require_once 'class.blogData.php';
require_once 'class.CRUDE.php';

	//This makes it so it doesn't try and create a new entry everytime you refresh
	$check = strlen($_POST["name"]);

	if ($check != 0){
		$callClass = new Data_Class();
		$callClass->createData($_POST["name"], $_POST["comments"]);

		$callOther = new Category_Class();
		$art = FALSE;
		$left_brain = FALSE;
		$diversity = FALSE;

		if (isset($_POST["art"])){
			$art = TRUE;
		}
		if (isset($_POST["left_brain"])){
			$left_brain = TRUE;
		}
		if (isset($_POST["diversity"])){
			$diversity = TRUE;
		}

		$callOther->createCategory($art, $left_brain, $diversity);
		
	}

	if (isset($_POST["delete"])){
		$callClass->deleteData($_POST["delete"]);
		
	}

	if (isset($_POST["sort"]) && !empty($_POST["sort"])){

		$criteria = $_POST["sort"];
		$callForm = new Data_Class();
		$callForm->displayData($criteria);	

	}

	if (isset($_POST["search"]) && !empty($_POST["search"])){

		$search = $_POST["search"];
		$callForm = new Data_Class();
		$callForm->searchData($search);	

	}

	if(isset($_POST["update"])&& !empty($_POST["update"])){

		$callForm = new Data_Class();
		$changeID = $callForm->getID($_POST["update"]); 
		
	}

?>

