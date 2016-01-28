<?php 
session_start();
include_once("libDbConnect.php");
//include_once('header.php');

$id = $_POST['id'];

$strPOST = htmlentities($_POST['title']);
$strOrder = "'";
$strReplace = "`";
$title = str_replace($strOrder, $strReplace, $strPOST);

$year = $_POST['year'];
if ($_POST['image_path']) {
$image_path = $_POST['image_path'];
} else {$image_path = 'ser_img/default.jpg';}

$cat_title = $_POST['cat_title'];
$cat_id = $_POST['cat_id'];

$sql = "UPDATE books SET title='$title', year='$year', cat_id = '$cat_id', image_path='$image_path' WHERE id='$id'"; 

if($_SESSION["newBook"]){
	$sql = "INSERT INTO books (title, year, cat_id, image_path) VALUES ('$title', '$year', '$cat_id', '$image_path')";
	//$_SESSION["newBook"] = null;
} 

if ($conn->query($sql) === TRUE) {
 //  echo "New record created successfully";
	header('Location: chooseImageBefore.php');
	exit(); 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>