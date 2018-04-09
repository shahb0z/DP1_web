<?php
	include_once 'header.php';
	echo "<h1 align = 'center'>List Of Goods!</h1>";
	$query = "SELECT name,descr,highPrice FROM goods ORDER BY date";
	$result=queryMysql($query);
	echo "<table class=\"list2\" border = \"2\"><tr><th>Item</th><th>Description</th><th>Highest Bid</th></tr>";
	$rows = mysql_num_rows($result);
	for($i=0;$i<$rows;$i++){
		$row=mysql_fetch_row($result);
		echo 
		"<tr>
			<td>$row[0]</td><td class = \"fcell\">$row[1]</td><td>$row[2]</td>
		</tr>";
		 
	}
	echo "</table><br>";
	echo "<p class = \"normal\">Please Sign up/Log in to make bids!</p>";
?>