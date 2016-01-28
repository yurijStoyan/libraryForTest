<?php if($_SESSION["activeUserLogin"]) {
	$librarianView = 'admin';
	$library = 'Admin mode';
	$display = '';
	$_SESSION['id'] = null;
} else { 
	$library = 'Library'; 
	$display = 'none';
	   } ?>

<?php include_once('header.php');?>

<body>
<div class="top">
	<div id="top1">
		<a href="libEnter.php"><h1 id="topH1"><?php echo $library;?></h1></a>
		
		<form action="index.php" method="post">
			<i id="title_ar_up" class="fa fa-arrow-circle-up fa-2x topArrows"></i>
			<i id="title_ar_down" class="fa fa-arrow-circle-down fa-2x topArrows"></i>
			<input class="topP3Submit" type="submit" value="title">
			<input id="search" name="search" type="text" onkeypress="return filter_input(event,paramFiltrA1s)">
		</form>		
	</div>		
	
	<div id="top3">

		<form action="index.php" method="post">
			<i id="year_ar_up" class="fa fa-arrow-circle-up fa-2x topArrows"></i>
			<i id="year_ar_down" class="fa fa-arrow-circle-down fa-2x topArrows"></i>
			<input class="topP3Submit"  type="submit" value="year">
		  <select id="selectYear" class="topP3Input" name="year">
		  	<?php for ($ye = 0; $ye < count($yearJSON); ++$ye) {
				  echo '<option value="' . $yearJSON[$ye] .'">'.$yearJSON[$ye].'</option>';}?>
		  </select>
		</form>		
		
		<form action="index.php" method="post">
	  		<i id="cat_ar_up" class="fa fa-arrow-circle-up fa-2x topArrows"></i>
			<i id="cat_ar_down" class="fa fa-arrow-circle-down fa-2x topArrows"></i>
			<input class="topP3Submit"  type="submit" value="category">
			<p id="cat_ar_var"><?php echo $librarianView;?></p>
		  <select id="selectCat_menu" class="topP3Input" name="cat_menu">
		  <?php for ($ccc = 0; $ccc < count($categoryJSON); ++$ccc) {
				  echo '<option value="' . $categoryJSON[$ccc] .'">'.$categoryJSON[$ccc].'</option>';}?>
		  </select>
		</form>
		
		<p id="sortBy">Sort by:</p>
	</div>
</div>

		<form class="top" style="display: <?php echo $display;?>" action="redactBook.php" method="post">
		<input name="nBook" type="submit" class="topP4Input" value="Add new book">
		<a href="redactCategory.php"><input class="topP4Input" value="Redact category"></a>
		</form>
		

<div id="vivod">    </div>

<div class="blog-post-bot">
	<a href="#topMenu"><input type="button" id="prev" class="topP4prev" value="previous"></a>
	<a href="#topMenu"><input type="button" id="next" class="topP4next" value="next"></a>
</div>
     
<a id="arrowToTop" href="#topMenu"><i class="fa fa-arrow-circle-up fa-4x"></i></a>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>var temporaryJson = <?php echo $temporaryJson;?>;</script>
<script src='js/js_sort_json.js'></script>
<script>var admin = document.getElementById('cat_ar_var').innerHTML;</script>
<script src='js/js_create_elements.js'></script>
<script src='js/js_road_to_top.js'></script>
<script src="js/filter.js"></script>
</body>
</html>