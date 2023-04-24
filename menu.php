<div id="left">
	<form method="POST" action="index.php">
		<input type="text" name="s_string" placeholder="Search" class="inp">
		<input type="submit" name="search" value="Search">
	</form>
	<h2>Categories</h2><br>
	<h3>
	<?php
		include('conn.php');
		$query_menu = "SELECT * FROM categories";
		$result_menu = mysqli_query($link, $query_menu);
		$rows_menu = mysqli_num_rows($result_menu);
		if($rows_menu>0){
			while($cat_menu=mysqli_fetch_array($result_menu)){
				echo '<a href="index.php?id_cat='.$cat_menu['ID_CAT'].'">'.$cat_menu['NAME_CAT'].'</a><br>';
			}
		}
	?>
	</h3>
</div>