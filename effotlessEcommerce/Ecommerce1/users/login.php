<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
	</head>
	<body>
		<h4 align = "center">Login</h4>
		<form action = "validateuser.php" method = "post" >
			<table border = "0" cellspacing = "1" cellpadding = "3" >
				<tr><td>Email: </td><td><input type = "text" name = "emailaddress" required /></td></tr>
				<tr><td>Password: </td><td><input type = "password" name = "password" required /></td></tr>
				<tr><td colspan = "2" align = "center"><input type ="submit" value = "Login" name = "submit" /></td></tr>
			</table>
		</form>
	</body>
</html>