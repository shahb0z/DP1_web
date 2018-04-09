<?php
	include_once 'header.php';
	if(isset($_SESSION['user']))
	{
		destroySession();
		header("Location: index.php");
	}
	else {
		die("you are not logged in!");
	}
?>