<?php 
if($_SESSION["activeUserLogin"]) {

include_once('header.php');
include_once('smallMenu.php');
?>

<body>
<div class="top">
	<div id="top1">
		<h2 id="topH1">Edit library</h2>			
	</div>
<div>
	<form class="top" enctype="multipart/form-data" action="" method="POST">
			<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
			<input name="img" class="topP5" type="file" value="Choose image for this book"/>
			<input type="submit" class="topP5" value="Upload File"/>
	</form> 
</div>

<?php
$uploaddir = 'img/';
$uploadfile = $uploaddir . basename($_FILES['img']['name']);

echo '<div>';
if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
    echo "<div class='top'><input type='button' class='topP5none' value = 'Image was uploaded'/></div>";
	//header('Location: index.php');
} 

$img = $_FILES['img']['name'];
	
$sql = "UPDATE books SET image_path = '$img' WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
	exit(); 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
echo '</div>';
$conn->close();
	
} else {header('Location: index.php');}
?>