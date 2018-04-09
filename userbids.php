<?php
	$user = $_SESSION['user'];
	$query = "SELECT name,descr,highPrice FROM goods WHERE bidder= '$user'";
	$result = queryMysql($query);
	$rows = mysql_numrows($result);
	$normal = "";
	if($rows==0){
		$normal = "You do not have bids!!!";
	}
	else{
		echo "<table class = \"list2\" border = \"1\"><tr><th>Item</th><th>Description</th><th>Your bid</th></tr>";
		for($i=0;$i<$rows;$i++){
			$row = mysql_fetch_row($result);
			echo "
			<tr>
			<td>$row[0]</td>
			<td>$row[1]</td>
			<td>$row[2]</td>
			</tr>";
		}
		echo "</table>";
	}
	if($normal!="")
		echo "<br><p class = \"normal\">$normal</p>";
?>