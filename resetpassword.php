<?php
include ('db.php');
session_start ();


if (isset ( $_SESSION ['user'] ['password'] )) {
	
	if (isset ( $_POST ['reset_password'] )) {
		$new_password = $_POST ['new_password'];
		$confirm_password = $_POST ['confirm_password'];
		$id = $_POST ['id'];
		$cost = 10;
		$salt = strtr ( base64_encode ( mcrypt_create_iv ( 16, MCRYPT_DEV_URANDOM ) ), '+', '.' );
		$salt = sprintf ( "$2a$%02d$", $cost ) . $salt;
		$hash = crypt ( $confirm_password, $salt );
		if ($new_password == $confirm_password) {
			$reset = mysqli_query ( $connection, "UPDATE users SET  password ='" . $hash . "' WHERE id = '" . $id . "'" );
			if ($reset) {
				$msg = "Successfully Updated!!";
				echo $msg;
				$_SESSION ["message"] = "PASSWORD CHANGE SUECCSESSFULLY";
				header ( "Location:profile.html" );
			} 			
			else {
				echo "Error: " . $updated . "<br>" . $connection->error;
				$_SESSION ['error'] = "Error: " . $updated . "<br>" . $connection->error;
				header ( 'Location:resetpassword.html' );
			}
		} 		
		else {
			header ( 'Location:resetpassword.html' );
			echo "confirm password must be same";
		}
	}
}
$connection->close();
?>