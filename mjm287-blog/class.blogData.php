
	<?php
	
	class blogData_Class {
		public $id;
		public $name;
		public $comments;
		

		public function showDetails() {

			echo "
				<br>
					<center><h3>{$this->name}</h3>
					Date: {$this->time}
					<br><br>
					</center>
					{$this->comments}<br>
			";
			
		}

		public function updateDetails(){

			echo "
			
			<h3> Update the information below <h3>
				{$this->name}

				<form action = index.php method = post>
			
				<br>
				<textarea style='width: 900px; height: 500px;' name = 'commentsU'> {$this->comments} </textarea>
				<input type = 'hidden' name = 'idU' value='{$this->id}'>
				<input type = 'hidden' name = 'nameU' value='{$this->name}'>
				<br><input type = 'submit' name='updating' value = 'Update Post'>
				
				</form>";


		}

		public function showSearch(){
			
			echo "

			<p>Name: {$this->name} <br>
			Date: {$this->time}</p>
			<p>Blog Post:  {$this->comments}</p>
			


			";
		}


	}
?>