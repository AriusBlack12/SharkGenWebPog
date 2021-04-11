<?php
include'include/settings.php';
session_start();
	
	$expires = time() + 24*60*60;
	
		if(isset($_GET['tkn']) & isset($_GET['ips'])){
		
			$token = mysqli_real_escape_string($con, $_GET['tkn']);
			
			$ips = mysqli_real_escape_string($con, $_GET['ips']);
			
		$result = mysqli_query($con, "SELECT * FROM changepwd WHERE token = '$token'") or die(mysqli_error($con));
		
		if(mysqli_num_rows($result) < 1){
		
			echo '<script language="JAVASCRIPT">alert("Expired Request") </script>';
		
			header("Location: login");
				
			die();			
			
		}else{
		
		$row = mysqli_fetch_array($result);
		
			$data = $row['date'];
		
			$ip = $row['ip'];
		
			$email = $row['email'];
		
			$username = $row['username'];
			
			$verify = $row['used'];
			
			$tkn = $row['token'];
			
			if($verify == "1"){
			
				echo '<script language="JAVASCRIPT">alert("Expired Request") </script>';
				
				header("Location: login");
				
				die();
				
			}
			
			if($data >= $expires){
			
				echo '<script language="JAVASCRIPT">alert("Expired Request") </script>';
				
				header("Location: login");
				
				die();

			}
			
			if($ips !== md5($ip)){
			
				echo '<script language="JAVASCRIPT">alert("Expired Request") </script>';
				
				header("Location: login");
				
				die();
			
			}
		
		}
	}else{
		
		header("Location: login");
		
		die();
		
		}
	$site = mysqli_query($con, "SELECT * FROM `settings`") or die(mysqli_error($con));
		
		while($row = mysqli_fetch_array($site)){
			
			$website = $row['website'];
			
			$favicon = $row['favicon'];
			
	}

	$users = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'") or die(mysqli_error($con));
	
		while($row = mysqli_fetch_array($users)){
		
			$iduser = $row['id'];
			
		}
		$_SESSION['iduser'] = $iduser;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="<?php echo $website ?>" />
	<meta name="author" content="" />

	<link rel="icon" href="<?php echo $favicon ?>">

	<title><?php echo $website ?> | Change Password</title>

	<link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/neon-core.css">
	<link rel="stylesheet" href="assets/css/neon-theme.css">
	<link rel="stylesheet" href="assets/css/neon-forms.css">
	<link rel="stylesheet" href="assets/css/custom.css">

	<script src="assets/js/jquery-1.11.3.min.js"></script>

	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>
<style>
a.logo2 {
    font-size: 400%;
    color: #2e2e2e;
    text-transform: uppercase;
}

a.logo2:hover, a.logo2:focus {
    text-decoration: none;
    outline: none;
}

a.logo2 span {
    color: #FF6C60;
}
</style>
<script type="text/javascript">
var baseurl = '';
</script>
<body class="page-body login-page is-lockscreen login-form-fall" data-url="http://neon.dev">
<div class="login-container">
	
	<div class="login-header">
		
		<div class="login-content">
			
				<div class="logo2">
						<center><a href="#" class="logo2"><b><font color="white"><?php echo $website;?></font></b></a><br /></center>
				</div>
			
			<p class="description">Dear <?php echo htmlentities($username) ?>, enter your new password here!</p>
			
			<!-- progress bar indicator -->
			<div class="login-progressbar-indicator">
				<h3>0%</h3>
				<span>Changing Password...</span>
			</div>
		</div>
		
	</div>
		
	<div class="login-form">
		
		<div class="login-content">
			<div class="login-content">
				<div class="form-login-error" id="error-login">
				<h3>Huh...</h3>
				<p>An <strong>error</strong> occurred, please retry !</p>
			</div>

			<div id="banid" class="form-forgotpassword-success">
			<i class="entypo-check"></i>
				<h3>Success</h3>
				<p>You can now log in with your new <a style="color: white;" href="login"><strong>password</strong></a>.</br></p>
			</div>
			
			<form method="post" role="form" id="form_lockscreen">
				
				<div class="form-group lockscreen-input">
					
					<div class="lockscreen-thumb">
						<img src="images/profile1.jpg" width="140" class="img-circle" />
						
						<div class="lockscreen-progress-indicator">0%</div>
					</div>
					
					<div class="lockscreen-details">
						<h4><?php echo htmlentities($username) ?></h4>
						<span id="change_password_text" data-login-text="logging in...">Change password :</span>
					</div>
					
				</div>
				
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-key"></i>
						</div>
						
						<input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" />
					</div>
					
				
				</div>
				
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-key"></i>
						</div>
						
						<input type="password" class="form-control" name="confpassword" id="confpassword" placeholder="Confirm Password" autocomplete="off" />
					</div>
					
				
				</div>
				
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block btn-login">
						<i class="entypo-login"></i>
						Change My Password
					</button>
				</div>
				
			</form>
			
			
			<div class="login-bottom-links">
				
				<a href="login" class="link">Go to Login <i class="entypo-right-open"></i></a>
				
				<br />
				
				<a href="ToS">ToS</a>  - <a href="ToS">Privacy Policy</a>
				
			</div>
			
		</div>
		
	</div>
	
</div>


	<!-- Bottom scripts (common) -->
	<script src="assets/js/gsap/TweenMax.min.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>
	<script src="assets/js/jquery.validate.min.js"></script>
	<script src="assets/js/neon-changepwd.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="assets/js/neon-demo.js"></script>

</body>
</html>