<?php
include('db.php');
 if(isset($_GET['id'])) 
{
// if id is set then get the file with the id from database

//include 'library/config.php';
//include 'library/opendb.php';
//echo $_GET['id'];
$id    = $_GET['id'];
$query = mysqli_query($connection,"SELECT file, file_type FROM files WHERE id = '".$id."'");
$result=mysqli_fetch_array($query);

// $name = @mysql_result($result, 0, "file");
  $name = $result['file'];
 // $size = @mysql_result($result, 0, "filesize");
  $type = @mysql_result($result, 0, "file_type");
	
  header("Content-type: '".$type."'");
 // header("Content-length: $size");
  header("Content-Disposition: attachment; filename='".$name."'");
  header("Content-Description: PHP Generated Data");
  header("Content-transfer-encoding: binary");
  readfile("C:/myapps/poweradmin/uploads/".$name); 
 // echo $dataT;
//echo"download";
}

else
	echo"error";
//include 'library/closedb.php'; 
//exit;
 ?>
