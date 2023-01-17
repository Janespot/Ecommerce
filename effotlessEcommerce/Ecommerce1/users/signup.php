<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "UTF-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<script src = "checkform.js"></script>
		
	</head>
	<body>
		<noscript>JavaScript not in your browser</noscript>
		<form action = "addcustomer.php" method = "post" onSubmit = "return validate(this);" >
			<table border = "0" cellspacing = "1" cellpadding = "3">
				<tr>
					<td colspan = "2" align = "center">Sign Up</td>
				</tr>
				<tr>
					<td>Email Address: </td><td><input size = "20" type = "text" name = "emailaddress" required />
					<span id = "emailmsg"></span></td>
				</tr>
				<tr>
					<td>Password: </td><td><input size = "20" type = "password" name = "password" required />
					<span id = "passwdmsg"></span></td>
				</tr>
				<tr>
					<td>Re-type Password: </td><td><input size = "20" type = "password" name = "repassword" required />
					<span id = "repasswdmsg"></span></td>
				</tr>
				<tr>
					<td>Full Name: </td><td><input size = "50" type = "text" name = "fullname" required />
					<span id = "usermsg"></span></td>
				</tr>
				<tr>
					<td>Address: </td><td><input size = "80" type = "text" name = "address1" /></td>
				</tr>
				<tr>
					<td></td><td><input size = "80" type = "text" name = "address2" /></td>
				</tr>
				<tr>
					<td>City: </td><td><input size = "30" type = "text" name = "city" /></td>
				</tr>
				<tr>
					<td>State: </td><td><input size = "30" type = "text" name = "state" /></td>
				</tr>
				<tr>
					<td>Country: </td><td><input size = "30" type = "text" name = "country" /></td>
				</tr>
				<tr>
					<td>Zip Code: </td><td><input size = "20" type = "text" name = "zipcode" /></td>
				</tr>
				<tr>
					<td>Phone No: </td><td><input size = "30" type = "text" name = "phoneno" /></td>
				</tr>
				<tr>
					<td><input type = "submit" name = "submit" value = "Sign Up" /></td>
					<td><input type = "reset" value = "Cancel" /></td>
				</tr>
			</table>
		</form>
	</body>
</html>