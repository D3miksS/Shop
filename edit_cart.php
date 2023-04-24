<?php
	session_start();
	include('conn.php');
	$ilosc_cart = $_POST['qt_cart'];
	$id_user = $_SESSION['ID'];
	$id_prod = $_POST['id_pr'];
	if(isset($_POST['odejmij'])){
		if($ilosc_cart>1){
			$ilosc_cart --;
			$query_edit = "UPDATE cart SET QT_CART='$ilosc_cart' WHERE ID_PROD='$id_prod' AND ID_CART='$id_user'";
		}
	}elseif(isset($_POST['dodaj'])){
		$query_stock = "SELECT * FROM product AS P RIGHT JOIN cart AS C ON P.ID_PROD=C.ID_PROD WHERE C.ID_CART = '$id_user' AND C.ID_PROD='$id_prod'";
		$result_stock = mysqli_query($link, $query_stock);
		$info_stock = mysqli_fetch_array($result_stock);
		if($ilosc_cart<$info_stock['STOCK_PROD']){
			$ilosc_cart ++;
			$query_edit = "UPDATE cart SET QT_CART='$ilosc_cart' WHERE ID_PROD='$id_prod' AND ID_CART='$id_user'";
		}
	}
	if(isset($_POST['del'])){
		$query_edit = "DELETE FROM dominik.cart WHERE cart.ID_PROD='$id_prod' AND cart.ID_CART='$id_user'";
	}
	$result_edit = mysqli_query($link, $query_edit);
	header('location:cart.php');
?>