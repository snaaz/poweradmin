<?php
include ('db.php');
session_start ();
if (isset ( $_GET ['id'] )) {
	$id = $_GET ['id'];
	$user = mysqli_query ( $connection, "select * FROM `users` WHERE id='" . $id . "'" );
}

if (isset ( $_POST ['status'] )) {
	
	$active_save = $_POST ['status'];
	$id = $_POST ['id'];
	$active = ($active_save == 'true') ? 1 : 0;
	
	$updated = mysqli_query ( $connection, "UPDATE users set active='" . $active . "' WHERE id = '" . $id . "'" );
	
	if ($updated) {
		$array = array (
				"status" => 'success',
				"response" => 'Successfully Updated!!'
		);
	} else {
		$array = array (
				"status" => 'error',
				"response" => $updated . "<br>" . $connection->error
		);
	}
	print json_encode($array);
}
$connection->close();

?>