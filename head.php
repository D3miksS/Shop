<header>
	<form action="login.php" method="POST">
		<?php
			session_start();
			if(isset($_SESSION['EMAIL'])){
				echo 'Hi '.$_SESSION['FIRST'];
				echo '<a href="destroy.php"><input type="button" name="logout" value="LOG OUT"></a><br>';
				echo '<a href="orders.php"><input type="button" name="orders" value="Your orders"></a>';
			}else{
				echo '<input type="text" name="USER" placeholder="User" class="inp" required>
					<input type="password" name="PASS" placeholder="Password" class="inp" required> <br>
					<input type="submit" name="login" value="LOGIN">
					<a href="register.php"><input type="button" name="register" value="REGISTER"></a>';
			}
		?>
		
		
	</form>
	<a href="cart.php"><img src="cart.png" width="5%" style="float:right;"></a>
	<a href="userpanel.php"><img src="settings.png" width="5%" style="float:right;"></a>
	<h1>Dominik shop</h1>
</header>