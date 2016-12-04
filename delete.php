<?php

include('db.php');
if(isset($_GET['id']))
{
$id=$_GET['id'];
$query1=mysqli_query($connection,"delete from users where id='".$id."'");
if($query1)
{
header('location:index.html');
session_start();
  $_SESSION["message"]="RECORD DELETED SUCCSESSFULLY";
}
else {
	echo "record cant delete";
}
}
?>