<!DOCTYPE html>
<?php
  include ("layout/header.php");
?>

<div class="mx-auto mt-7 pt-5" style='width: 55%; height: 100%;'>
  <div class="content-wrapper">
    <div class="container-fluid pt-5">
      
      <!-- Example DataTables Card-->
      
      <div class="card">
        <div class="card-header mt-2">
          <i class="fa fa-table mt-2"></i> Product Table</div>
        <div class="card-body">
          <div class="table-responsive">
		  <?php
		    if(isset($_SESSION['done']))
			{
				echo'<font color="green">'.$_SESSION['done'] = '<h2>Successfully update product</h2>;'.'</font></br></br>';
				
				// unset($_SESSION['done']);
			}
		  ?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>image</th>
                  <th>price</th>
                  <th>action</th>
                  
                </tr>
              </thead>
              <tbody>
			  <?php
          // include("conn.php");
			    $cat_q="select * from product";
				  $cat_res=mysqli_query($admin_db,$cat_q);
				  $co=1;
				  while($cat_row=mysqli_fetch_assoc($cat_res))
				  {
					  echo '<tr>
					  <td>'.$co.'</td>
					  <td>'.$cat_row['p_name'].'</td>
					  <td><img src="../images/product_img/'.$cat_row['p_img'].'" height="35px" ></img></td>
					  <td>'.$cat_row['sale_price'].'</td>
					  <td><a onclick="return check(\'You can Sure for delete this item ? \');" href="product_delete.php?id='.$cat_row['id'].'" class="btn btn-danger btn-sm">Delete</a>
					  <a onclick="return check(\'You can Sure for Edit this item ?\');" href="product-edit.php?id='.$cat_row['id'].'" class="btn btn-success btn-sm">Edit</a></td> 
					  </tr>';
					  $co++;
				  }
			  ?>
                
               
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
    </div>
        </div>
	<?php
	    include ("layout/footer.php");
	?>
