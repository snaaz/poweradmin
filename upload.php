<?php
include('db.php');
session_start();
if(isset($_POST['btn-upload'])&& $_FILES['file']['size'] > 0)
{    
     
 $file = rand(1000,100000)."-".$_FILES['file']['name'];
  $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="uploads/";
 $id=$_SESSION['user']['id'];
 
 echo $file;
 echo $file_loc;
 echo $file_type;
 echo $folder;
 
 
 
 
 move_uploaded_file($file_loc,$folder.$file);
 $sql=mysqli_query($connection,"INSERT INTO files(file,file_type,user_id) VALUES('$file','$file_size','$id')");
 if ($sql) 
 {
	 //session_start();
    $_SESSION["message"]="File uploaded successful";
	header('location:view_files.html');
	echo"a";
 }
else 
{
    echo "Error: " . $sql . "<br>" . $connection->error;
	$_SESSION['error'] = "Error: " . $sql . "<br>" . $connection->error;
	header('Location:view_files.html');
	echo"b";
}
 
 }
 else{
header('Location:view_files.html');
$_SESSION["message"]="please select file"; 
	echo "c";
 }
 
?>