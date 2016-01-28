<?php 
session_start();


include_once("libDbConnect.php");

include_once("getBooksFromBase.php");

include_once("librarian.php");

if($_SESSION["activeUserLogin"]) {

include_once("smallMenu.php");

}