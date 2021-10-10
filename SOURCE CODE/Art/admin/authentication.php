<?php
$message="";
if(count($_POST)>0) {
	$conn = mysqli_connect("localhost","root","","art_shopee");
	$result = mysqli_query($admin_db,"SELECT * FROM login_user WHERE username='" . $_POST["userName"] . "' and password = '". $_POST["password"]."'");
	$count  = mysqli_num_rows($result);
	if($count==0) {
		$message = "Invalid Username or Password!";
	} else {
		$message = "You are successfully authenticated!";
	}
}
?>