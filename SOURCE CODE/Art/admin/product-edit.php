<!DOCTYPE html>
<?php 
     session_start();
	 include("conn.php");
     include ("layout/header.php");
	  if(isset($_SESSION['product']))
		   {
		   extract($_SESSION['product']);
		   }
		   $id = $_GET['id'];
		   
		   $pro_q="select * from product
				   where id = $id";
	       $pro_res = mysqli_query($admin_db,$pro_q);
		   
		   $pro_row = mysqli_fetch_assoc($pro_res);
?>

<div class="mx-auto mt-7 pt-5" style='width: 55%; height: 100%;'>
  <div class="content-wrapper">
    <div class="container-fluid pt-5">

      <!-- Example DataTables Card-->
      <div class="card">
        <div class="card-header mt-2">
          <i class="fa fa-table mt-2"></i> Edit Project</div>
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

		<!-- prooduct name -->
            <form action="product-edit-process.php" method="post" enctype="multipart/form-data">
			<?php
					if(isset($_SESSION['error']['pnm']))
					{ 
						echo'<font color="red">'.$_SESSION['error']['pnm'].'</font>';
									
					}			
			?>
			<br />
			<label>Project Name</label>
			<input type="text" value="<?php echo $pro_row['p_name'];?>" class="form-control" name="pnm">
			</br>
			<!-- Description  -->
			<?php
					if(isset($_SESSION['error']['p_desc']))
					{ 
						echo'<font color="red">'.$_SESSION['error']['p_desc'].'</font>';
									
					}			
			?>
			<br />
			<label>Description :</label>
			<input type="text" value="<?php echo $pro_row['p_desc'];?>" class="form-control" name="p_desc">
			</br>
			<!-- price -->
			<?php
					if(isset($_SESSION['error']['price']))
					{ 
						echo'<font color="red">'.$_SESSION['error']['price'].'</font>';
									
					}			
			?>
			<br />
			<label>price</label>
			<input type="text" value="<?php echo $pro_row['price'];?>" class="form-control" name="price">
			<br />
			<!-- Sale price -->
			<?php
					if(isset($_SESSION['error']['sale_price']))
					{ 
						echo'<font color="red">'.$_SESSION['error']['sale_price'].'</font>';
									
					}			
			?>
			<br />
			<label>Sale price</label>
			<input type="text" value="<?php echo $pro_row['sale_price'];?>" class="form-control" name="sale_price">
			<br />
			<!-- Quantity -->
			<?php
					if(isset($_SESSION['error']['qty']))
					{ 
						echo'<font color="red">'.$_SESSION['error']['qty'].'</font>';
									
					}			
			?>
			</br>
			<label>Quantity</label>
			<input type="text" value="<?php echo $pro_row['qty'];?>" class="form-control" name="qty">
			<br />
			<!-- Stock Status  -->
			<?php
					if(isset($_SESSION['error']['stock_status']))
					{ 
						echo'<font color="red">'.$_SESSION['error']['stock_status'].'</font>';
									
					}			
			?>
			</br>
			<label>Stock Status : </label>
                            <select id="stock_status" value="<?php echo $stock_status;?>"  class="form-control" name="stock_status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
			<br />
			<!-- Category -->
			<?php
					if(isset($_SESSION['error']['category']))
					{ 
						echo'<font color="red">'.$_SESSION['error']['category'].'</font>';
									
					}			
			?>
			</br>
			<label>Category</label>
			<select type="text" value="<?php echo $category;?>" class="form-control" name="category">
			<option value="0">Select Category</option>
			<?php
			
			    $cq="select * from category";
			    $cres = mysqli_query($admin_db,$cq);
				while($crow = mysqli_fetch_assoc($cres))
				{ 
					if($crow['id'] == $pro_row['p_cat'])
					{
					echo '<option selected="selected" value="'.$crow['id'].'">'.$crow['cat_name'].'</option>';
				    }
					else
					{ 
					echo '<option value="'.$crow['id'].'">'.$crow['cat_name'].'</option>';						
					}
				}
			?>
				
			</select>
			<br />
			<!-- images -->
			<?php
					if(isset($_SESSION['error']['img']))
					{ 
						echo'<font color="red">'.$_SESSION['error']['img'].'</font>';
									
					}			
			?>
			</br>
			
			<img src="../images/product_img/<?php echo $pro_row['p_img'];?>" width="100">
			</br>
			<label>Chose project view image</label>
			<input type="file" class="form-control" name="img">
			<br />
		    <input type="hidden" name="id" value="<?php  echo $id;?>">
			<input type="submit" value="Updated Project" class="btn btn-success">
			</form>
			<?php
				unset($_SESSION['error']);
			?>
			<?php
				unset($_SESSION['product']);
			?>	
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
	</div>
    </div>
    </div>
	