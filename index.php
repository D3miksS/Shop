<html>
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
	<?php
		include('head.php');
		include('menu.php');
		include('conn.php');
		echo '<br>';
		if(isset($_SESSION['WRONG2'])){
			echo $_SESSION['WRONG2'];
			unset($_SESSION['WRONG2']);
		}elseif(isset($_SESSION['WRONG3'])){
			echo $_SESSION['WRONG3'];
			unset($_SESSION['WRONG3']);
		};
		if(isset($_SESSION['PROD_CART'])){
			echo $_SESSION['PROD_CART'];
			unset($_SESSION['PROD_CART']);
		}elseif(isset($_SESSION['PROD_CART2'])){
			echo $_SESSION['PROD_CART2'];
			unset($_SESSION['PROD_CART2']);
		}else{
			echo @$_SESSION['Wrong'];
			unset($_SESSION['Wrong']);
		};
		
		$query_idcat = "SELECT ID_CAT FROM categories";
		$result_idcat = mysqli_query($link, $query_idcat);
		$idcat_ok = array();
		while($info_idcat=mysqli_fetch_array($result_idcat)){
			array_push($idcat_ok, $info_idcat['ID_CAT']);
		}
		
		if(isset($_GET['id_cat']) && in_array($_GET['id_cat'], $idcat_ok)){
			$query_home = "SELECT * FROM product AS P LEFT JOIN categories AS C ON P.CAT_PROD=C.ID_CAT WHERE P.AVAIL_PROD AND P.CAT_PROD=$_GET[id_cat]";
		}elseif(isset($_POST['search'])){
			$s_string = $_POST['s_string'];
			$query_home = "SELECT * FROM product AS P LEFT JOIN categories AS C ON P.CAT_PROD=C.ID_CAT WHERE (NAME_PROD LIKE '%$s_string%' OR DESC_PROD LIKE '%$s_string%') AND (P.AVAIL_PROD AND P.STOCK_PROD>0)";
		}else{
			$query_home = "SELECT * FROM product AS P LEFT JOIN categories AS C ON P.CAT_PROD=C.ID_CAT WHERE P.AVAIL_PROD AND P.STOCK_PROD>0";
		}
		$result_home = mysqli_query($link, $query_home);
		$rows_home = mysqli_num_rows($result_home);

		if($rows_home>0){
			echo '<table border="1"><tr><td>Name</td><td>Price</td><td>Category</td><td>Stock</td><td>Descryption</td></tr>';
			while($info=mysqli_fetch_array($result_home)){
				echo "<form method='POST' action='add_cart.php'><tr><td> ".$info['NAME_PROD']."</td><td> ".$info['PRICE_PROD']."$</td><td> ".$info['NAME_CAT']."</td><td> ".$info['STOCK_PROD']."</td><td> ".$info['DESC_PROD']."</td><td><img width='196px' height='153px' src='admin/img/".$info['IMG_PROD']."'></td><input type='hidden' name='id_prod' value='".$info['ID_PROD']."'><td><input type='submit' value='Add to cart' name='add_cart'></tr></td><input type='hidden' name='id_pr' value='".$info['ID_PROD']."'></form><br>";
			}
			echo '</table>';
		}else{
			echo 'Not found';
		}
	?>
	
</body>
</html>