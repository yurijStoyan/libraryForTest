<?php 
session_start();
include_once("libDbConnect.php");
//include_once('header.php');

$cat_id = $_POST['cat_id'];
$cat_title = htmlentities($_POST['cat_title']);

$choice = $_POST['choice'];

switch ($choice) {
	case "Change":
		$sql = "UPDATE category SET cat_title='$cat_title' WHERE cat_id='$cat_id'";
		break;		
	case "Delete":
		$sql = "DELETE FROM category WHERE cat_title='$cat_title'"; 
		break;	
	case "createCat":
		$sql = "INSERT INTO category (cat_title) VALUES ('$cat_title')";
		break;
}

if ($conn->query($sql) === TRUE) {
 //  echo "New record created successfully";
	header('Location: redactCategory.php');
	exit(); 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>