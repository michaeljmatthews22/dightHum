<?php

require_once "class.php";

$id = 1;
$title = "Love Potion";

$callClass = new GetData();
$callClass->fetchData($id, $title);
