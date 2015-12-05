<?php
//dataClass

	class Data_Class{

		private $connection;
		public function __construct(){
			$this->connection = Database_Class::start();
		}

		public function newBlog(){

			$new = "
			INSERT INTO 
				blogDatabase
				(name, comment, categories)
			VALUES 
				(:name, :comment, :categories)
			";


		}

	}