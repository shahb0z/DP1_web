<?php
include_once 'header.php';
$flag = false;
$name = $error = $surname = $mail = "";	
if(isset($_POST['pass'])){
	$pass = sanitizeString($_POST['pass']);
	$name = sanitizeString($_POST['name']);
	$surname = sanitizeString($_POST['surname']);
	$mail = sanitizeString($_POST['mail']);
	if ($pass==""||$surname==""||$name==""||$mail==""){
		$error = "Some fields are free!!!";
	}
	else {
		if (!validate_email($mail)){
			$error = "Email Address is not a valid!";
			$mail = "";
		}
		else{
			$query = "SELECT mail FROM users WHERE mail = '$mail'";
			if (!mysql_num_rows(queryMysql($query)))
			{
				$query = "INSERT INTO users VALUES('$name', '$surname','$mail','$pass')";
				queryMysql($query);		
				$flag = true;
			}
			else
			{
				$error = "That username already exists<br /><br />";
				$mail = "";
				
			}
		}
	}
}	
if(!$flag){
	$content = "<h3 align = 'center'>Sign up Form</h3>
<form method = 'post' action='signup.php'><p class = 'error'>$error</p><br>
<table><tr><td>Name: </td><td><input type='text' maxlength='30' name='name' value='$name' placeholder = 'First Name'
	     /></td></tr>
<tr><td>Surname:  </td><td><input type='text' maxlength='30' name='surname' value='$surname' placeholder = 'Last Name'
	     /></td></tr>
<tr><td>E-mail:  </td><td><input type='text' maxlength='50' name='mail' value='$mail' placeholder = 'Email, it is username'
	     /></td></tr>
<tr><td>Password:  </td><td><input type='text' maxlength='20' name='pass' placeholder = 'Type your password'/></td></tr>
</table><br>
<input type='submit' value='Signup'/>
</form>";
	$title = "Sign Up";
	$profile = "Sign Up";
	include_once 'template.php';
}
else {
	$content = "<p class='ok'>Successful sign up!<br>Click to <a href = 'login.php'>log in</a></p>";
	$title = "MyWebsite";
	$profile = "";
	include_once 'template.php';
}

?>
