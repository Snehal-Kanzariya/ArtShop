 <?php
 include("connection.php");
 echo "<pre>";
print_r($_POST);
 echo "</pre>";
 
 if(isset($_POST['login']))
            {    
                $username = $_POST['username'];
                //$email = $_POST['email'];
                $password = $_POST['password'];
                $sql = "SELECT * FROM signup_user WHERE username='".$username."'&& password='".$password."'";
               
                
             $result= mysqli_query($db, $sql);
             $count = mysqli_num_rows($result);
                    if($count>0){
                            header("location:index.php");
                    }
                    else{

                         if($count==0){
                        echo "Please enter the valid username and password";
                        }
                        else{
                            header("location: Signup.php");
                        }
                        //  echo "username password is Wrong";
                        // header("location: Signup.php");
                    }
                   


                mysqli_close($db);
            }
    else{
        echo "testing";
    }

?>