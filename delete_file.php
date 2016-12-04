<?php

include('db.php');

if(isset($_GET['id']))
{
$file_id=$_GET['id'];

$query1=mysqli_query($connection,"delete from files where id='".$file_id."'");
if($query1)
{
	
header('location:view_files.html');
session_start();
$_SESSION["message"]="FILE DELETED SUCCSESSFULLY";
  echo "delete";
}
else {
	echo "record cant delete";
}
}
?>