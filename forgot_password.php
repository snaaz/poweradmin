<?php
include('db.php');

   if(isset($_POST['reset_password']))
 {
	$new_password=$_POST['new_password'];
	$confirm_password=$_POST['confirm_password'];
	//echo "<br>";
	//echo $confirm_password;
	$id=$_POST['encrypt'];
	//echo $url;

$cost = 10;
    $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
    $salt = sprintf("$2a$%02d$", $cost) . $salt;
    $hash = crypt($confirm_password, $salt);
	//2nd last
	if($new_password==$confirm_password)
	{
   // $reset1=mysqli_query($connection,"update users set encrypt_id=null");
	$reset=mysqli_query($connection,"UPDATE users SET  password ='".$hash."' WHERE encrypt_id = '".$id."'");
	$reset2=mysqli_query($connection,"update users set encrypt_id=null");
	if($reset)
  {
  $msg="Successfully Updated!!";
  echo $msg;
  session_start();
  $_SESSION["message"]="PASSWORD CHANGE SUECCSESSFULLY";
  header("Location:login.html");
  
  }
  
    else 
   {
	echo "Error: " . $updated. "<br>" . $connection->error;
	$_SESSION['error'] = "Error: " . $updated . "<br>" . $connection->error;
	header('Location:http://localhost.myapps/poweradmin/forgot_password.html?encrypt='.$id.'&action=reset');
	}
	 
	}
	//2nd last
 else
	{
		 header('Location:http://localhost.myapps/poweradmin/forgot_password.html?encrypt='.$id.'&action=reset');
		 echo "confirm password must be same";
	 }
 }
	
	
 
	 

?>