<?php

class GetData {

	public function fetchData($givenID, $givenTitle){

			try{

				$database = "tardissh_mjm287";
				$username = "tardissh_mjm287";
				$password = "7311!";
				$database = new PDO("mysql:host=localhost;dbname=$database", $username, $password);
				$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		
				echo "<p>Connected Successfully</p>";

			} catch (PDOException $error){
					echo "ERROR: " .$error->getMessage();}

		$selectAll = "

			SELECT 
				*
			FROM 
				Potions
			WHERE id = :id AND Title = :Title

			";
			

		$statement = $database->prepare($selectAll);
	
		$statement->execute(
			array(
				"id" => $givenID,
				"Title" => $givenTitle
				)
		);

		while($row = $statement->fetch()):

			//To output everything
			//echo "<p><pre>".print_r($row, TRUE)."</pre></p>";

			echo "
					<h4>".$row->id."</h4>
					<p><small>From Database</small>
					<h4>".$row->Title."</h4>
					<p><small>From Database</small>
				";
		endwhile;

	}

}


/*$results = $database->query($selectAll);
		foreach( $results as $row ){
			echo "<p><pre>".print_r($row, TRUE)."</pre></p>";
		}*/

		//This is to prevent from sql injection
		//$id_clean = $database->quote($id);