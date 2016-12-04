<?php
include('db.php');
  session_start();
  //view the details of selected record.....
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
	$guest=mysqli_query($connection,"select * FROM `users` WHERE id='".$id."'");
	}
	
	
	
$state=mysqli_query($connection,"select * FROM `states` WHERE 1");
	
	
// update the selected records......
		
 if(isset($_POST['update']))
{	
	$Fname_save=$_POST['firstname'];
    $Last_save=$_POST['lastname'];
    $email_save=$_POST['email'];
	$Phn_save=$_POST['phone'];
    $Addr_save=$_POST['address'];
    $city_save=$_POST['city'];
	$state_save=$_POST['state'];
	$active_save=$_POST['active'];
	$id=$_POST['id'];
   // echo $_POST['active'];
	//echo $_POST['id'];
	
	
	$updated=mysqli_query($connection,"UPDATE users SET  firstname ='".$Fname_save."', lastname ='".$Last_save."',
		 email ='".$email_save."', Phone='".$Phn_save."', Address='".$Addr_save."', city='".$city_save."', state='".$state_save."' , active='".$active_save."'
		 WHERE id = '".$id."'");
		 
	//echo "c";
	 echo $Fname_save;
	echo $Last_save;
	echo $email_save;
	echo $id;
	echo $active_save;
	if($updated)
  {
  $msg="Successfully Updated!!";
  
  header("Location:index.html");
  
  $_SESSION["message"]="RECORD UPDATED SUCCSESSFULLY";


  }
else {
	 echo "Error: " . $updated. "<br>" . $conn->error;
	$_SESSION['error'] = "Error: " . $updated . "<br>" . $conn->error;
	
	 header('Location:edit_user.html');
	  
     }
	
	 
}

 

?>