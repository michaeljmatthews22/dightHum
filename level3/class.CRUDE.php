<?php
	class Data_Class {

	//this connects to the database calling the class.Database
	private $connection;
	public function __construct(){
		$this->connection = Database_Class::start();
	}

	//This function displays all the data within the potionDatabase
	public function searchData($search){

		$getSearch = "
			SELECT 
				*
			FROM 
				potionDatabase
			WHERE 
				name LIKE :name
			";


		$statement = $this->connection->prepare($getSearch);
		$statement->execute(array("name" => $search));

		$potions = $statement->fetchAll(PDO::FETCH_CLASS, "Potion_Class");
		foreach($potions as $potion){
			$potion->showSearch();
		}

	}


	public function displayData($criteria){
	
		switch ($criteria){
			case "name":
				$select = "
					SELECT * FROM potionDatabase ORDER BY name";
				break;
			case "startZ":
				$select = "
					SELECT * FROM potionDatabase ORDER BY name DESC";
				break;
			case "stockMost":
				$select = "
					SELECT * FROM potionDatabase ORDER BY stock DESC";
				break;
			case "stockLeast":
				$select = "
					SELECT * FROM potionDatabase ORDER BY stock";
				break;
			case "idBackwards":
				$select = "
					SELECT * FROM potionDatabase ORDER BY id DESC";
				break;
			default:
				$select = "
					SELECT * FROM potionDatabase ORDER BY id";

		}


		$statement = $this->connection->prepare($select);
		$statement->execute();

		//Here it calls the Potion_Class in order to display
		$potions = $statement->fetchAll(PDO::FETCH_CLASS, "Potion_Class");
			
		//if tthere are no current potions in the system	
		

		foreach($potions as $potion){
			$potion->showDetails();
			}
			
		//header("location: http://dight350.tardis-shoes.com/mjm287/level3/");
	}

	public function getNames(){

		$names = array();

		$get = "
		SELECT 
			name
		FROM 
			potionDatabase;
		
		";
		$statement = $this->connection->prepare($get);
		$statement->execute();
		$potions = $statement;
		
			foreach($potions as $potion){
			array_push($names, $potion);
			
		}
		//header("location: http://dight350.tardis-shoes.com/mjm287/level3/");
		return $names;
	}

	public function getID($name){
		try {
			$get = "
				SELECT 
					*
				FROM 
					potionDatabase
				WHERE
					name = :name
				";

		$statement = $this->connection->prepare($get);
		$statement->execute(array("name" => $name));

		//Here it calls the Potion_Class in order to display
		$potions = $statement->fetchAll(PDO::FETCH_CLASS, "Potion_Class");
			
		//if tthere are no current potions in the system	
		

			foreach($potions as $potion){
			$potion->updateDetails();
			
		}

	}
	catch (PDOException $error){
					echo "ERROR: " .$error->getMessage();
		}
	}


	//This function is to create new entries within the database
	public function createData($name, $effects, $ingredients, $stock){
		try {
			$create = "

			INSERT INTO 
				potionDatabase
				(name, effects, ingredients, stock)
			VALUES
				(:name, :effects, :ingredients, :stock)

			";

			$statement = $this->connection->prepare($create);
			$statement->execute(
					array(
						"name" => $name,
						"effects" => $effects,
						"ingredients" => $ingredients,
						"stock" => $stock
					)
				);

		}

		catch (PDOException $error){
					echo "ERROR: " .$error->getMessage();
		}
		//header("location: http://dight350.tardis-shoes.com/mjm287/level3/");
	}

	public function updateData ($name, $effects, $ingredients, $stock, $id){
		
		try {
			$update = "
			UPDATE 
				potionDatabase
			SET
				name=:name,
				effects=:effects,
				ingredients=:ingredients,
				stock=:stock
			WHERE
				id =:id
			";

		$statement = $this->connection->prepare($update);
		$statement->execute(
			array(
				'name'=>$name,
				'effects'=>$effects,
				'ingredients'=>$ingredients,
				'stock'=>$stock,
				'id'=>$id
				)
			);
	//header("location: http://dight350.tardis-shoes.com/mjm287/level3/");
	}
	catch (PDOException $error){
					echo "ERROR: " .$error->getMessage();
		}
}



	public function deleteData ($name){
		try {
			$deleteQuery = "
				DELETE FROM
					potionDatabase
				WHERE
					name=:name
			";
				
			$statement = $this->connection->prepare($deleteQuery);
			$statement->execute(array('name'=>$name));
	} 
	catch (PDOException $error){
					echo "ERROR: " .$error->getMessage();
	}
	//header("location: http://dight350.tardis-shoes.com/mjm287/level3/");
	}

	

}










