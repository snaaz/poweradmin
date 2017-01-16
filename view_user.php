<?php
include ('db.php');

if (isset ( $_GET ['id'] )) {
	$id = $_GET ['id'];
	$user = mysqli_query ( $connection, "select * FROM `users` WHERE id='" . $id . "'" );
}

$states = mysqli_query ( $connection, "select * FROM `states` WHERE 1" );
$connection->close ();
?>