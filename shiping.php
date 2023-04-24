<html>
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
	<?php
		include('head.php');
		include('menu.php');
		include('conn.php');
	?>
	<h3>Add shipping address</h3>
	<form method="POST" action="shiping.php">
		<input type="text" name="street" placeholder="Street" class="inp" required> <br>
		<input type="text" name="zip" placeholder="ZIP" class="inp" required> <br>
		<input type="text" name="city" placeholder="City" class="inp" required> <br>
		<input type="text" name="country" placeholder="Country" class="inp" required> <br>
		<input type="text" name="phone" placeholder="Phone number" class="inp" required> <br>
		<input type="submit" name="addadres" value="Add address">
		<?php
			@$user_id = $_SESSION['ID'];
			$query_select_ship = "SELECT * FROM shipping WHERE USER_ID='$user_id'";
			$result_select_ship = mysqli_query($link, $query_select_ship);
			$rows_select_ship = mysqli_num_rows($result_select_ship);
			if($rows_select_ship>0){
				echo '<input type="submit" name="selectadres" value="Select address">';
			}
		?>
	</form>
</body>
</html>
<?php
	
	@$street = $_POST['street'];
	@$zip = $_POST['zip'];
	@$city = $_POST['city'];
	@$country = $_POST['country'];
	@$phonenum = $_POST['phone'];

	if(isset($_POST['addadres'])){
		$query_ship = "INSERT INTO shipping(ID_SHIP, USER_ID, STREET_SHIP, ZIP_SHIP, CITY_SHIP, COUNTRY_SHIP, PHONE_SHIP) VALUES(NULL, '$user_id', '$street', '$zip', '$city', '$country', '$phonenum')";
			$result_ship = mysqli_query($link, $query_ship);
	}
	if(@$result_ship || isset($_POST['selectadres'])){
		
		while($info_select_ship = mysqli_fetch_array($result_select_ship)){
			echo '<form method="POST" action="checkout.php">';
			echo 'ID_SHIP: '.$info_select_ship['ID_SHIP'].' | ';
			echo 'Street: '.$info_select_ship['STREET_SHIP'].' | ';
			echo 'Zip: '.$info_select_ship['ZIP_SHIP'].' | ';
			echo 'City: '.$info_select_ship['CITY_SHIP'].' | ';
			echo 'Country: '.$info_select_ship['COUNTRY_SHIP'].' | ';
			echo 'Phone number: '.$info_select_ship['PHONE_SHIP'].'  <br>';
			echo '<input type="hidden" name="id_ship" value="'.$info_select_ship['ID_SHIP'].'">';
			echo '<input type="submit" name="checkout" value="Checkout"> <br>';
			echo '</form>';
		}
	}
?>
