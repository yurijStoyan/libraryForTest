<?php 
session_start();

if($_SESSION["activeUserLogin"]) {
	
include_once("libDbConnect.php");

include_once("redactCategoryScript.php");

} else {header('Location: index.php');}