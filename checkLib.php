<?php
session_start();
include_once('libDbConnect.php');

$login = htmlentities($_POST['login']);
$password = htmlentities(md5(base64_encode($_POST['password'])));


$sql = "SELECT * FROM admin WHERE password='$password'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    
    $_SESSION["activeUserLogin"] = $login;
}
			$_SESSION["absentUser"] = 'No user with such login and password';
			header("Location: libEnter.php");