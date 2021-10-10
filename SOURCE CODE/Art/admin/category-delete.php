<?php session_start();
	$cat = $_GET['cat'];

	include("conn.php");

	$dp = "select * from category where id = $id";
	$row = mysqli_query($admin_db,$dp);

	$srow = mysqli_fetch_assoc($row);
		
	unlink("../images/cat_img/".$srow['cat_img']);
	
	$q = "delete from category
		 where id = $cat";
		 
	mysqli_query($admin_db,$q);
	
	$_SESSION['done'] = "category successfully deleted.";
	
	header("location:category_view.php");


?>