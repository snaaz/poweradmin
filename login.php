<?php
include('db.php');
session_start();

$email=$_POST['email']; 
$userpass=$_POST['password']; 

echo $email;
echo $userpass;
$result=mysqli_query($connection,"select * FROM `users` WHERE email='$email' limit 1");

$row = mysqli_fetch_array($result);

	//echo $row['password'];
	$hash=hash_equals($row['password'], crypt($userpass, $row['password']));
	if($hash && $row['active']==1){
	echo "logged in  " ;
    $_SESSION['user'] = $row;
    header("Location: dashboard.html");
}

else {
       if(!$hash){
$_SESSION['message']="Wrong Username or Password";
	   }
	  if($row['active']==0)
	  {
 $_SESSION['message']="User is not active";
	  }
header("location:Login.html?msg=failed");
}
?>