<?php
include('db.php');

 $states =mysqli_query($connection,"select * FROM `states` WHERE 1");
 session_start();
 if(isset($_POST['submit']))
{
$first_name=$_POST['fname'];
$last_name=$_POST['lname'];
$email=$_POST['email'];
$password=$_POST['password'];
$phone=$_POST['phone'];
$addr=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['state'];
$active=$_POST['active'];
$error = "";


$cost = 10;
$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
$salt = sprintf("$2a$%02d$", $cost) . $salt;
$hash = crypt($password, $salt);

$create = mysqli_query($connection, "INSERT INTO users (firstname,lastname,email,password,Phone,Address,city,state,active)
        values('$first_name', '$last_name','$email','$hash','$phone','$addr','$city','$state','$active')");
  
if ($create) 
{
	
    $_SESSION["message"]="NEW RECORD INSERTED SUCCSESSFULLY";
	
	if(isset($_SESSION['user']['isadmin']) and $_SESSION['user']['isadmin']==1)
	{
	
	header('Location:index.html');
	}
else{
	header('Location:login.html');
    }
}
else 
{
	$error_create = mysqli_error ( $connection );
	$error_create = explode ( ";", $error_create, 3 );
	$error_create = array_values ( $error_create ) [0];
	$_SESSION['error'] ="Record could not inserted...." .$error_create;
	header('Location: index.html');
}
}
$connection->close();
?>