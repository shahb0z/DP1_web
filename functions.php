<?php
	$db_host = 'localhost';
	$db_user = 's210749';
	$db_pass = 'shahboz';
	$db_name = 's210749';
	mysql_connect($db_host,$db_user,$db_pass);
	mysql_select_db($db_name);
	function queryMysql($query)
	{
		$result = mysql_query($query) or die(mysql_error());
		return $result;
	}
	function createTable($name, $query)
	{
		if (tableExists($name))
		{
			echo "Table '$name' already exists<br />";
		}
		else
		{
			queryMysql("CREATE TABLE $name($query)");
			echo "Table '$name' created<br />";
		}
	}
	
	function tableExists($name)
	{
		$result = queryMysql("SHOW TABLES LIKE '$name'");
		return mysql_num_rows($result);
	}
	function sanitizeString($var)
	{
		$var = strip_tags($var);
		$var = htmlentities($var);
		$var = stripslashes($var);
		return mysql_real_escape_string($var);
	}
	function destroySession()
	{
		$_SESSION=array();
	
		if (session_id() != "" || isset($_COOKIE[session_name()]))
			setcookie(session_name(), '', time()-2592000, '/');
	
		session_destroy();
	}
	function validate_email($field) {
		if (!((strpos($field, ".") > 0) &&
				(strpos($field, "@") > 0)) ||
				preg_match("/[^a-zA-Z0-9.@_-]/", $field))
					return false;
				return true;
	}
	
	//security functions
	function current_protocol()
	{
		$protocol = 'http';
	
		if ( array_key_exists( 'HTTPS', $_SERVER ) && $_SERVER['HTTPS'] === 'on' )
		{
			$protocol = 'https';
		}
	
		return $protocol;
	}
	
	function current_has_ssl()
	{
		return current_protocol() == 'https';
	}
	
	function force_https()
	{
		if ( current_has_ssl() == false )
		{
			header( "HTTP/1.1 301 Moved Permanently" );
			header("Location: https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);
			exit();
		}
	}
	
?>