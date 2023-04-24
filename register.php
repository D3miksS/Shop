<html>
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
	<?php
		include('head.php');
		include('menu.php');
	?>
	<br>
	<form method="POST" action="register.php">
		<input type="text" name="USER" placeholder="User" class="inp" required> <br>
		<input type="password" name="PASS" placeholder="Password" class="inp" required> <br>
		<input type="text" name="FIRST" placeholder="First" class="inp" required> <br>
		<input type="text" name="LAST" placeholder="Last" class="inp" required> <br>
		<input type="submit" name="REG" value="REGISTER">
	</form>
</body>
</html>
<?php
	if(isset($_POST['REG'])){
		$user = mysql_real_escape_string($_POST['USER']);
		$pass = mysql_real_escape_string($_POST['PASS']);
		$first = mysql_real_escape_string($_POST['FIRST']);
		$last = mysql_real_escape_string($_POST['LAST']);
		$hash = password_hash($pass, PASSWORD_DEFAULT);
		include('conn.php');
		$query = "INSERT INTO user VALUES (NULL, '$user', '$first', '$last', '$hash')";
		$result = mysqli_query($link, $query);
		if($result){
			echo 'User added';
			echo '<br><a href="index.php"><input type="button" value="LOGIN"></a>';
		}else{
			echo 'Sorry, a problem';
		}
		}
?>