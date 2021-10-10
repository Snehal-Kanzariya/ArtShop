     <?php

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
            else if(strlen($password_1) < 8){
                 $error[] = "please enter minimum  8 digit password";
            }
            if(! empty($error)){
                foreach($error as $er){
                    echo '<font color="red">'.$er.'</font><br/>';
                }
            }
            else{
                echo "All is well";
            }
            
            

        }
        else{
            header("location:Signup.php");
        }

?>
 <!-- include("connection.php");
 echo "<pre>";
print_r($_POST);
 echo "</pre>";
 if(isset($_POST['submit']))
            {    
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password_1'];
                $sql = "INSERT INTO signup_user (username,email,password)
                VALUES ('$username','$email','$password')";
                
                if (mysqli_query($db, $sql)) {
                    echo "New record has been added successfully !";
                } else {
                    echo "Error: " . $sql . ":-" . mysqli_error($db);
                }
                mysqli_close($db);
            }
    else{
        echo "testing";
    }

?> -->