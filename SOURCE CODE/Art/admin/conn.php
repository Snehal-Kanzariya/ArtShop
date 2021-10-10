<?php
 
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "art_shopee";

$admin_db = mysqli_connect($hostname, $username, $password, $dbname);

if($admin_db){
    // echo "successfully db connect";
}else{
    echo "connection failed : ".mysqli_connect_error();
}


?>

