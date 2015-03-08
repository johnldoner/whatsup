<?php 
session_start();
if(!$_SESSION['username']) {
	header("Location:../login.php");
 }
$username = $_SESSION['username'];
?>