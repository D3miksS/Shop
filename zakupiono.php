<html>
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
	<?php
		include('head.php');
		include('menu.php');
		include('conn.php');

		if(isset($_SESSION['kupiles'])){
			echo '<h2>'.$_SESSION['kupiles'].'</h2>';
			$id_user = $_SESSION['ID'];
			$num_ord = $_SESSION['num_ord'];
			$query_zak = "SELECT * FROM item_ordered AS I RIGHT JOIN orders AS O ON I.NUM_ORD=O.NUM_ORD WHERE I.CLI_ORD='$id_user' AND I.NUM_ORD='$num_ord' ORDER BY I.NUM_ORD DESC";
			$result_zak = mysqli_query($link, $query_zak);
			
			while($info_zak = mysqli_fetch_array($result_zak)){
				echo '<div id="zakupiono">';
				echo 'Number order: '.$info_zak['NUM_ORD'].' | Shipping id: '.$info_zak['SHIPPING_ID'].' | Date: '.$info_zak['DATA_ORD'].' | Product name: '.$info_zak['PROD_NAME'].' | Amount: '.$info_zak['AMOUNT_ORD'].' | Price: '.$info_zak['TOT_ORD'].'$<br>';
				echo '</div>';
			}

		}
	?>	
	<br><a href="index.php"><input type="button" name="homepage" value="Go to home page"></a>
</body>
</html>