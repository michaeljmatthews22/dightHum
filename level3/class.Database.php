<?php

	class Database_Class {

	private static $connection;

	public static function start(){

		$database = "tardissh_mjm287";
		$username = "tardissh_mjm287";
		$password = "7311!";

		//:: you are dealing with something that is static
		//you can't use the this because this references the current instance of //an object.  self says to refer to your own class
			
		self::$connection = new PDO("mysql:host=localhost;dbname={$database}", $username, $password);
		self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return self::$connection;

	}
}

	