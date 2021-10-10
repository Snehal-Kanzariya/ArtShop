<?php session_start();

	if(isset($_GET['id']))
	{
		$pid=$_GET['id'];
		
		include("connection.php");
		
		$q="select * from product,category 
		where p_cat = id and id=$pid";
		
		$res = mysqli_query($db,$q);
		
		$row = mysqli_fetch_assoc($res);
		
		$_SESSION['cart'][] = array("nm"=> $row['p_name'],
                               		"cat"=>$row['cat_name'],
									"img"=>$row['p_img'],
									"price"=>$row['price']);
		
		
		header("location:cart.php");
	}
	else if(isset($_GET['did']))
	{
		$did = $_GET['did'];
		unset($_SESSION['cart'][$did]);
		header("location:cart.php");
	}



?>