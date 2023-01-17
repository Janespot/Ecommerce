<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8" />
	</head>
	<body>
	<?php
	include("menu.php");
	require("../connection/connect.php");

	$category = $_REQUEST['category'];

	$sql = "SELECT itemCode, itemName, description, imageName, price FROM products".
	"WHERE category like '$category' order by itemCode";

	$result = $conn->query($sql) or die("Error: ".$sql. "<br / >".$conn->error);

	echo "<table border = \"0\">";
	$x = 1;
	echo "<tr>";
	while($row = $result->fetch_assoc()){
		if($x <= 3){
			$x += 1;
			echo "<td style = \"padding-right:15px;\">";
			echo "<a href = itemdetails.php?itemcode=$row['itemCode']>";
			echo "<img src = ".$row['imageName']."style = \"max-width:220px;max-height:240px;
			width:auto;height:auto;\"></img><br />";
			echo $row['itemName']."<br />";
			echo "</a>";
			echo "$".$row['price']."<br />";
			echo "</td>";
		}else{
			$x = 1;
			echo "</tr><tr>";
		}
	}
	echo "</table>";
	?>
	</body>
</html>

