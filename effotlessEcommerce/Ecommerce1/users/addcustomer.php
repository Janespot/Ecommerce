<?php
require("../connection/connect.php");

$email        = $_POST["emailaddress"];
$password     = $_POST["password"];
$repassword   = $_POST["repassword"];
$fullname     = $_POST["fullname"];
$address1     = $_POST["address1"];
$address2     = $_POST["address2"];
$city         = $_POST["city"];
$state        = $_POST["state"];
$country      = $_POST["country"];
$zipcode      = $_POST["zipcode"];
$phone        = $_POST["phoneno"];

$sql = "INSERT INTO customers (emailAddress, password, completeName, addressLine1, addressLine2, city, state, zipCode, country, cellPhoneNo)
VALUES ('$email', (PASSWORD('$password')), '$fullname', '$address1', '$address2', '$city', '$state', '$zipcode', '$country', '$phone')";

$result = $conn->query($sql) or die ("Error: ".$sql."<br />".$conn->error);

if($result){
	echo "<p>Welcome <?php echo $fullname;?> your account is successfully created!</p>";
}else{
	echo "<p>Error occured! Try using a different email address.</p>";
}

