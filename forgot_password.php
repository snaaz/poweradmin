<?php
include('db.php');

   if(isset($_POST['reset_password']))
   {
	$new_password=$_POST['new_password'];
	$confirm_password=$_POST['confirm_password'];
	$id=$_POST['id'];
	
	$cost = 10;
    $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
    $salt = sprintf("$2a$%02d$", $cost) . $salt;
    $hash = crypt($confirm_password, $salt);
	//2nd last
	if($new_password==$confirm_password)
	{
	$reset=mysqli_query($connection,"UPDATE users SET  password ='".$hash."' WHERE id = '".$id."'");
		 
	//echo "c";
	//echo $Fname_save;
	//echo $Last_save;
	//echo $_SESSION['user']['password'];
	//echo $confirm_password;
	//echo $id;
	//last
	if($reset)
  {
  $msg="Successfully Updated!!";
  echo $msg;
  $_SESSION["message"]="PASSWORD CHANGE SUECCSESSFULLY PLEASE LOGIN";
  header("Location:login.html");
  
  }
  //last
    else 
   {
	echo "Error: " . $updated. "<br>" . $connection->error;
	$_SESSION['error'] = "Error: " . $updated . "<br>" . $connection->error;
	header('Location:forgot_password.html');
	}
	 
	}
	//2nd last
 else
	{
		 header('Location:forgot_password.html');
		 echo "confirm password must be same";
	 }
 }
	  

?>