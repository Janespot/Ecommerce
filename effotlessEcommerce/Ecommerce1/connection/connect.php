<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "shopping";

$conn = new mysqli($host, $user, $pass, $db);
if($conn->connect_error){
	die ("Connection error: ".$conn->connect_error);
}
