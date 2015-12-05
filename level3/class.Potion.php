
	<?php
	
	class Potion_Class {
		public $id;
		public $name;
		public $effects;
		public $ingredients;
		public $stock;

		public function showDetails() {

			echo "
				<center><br>
				<div class='potion'>
					<table border = s1>
					<tr>
					<th>Name</th>
					<th>Effects</th>
					<th>Ingredients</th>
					<th>Stock</th>
					<th>ID</th>
					</tr>
					<tr>

					<td>{$this->name}</td>
					<td>{$this->effects}</td>
					<td>{$this->ingredients}</td>
					<td>{$this->stock}</td>
					<td>{$this->id}</td>
					</tr>
				</center>
			";
			
		}

		public function updateDetails(){

			echo "
			
			<h3> Update the information below <h3>
				{$this->name}
				<table>
				<tr>
					<th>Name</th>
					<th>Effects</th>
					<th>Ingredients</th>
					<th>Stock</th>
					<th>ID</th>
					<th> Update </th>
				</tr>

				<form action = index.php method = post>
				<tr>
				<td> <input type = text name = nameU value={$this->name} </td>
				<td> <input type = text name = effectsU value={$this->effects} </td>
				<td> <input type = text name = ingredientsU value={$this->ingredients} </td>
				<td> <input type = text name = stockU value={$this->stock} </td>
				<td> <input type = text name = idU value={$this->id} </td>
				
				<td> <input type = submit name=updating value = updating </td>
				</form>";


		}

		public function showSearch(){
			
			echo "
			<p>Name: {$this->name}</p>
			<p>Potion: {$this->effects}</p>
			<p>Ingredients: {$this->ingredients}</p>
			<p>Stock: {$this->stock}</p>
			<p>Id: {$this->id}</p>


			";
		}


	}
?>