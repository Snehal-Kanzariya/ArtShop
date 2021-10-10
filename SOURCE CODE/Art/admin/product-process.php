<?php session_start();

	
	if(! empty($_POST))
	{
		
		extract($_POST);
		$error = array();
		
		if(empty($pnm))
		{
			$error['pnm']="Please enter Art Name";
		}
		if(empty($p_desc))
		{
			$error['p_desc']="Please write some product description";
		}
		if(empty($price))
		{
			$error['price']="Please enter Art Price";
		}
		else if(! is_numeric($price))
		{
			$error['price']="Please enter Proper Price";
		}
		if(empty($sale_price))
		{
			$error['sale_price']="Please enter sale price of art";
		}
		else if(! is_numeric($sale_price))
		{
			$error['sale_price']="Please enter Proper Price";
		}
		if(empty($qty))
		{
			$error['qty']="Please enter Quantity";
		}
		elseif($qty>1){
			$qty = $qty * $price;
		}
		if(empty($stock_status))
		{
			$error['stock_status']="Please select stock status";
		}
		if(empty($category))
		{
			$error['category']="Please select Art category";
		}
		
		$img = strtoupper(substr($_FILES['img']['name'],-4));
		
		  if(empty($_FILES['img']['name']))
		{
			$error['img']="Please choose Art View Image";
		}
		else if(!($img==".JPG" || $img==".PNG"))
		{
			$error['img']="Please chose JPG ya PNG file";
		}
		else if(file_exists("../images/product_img/".$_FILES['img']['name']))
		{
			$error['img']="this file already exists";
		}
		
		if(! empty($error))
		{
			$_SESSION['error'] = $error;
			$_SESSION['product'] = $_POST;
		     header("location:product.php");
		}
		else
		{
			$t = time();
			
			$dataimg = $_FILES['img']['name'];
			 
			move_uploaded_file($_FILES['img']['tmp_name'],"../images/product_img/".$dataimg);
			
			include("conn.php");
			
			$q="insert into product(p_name,p_desc,price,sale_price,qty,stock_status,p_cat,p_img,time)
			values('$pnm','$p_desc','$price','$sale_price',$qty,'$stock_status','$category','$dataimg','$t')";
			
			mysqli_query($admin_db,$q);
			
			$_SESSION['done']="<h2>product successfully inserted</h2>";
		
		 header("location:product.php");
		}
	}
	else
	{
		 header("location:product.php");
	}
    
?>