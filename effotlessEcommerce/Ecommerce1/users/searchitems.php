<?php
include("menu.php");
require("../connection/connect.php");

$tosearch=$_POST['tosearch'];

$query = "SELECT * FROM products where ";
$query_fields = array();

$sql = "SHOW COLUMNS from products";

$columnlist = $conn->query($sql) or die("Error: ".$sql."<br />".$conn->error);
while($arr=$columnlist->fetch_assoc()){
	$query_fields[] = $field." like('%".$tosearch."%')";
}
$query .= implode(" OR ", query_fields);
$result = $conn->query($query) or die($conn->error);

echo "<table border = \"0\">";
$x = 1;
echo "<tr>";
while($row = $result->fetch_assoc()){
	if($x <= 3){
		$x += 1;
		echo "<td style = \"padding-right:15px;\">";
		$itemCode=$row['itemCode'];
		echo "<a href = itemdetails.php?itemcode=$itemCode>";
		echo '<img src = '.$imageName.'style = "max-width:220px;max-height:240px;
		width:auto;height:auto;></img><br />';
		echo $row['itemName']."<br />";
		echo"</a>";
		echo "$".$row['price']."<br />";
		echo "</td>";
	}else{
		$x = 1;
		echo "</tr><tr>";
	}
}
echo "</table>";

