<?php session_start();

	include("conn.php");
    if(!empty($_POST))
	{
		extract($_POST);
		$error = array();
		
		if(empty($cat))
		{
			$error['cat']="please enter category name";
		}
		
		$cq="select * from category
		where cat_name='$cat'";
		
		$cres = mysqli_query($admin_db,$cq);
		
		$crow=mysqli_fetch_assoc($cres);
		if(! empty($crow))
		{
			$error['cat']="category already exists";
		}
		
		$img = strtoupper(substr($_FILES['img']['name'],-4));
		
		  if(empty($_FILES['img']['name']))
		{
			$error['img']="Please chose Project View Image";
		}
		else if(!($img==".JPG" || $img==".PNG"))
		{
			$error['img']="Please chose JPG ya PNG file";
		}
		else if(file_exists("../images/cat_img/".$_FILES['img']['name']))
		{
			$error['img']="this file already exists";
				}
		
		if(! empty($error))
		{
			$_SESSION['error'] = $error;
			 header("location:category.php");
		}
		else
		{
			 $t = time();
			 $dataimg = $_FILES['img']['name'];
			 
			move_uploaded_file($_FILES['img']['tmp_name'],"../images/cat_img/".$dataimg);
			
			$q="insert into category(cat_name,cat_img, time)values('$cat','$dataimg','$t')";
			mysqli_query($admin_db,$q);
			$_SESSION['done']="category successfully inserted";
			
			header("location:category.php");
		}
		
	}
	else
	{
		header("location:category.php");
	}	

?>