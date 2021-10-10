<!DOCTYPE html>
<?php 
     session_start();
     include ("layout/header.php");
	  if(isset($_SESSION['product']))
		   {
		   extract($_SESSION['product']);
		   }

        $pnm='';
        $price='';
        $sale_price='';
        $qty='';
	 
?>
 <div class="mx-auto mt-7 pt-5 " style='width: 55%; height: 100%;'>
  <div class="content-wrapper">
    <div class="container-fluid pt-5">
      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Add New Product</div>
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
            <form action="product-process.php" method="post" enctype="multipart/form-data">
			<?php
					if(isset($_SESSION['error']['pnm']))
					{ 
						echo'<font color="red">'.$_SESSION['error']['pnm'].'</font>';
									
					}			
			?>
			<br />
			<label>Product Name</label>
			<input type="text" value="<?php echo $pnm;?>" class="form-control" name="pnm">
			</br>
            <!-- desc -->
			<?php
            $p_desc= '';
					if(isset($_SESSION['error']['p_desc']))
					{ 
						echo'<font color="red">'.$_SESSION['error']['p_desc'].'</font>';
									
					}			
			?>
			<br />
			<label>Description</label>
			<input type="text" value="<?php echo $p_desc;?>" class="form-control" name="p_desc">
			</br>
            <!-- desc over -->
            <!-- price -->
                            <?php
                                if(isset($_SESSION['error']['price']))
                                { 
                                    echo'<font color="red">'.$_SESSION['error']['price'].'</font>';
                                                
                                }			
                            ?>
                        <br />
                        <div class="form-group mb-3">
                            <label class="mb-1" for="price">Price :</label>
                            <?php
                            $pnm='';
                            ?>
                            <input type="text" value="<?php echo $price;?>"  class="form-control" id="price" name="price" placeholder="Enter Price"> 
                        </div>
                        <br />
                        <!-- price over -->
                        <!-- sp  -->
                        <?php
                                if(isset($_SESSION['error']['sale_price']))
                                { 
                                    echo'<font color="red">'.$_SESSION['error']['sale_price'].'</font>';
                                                
                                }			
                        ?>
                        </br>
                        <div class="form-group mb-3">
                            <label class="mb-1" for="sale_price">Sale Price : </label>
                            <input type="text" value="<?php echo $sale_price;?>"  class="form-control" id="sale_price" name="sale_price" placeholder="Enter Sale Price"> 
                        </div>
                        <br />
                        <!-- sp over -->
                        <!-- quantity -->
                        <?php
                                if(isset($_SESSION['error']['qty']))
                                { 
                                    echo'<font color="red">'.$_SESSION['error']['qty'].'</font>';
                                                
                                }			
                        ?>
                        </br>
                        <div class="form-group mb-3">
                            <label class="mb-1" for="qty">Quantity : </label>
                            <input type="text" value="<?php echo $qty;?>" class="form-control" id="qty" name="qty" placeholder="Enter Quantity"> 
                        </div>
                        <br />
                        <!-- quantity -->
                        <!-- stock_status -->
                        <?php
                                if(isset($_SESSION['error']['stock_status']))
                                { 
                                    echo'<font color="red">'.$_SESSION['error']['stock_status'].'</font>';
                                                
                                }			
                        ?>
                        </br>
                        <div class="form-group mb-3">
                            <label class="mb-1" for="stock_status">Stock Status : </label>
                            <select id="stock_status" value="<?php echo $stock_status;?>"  class="form-control" name="stock_status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                            <br />
                        <!-- stock_status over -->
                        <!-- category -->
                        <?php
                                if(isset($_SESSION['error']['category']))
                                { 
                                    echo'<font color="red">'.$_SESSION['error']['category'].'</font>';
                                                
                                }			
                        ?>
                        <br />
                        <div class="form-group mb-3">
                            <label class="mb-1" for="category_id">Select Category :</label>
                            <select id="category_id" value="<?php echo $category;?>"  class="form-control" name="category">
                                    <option value="0">----Select Category----</option>
                                <?php 
                                 include("conn.php");
                                $q= "select * from category";
                                $res= mysqli_query($admin_db,$q);
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    if($row ['id'] == $category)
                                    {
                                        echo '<option selected="selected" value="'.$row['id'].'">'.$row['cat_name'].'</option>';
                                    }
                                    else
                                    { 
                                    echo '<option value="'.$row['id'].'">'.$row['cat_name'].'</option>';						
                                    }
                                }
                                ?> 
                            </select>
                        </div>
                        <br />
                        <!--category over -->
                        <!-- image -->
                            <?php
                                    if(isset($_SESSION['error']['img']))
                                    { 
                                        echo'<font color="red">'.$_SESSION['error']['img'].'</font>';
                                                    
                                    }			
                            ?>
                        </br>
                        <div class="form-group">
                            <label class="mb-1" for="product_img">Choose Image :</label>
                            <input id="product_img" value="<?php echo $img;?>" class="form-control" type="file" name="img">
                        </div>
                        <br />
                        <!-- image over -->
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary shadow_2" id="pbtn_submit ">Submit</button>
                        </div>
                </form> 
                <?php
				unset($_SESSION['error']);
                ?>
                <?php
                    unset($_SESSION['product']);
                ?>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div><br>
        </div>
    </div>
</div>
<?php
	include ("layout/footer.php");
?>
