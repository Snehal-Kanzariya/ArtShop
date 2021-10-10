<?php
     include ("layout/header.php");
	 include("conn.php");
	 $cat = $_GET['cat'];
	 $catq="select * from category where id='$cat'";

	 $catres=mysqli_query($admin_db,$catq);
	 $catrow=mysqli_fetch_assoc($catres);

	 session_start();

?>
<div class="mx-auto mt-7 pt-5 " style='width: 55%; height: 100%;'>
<div class="container">
  <div class="content-wrapper">
    <div class="container-fluid pt-5">
      
      <!-- Example DataTables Card-->
      <div class="card mb-3 pt-3 ms-5">
        <div class="card-header">
          <i class="fa fa-table"></i>  Category Update</div><br/>
        <div class="card-body">
		
		<?php
		if(isset($_SESSION['done']))
		{
			echo '<font color="green">'.$_SESSION['done'].'</font><br />';
			unset($_SESSION['done']);
		}
		else if(! empty($_SESSION['error']))
		{
			foreach($_SESSION['error'] as $er)
			{
				
			}
		}
		
		
		?>
            <form action="category-edit-process.php" method="post" enctype="multipart/form-data">
			<?php
					if(isset($_SESSION['error']['cat']))
					{ 
						echo'<font color="red">'.$_SESSION['error']['cat'].'</font>';
									
					}			
			?>
			
			<label>Category Name</label><br><br>
			<input type="text" class="form-control" value="<?php echo $catrow['cat_name']?>" name="cat">
			
			
		
			<?php
					if(isset($_SESSION['error']['cat_img']))
					{ 
						echo'<font color="red">'.$_SESSION['error']['cat_img'].'</font>';
									
					}			
			?>
			</br>
			
			<label>Chose art view image</label><br /><br />
			<input type="file" class="form-control" name="img">
			<br />
			<input type="hidden" name="id" value="<?php echo $catrow['id'];?>">
			<input type="submit" value="Update Category" class="btn btn-success">
			</form>
			<?php
				 unset($_SESSION['error']);
			?>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
    </div>
</div>
</div>
	<?php
	    include ("layout/footer.php");
	?>
