<?php
	if(isset($_POST['login_admin'])){
		$user_ad = mysql_real_escape_string($_POST['USER_AD']);
		$pass_ad = mysql_real_escape_string($_POST['PASS_AD']);
		include('/xampp/htdocs/dominik/conn.php');
		$query_ad = "SELECT * FROM admin WHERE BINARY EMAIL_ADMIN = '$user_ad' AND BINARY PASS_ADMIN = '$pass_ad'";
		$result_ad = mysqli_query($link,$query_ad);
		$rows_ad = mysqli_num_rows($result_ad);
		session_start();
		if($rows_ad==1){
			$info_ad = mysqli_fetch_array($result_ad);
			$_SESSION['ADMIN'] = $info_ad['EMAIL_ADMIN'];
			header('location:product.php');
		}else{
			$_SESSION['WRONG'] = "Login problem";
			header('location:index.php');
		}
	}
?>