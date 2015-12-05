
	<?php
	
	class blogData_Class {
		public $id;
		public $name;
		public $comments;
		

		public function showDetails() {

			echo "
				
					<table style = 'width:100%'>
						<tr>
							<td>{$this->name}</td>
							<td>{$this->address}</td>
							<td>{$this->item}</td>
							<td>{$this->dueDate}</td>
						</tr>
					</table>
					
			";
			
		}

		public function status($criteria){
			

			switch ($criteria){
				case 3: echo '<h2><center>Status: Assembling</center></h2>';
				break;
				case 2: echo '<h2><center>Status: Prepared</center></h2>';
				break;
				case 1: echo '<h2><center>Status: Shipped</center></h2>';
				break;
				case 0: echo '<h2><center>Status: Arrived</center></h2>';
				break;
			}

			echo "
				
			<table style = 'width:100%'>
				<tr>
					<td><h2>Name<h2></td>
					<td><h2>Address<h2></td>
					<td><h2>Potion<h2></td>
					<td><h2>Arrival Date<h2></td>
				</tr>
				<tr>
					<td>{$this->name}</td>
					<td>{$this->address}</td>
					<td>{$this->item}</td>
					<td>{$this->dueDate}</td>
				</tr>
			</table>
					
			";


		}

		public function updateDetails(){

			echo "
			
			<h3> Update the information below for: {$this->name} <h3>
				

				<form action = index.php method = post>

				<table style = 'width:100%'>
				<tr>
					<td><h4>Name<h4></td>
					<td><h4>Address<h4></td>
					<td><h4>Potion<h4></td>
					<td><h4>Arrival Date<h4></td>
				</tr>
				<tr>
					<td><input type = 'text' name = 'nameU' value='{$this->name}'</td>
					<td><input type = 'text' name = 'addressU' value='{$this->address}'></td>
					<td><input type = 'text' name = 'itemU' value='{$this->item}'></td>
					<td><input type = 'text' name = 'dueDateU' value='{$this->dueDate}'></td>
				</tr>
				</table>
				<input type = 'hidden' name = 'idU' value='{$this->id}'>
				<br><input type = 'submit' name='updating' value = 'Update Post'>
				
				</form>";


		}


	}
?>