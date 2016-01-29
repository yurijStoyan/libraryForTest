<?php
session_start();

if($_SESSION["activeUserLogin"]) {	

include_once("libDbConnect.php");


if($_POST['nBook'] == 'Add new book'){
	$value = null;
} else {
	$value = $_POST['adminValue'];
}


if($value != null) {
	$sql = "SELECT * FROM books, category WHERE id=$value AND books.cat_id = category.cat_id";
	$_SESSION["newBook"] = null;
	} /*end if(isset($value)) */ 
	else {
	$sql = "SELECT * FROM books, category WHERE books.cat_id = category.cat_id";
//	$image = 'default.jpg';
	$_SESSION["newBook"] = 'newBook';
} 

$result = $conn->query($sql);
if ($result->num_rows > 0) {   	// if 1
	while($row = $result->fetch_assoc()) {

		if($value != null) {
		$_SESSION['id'] = $id = $row['id'];
		$_SESSION['title'] = $title = $row['title'];
		$year = $row['year'];		
		$image = $row['image_path'];
		$cat_id = $row['cat_id'];		
		$cat_title = $row['cat_title'];	
		
		if ($row['image_path']) {
		$image_path = $row['image_path'];
		} else {$image_path = 'ser_img/default.jpg';}
		}

	} // end while
} // end if 1


$sql2 = "SELECT * FROM category";
$result = $conn->query($sql2);
if ($result->num_rows > 0) {  	// if2
	while ($row = $result->fetch_assoc()) {
		$categoryId[] = $row['cat_id'];
		$categoryTitle[] = $row['cat_title'];
	//	$rouCount++;
}  // end while
} // end if2
?>

<?php include_once('header.php');?>
<body>
<div class="top">
	<div id="top1">
		<h2 id="topH1">Edit library</h2>			
	</div>		
		<form action="redact.php" method="post" style="background: <?php echo 'url(../img/'.$image_path.') no-repeat 90% 60%';?>; min-width: 530px">
		<div class="blog-post-bot">
		<fieldset>
		<legend>Title: </legend>
		<input name="title" type="text" id="title" size="70" value="<?php echo $title;?>" required onkeypress="return filter_input(event,paramFiltrA1Sbs)">
		</fieldset>
		</div>
		<div class="blog-post-bot">
		<fieldset>
		<legend>Year: </legend>
			<input id="year" name="year" type="text" size="4" value="<?php echo $year;?>" required onkeypress="return filter_input(event,paramFiltr1)" required pattern="[0-9]{4}">
		</fieldset>
		</div>
		<div class="blog-post-bot">
		<fieldset>
		<legend >Category: </legend>
		<select id="selectCat_menu" class="topP4Input" name="cat_id">
		  	<?php for ($ccc = 0; $ccc < count($categoryTitle); ++$ccc) {
				  echo '<option '; 
				  if ($categoryId[$ccc] == $cat_id) {
					  echo 'selected'; };
				  echo 'value="'.$categoryId[$ccc].'">'.$categoryTitle[$ccc].'</option>';}?>
		  </select>
		</fieldset>
		<input id="image_path" name="image_path" type="hidden" value="<?php echo $image_path;?>">
		<input id="id" name="id" type="hidden" value="<?php echo $id;?>">
		</div>
		
		<div class="blog-post-bot">
		<fieldset>
			  <input type="submit" name="choice" class="topP4Input" value="Save and go to main page"><br>
			  <input type="submit" name="choice" class="topP4Input" value="Select IMAGE and save"><br>
			  <?php if($_POST['adminValue']) {
			  echo '<input type="submit" name="choice" class="topP7" value="Delete this book">';
				} 
	        $_POST['adminValue'] = null;?>
		</fieldset>
		</div>

		<div class="blog-post-bot">
		<a href="index.php"><input class="topP5" value="Way to main page"></a>
		<a href="libEnter.php"><input class="topP5" value="Go to admin mode"></a>
		</div>
		</form>	
		</div>
		<script src="js/filter.js"></script>
		
<?php	
	
} else {header('Location: index.php');} ?>
