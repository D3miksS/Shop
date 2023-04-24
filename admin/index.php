<html>
<head>
	<link rel="stylesheet" href="../style.css" type="text/css">
</head>
<body>
	<?php
		include('headad.php');
	?>
	<h3>Login admin</h3>
	<form action="loginadm.php" method="POST">
		<input type="text" name="USER_AD" placeholder="User" class="inp">
		<input type="password" name="PASS_AD" placeholder="Password" class="inp"> <br>
		<input type="submit" name="login_admin" value="LOGIN">
	</form>
</body>
</html>