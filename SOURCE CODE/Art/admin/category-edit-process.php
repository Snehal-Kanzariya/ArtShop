<?php session_start();

			include("conn.php");

		if(! empty($_POST))
		{
		extract($_POST);
		$error = array();
		
		if(empty($cat))
		{
			$error['cat']="Please enter category Name";
		}
		if(! empty($_FILES['img']['name']))
		{
			
		$img = strtoupper(substr($_FILES['img']['name'],-4));
		
			 	if(!($img==".JPG" || $img==".PNG"))
				{
					$error['img']="Please chose JPG ya PNG file";
				}
				else if(file_exists("../images/cat_img/".$_FILES['img']['name']))
				{
					$error['img']="this file already exists";
				}
		}
	
		if(! empty($error))
		{
			$_SESSION['error'] = $error; 
			$_SESSION['category'] = $_POST;
		     header("location:category-edit.php?id=$id");
		}
		else
		{
		
			include("conn.php");
			
			
			if(! empty($_FILES['img']['name']))
			{
				$sq="select * from category 
				where id=$id";
				$sres = mysqli_query($admin_db,$sq);
				
				$srow = mysqli_fetch_assoc($sres);
				
				unlink("../images/cat_img/".$srow['cat_img']);
			$t = time();
			echo $t;
			 
			$data = $cat.".".$ext;	
			$dataimg = $_FILES['img']['name'];
			 
			move_uploaded_file($_FILES['img']['tmp_name'],"../images/cat_img/".$dataimg);
			
				$q="update category set 
                cat_name='$cat',
				p_img='$dataimg',
				time='$t'
				where id=$id";
			}
			else{
			$t = time("d-m-y");
			 echo $t;
			$data = $cat.".".$ext;
			 
			 

			$q="update category set 
                cat_name='$cat',
				p_img='$dataimg',
				time='$t'
				where id=$id";
			}
			mysqli_query($admin_db,$q);
			
			$_SESSION['done']= "<h2>Successfully update category</h2>";
			// header("location:category_view.php");
			
		}
	}
	else
	{
		//  header("location:category.php");
	}
    
?>

		