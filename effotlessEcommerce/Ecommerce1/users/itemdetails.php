<?php
include("menu.php");
require("../connection/connect.php");
$code = $_REQUEST['itemCode'];
$query = "SELECT itemCode, itemName, description, imageName, price from products WHERE itemCode like $code"; 