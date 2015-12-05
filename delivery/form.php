
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
		

		switch ($_POST["method"]) {
   		 case "Prime (5 days)": $due_date = date('Y-m-d', strtotime("+5 days"));
      		 
        	break;
    	case "Regular (10 days)": $due_date = date('Y-m-d', strtotime("+10 days"));
        	
        	break;
    	case "Economy (15 days)": $due_date = date('Y-m-d', strtotime("+15 days"));
        	
        	break;
    	default: $due_date = date('Y-m-d', strtotime("+300 days"));
       		 
		}			
		$callClass->createData($_POST["name"], $_POST["address"], $_POST["item"], $due_date);

		$callOther = new Category_Class();
		$date = date('Y-m-d');
		$callOther->createDelivery($date);
		
	}

	if (isset($_POST["delete"])){
		$callClass->deleteData($_POST["delete"]);
		
	}

	if(isset($_POST["update"])&& !empty($_POST["update"])){

		$callForm = new Data_Class();
		$changeID = $callForm->getID($_POST["update"]); 
		
	}

	if(isset($_POST["status"]) && $_POST["status"] != "--Get Status--"){


		$callClass = new Data_Class();
		switch ($_POST["status"]) {
   		 case "Still Assembling":
      		 $callClass->displayData(3);
        	break;
    	case "Being Prepared":
        	$callClass->displayData(2);
        	break;
    	case "Shipped":
        	$callClass->displayData(1);
        	break;
    	default:
       		 $callClass->displayData(0);
		}	
		
		
	}

?>

