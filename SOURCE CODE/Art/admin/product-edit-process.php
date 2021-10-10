<?php session_start();

	
	if(! empty($_POST))
	{
		
		extract($_POST);
		$error = array();
		
		if(empty($pnm))
		{
			$error['pnm']="Please enter Project Name";
		}
		if(empty($p_desc))
		{
			$error['p_desc']="Please enter Description";
		}
		if(empty($price))
		{
			$error['price']="Please enter price";
		}
		else if(! is_numeric($price))
		{
			$error['price']="Please enter Proper Price";
		}
		if(empty($sale_price))
		{
			$error['sale_price']="Please enter sale price";
		}
		else if(! is_numeric($sale_price))
		{
			$error['sale_price']="Please enter Proper Price";
		}
		if(empty($qty))
		{
			$error['qty']="Please enter product quantity";
		}
		elseif($qty>1){
			$sale_price = $qty * $sale_price;
		}
		if(empty($stock_status))
		{
			$error['stock_status']="Please check stock status";
		}
		if(empty($category))
		{
			$error['category']="Please select category";
		}
		 
		if(! empty($_FILES['img']['name']))
		{
			
		$img = strtoupper(substr($_FILES['img']['name'],-4));
		
			 	if(!($img==".JPG" || $img==".PNG"))
				{
					$error['img']="Please chose JPG ya PNG file";
				}
				else if(file_exists("../images/product_img/".$_FILES['img']['name']))
				{
					$error['img']="this file already exists";
				}
		}
		
		if(! empty($error))
		{
			$_SESSION['error'] = $error; 
			$_SESSION['product'] = $_POST;
		     header("location:product-edit.php?id=$id");
		}
		else
		{
		
			include("conn.php");
			
			
			if(! empty($_FILES['img']['name']))
			{
				$sq="select * from product 
				where id=$id";
				$sres = mysqli_query($admin_db,$sq);
				
				$srow = mysqli_fetch_assoc($sres);
				
				unlink("../images/product_img/".$srow['p_img']);
			$t = time();
			 
			$data = $pnm.".".$ext;	
			$dataimg = $_FILES['img']['name'];
			 
			move_uploaded_file($_FILES['img']['tmp_name'],"../images/product_img/".$dataimg);
			
				$q="update product set 
                p_name='$pnm',
				p_desc='$p_desc',
				price='$price',
				sale_price='$sale_price',
				qty='$qty',
				stock_status='$stock_status',
				p_cat='$category',
				p_img='$dataimg',
				time='$t'
				where id=$id";
			}
			else{
			$t = time();
			 
			$data = $pnm.".".$ext;
			 
			 

			$q="update product set 
                p_name='$pnm',
				p_desc='$p_desc',
				price='$price',
				sale_price='$sale_price',
				qty='$qty',
				stock_status='$stock_status',
				p_cat='$category',
				p_img='$dataimg',
				time='$t'
				where id=$id";
			}
			mysqli_query($admin_db,$q);
			
			$_SESSION['done'];
			header("location:product_view.php");
			
		}
	}
	else
	{
		 header("location:product.php");
	}
    
?>
