<?php
	class Data_Class {

	//this connects to the database calling the class.Database
	private $connection;
	public function __construct(){
		$this->connection = Database_Class::start();
	}

	//This function displays all the data within the blogDatabase
	public function searchData($search){

		
		if (!preg_match("/^[_a-zA-Z0-9- ]+$/",$search)) {
			echo "<h2><center> Error, only letters allowed in search!</center></h2>";
  			
		}else{

			$search = strtoupper($search);
			$search = strtolower($search);

			$getSearch = "

			SELECT 
				*
			FROM 
				blogDatabase
			WHERE id IN (SELECT id FROM categoryDatabase 
				WHERE {$search} = 1)
				
			";


			$statement = $this->connection->prepare($getSearch);
			$statement->execute();

			$datas = $statement->fetchAll(PDO::FETCH_CLASS, "blogData_Class");
			foreach($datas as $blogData){
				$blogData->showSearch();
			}

		}

		

	}


	public function displayData($criteria){
	
		switch ($criteria){
			case "art": $select = "
				SELECT * 
     				FROM blogDatabase 
    			WHERE id IN (SELECT id 
                  	FROM categoryDatabase 
                 WHERE art = 1)";
			break;
			case "left_brain": $select = "
				SELECT * 
     				FROM blogDatabase 
    			WHERE id IN (SELECT id 
                  	FROM categoryDatabase 
                 WHERE left_brain = 1)";
			break;
			case "diversity": $select = "
				SELECT * 
     				FROM blogDatabase 
    			WHERE id IN (SELECT id 
                  	FROM categoryDatabase 
                 WHERE diversity= 1)";
			break;

			case "all": $select = "
				SELECT * 
     				FROM blogDatabase 
    			";
			break;

			default: $select = "
				SELECT id FROM blogDatabase
				WHERE id = 100000 ";
			break;

		}


		$statement = $this->connection->prepare($select);
		$statement->execute();

		//Here it calls the blogData_Class in order to display
		$datas = $statement->fetchAll(PDO::FETCH_CLASS, "blogData_Class");
			
		//if tthere are no current blogDatas in the system	
		

		foreach($datas as $blogData){
			$blogData->showDetails();
		}
			
		//header("location: http://dight350.tardis-shoes.com/mjm287/level3/");
	}

	public function getNames(){

		$names = array();

		$get = "
		SELECT 
			name
		FROM 
			blogDatabase;
		
		";
		$statement = $this->connection->prepare($get);
		$statement->execute();
		$datas = $statement;
		
			foreach($datas as $blogData){
			array_push($names, $blogData);
			
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
					blogDatabase
				WHERE
					name = :name
				";

		$statement = $this->connection->prepare($get);
		$statement->execute(array("name" => $name));

		//Here it calls the blogData_Class in order to display
		$datas = $statement->fetchAll(PDO::FETCH_CLASS, "blogData_Class");
			
		//if tthere are no current datain the system	
		

			foreach($datas as $blogData){
			$blogData->updateDetails();
			
		}

	}
	catch (PDOException $error){
					echo "ERROR: " .$error->getMessage();
		}
	}


	//This function is to create new entries within the database
	public function createData($name, $comments){
		try {
			$create = "

			INSERT INTO 
				blogDatabase
				(name, comments)
			VALUES
				(:name, :comments)

			";

			$statement = $this->connection->prepare($create);
			$statement->execute(
					array(
						"name" => $name,
						"comments" => $comments
					)
				);

		}

		catch (PDOException $error){
					echo "ERROR: " .$error->getMessage();
		}
		//header("location: http://dight350.tardis-shoes.com/mjm287/level3/");
	}

	public function updateData ($name, $comments, $id){
		
		try {
			$update = "
			UPDATE 
				blogDatabase
			SET
				name=:name,
				comments=:comments
				
			WHERE
				id =:id
			";

		$statement = $this->connection->prepare($update);
		$statement->execute(
			array(
				'name'=>$name,
				'comments'=>$comments,
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
					categoryDatabase
				WHERE id IN (SELECT id
            	 	FROM blogDatabase
             		WHERE name = :name);

				DELETE FROM
					blogDatabase
				WHERE name=:name;
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

class Category_Class extends Data_Class{

	private $connection;
	public function __construct(){
		$this->connection = Database_Class::start();
	}

	public function createCategory($art, $left_brain, $diversity){
		try {
			$create = "

			INSERT INTO 
				categoryDatabase
				(art, left_brain, diversity)
			VALUES
				(:art, :left_brain, :diversity)

			";

			$statement = $this->connection->prepare($create);
			$statement->execute(
					array(
						"art" => $art,
						"left_brain" => $left_brain,
						"diversity" => $diversity
					)
				);

		}

		catch (PDOException $error){
					echo "ERROR: " .$error->getMessage();
		}
		//header("location: http://dight350.tardis-shoes.com/mjm287/level3/");
	}

}











