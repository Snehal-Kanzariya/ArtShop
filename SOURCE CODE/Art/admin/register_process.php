 <?php
 include("conn.php");
 echo "<pre>";
print_r($_POST);
 echo "</pre>";
 if(isset($_POST['submit']))
            {    
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $sql = "INSERT INTO admin_register (username,email,password)
                VALUES ('$username','$email','$password')";
                
                if (mysqli_query($admin_db, $sql)) {
                    echo "New record has been added successfully !";
                } else {
                    echo "Error: " . $sql . ":-" . mysqli_error($admin_db);
                }
                mysqli_close($admin_db);
            }
    else{
        echo "testing";
    }

?>