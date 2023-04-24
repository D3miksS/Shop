<html>
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
	<?php
		include('head.php');
		include('menu.php');
		include('conn.php');
		if(!isset($_SESSION['ID'])){
			$_SESSION['Wrong'] = 'You must be logged in';
			header('location:index.php');
		}
		echo '<br>';
		$id_cart = $_SESSION['ID'];
		$query_cart = "SELECT * FROM product AS P RIGHT JOIN cart AS C ON P.ID_PROD=C.ID_PROD WHERE C.ID_CART = '$id_cart'";
		$result_cart = mysqli_query($link, $query_cart);
		$rows_cart = mysqli_num_rows($result_cart);

		if($rows_cart>0){
			echo '<table border="1"><tr><td>Name product</td><td>Amount</td><td>Price</td><td>Price for all</td></tr>';
			$total_price=0;
			while($info_cart = mysqli_fetch_array($result_cart)){
				$price = $info_cart['PRICE_PROD']*$info_cart['QT_CART'];
				echo '<tr><td>'.$info_cart['NAME_PROD'].'</td><form method="POST" action="edit_cart.php"><input type="hidden" name="id_pr" value="'.$info_cart['ID_PROD'].'"><td><input type="submit" name="odejmij" value="-">'.@$info_cart['QT_CART'].'$<input type="submit" name="dodaj" value="+"></td><td>'.$info_cart['PRICE_PROD'].'</td><td>'.$price.'</td><td><input type="submit" name="del" value="X"><input type="hidden" value="'.$info_cart['QT_CART'].'" name="qt_cart"></form> </td></tr>';
				$total_price += $price;
			}
			$_SESSION['Prod_ord'] = $total_price;
			echo '<tr><td colspan="2">Total price</td><td colspan="2">'.$total_price.'</td></tr><tr><td colspan="4"><form method="POST" action="shiping.php"><input type="submit" name="checkout_ship" value="Go to shipping"></form></td></tr></table>';
		}else{
			echo '<h2>Cart is empty</h2>';
		}
	?>
	<br><a href="index.php"><input type="button" name="homepage" value="Go to home page"></a>
</body>
</html>