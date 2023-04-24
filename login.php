<?php
	if(isset($_POST['login'])){
		$user=mysql_real_escape_string($_POST['USER']);
		$pass=mysql_real_escape_string($_POST['PASS']);
		$passh = password_verify($pass, $hash);
		include('conn.php');
		$query="SELECT * FROM user WHERE BINARY EMAIL_USER = '$user'";
		$result=mysqli_query($link,$query);
		$rows=mysqli_num_rows($result);
		session_start();
		unset($_SESSION['WRONG3']);
		unset($_SESSION['WRONG2']);
		if($rows==1){
			$info = mysqli_fetch_array($result);
			if($info['EMAIL_USER']==$user){
				$hash = $info['HASH_USER'];
				if(password_verify($pass, $hash)){
					//ok
					$_SESSION['EMAIL'] = $info['EMAIL_USER'];
					$_SESSION['FIRST'] = $info['FIRST_USER'];
					$_SESSION['ID'] = $info['ID_USER'];
				}else{
					$_SESSION['WRONG3'] = 'Password wrong';
					header('location:index.php');
					exit;
				}
			}else{
				$_SESSION['WRONG2'] = 'User name wrong';
			}
			
		}else{
			$_SESSION['WRONG2'] = 'User name wrong';
		}
		header('location:index.php');
	}
?>