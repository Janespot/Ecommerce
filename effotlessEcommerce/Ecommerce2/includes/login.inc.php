<?php
if(!isset($login_errors))$login_errors = array();
require_once('form_functions.inc.php');
?>
<div class = 'title'>
<h4>Login</h4>
</div>
<?php
$login_errors = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$e = mysqli_real_escape_string ($conn, $_POST['email']);
	} else {
		$login_errors['email'] = 'Please enter a valid email address!';
	}
	if (!empty($_POST['pass']) ) {
		$p = mysqli_real_escape_string ($conn, $_POST['pass']);
	} else {
		$login_errors['pass'] = 'Please enter your password!';
	}
	if (empty($login_errors)) {
		$q = "SELECT id, username, type, IF(date_expires > NOW( ), true, 
		false) FROM users WHERE (email='$e' AND pass='" . get_password_hash($p) . "')";
		$r = mysqli_query ($conn, $q);
		if (mysqli_num_rows($r) == 1) {
			$row = mysqli_fetch_array ($r, MYSQLI_NUM);
			$_SESSION['user_id'] = $row[0];
			$_SESSION['username'] = $row[1];
			if ($row[2] == 'admin') $_SESSION['user_admin'] = true;
			if ($row[3] == 1) $_SESSION['user_not_expired'] = true;
		}else{
			$login_errors['login'] = 'The email address and password do not match those on file.';
		}
	}
}
?>
<form action = "index.php" method = "post" accept-charset = "utf-8">
<p><?php if(array_key_exists('login', $login_errors)){
			echo '<span class = "error">'.$login_errors['login'].'</span><br />';
         }?>
	<label for="email"><strong>Email Address</strong></label><br />
	<?php create_form_input('email', 'text', $login_errors); ?><br /><br />
	<label for="pass"><strong>Password</strong></label><br />
	<?php create_form_input('pass', 'password', $login_errors); ?><br />
	<a href="forgot_password.php" align="right">Forgot password?</a><br /><br />
	<input type="submit" value="Login &rarr;"></p>
</form>