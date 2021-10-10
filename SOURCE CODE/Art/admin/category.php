<?php
    include("layout/header.php");
    session_start();
?>

        <!-- sidebar over -->
           
        <!-- add category -->
        <main>
            <div class="mx-auto mt-7 pt-5 " style='width: 55%; height: 100%;'>

        <div class="container-fluid px-4">
            <h1 class="mt-4 pt-5"> Category</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">Add Category</li>
            </ol>
            <hr> 

            <!--  error -->
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
            <!--error done  -->
                <form action="category_process.php" method="post" id="categoryForm" enctype="multipart/form-data">
                    <div class="cust_container justify-content-center col-5 offset-3">
                        <h3 class="text-center my-5">Add Category</h3>
                        <?php
                            if(isset($_SESSION['error']['cat']))
                            { 
                                echo'<font color="red">'.$_SESSION['error']['cat'].'</font>';
                                            
                            }			
			            ?>
                        <div class="form-group mb-3">
                            <label class="mb-1" for="cat_name">Category Name :</label>
                            <input type="text" class="form-control" id="c_name" name="cat" placeholder="Enter Category Name"> 
                        </div>
                        <?php
                            if(isset($_SESSION['error']['img']))
                            { 
                                echo'<font color="red">'.$_SESSION['error']['img'].'</font>';
                                            
                            }			
			            ?>
                        <div class="form-group mb-3">
                            <label for="cat_image" class="custom-file-label">Choose Image : </label>
                                <input id="cat_image" class="form-control" type="file" name="img">
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary">Add category</button>
                        </div>
                    </div>  
                </form> 
                <?php
				     unset($_SESSION['error']);
			    ?>
        </div>
         
</div>
    </main>
</body>

</html>