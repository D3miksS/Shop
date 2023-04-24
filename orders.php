<html>
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
	<?php
		include('head.php');
		include('menu.php');
		include('conn.php');
		
		$id_user = $_SESSION['ID'];
		$query_ord = "SELECT * FROM orders AS O RIGHT JOIN shipping AS S ON O.SHIPPING_ID=S.ID_SHIP WHERE O.CLI_ORD='$id_user'";
		$result_ord = mysqli_query($link, $query_ord);
		$rows_ord = mysqli_num_rows($result_ord);

		if($rows_ord>0){
			echo '<h2>Your orders</h2><br>';
			while($info_ord = mysqli_fetch_array($result_ord)){
				$num_ord = $info_ord['NUM_ORD'];
				$query_it_prod = "SELECT * FROM item_ordered AS I RIGHT JOIN orders AS O ON I.NUM_ORD=O.NUM_ORD WHERE I.CLI_ORD='$id_user' AND O.NUM_ORD='$num_ord'";
				$result_it_prod = mysqli_query($link, $query_it_prod);

				echo '<div id="zakupiono">';
				echo 'Number order: '.$info_ord['NUM_ORD'].' | Date: '.$info_ord['DATA_ORD'].' | Total price: '.$info_ord['TOT_ORD'].'$<br>';
				echo 'Street: '.$info_ord['STREET_SHIP'].' | ZIP: '.$info_ord['ZIP_SHIP'].' | City: '.$info_ord['CITY_SHIP'].' | Country: '.$info_ord['COUNTRY_SHIP'].' | Phone number: '.$info_ord['PHONE_SHIP'].'<br> Products: ';
				while($info_it_prod = mysqli_fetch_array($result_it_prod)){
					echo $info_it_prod['PROD_NAME'].', ';
				}
				echo '</div><hr>';
			}
		}else{
			echo "<h2>You don't have orders</h2>";
		}

		
	?>	
	<br><a href="index.php"><input type="button" name="homepage" value="Go to home page"></a>
</body>
</html>