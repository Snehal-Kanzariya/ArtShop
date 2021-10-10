 <?php
 
	include("connection.php");
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";
 

        if(! empty ($_POST)){
            $error = array();
            extract($_POST);

            if(empty ($email)){
                 $error[] = "please enter email";
            }
            if(empty ($username)){
                 $error[] = "please enter user name";
            }
            if(empty ($password_1) || empty ($password_2)){
                 $error[] = "please enter password";
            }
            else if($password_1 !=  $password_2){
                 $error[] = "Don't match password";
            }
            else if(strlen($password_1) < 5){
                 $error[] = "please enter minimum  5 digit password";
            }
            if(! empty($error)){
                foreach($error as $er){
                    echo '<font color="red">'.$er.'</font><br/>';
                }
            }
            else{
               // echo "All is well";
			   
			    include("connection.php");
			 
			
			$q="insert into artist_register(Artist_name,Artist_email,Artist_password)values('$name','$email','$password_1')";
			mysqli_query($db,$q);
		
			// $_SESSION['done']="category successfully inserted";
			
			// header("location:category.php");
            }
        }
        else{
            header("location:Signup.php");
        }

?>