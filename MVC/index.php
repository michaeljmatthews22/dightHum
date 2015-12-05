<?php

	class Model {
		public $message;
		//constructor whenever you create an object the construct magic function will be 
		//called
		public function __construct() {
			$this->message = "MVC + PHP = Everything is Awesome";
		}
	}

	class View {
		private $model;
		private $controller;

		public function __construct($model, $controller){

			$this->model = $model;
			$this->controller = $controller;

		}

		public function output(){

			//? is how you start a Get Method
			return "
			<p>{$this->model->message}</p>
			<p><a href='?action=change'>Change</a></p>
			<p><a href='?action=change1'>Change 1</a></p>
			<p><a href='?action=change2'>Change 2</a></p>

			";
		}
	}

	class Controller {
		private $model;

		public function __construct($model){
			$this->model = $model;
		}

		public function change(){
			$this->model->message = "your updated message will now appear. All thanks to MVC";
		}
		public function change1(){
			$this->model->message = "Power is the way to do it";
		}
		
	}

	$model = new Model();
	$controller = new Controller($model);
	$view = new View($model, $controller);

	if (isset($_GET['action']) && !empty($_GET['action']) ){
		$controller->{$_GET['action']}();
	}

	echo $view->output();

//header ("location: {$_SERVER[PHP_SELF]}");
?>

