<?php
include('db.php');
if(isset($_GET['id'])){
//$name= $_GET['file'];
$query = mysqli_query($connection,"SELECT file, file_type FROM files WHERE id = '".$id."'");
$result=mysqli_fetch_array($query);
$name=$result['file'];
    header('Content-Description: File Transfer');
    header('Content-Type: application/force-download');
    header("Content-Disposition: attachment; filename=\"" . basename($name) . "\";");
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
   // header('Content-Length: ' . filesize($name));
    ob_clean();
    flush();
    readfile("C:/myapps/poweradmin/uploads/".$name); 
    exit;
}
	?>