 <?php session_start();

    if(!empty($_POST))
	{
		extract($_POST);
		$_SESSION['error'] = array();
		if(empty($unm) || empty($pwd))
		{
			$_SESSION['error'][]="please enter username or password";
			
			header("location:login.php");
		}
		if(! empty($error))
		{
			foreach($error as $er)
			{
				echo $er.'<br />';
			}
		}
		else
		{
			include("conn.php");
			
			$q="select * from admin_register where username='$unm'
			and password='$pwd'";
			
			$res = mysqli_query($admin_db,$q);
			
			$row = mysqli_fetch_assoc($res);
			
			if(empty($row))
			{
			  $_SESSION['error'][]="Wrong Username or Password";
			  
			  header("location:login.php");
			}
			else
			{
			   $_SESSION['admin']['unm'] = $row['username'];
			   $_SESSION['admin']['status'] = true;
			   
			   header("location:index.php");
			}	
		}
	}
	else
	{
		header("location:login.php");
	}	
?>