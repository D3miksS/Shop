<?php
	session_start();
	if(isset($_SESSION['EMAIL'])){
		if(isset($_POST['add_cart'])){
			include('conn.php');
			$id_cart = $_SESSION['ID'];
			$id_prod = $_POST['id_prod'];
			$ilosc_cart1 = 1;
			$query_ask = "SELECT * FROM cart WHERE ID_CART='$id_cart' AND ID_PROD='$id_prod'";
			$result_ask = mysqli_query($link, $query_ask);
			$rows_ask = mysqli_num_rows($result_ask);
			$inf = mysqli_fetch_array($result_ask);
			if($rows_ask==0){
				$query_add = "INSERT INTO cart(ID_CART, ID_PROD, QT_CART) VALUES ('$id_cart' ,'$id_prod', '$ilosc_cart1')";
				$result_add = mysqli_query($link, $query_add);
				if($result_add){
					$_SESSION['PROD_CART'] = 'Product added to cart';
				}else{
					$_SESSION['Wrong1'] = 'Problem';
				}
			}else{
				$query_stock = "SELECT * FROM product AS P RIGHT JOIN cart AS C ON P.ID_PROD=C.ID_PROD WHERE C.ID_CART = '$id_cart' AND C.ID_PROD='$id_prod'";
				$result_stock = mysqli_query($link, $query_stock);
				$info_stock = mysqli_fetch_array($result_stock);
				if($info_stock['QT_CART']<$info_stock['STOCK_PROD']){
					$qt_cart = $inf['QT_CART'];
					echo $qt_cart;
					$qt_cart ++;
					$query_added = "UPDATE cart SET QT_CART='$qt_cart' WHERE ID_PROD='$id_prod' AND ID_CART='$id_cart'";
					$result_added = mysqli_query($link, $query_added);
					$_SESSION['PROD_CART2'] = 'Product added';
				}else{
					unset($_SESSION['PROD_CART2']);
				}
			}
		}
	}else{
		$_SESSION['Wrong'] = 'You must be logged in';
	}
	header('location:index.php');
?>