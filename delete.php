<?php

include('db.php');
session_start();
$error_delete = null;
if(isset($_GET['id']))
{
$id=$_GET['id'];
$query1=mysqli_query($connection,"delete from users where id='".$id."'");
if($query1)
{
header('location:index.html');
  $_SESSION["message"]="RECORD DELETED SUCCSESSFULLY";
}
else {
	$error_delete=mysqli_error($connection);
	$error_delete= explode(";",$error_delete,3);
	$error_delete=array_values($error_delete)[0];
	$_SESSION["error"] = $error_delete;
	header('location:index.html');

}
}
$connection->close();
?>