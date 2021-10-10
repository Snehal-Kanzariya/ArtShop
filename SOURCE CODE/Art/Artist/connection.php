<?php
 
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "art_shopee";

$db = mysqli_connect($hostname, $username, $password, $dbname);

if($db){
    // echo "successfully db connect";
}else{
    echo "connection failed : ".mysqli_connect_error();
}


?>

