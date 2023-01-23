<?php
$live = false;
$contact_email = 'you@example.com';

define('BASE_URI','../Ecommerce2/');
define('BASE_URL','www.example.com/');
define('MYSQL', './includes/mysql.inc.php');

session_start();

function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars){//a function that reports errors
	global $live, $contact_email;
	$message = "An error occured in script '$e_file'on line $e_line:\n$e_message\n";//error message
	$message .= "<pre>".print_r(debug_backtrace(),1)."</pre>\n";
	if(!$live){
		echo "<div class = 'error'>".nl2br($message)."</div>";
	}else{
		error_log($message,1,$contact_email,'From:admin@example.com');
		if($e_number!=E_NOTICE){
			echo "<div class = 'error'>A system error occured. We apologize for the inconvenience.</div>";
		}
	}
	return true;
}
set_error_handler('my_error_handler');