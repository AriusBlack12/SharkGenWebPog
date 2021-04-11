<?php
/*
	Sample Processing of Forgot password form via ajax
	Page: extra-register.html
*/
if (!isset($_SESSION)) 
{ session_start(); 
}
# Response Data Array
$resp = array();
include '../include/settings.php';

// Fields Submitted
				$username = mysqli_real_escape_string($con, $_POST['username']);
				
				$password = mysqli_real_escape_string($con, $_POST["password"]);
				
				$jour = date("Y-m-d H:i:s");
				
				$ip = mysqli_real_escape_string($con, $_SERVER['REMOTE_ADDR']);

				
				
if (preg_match_all("#Windows NT (.*)[;|\)]#isU", $_SERVER["HTTP_USER_AGENT"], $version))
	{
		if ($version[1][0] == '6.1')
		{
			$os = 'Windows Seven';
		}
		elseif($version[1][0] == '6.0')
		{
			$os = 'Windows Vista';
		}
		elseif($version[1][0] == '5.1')
		{
			$os = 'Windows XP';
		}
		elseif($version[1][0] == '5.2')
		{
			$os = 'Windows Server 2003';
		}
		else
		{
			$os = 'Windows ' . $version[1][0];
		}
	}
	elseif (preg_match_all("#Mac (.*);#isU", $_SERVER["HTTP_USER_AGENT"], $version))
	{
		$os = 'Mac ' . $version[1][0];
	}
	elseif (preg_match("#Windows 98#", $_SERVER["HTTP_USER_AGENT"]))
	{
		$os = 'Windows 98';
	}
	elseif (preg_match("#Mac#", $_SERVER["HTTP_USER_AGENT"]))
	{
		$os = 'Apple';
	}
	elseif (preg_match("#SunOS#", $_SERVER["HTTP_USER_AGENT"]))
	{
		$os = 'SunOS';
	}
	elseif (preg_match("#Fedora#", $_SERVER["HTTP_USER_AGENT"]))
	{
		$os = 'Fedora';
	}
	elseif (preg_match("#Haiku#", $_SERVER["HTTP_USER_AGENT"]))
	{
		$os = 'Haiku';
	}
	elseif (preg_match("#Ubuntu#", $_SERVER["HTTP_USER_AGENT"]))
	{
		$os = 'Linux Ubuntu';
	}
	elseif (preg_match("#FreeBSD#", $_SERVER["HTTP_USER_AGENT"]))
	{
		$os = 'FreeBSD';
	}
	elseif (preg_match("#Linux#", $_SERVER["HTTP_USER_AGENT"]))
	{
		$os = 'Linux';
	}
	else {
		$os = 'Inconnu';
	}


// This array of data is returned for demo purpose, see assets/js/neon-forgotpassword.js
$resp['submitted_data'] = $_POST;
$login_status = 'invalid';

// Login success or invalid login data [success|invalid]
// Your code will decide if username and password are correct
$result = mysqli_query($con, "SELECT * FROM `users` WHERE `username` = '$username'") or die(mysqli_error($con));

		if(mysqli_num_rows($result) < 1){
		
			$login_status = 'invalid';
			
}elseif(mysqli_num_rows($result) > 0){

			while($row = mysqli_fetch_array($result)){
			
				$user = $row['username'];
				$pass = $row['password'];
				$id = $row['id'];
				$rank = $row['rank'];
				$email = $row['email'];
				$isbanned = $row['isbanned'];
				$skin = $row['skin'];
				
			}
}
	if($isbanned == "1")
	{
		$login_status = 'ban';
		
			if(!isset($_COOKIE['PHPVERID'])){
			
				setcookie("PHPVERID", "fdbb79ac1345077d644f77bd0c220982", time() + 365*24*3600, "/");
				
			}
		
	}
	
$resultban = mysqli_query($con, "SELECT * FROM `banned` WHERE `username` = '$username'") or die(mysqli_error($con));

  $numrow = mysqli_num_rows($resultban);
  
  if($numrow >= 1){
  
		if($username == $row['username']){
		
			$login_status = 'ban';
				
				if(!isset($_COOKIE['PHPVERID'])){	
				
					setcookie("PHPVERID", "fdbb79ac1345077d644f77bd0c220982", time() + 365*24*3600, "/");
				
				}
		}
	}
	
  if(isset($_COOKIE['PHPVERID'])){
				
		$login_status = 'ban';
					
			if($numrow < 1){
						
					mysqli_query($con, "INSERT INTO `banned` (username, ip, date) VALUES ('$username', '$ip', '$jour')") or die(mysqli_error($con));
						
			}						
	}

if($login_status !== "ban" || $login_status !== "invalid")
{
	if(strtolower($username) == strtolower($user) && (password_verify($password, $pass)) && $isbanned == "0")
	{
	
		$login_status = 'success';
			
	}
}
$resp['login_status'] = $login_status;

// Login Success URL
if($login_status == 'success')
{
	// If you validate the user you may set the user cookies/sessions here
		#setcookie("logged_in", "user_id");
		#$_SESSION["logged_user"] = "user_id";
	// Set the redirect url after successful login
	$_SESSION['email'] = $email;
	$_SESSION['rank'] = $rank;
	$_SESSION['id'] = $id;
	$_SESSION['username'] = $_POST['username'];
	if($skin == 'normal'){
	$_SESSION['skin'] = 'normal';}else{
	$_SESSION['skin'] = $skin;
	}
	
	mysqli_query($con, "INSERT INTO `ip` (username, ip, os, datetime) VALUES ('".$username."', '$ip', '$os', '$jour')") or die(mysqli_error($con)); 
	
	$resp['redirect_url'] = 'index';
}

echo json_encode($resp);
?>