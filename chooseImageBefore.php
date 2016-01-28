<?php session_start();

include_once("libDbConnect.php");

if($_SESSION['id']) {
	$id = $_SESSION['id'];
} else {

$sql = "SELECT id FROM books ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);
			  
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$id = $row['id'];
		}
} else {
    echo "0 results";
}
}

include_once('chooseImage.php');



