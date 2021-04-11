<?php
include 'include/settings.php';

if (!isset($_SESSION)) 
{ session_start(); 
}

if (isset($_SESSION['username'])) {
echo '
<script language="javascript">
    window.location.href = "index"
</script>
';
}

$site = mysqli_query($con, "SELECT * FROM `settings`") or die(mysqli_error($con));
while($row = mysqli_fetch_array($site)){
$website = $row['website'];
$favicon = $row['favicon'];
}
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

	<title><?php echo $website ?> | Register</title>

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
<body class="page-body login-page login-form-fall">


<!-- This is needed when you send requests via Ajax -->
<script type="text/javascript">
var baseurl = '';
</script>
	
<div class="login-container">
	
	<div class="login-header login-caret">
		
		<div class="login-content">
			
				<div class="logo2">
						<center><a href="#" class="logo2"><b><font color="white"><?php echo $website;?></font></b></a><br /></center>
				</div>
			
			<p class="description">Create an account, it takes few moments only!</p>
			
			<!-- progress bar indicator -->
			<div class="login-progressbar-indicator">
				<h3>43%</h3>
				<span>logging in...</span>
			</div>
		</div>
		
	</div>
	
	<div class="login-progressbar">
		<div></div>
	</div>
	
	<div class="login-form">
		
		<div class="login-content">
			
			<form method="post" role="form" id="form_register">
	
				<div class="form-login-error" id="error-inconnue">
				<h3>Huh...</h3>
				<p>An <strong>error</strong> occurred, please retry !</p>
			</div>
			
				<div class="form-login-error" id="error-longueur">
				<h3>Huh...</h3>
				<p>Your <strong>password</strong> is too short !</p>
			</div>
			
				<div class="form-login-error" id="error-conf">
				<h3>Huh...</h3>
				<p>Your <strong>passwords</strong> are not same !</p>
			</div>
			
				<div class="form-login-error" id="error-usertaken">
				<h3>Huh...</h3>
				<p>Your <strong>username</strong> is already taken !</p>
			</div>
				
				<div class="form-login-error" id="error-emailtaken">
				<h3>Huh...</h3>
				<p>Your <strong>email</strong> is already taken !</p>
			</div>
				
				<div class="form-register-success">
					<i class="entypo-check"></i>
					<h3>You have been successfully registered.</h3>
					<p>You can now log in with your account.</p>
				</div>
				
				<div class="form-steps">
					
					<div class="step current" id="step-1">
										
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-mail"></i>
								</div>
								
								<input type="text" class="form-control" name="email" id="email" data-mask="email" placeholder="E-mail" autocomplete="off" />
							</div>
						</div>
						
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-user-add"></i>
								</div>
								
								<input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off" />
							</div>
						</div>
						
						<div class="form-group">
							<button type="button" data-step="step-2" class="btn btn-primary btn-block btn-login">
								<i class="entypo-right-open-mini"></i>
								Next Step
							</button>
						</div>
						
						<div class="form-group">
							Step 1 of 2
						</div>
					
					</div>
					
					<div class="step" id="step-2">
						
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-lock"></i>
								</div>
								
								<input type="password" class="form-control" name="password" id="password" placeholder="Choose Password" autocomplete="off" />
							</div>
						</div>
						
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-lock"></i>
								</div>
								
								<input type="password" class="form-control" name="confpassword" id="confpassword" placeholder="Confirm Password" autocomplete="off" />
							</div>
						</div>
						<div class="form-group">
						<small>*By registering, you agree to the <a href="ToS">ToS</a> </small>
						</div>
						
						<div class="form-group">
							<button type="submit" class="btn btn-success btn-block btn-login">
								<i class="entypo-right-open-mini"></i>
								Complete Registration
							</button>
						</div>
						
						<div class="form-group">
							Step 2 of 2
						</div>
						
					</div>
					
				</div>
				
			</form>
			
			
			<div class="login-bottom-links">
				
				<a href="login" class="link">
					<i class="entypo-lock"></i>
					Return to Login Page
				</a>
				
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
	<script src="assets/js/neon-register.js"></script>
	<script src="assets/js/jquery.inputmask.bundle.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="assets/js/neon-demo.js"></script>

</body>
</html>