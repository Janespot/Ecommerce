<?php
DEFINE('DB_USER','root');
DEFINE('DB_PASSWORD','');
DEFINE('DB_HOST','localhost');
DEFINE('DB_NAME','products');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

mysqli_set_charset($conn, 'utf8');//establishes the character set to be used for communication between PHP scripts and the database

function escape_data($data){
	global $conn;
	if(get_magic_quotes_gpc())$data = stripslashes($data);//strips extra slashes if Magic Quotes is on
	return mysqli_real_escape_string(trim($data), $conn);//returns a trimmed, secure version of the data
}
function get_password_hash($password){ //this is a function that hashes password for security
	global $conn;
	return mysqli_real_escape_string($conn, hash_hmac('sha256', $password, 'c#haRl891', true));
}
if(!headers_sent()){
	function redirect_invalid_user($check = 'user_id', $destination = 'index.php', $protocol = 'http://'){//function to 
	//redirect unauthorised users
		if(!isset($_SESSION[$check])){
			$url = $protocol.BASE_URL.$destination;
			header("Location:$url");
			exit();
		}
	}
}else{
	include_once('./includes/header.html');
	trigger_error('You do not have permission to access this page. Please login and try again.');
	include_once('./includes/footer.html');
}