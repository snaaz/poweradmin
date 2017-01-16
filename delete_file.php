<?php

include('db.php');
session_start();
$error_query1 = null;
if(isset($_GET['id']))
{
$file_id=$_GET['id'];

$query1=mysqli_query($connection,"delete from files where id='".$file_id."'");
if($query1)
{
header('location:view_files.html');
$_SESSION["message"]="FILE DELETED SUCCSESSFULLY";
}
else {$error_query1=mysqli_error($connection);
	$error_query1= explode(";",$error_query1,3);
	$error_query1=array_values($error_query1)[0];
	$_SESSION["error"] = $error_query1;
	header('location:view_files.html');
}
}
$connection->close();
?>