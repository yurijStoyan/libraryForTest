<?php 
session_start();
include_once("libDbConnect.php");
//include_once('header.php');

$id = $_POST['id'];
$title = $_POST['title'];
$year = $_POST['year'];
$image_path = $_POST['image_path'];

$cat_title = $_POST['cat_title'];
$cat_id = $_POST['cat_id'];

$sql = "DELETE FROM books WHERE id='$id'"; 

echo $_REQUEST['value'];

if ($conn->query($sql) === TRUE) {
 //  echo "New record created successfully";
	header('Location: index.php');
	exit(); 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>