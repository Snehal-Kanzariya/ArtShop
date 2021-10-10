<!DOCTYPE html>
<?php session_start();
?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Art shopee - Admin Login</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
	  <?php
        if(!empty($_SESSION['error']))
		{
			foreach($_SESSION['error'] as $er)
			{
				echo '<font color="red">'.$er.'</font><br />';
			}
			echo '<br />';
			unset($_SESSION['error']);
		}
	  ?>
	  
	  
        <form action="login_process.php" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">User Name</label>
            <input name="unm"  class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter User name">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input name="pwd" class="form-control" id="exampleInputPassword1" type="password" placeholder="Password">
          </div>
          
          <input type="submit" value="Login" class="btn btn-primary btn-block">
        </form>
        
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
