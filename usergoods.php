
<?php
	$error = $success = $normal = "";
	if(isset($_POST['add'])){
		?>  <form action="user.php?view=goods" method="post"><table>
				<tr><td>Name:  </td><td><input type="text" name="name"></td></tr>
				<tr><td>Description:  </td><td><textarea name="descr"></textarea></td></tr></table><br>
				<input type="submit" value="submit" name="addOp"></form>
				
			<?php
			
		}
	if (isset($_POST['addOp'])){
		if(isset($_POST['name'])&&isset($_POST['descr'])&&$_POST['name']!=""&&$_POST['descr']!=""){
			$date = date( 'Y-m-d H:i:s', time());
			$name = $_POST['name'];
			$descr = $_POST['descr'];
			$user = $_SESSION['user'];
			$query_d = "SELECT * FROM goods WHERE name = '$name' AND descr = '$descr' AND owner = '$user'";
			$result_d = queryMysql($query_d);
			$rows_d = mysql_num_rows($result_d);
			if($rows_d!=0){
				$error = "Item already exists with the same name and description!";
			}
			else{
				$query_s = "INSERT INTO goods VALUES(NULL,'$name','$descr','$user',NULL,'$date',0)";
				$result_s=queryMysql($query_s);
				if ($result_s){
					$success = "Item successfully added!!!";
				}
			}
		}
		else{
			$error = "Fill all fields in order to add item!";
			
		}
		
	}
		if (!isset($_POST['add'])){
			$query = "SELECT name,descr,highPrice,bidder FROM goods WHERE owner = '$user'";
			$result = queryMysql($query);
			$rows = mysql_num_rows($result);
			if($rows==0){
				$normal = "There is no item in your list!!!";
			}
?>
	<table class="list2" border="1">
  <tr>
    <th>Item</th>
    <th>Description</th>
    <th>Highest bid</th>
    <th>Bidder</th>
    </tr>
 <?php 
  	for ($i=0;$i<$rows;$i++){
  	$row = 	mysql_fetch_row($result);
  	echo "
		  <tr>
		    <td>$row[0]</td>
		    <td class = \"fcell\">$row[1]</td>
			<td>$row[2]</td>
			<td>$row[3]</td>
		  </tr>";
  	}
 ?>
</table>
<form action="user.php?view=goods" method="post">
	<br><input type="submit" value="Add Item" name="add">
	<?php 
	}
	if ($error!="")
		echo "<br><p class = \"error\">$error</p>";
	if($success!="")
		echo "<br><p class = \"ok\">$success</p>";
	if($normal!="")
		echo "<br><p class = \"normal\">$normal</p>";
	?>
</form>

