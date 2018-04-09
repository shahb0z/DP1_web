<?php
	setcookie('enabled', '1');
	if(isset($_COOKIE['enabled'])&&$_COOKIE['enabled']=='1'){
		include_once 'header.php';
		$title = 'MyWebsite';
		$profile = "Home Page";
		$content = "<h3 align = 'center'>Welcome To My Website</h3>";
		include 'template.php';
	}else{
		if(isset($_GET['nocookies'])&&$_GET['nocookies']==1){
			die('Cookies are disabled. ');
		}else{
			header('Location: index.php?nocookies=1');
		}
	}
?>

