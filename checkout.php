<?php
	if(isset($_POST['checkout'])){
		include('conn.php');
		session_start();
		$id_cart = $_SESSION['ID'];
		$cli_ord = $_SESSION['ID'];
		$date = date('Y-m-d');
		$prod_ord = $_SESSION['Prod_ord'];
		$ship_ord = 0;
		$tot_ord = $prod_ord+$ship_ord;
		$shipping_id = $_POST['id_ship'];
		$query_add_orders = "INSERT INTO orders(NUM_ORD, CLI_ORD, DATA_ORD, PROD_ORD, SHIP_ORD, TOT_ORD, SHIPPING_ID) VALUES(NULL, '$cli_ord', '$date', '$prod_ord', '$ship_ord', '$tot_ord', '$shipping_id')";
		$result_add_orders = mysqli_query($link, $query_add_orders);
		
		$query_prod = "SELECT * FROM product AS P RIGHT JOIN cart AS C ON P.ID_PROD=C.ID_PROD WHERE C.ID_CART = '$id_cart'";
		$result_prod = mysqli_query($link, $query_prod);
		while($info_prod = mysqli_fetch_array($result_prod)){
		
			$prod_id = $info_prod['ID_PROD'];
			$prod_name = $info_prod['NAME_PROD'];
			$amount_ord = $info_prod['QT_CART'];
			$prod_price = $info_prod['PRICE_PROD']*$amount_ord;
			$query_num_ord = "SELECT * FROM orders WHERE CLI_ORD='$id_cart' ORDER BY NUM_ORD DESC";
			$result_num_ord = mysqli_query($link, $query_num_ord);
			$info_num_ord = mysqli_fetch_array($result_num_ord);
			
			$num_ord = $info_num_ord['NUM_ORD'];
			$_SESSION['num_ord'] = $num_ord;
			
			$query_add_prod_ord = "INSERT INTO item_ordered(NUM_ORD, CLI_ORD, PROD_ID, PROD_NAME, AMOUNT_ORD, PROD_PRICE) VALUES('$num_ord', '$cli_ord', '$prod_id', '$prod_name', '$amount_ord', '$prod_price')";
			$result_add_prod_ord = mysqli_query($link, $query_add_prod_ord);

			$query_del = "DELETE FROM cart WHERE ID_CART='$id_cart'";
			$result_del = mysqli_query($link, $query_del);

			$new_stock = $info_prod['STOCK_PROD']-$amount_ord;
			
			$query_update = "UPDATE product SET STOCK_PROD='$new_stock' WHERE ID_PROD='$prod_id'";
			$result_update = mysqli_query($link, $query_update);
			
		}
		$_SESSION['kupiles'] = 'You bought';
	}
	header('location:zakupiono.php');
?>