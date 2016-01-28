<?php

$inpSearch = $_POST['search'];
$inpYear = $_POST['year'];
$inpCat_title = $_POST['cat_menu'];

$sql = "SELECT * FROM books, category WHERE books.cat_id = category.cat_id";

if ($inpSearch) 	{
       $sql = "$sql AND title LIKE '%$inpSearch%'";
	} 
 elseif ($inpYear) {
       $sql = "$sql AND year=$inpYear";
	} 
 elseif ($inpCat_title) {
       $sql = "$sql AND cat_title='$inpCat_title'";
	} else {
	 $sql;
 }

$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$temporaryJson[] = $row;
		$rouCount++;
}	
$temporaryJson = json_encode($temporaryJson);
}

$sql2 = "SELECT cat_title FROM category";
$result = $conn->query($sql2);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$categoryJSON[] = $row['cat_title'];
	//	$rouCount++;
}
}

$sql3 = "SELECT year FROM books";
$result = $conn->query($sql3);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$yearJSON[] = $row['year'];
		
		$yearJSON = array_unique($yearJSON);
		sort($yearJSON);
}
}

$conn->close();
?>