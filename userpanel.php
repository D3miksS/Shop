<html>
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
	
	<?php
		include('head.php');
		include('menu.php');
		include('conn.php');
		
		if(!isset($_SESSION['EMAIL'])){
			$_SESSION['Wrong'] = 'You must be logged in';
			header('location:index.php');
		}
		$id_user = $_SESSION['ID'];
		$query_sele_user = "SELECT * FROM user WHERE ID_USER='$id_user'";
		$result_sele_user = mysqli_query($link, $query_sele_user);
		$info_sele_user = mysqli_fetch_array($result_sele_user);

		$ed_user = $info_sele_user['EMAIL_USER'];
		$old_hash = $info_sele_user['HASH_USER'];
		$ed_first = $info_sele_user['FIRST_USER'];
		$ed_last = $info_sele_user ['LAST_USER'];
		echo '<h3>Settings acout</h3>';
		echo '<form method="POST" action="userpanel.php">
				<input type="text" name="ed_user" placeholder="New username" value="'.$ed_user.'" class="inp">
				<input type="password" name="ed_pass" placeholder="New password" class="inp">
				<input type="password" name="old_pass" placeholder="Old password" class="inp">
				<input type="text" name="ed_first" placeholder="New first name" value="'.$ed_first.'" class="inp">
				<input type="text" name="ed_last" placeholder="New last name" value="'.$ed_last.'" class="inp"> <br>
				<input type="submit" name="edit" value="Change">
				</form>';
		
		if(isset($_POST['edit'])){
			$ed_pass = $_POST['ed_pass'];
			$old_pass = $_POST['old_pass'];
			$user = $_SESSION['EMAIL'];
			$query="SELECT * FROM user WHERE BINARY EMAIL_USER = '$user'";
			$result=mysqli_query($link,$query);
			$info = mysqli_fetch_array($result);
			$hash = $info['HASH_USER'];
			if(password_verify($old_pass, $hash)){
		        $new_hash = password_hash($ed_pass, PASSWORD_DEFAULT);
		    	if(!empty($_POST['ed_pass'])&&!empty($_POST['ed_user'])){
			    	if($new_hash){
			    		$ed_pass = $new_hash;
			    	}else{
			    		$ed_pass = $old_hash;
			    	}
			    	$ed_user = mysqli_real_escape_string($link, $_POST['ed_user']);
			    	$ed_first = mysqli_real_escape_string($link, $_POST['ed_first']);
			    	$ed_last = mysqli_real_escape_string($link, $_POST['ed_last']);

			    	$query_ed = "UPDATE user SET EMAIL_USER='$ed_user', FIRST_USER='$ed_first', LAST_USER='$ed_last', HASH_USER='$ed_pass' WHERE ID_USER=$id_user";
			    	$result_ed = mysqli_query($link, $query_ed);
			    	unset($_SESSION['FIRST']);	
			    	$_SESSION['FIRST'] = $ed_user;
			    }else{
			    	echo 'Password or username is empty!';
			    }
			}else{
				echo 'Old password is wrong';
			}
		}
	?>
	<br><a href="index.php"><input type="button" name="homepage" value="Go to home page"></a>
</body>
</html>