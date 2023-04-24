<?php
	session_start();
	if($_SESSION['ADMIN']!=="admin"){
		header('location:index.php');
		exit;
	}
?>
<html>
<head>
	<link rel="stylesheet" href="../style.css" type="text/css">
</head>
<body>
	<?php
		include('headad.php');
		include('../menu.php');
		include('../conn.php');
	?>
	<h3>Add product</h3>
	<form method="POST" action="product.php" enctype="multipart/form-data">
		<input type="text" name="NAME" placeholder="Name" class="inp" required> <br>
		<input type="text" name="PRICE" placeholder="Price" class="inp"required> <br>
		<input type="file" name="userfile" class="inp" required> <br>
		<?php
			$query_cat = "SELECT * FROM categories ORDER BY NAME_CAT ASC";
			$result_cat = mysqli_query($link, $query_cat);
			$rows_cat	 = mysqli_num_rows($result_cat);
			if($rows_cat>0){
				echo '<select name="CAT" class="inp">';
				echo '<option>Chose category</option>';
				while($cat=mysqli_fetch_array($result_cat)){
					echo '<option value="'.$cat['ID_CAT'].'">'.$cat['NAME_CAT'].'</option>';
				}
				echo '</select>';
			}
		?>
		<br>
		<input type="text" name="STOCK" placeholder="Stock" class="inp" required> <br>
		<input type="text" name="AVAIL" placeholder="Availble" class="inp" required> <br>
		<textarea cols="30" rows="12" name="DESC" placeholder="Descryption" class="inp" required></textarea> <br>
		<input type="submit" name="ADD" value="Add">
		<a href="destroy.php"><input type="button" name="logout" value="Log out"></a>
	</form>
	<h3>Add category</h3>
	<form method="POST" action="product.php">
		<input type="text" name="NAME_CAT" placeholder="Name category" class="inp" required> <br>
		<input type="submit" name="add_cat" value="Add">
		<a href="destroy.php"><input type="button" name="logout" value="Log out"></a>
	</form>
</body>
</html>
<?php
	if(isset($_POST['ADD'])){
		$uploaded_dir = "C:/xampp/htdocs/dominik/admin/img/";
		$user_real = $_FILES['userfile']['name'];
		if(file_exists($uploaded_dir.$user_real)){
			echo ' File alread exists';
			exit;
		}
		$ext_ok = array('jpg', 'jpeg', 'gif');
		$temp = explode('.', $_FILES['userfile']['name']);
		$ext = end($temp);
		if(!in_array($ext, $ext_ok)){
			echo ' Exteusion not allowed';
			exit;
		}
		$name = mysql_real_escape_string($_POST['NAME']);
		$price = mysql_real_escape_string($_POST['PRICE']);
		$cat = mysql_real_escape_string($_POST['CAT']);
		$stock = mysql_real_escape_string($_POST['STOCK']);
		$avail = mysql_real_escape_string($_POST['AVAIL']);
		$desc = mysql_real_escape_string($_POST['DESC']);
		$img = mysql_real_escape_string($_FILES['userfile']['name']);

		$query = "INSERT INTO product VALUES(NULL, '$name', '$price', '$cat', '$stock', '$avail', '$desc', '$img')";
		$result = mysqli_query($link, $query);
		if($result){
			echo 'Product added';
		}else{
			echo 'Sorry, a problem';
		}
		
		if(isset($_FILES['userfile']) || is_uploaded_file($_FILES['userfile']['tmp_name'])){
			$uploaded_dir = "C:/xampp/htdocs/dominik/admin/img/";
			$user_tmp = $_FILES['userfile']['tmp_name'];
			$user_real = $_FILES['userfile']['name'];
			if(move_uploaded_file($user_tmp, $uploaded_dir.$user_real)){
				echo ' File uploaded';
			}else{
				echo ' Problem';
			}
		}
	}elseif(isset($_POST['add_cat'])){
		$name_addcat = $_POST['NAME_CAT'];
		$query_addcat = "INSERT INTO category VALUES(NULL, '$name_addcat')";
		$result_addcat = mysqli_query($link, $query_addcat);
		if($result_addcat)
		{
			echo 'Category added';
		}else{
			echo 'Problem';
		}
	}
?>