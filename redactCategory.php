<?php
session_start();

if($_SESSION["activeUserLogin"]) {	

include_once("libDbConnect.php");

$value = $_POST['adminValue'];
	
	

$sql = "SELECT * FROM category ORDER BY cat_title";
$result = $conn->query($sql);
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
		<h2 id="topH1">Edit category</h2>			
	</div>		
		
		<form action="redactCat.php" method="post" style="background: <?php echo 'url(../img/'.$image.') no-repeat 90% 60%';?>; min-width: 530px">
		<div class="blog-post-bot">
		<fieldset>
		<legend>New category:</legend> 
			  <input type="text" class="topPrInput" name="cat_title" onkeypress="return filter_input(event,paramFiltrA1s)">
			  <input type="radio" name="choice" value="createCat" checked style="display:none"> 
			  <input type="submit" class="topP4Input" value="Create new category">
		</fieldset>
		</div>
		</form>
		
		<div class="blog-post-bot">
		<fieldset id="selectCat_menu">
	  	<legend>Redact category:</legend>  	
   		  	
    		  	<?php  for ($ccc = 0; $ccc < count($categoryTitle); ++$ccc) {
				  echo '<form action="redactCat.php" method="post">
				<input type="hidden" name="cat_id" value="'.$categoryId[$ccc].'">
				  <input class="topP4Input" type="text" name="cat_title" value="'.$categoryTitle[$ccc]
					   .'" onkeypress="return filter_input(event,paramFiltrA1s)">
					 <input type="submit" name="choice" class="topP6" value="Change">
			 		 <input type="submit" name="choice" class="topP7" value="Delete"><br>
					 </form>'
					 ;} ?>
					   
		</fieldset>
		</div>
		
<!--		  <input type="radio" name="cat_id" value="'.$categoryId[$ccc].'">-->
		
		<div class="blog-post-bot">
		<a href="index.php"><input class="topP5" value="Way to main page"></a>
		<a href="libEnter.php"><input class="topP5" value="Go to admin mode"></a>
		</div>
		</div>
		<script src="js/filter.js"></script>
<?php
	} else {header('Location: index.php');} ?>