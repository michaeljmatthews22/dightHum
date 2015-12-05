<?php
	class Data_Class {

	//this connects to the database calling the class.Database
	private $connection;
	public function __construct(){
		$this->connection = Database_Class::start();
	}

	//This function displays all the data within the blogDatabase
	
	public function displayData($criteria){
	
	$select = "
				SELECT 
    				o.*         
				FROM orderDetails as o
				LEFT JOIN deliveryDetails as d on FIND_IN_SET(d.id, o.id)
				WHERE (o.dueDate - d.created_at = {$criteria})

    ";

	if ($criteria == 3){

			$select = "
				SELECT 
    				o.*         
				FROM orderDetails as o
				LEFT JOIN deliveryDetails as d on FIND_IN_SET(d.id, o.id)
				WHERE (o.dueDate - d.created_at > 3)

    		";

	}

	if ($criteria == 0){

			$select = "
				SELECT 
    				o.*         
				FROM orderDetails as o
				LEFT JOIN deliveryDetails as d on FIND_IN_SET(d.id, o.id)
				WHERE (o.dueDate - d.created_at <= 0)

    		";

	}
	



		$statement = $this->connection->prepare($select);
		$statement->execute();

		//Here it calls the blogData_Class in order to display
		$datas = $statement->fetchAll(PDO::FETCH_CLASS, "blogData_Class");
			
		//if tthere are no current blogDatas in the system	

		foreach($datas as $blogData){
			$blogData->status($criteria);
		}
			
		//header("location: http://dight350.tardis-shoes.com/mjm287/level3/");
	}

	public function getNames(){

		$names = array();

		$get = "
		SELECT 
			name
		FROM 
			orderDetails;
		
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
					orderDetails
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
	public function createData($name, $address, $item, $dueDate){
		try {
			$create = "

			INSERT INTO 
				orderDetails
				(name, address, item, dueDate)
			VALUES
				(:name, :address, :item, :dueDate)

			";

			$statement = $this->connection->prepare($create);
			$statement->execute(
					array(
						"name" => $name,
						"address" => $address,
						"item" => $item,
						"dueDate" => $dueDate
					)
				);

		}

		catch (PDOException $error){
					echo "ERROR: " .$error->getMessage();
		}
		//header("location: http://dight350.tardis-shoes.com/mjm287/level3/");
	}

	public function updateData ($name, $address, $item, $id){
		
		try {
			$update = "
			UPDATE 
				orderDetails
			SET
				name=:name,
				address=:address,
				item=:item
				
			WHERE
				id =:id
			";

		$statement = $this->connection->prepare($update);
		$statement->execute(
			array(
				'name'=>$name,
				'address'=>$address,
				'item'=>$item,
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
					deliveryDetails
				WHERE id IN (SELECT id
            	 	FROM orderDetails
             		WHERE name = :name);

				DELETE FROM
					orderDetails
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

	public function createDelivery($created_at){
		try {
			$create = "

			INSERT INTO 
				deliveryDetails
				(created_at)
			VALUES
				(:created_at)

			";

			$statement = $this->connection->prepare($create);
			$statement->execute(
					array(
						"created_at" => $created_at
					)
				);

		}

		catch (PDOException $error){
					echo "ERROR: " .$error->getMessage();
		}
		//header("location: http://dight350.tardis-shoes.com/mjm287/level3/");
	}

}











