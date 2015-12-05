<?php

//setting forth of adding it into the database
session_start();
include 'index.php';
require_once 'class.Database.php';
//require_once 'CRUDe.php';

$check = strlen($_POST["name"]);

if ($check != 0){
	$callClass = new Data_Class();

	//putting all the categories into an array to post
	$categoriesArray = array();
	array_push($categoriesArray, $_POST["art"]);
	$callClass->newBlog($_POST["name"], $_POST["comment"], $categoriesArray);
}