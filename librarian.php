<?php session_start();
if($_SESSION['absentUser']){
	$message = $_SESSION['absentUser'];
	$checkLog = '';
	$exit = 'none';
	$checkLog2 = '';
	$color = 'red';
}

if(!isset($_SESSION['absentUser'])){
	$checkLog2 = 'none';
	$message = 'Enter your login and password';
	$color = 'white';
}

if ($_SESSION['activeUserLogin']) {
		$checkLog = 'none';
		$exit = '';
		$message = 'Hi, '.$_SESSION['activeUserLogin'];
		$color = 'wheat';
	} else {
		$checkLog = '';
		$exit = 'none';
	}
$_SESSION['absentUser'] = null;
?>

<?php include_once('header.php');?>
<body>
<div class="top">
	<div id="top1">
		<h2 id="topH1" style="color:<?php echo $color;?>"><?php echo $message;?></h2>			
	</div>		
		
		<div style="display:<?php echo $checkLog;?>">
		
		<form action="checkLib.php" method="post">
		<div class="blog-post-bot">
		<fieldset>
		<legend>Login: </legend>	
			<input id="login" name="login" type="text" onkeypress="return filter_input(event,paramFiltrA1)" autofocus required>
		</fieldset>
		</div>
		<div class="blog-post-bot">
		<fieldset>
		<legend>Password: </legend>
			<input id="password" name="password" type="password" onkeypress="return filter_input(event,paramFiltrA1)" required>
		</fieldset>
		</div>
		<div class="blog-post-bot">
		<fieldset>
			<a href="index.php"><input class="topP5" value="To main page"></a>
			<input class="topP4" id="submit" type="submit" value="Login">
		</fieldset>
		</div>
		</form>	
		</div>	
		
		<div style="display: <?php echo $exit;?>">
		<form style="display: <?php echo $exit;?>" action="exit.php" method="post">
			<input class="topP4" type="submit" value="Click here for exit"/>
		</form>
		</div>

</div>
<script src="js/filter.js"></script>
</body>
</html>