<html>
	<head>
	
	</head>
	<body>
		<?php
		require("../connection/connect.php");
		
		$sql = "SELECT emailAddress, password, completeName FROM customers 
		WHERE emailAddress like '".$_POST['emailaddress']."'".
		"AND password like (PASSWORD('".$_POST['password']."'))";
		
		$result = $conn->query($sql) or die("Error: ".$sql."<br />".$conn->error);
		
		if($result->num_rows == 1){
			while($row = $result->fetch_assoc()){
				echo "Welcome ".$row['completeName']." to our online shop.<br />";
			}
		}else{
			?>
			<p>Invalid email and/or password</p>
			<p>Not Registered?<a href = "signup.php">Sign up</a> or try again here <a href = "login.php">Login</a>.</p>
			<?php
		}
		?>
	</body>
</html>