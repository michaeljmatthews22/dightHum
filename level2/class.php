<?php

session_start();

class AddPotion {


	public function addPotions($nameAdd, $quantityAdd){

    		 if (!(isset($_SESSION["checker"]))){
    		 	$_SESSION["potions"] = array("See Potions Below");
  			}

		//Uncommenting the line below starts the array
		//$_SESSION["potions"] = array($nameAdd);

		if(isset($_POST["name"])){
			$_SESSION["checker"] = 2;
			
			array_push($_SESSION["potions"], "$nameAdd");
			//I realize this is ghetto code
			$_SESSION["$nameAdd"] = array("name" => "$nameAdd", "quantity" => "$quantityAdd");
		}

		
	}
	
}



class sellThePotion extends AddPotion{

	public function sellPotion($nameSell, $sellHowMany){
		
		$newQuantity = $_SESSION["$nameSell"]["quantity"];
		$newQuantity = $newQuantity - $sellHowMany;
		
		$_SESSION["$nameSell"] = array("name" => "$nameSell", "quantity" => "$newQuantity");
		
	}

}

?>