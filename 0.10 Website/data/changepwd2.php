<?php
$resp = array();
$pass_status = 'invalid';
include'../include/settings.php';
session_start();

	$username = $_SESSION['iduser'];

	$password = mysqli_real_escape_string($con, $_POST['password']);
	
	$confpassword = mysqli_real_escape_string($con, $_POST['confpassword']);

		if($password !== $confpassword){
	
			$pass_status = 'invalid';
	
		}else
		if(strlen($password) < 5){
	
			$pass_status = 'invalid';
	
		}else{
		
			$newpassword = password_hash($password, PASSWORD_BCRYPT);
		
				mysqli_query($con, "UPDATE users SET password = '$newpassword' WHERE id = '$username'") or die (mysqli_error($con));
				
				$check_user = mysqli_query($con,"SELECT * FROM users WHERE id = '$username'");
					
					while($row = mysqli_fetch_array($check_user)){
					
					$real_users = $row['username'];
					
					$real_mail = $row['email'];
					
					}
					
				mysqli_query($con, "DELETE FROM changepwd WHERE username = '$real_users'") or die (mysqli_error($con));
				
				$pass_status = 'success';
		
		}
		
		
		
		if($pass_status == 'success'){
		
		$email_post = htmlentities(addslashes("$real_mail"));
					
					$subject = "Password changed";
					
					$msg_mail = "
			
		<head>
</head>	
<body>
Hello dear member,</br>
Your password has been changed.</br>
If it was not you, we advise you</br>
to contact us immediatly by twitter :</br>
</br>
<strong><a href='https://twitter.com/ArrowAltsFR'>@ArrowAltsFR</a></strong></br>
</br>
Thank you for your confidence.</br>
The " . $website . " team.\n\n</br>
\n=======\n</br>
</body>

";

	if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $email_post))
	{
	
		$passage_ligne = "\r\n";
		
	}
	
	else

	{
	
		$passage_ligne = "\n";
		
	}
	
        $header = "From: \"$website\"<recovery@". $_SERVER['HTTP_HOST'] .">".$passage_ligne;
		
		$header.= "Reply-to: \"$website\" <recovery@". $_SERVER['HTTP_HOST'] .">".$passage_ligne; 
		
		$header.= "MIME-Version: 1.0".$passage_ligne; 
		
		$boundary = "-----=".md5(rand());
		
		$header .= "Content-Type: text/html; charset=\"iso-8859-1\"";
		  
		
		
		$success = mail(html_entity_decode(filter_var($email_post, FILTER_VALIDATE_EMAIL)), $subject, $msg_mail, $header);
		
		}


// DON'T TUCH THIS !
$resp['submitted_data'] = $_POST;

$resp['pass_status'] = $pass_status;

echo json_encode($resp);
?>