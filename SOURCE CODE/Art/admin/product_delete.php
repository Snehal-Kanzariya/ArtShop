<?php
$id = $_GET['id'];

include("conn.php");

$dp = "select * from product where id = $id";
$row = mysqli_query($admin_db,$dp);

$srow = mysqli_fetch_assoc($row);
	
	unlink("../images/product_img/".$srow['p_img']);
	
	$q = "delete from product
		 where id = $id";
		 
		 
	mysqli_query($admin_db,$q);
	
	$_SESSION['done'] = "product successfully deleted.";
	
	header("location:product_view.php");




?>
