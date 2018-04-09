<?php
	$error = "";
	$user = $_SESSION['user'];
	if (isset($_POST['makebid'])){
		if (isset($_POST['price'])&&$_POST['price']!=""){
			
			$price = sanitizeString($_POST['price']);
			$id_s = sanitizeString($_GET['ids']);
			$query = "SELECT highPrice FROM goods WHERE id = '$id_s'";
			$result = queryMysql($query);
			$row = mysql_fetch_row($result);
			if($price>$row[0]){
				$query = "UPDATE goods SET highPrice = '$price',bidder = '$user' WHERE id = '$id_s'";
				queryMysql($query);
			}
			else {
				$error =  "You can not set price less or equal than actual one!!!";
			}
		}
		else{
			$error = "Please enter the price!!!";
		}
	}
	if (isset($_GET['bid'])&&sanitizeString($_GET['bid'])=='1'){
		$id = sanitizeString($_GET['id']);
		
		
		echo "<form action=\"user.php?view=list&ids=$id\" method=\"post\">
			Enter the price: <input type=\"text\" name=\"price\">
			<input type=\"submit\" value=\"submit\" name=\"makebid\">
		</form>";
		
	}
	else{
		
		$query = "SELECT id,owner,name,descr,highPrice FROM goods";
		$result=queryMysql($query);
		echo "<table class = \"list2\" border = \"1\"><tr><th>Item</th><th>Description</th><th>Highest Bid</th><th></th></tr>";
		
		$rows = mysql_num_rows($result);
		for($i=0;$i<$rows;$i++){
			$row=mysql_fetch_row($result);
			if ($row[1]!=$user){
			echo
			"<tr>
			<td>$row[2]</td><td class = \"fcell\">$row[3]</td><td>$row[4]</td>";
			
				echo "<td><a href = \"user.php?view=list&bid=1&id=$row[0]\">bid</a></td>";
				echo "</tr>";	
			}
		}
		echo "</table>";
		echo "<p class = \"error\">$error</p>";
	}
	
	
?>
