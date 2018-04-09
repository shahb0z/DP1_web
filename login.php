<?php
include_once 'header.php';
force_https();
	$error=$username = "";
	if (isset($_POST['pass'])){
		$pass = sanitizeString($_POST['pass']);
		$username = sanitizeString($_POST['user']);
		if ($pass == ""||$username == "")
		{
			$error = "Some fileds are free!!!";
		}
		else {
			$query = "SELECT mail,pass FROM users WHERE mail = '$username' AND pass = '$pass'";
			if (mysql_num_rows(queryMysql($query)) == 0)
			{
				$error = "Username/Password invalid<br />";
			}
			else
			{
				$_SESSION['user'] = $username;
				$_SESSION['pass'] = $pass;
				$_SESSION['expire'] = time()+2*60;
				header("Location: user.php");
			}
		}
	}
if(!isset($_SESSION['user'])){
$title = "Login Page";
$content ="
<form method='post' action='login.php'>$error
<table><tr>
<td>Username:  </td><td><input type='text' maxlength='30' name='user'
	value='$username' /></td></tr>
<tr><td>Password:  </td><td><input type='password' maxlength='20' name='pass' /></td></tr>
</table><br>
<input type='submit' value='Login' />
</form>";
}
$profile = "Log In";
include 'template.php';
?>
