<?php
include ('db.php');
session_start ();

if (isset ( $_GET ['id'] )) {
	$id = $_GET ['id'];
	// $guest=mysqli_query($connection,"select * FROM `users` WHERE id='".$id."'");
}

$states = mysqli_query ( $connection, "select * FROM `states` WHERE 1" );

if (isset ( $_POST ['update'] )) {
	$Fname_save = $_POST ['firstname'];
	$Last_save = $_POST ['lastname'];
	$email_save = $_POST ['email'];
	$Phn_save = $_POST ['phone'];
	$Addr_save = $_POST ['address'];
	$city_save = $_POST ['city'];
	$state_save = $_POST ['state'];
	$id = $_POST ['id'];
	
	// echo $id;
	$updated = mysqli_query ( $connection, "UPDATE users SET  firstname ='" . $Fname_save . "', lastname ='" . $Last_save . "',
		 email ='" . $email_save . "', phone='" . $Phn_save . "', address='" . $Addr_save . "', city='" . $city_save . "', state='" . $state_save . "' WHERE id = '" . $id . "'" );
	
	echo "a";
	
	if ($_FILES ['file'] ['size'] > 0) {
		$file_name = rand ( 1000, 100000 ) . "-" . $_FILES ['file'] ['name'];
		$file_loc = $_FILES ['file'] ['tmp_name'];
		// $file_size = $_FILES['file']['size'];
		$file_type = $_FILES ['file'] ['type'];
		$folder = "uploads/";
		$id = $_SESSION ['user'] ['id'];
		// $profile_pic=1;
		
		echo "b";
		move_uploaded_file ( $file_loc, $folder . $file_name );
		
		$image = mysqli_query ( $connection, "select * FROM `files` WHERE user_id='" . $id . "' and profile_pic=1" );
		$img = mysqli_fetch_array ( $image );
		
		echo "err";
		echo $img ['id'];
		if ($img ['id']) {
			$upload = mysqli_query ( $connection, "UPDATE files set file='" . $file_name . "',file_type='" . $file_type . "',user_id='" . $id . "',profile_pic=1 WHERE id = '" . $img ['id'] . "'" );
			echo $upload;
			echo "sucses";
		} else {
			$upload = mysqli_query ( $connection, "INSERT INTO file(file,file_type,user_id,profile_pic) VALUES('$file_name','$file_type','$id',1)" );
			echo $upload;
		}
	}
	if ($updated) {
		$msg = "Successfully Updated!!";
		echo $msg;
		$result = mysqli_query ( $connection, "select * from users where id = '" . $id . "' limit 1" );
		$updated_user = mysqli_fetch_array ( $result );
		$_SESSION ['user'] = $updated_user;
		// echo $_SESSION['user']['firstname'];
		$_SESSION ["message"] = "RECORD UPDATED SUCCSESSFULLY";
		// header("Location:profile.html");
	} else {
		echo "Error: " . $updated . "<br>" . $connection->error;
		$_SESSION ['error'] = "Error: " . $updated . "<br>" . $connection->error;
		
		// header('Location:edit.html');
		// echo"error";
	}
}

?>