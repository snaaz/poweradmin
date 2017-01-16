<?php
include ('db.php');
session_start ();

$states = mysqli_query ( $connection, "select * FROM `states` WHERE 1" );

if (isset ( $_POST ['submit'] )) {
	$first_name = $_POST ['fname'];
	$last_name = $_POST ['lname'];
	$email = $_POST ['email'];
	$password = $_POST ['password'];
	$phone = $_POST ['phone'];
	$addr = $_POST ['address'];
	$city = $_POST ['city'];
	$state = $_POST ['state'];
	$error = "";
	$cost = 10;
	$salt = strtr ( base64_encode ( mcrypt_create_iv ( 16, MCRYPT_DEV_URANDOM ) ), '+', '.' );
	$salt = sprintf ( "$2a$%02d$", $cost ) . $salt;
	$hash = crypt ( $password, $salt );
	
	$insert = "INSERT INTO users(firstname,lastname,email,password,Phone,Address,city,state)
        values('$first_name', '$last_name','$email','$hash','$phone','$addr','$city','$state')";
	
	if ($connection->query ( $insert ) === TRUE) {
		echo "New record created successfully";
		
		$_SESSION ["message"] = "NEW RECORD INSERTED SUCCSESSFULLY";
		
		if (isset ( $_SESSION ['user'] ['isadmin'] ) and $_SESSION ['user'] ['isadmin'] == 1) {
			
			header ( 'Location:index.html' );
		} else {
			header ( 'Location:login.html' );
		}
	} else {
		echo "Error: " . $sql . "<br>" . $connection->error;
		$_SESSION ['error'] = "Error: " . $sql . "<br>" . $connection->error;
		header ( 'Location: create.html' );
	}
}
$connection->close ();
?>