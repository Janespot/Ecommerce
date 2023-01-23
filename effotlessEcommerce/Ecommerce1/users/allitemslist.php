<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8" />
	</head>
	<body>
		<?php
		require("../connection/connect.php");
		
		$sql = "SELECT itemCode, itemName, description, imageName, price FROM products";
		
		$result = $conn->query($sql) or die("Error: ".$sql."<br />".$conn->error);
		echo"<table border = \"0\">";
		$x = 1;
		echo"<tr>";
		
		while($row=$result->fetch_assoc()){
			if($x <= 3){
				$x = $x + 1;
				$itemCode = $row['itemCode'];
				echo"<td style = \"padding-right:15px;\">";
				echo"<a href='itemdetails.php?itemcode=$itemCode'>";
				echo"<img src = ".$row['imageName']."style = \"max-width:220px;
				max-height:240px;width:auto;height:auto;\"></img><br />";
				echo $row['itemName']."<br />";
				echo "</td>";
			}else{
				$x = 1;
				echo "</tr><tr>";
			}
		}
		echo"</table>";
		?>
	</body>
</html>