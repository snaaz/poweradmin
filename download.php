<?php
include ('db.php');
if (isset ( $_GET ['id'] )) {
	$id = $_GET ['id'];
	$query = mysqli_query ( $connection, "SELECT file, file_type FROM files WHERE id = '" . $id . "'" );
	$result = mysqli_fetch_array ( $query );
	
	$name = $result ['file'];
	$type = @mysql_result ( $result, 0, "file_type" );
	
	header ( "Content-type: '" . $type . "'" );
	header ( "Content-Disposition: attachment; filename='" . $name . "'" );
	header ( "Content-Description: PHP Generated Data" );
	header ( "Content-transfer-encoding: binary" );
	readfile ( "C:/myapps/poweradmin/uploads/" . $name );
} 

else {
	echo "error";
}
$connection->close ();

?>
