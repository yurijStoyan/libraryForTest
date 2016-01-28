<?php 
session_start();

include_once("libDbConnect.php");

$choice = $_POST['choice'];

switch ($choice) {
	case "Save and go to main page":
		include_once("redactSaveBook.php");
		break;		
	case "Select IMAGE and save":
		include_once("redactBookScript.php");
		break;	
	case "Delete this book":
		include_once("deleteBook.php");
		break;
}