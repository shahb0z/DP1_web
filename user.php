<?php
	include 'header.php';
	force_https();
	if (!isset($_SESSION['user'])){
		header("Location: index.php");
	}else{
	$now = time();
	if ($now>$_SESSION['expire']) {
		destroySession();
		$content = "<p class=\"error\">Session expired!</p><p> click <a href = 'login.php'>Log in</a>";
		$profile = "Logged out";
		$title = "MyWebsite";
	}else{
		$user = $_SESSION['user'];
		$profile = $user;
		$title = "MyWebsite";
		$content = "";
		$_SESSION['expire'] = time() + 2*60;
	}}
	include 'template.php';
	?>
