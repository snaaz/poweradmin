<?php
$servername="localhost";
$username="root";
$password="";
$dbname="poweradmin";

$connection = new mysqli($servername,$username,$password,$dbname);
  if($connection->connect_error)
  {
	  die("connection failed".$connection->connect_error);
  }
  
//$users=mysqli_query($connection,"select * FROM `users` WHERE isadmin='0'");
?>