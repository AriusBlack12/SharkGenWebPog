<?php
/*
	Sample Processing of Forgot password form via ajax
	Page: extra-register.html
*/

# Response Data Array
$resp = array();
$email_status = 'unknown';
include'../include/settings.php';

$site = mysqli_query($con, "SELECT * FROM `settings`") or die(mysqli_error($con));

	while($row_site = mysqli_fetch_array($site)){
	
		$website = $row_site['website'];

}

// Fields Submitted
			$random_key = password_hash(microtime(TRUE)*10000, PASSWORD_BCRYPT);
			
			$ip = mysqli_real_escape_string($con, htmlspecialchars($_SERVER['REMOTE_ADDR']));
			
			$email = mysqli_real_escape_string($con, $_POST['email']);
			
			$email = mb_strtolower($email);
			
			$result = mysqli_query($con, "SELECT * FROM `users` WHERE `email` = '$email'") or die(mysqli_error($con));
			
			if(mysqli_num_rows($result) < 1){
			
			$email_status = 'unknown';
			
			}else{
			
				$row = mysqli_fetch_array($result);
			
					$real_username = $row['username'];
			
					$real_email = $row['email'];
			
					$id = $row['id'];
					
					}

			if($email == $real_email){
			
				$today = time();
			
				$insert = mysqli_query($con, 
			
				"INSERT INTO `changepwd` 
			
				(date, username, email, token, ip) 
		   
				VALUES 
			
				('$today', '$real_username', '$email', '$random_key', '$ip')"
		   
				)or die(mysqli_error($con));
		   
				$email_status = 'success';
		   
		   }

		   if(!$insert){
		   
			$email_status = 'problem';
		   
		   }
	if($email_status = 'success'){
	
		$select_token = mysqli_query($con, 
	
		"SELECT * FROM changepwd WHERE username = '$real_username' AND token = '$random_key' AND email = '$email' AND ip = '$ip'"
	
		)or die(mysqli_error($con));
	
			$row_token = mysqli_fetch_array($select_token);
		
			$token = $row_token['token'];
		
			$ips = md5($row_token['ip']);

			        $email_post = htmlentities(addslashes("$real_email"));
					
					$subject = "Forgot Password";
					
					$msg_mail = "
			
		<head>
</head>	
<body>
Hello dear member here is your information: \n</br></br>

Your username is: $real_username</br>
Your email is: $real_email \n</br></br>

To change your password, click the link bellow</br>
or copy/paste it in your browser:</br></br>

<b>http://" . $_SERVER['HTTP_HOST'] . "/changepwd?tkn=" . $token . "&ips=" . $ips . "</b></br></br>

The password is encrypted in our database, only you know it. \n</br>
Thank you for your confidence.</br>
The " . $website . " team.\n\n</br>
Request sent by " . $ip . "</br>
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
		
		
          if(empty($email_post)){
		   
			$email_status = 'unknown';
		  
		  }	
		  
		
		
		$success = mail(html_entity_decode(filter_var($email_post, FILTER_VALIDATE_EMAIL)), $subject, $msg_mail, $header);
		
		if(!$success){
		
			$email_status = 'problem';
		
		}
		
	}
					
// DON'T TUCH THIS !
$resp['submitted_data'] = $_POST;

$resp['email_status'] = $email_status;

echo json_encode($resp);