<?php

$resp = array();
$register_status = 'invalid';
include'../include/settings.php';
  
		$username = mysqli_real_escape_string($con, $_POST['username']);
		
		$password = mysqli_real_escape_string($con, $_POST['password']);
		
		$confpassword = mysqli_real_escape_string($con, $_POST['confpassword']);
		
		$email = mysqli_real_escape_string($con, $_POST['email']);
		
		$longueur = strlen($password);
		
		$date = date("Y-m-d");
		
		$ip = mysqli_real_escape_string($con, htmlspecialchars($_SERVER['REMOTE_ADDR']));
		
		$ref = mysqli_real_escape_string($con, $_POST['ref']);
		
		$register_status = 'success';
		
	if($longueur < 5){
	
		$register_status = 'longueur';
		$ref = "";
	
	}
	
	if($password !== $confpassword){
	
		$register_status = 'conf';
		$ref = "";
	
	}
	
	$user_check = mysqli_query($con, "SELECT `username` FROM `users` WHERE `username` = '$username'") or die(mysqli_error($con));
	
	$do_user_check = mysqli_num_rows($user_check);
	
	if($do_user_check > 0){
	
		$register_status = 'usertaken';
		$ref = "";

	}
	
	$email_check = mysqli_query($con, "SELECT `email` FROM `users` WHERE `email` = '$email'") or die(mysqli_error($con));
	
	$do_email_check = mysqli_num_rows($email_check);
	
	if($do_email_check > 0){
	
		$register_status = 'emailtaken';
		$ref = "";
	
	}
	
	if($ref !== "" && isset($ref)){
		
		$resultstats = mysqli_query($con, "SELECT * FROM users WHERE username = '$ref'") or die(mysqli_error($con));
		
		if(mysqli_num_rows($resultstats) < 1){
			
			$register_status = 'refcode';
			
		}else{
			
				while($row = mysqli_fetch_array($resultstats)){
				
				$refuser = $row['username'];
				$oldref = $row['ref'];
				
				}
				
				$newref = $oldref + '1';
				mysqli_query($con, "INSERT INTO ref (newuser, refuser) VALUES ('$username', '$refuser')") or die(mysqli_error($con));
				mysqli_query($con, "UPDATE users SET ref = '$newref' WHERE username = '$ref'") or die(mysqli_error($con));
				
			}
			
		}
		

	
	if($register_status == 'success'){
		
	$pass_encrypted = password_hash($password, PASSWORD_BCRYPT);
	
	mysqli_query($con, "INSERT INTO `users` (username, password, email, date, ip)

	VALUES ('$username', '$pass_encrypted', '$email', '$date', '$ip')") or die(mysqli_error($con));
		
	$register_status = 'success';
	
	}

// DON'T TUCH THIS !
$resp['submitted_data'] = $_POST;

$resp['register_status'] = $register_status;

echo json_encode($resp);


?>