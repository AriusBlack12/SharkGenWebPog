<?php
include'include/settings.php';
include'connection.php';
if (!isset($_SESSION)) { session_start(); }

if (!isset($_SESSION['username'])) {
echo '
<script language="javascript">
    window.location.href = "login"
</script>
';
exit();
}

$username = $_SESSION['username'];


$site = mysqli_query($con, "SELECT * FROM `settings`") or die(mysqli_error($con));
while($row = mysqli_fetch_array($site)){
$website = $row['website'];
$favicon = $row['favicon'];
$emaillll = $row['email'];
}

if(isset($_POST['message'])){
	$date = date("(Y-m-d) H:i:s");
	$message = mysqli_real_escape_string($con, $_POST['message']);
	mysqli_query($con, "INSERT INTO `chat` (`username`, `message`, `date`) VALUES ('$username', '$message', '$date')") or die(mysqli_error($con));
	
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

	<title><?php echo $website ?> | Generator</title>

	<link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/neon-core.css">
	<link rel="stylesheet" href="assets/css/neon-theme.css">
	<link rel="stylesheet" href="assets/css/neon-forms.css">
	<link rel="stylesheet" href="assets/css/custom.css">

	<?php 
	if($_SESSION['skin'] == "blue"){ echo'
	<link rel="stylesheet" href="assets/css/skins/blue.css">';
	}elseif($_SESSION['skin'] == "black"){ echo'
	<link rel="stylesheet" href="assets/css/skins/black.css">';
    }elseif($_SESSION['skin'] == "white"){ echo'
	<link rel="stylesheet" href="assets/css/skins/white.css">';
	}elseif($_SESSION['skin'] == "purple"){ echo'
	<link rel="stylesheet" href="assets/css/skins/purple.css">';
	}elseif($_SESSION['skin'] == "cafe"){ echo'
	<link rel="stylesheet" href="assets/css/skins/cafe.css">';
	}elseif($_SESSION['skin'] == "red"){ echo'
	<link rel="stylesheet" href="assets/css/skins/red.css">';
	}elseif($_SESSION['skin'] == "green"){ echo'
	<link rel="stylesheet" href="assets/css/skins/green.css">';
	}elseif($_SESSION['skin'] == "yellow"){ echo'
	<link rel="stylesheet" href="assets/css/skins/yellow.css">';
	}elseif($_SESSION['skin'] == "blue"){ echo'
	<link rel="stylesheet" href="assets/css/skins/blue.css">';
	}elseif($_SESSION['skin'] == "facebook"){ echo'
	<link rel="stylesheet" href="assets/css/skins/facebook.css">';
	}
													?>
	
	
	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>
<body class="page-body <?php echo $_SESSION['skin']; ?>" data-url="http://neon.dev">

<?php include'include/header.php'; ?>
		<hr />
		
					<ol class="breadcrumb bc-3" >
								<li>
						<a href="index"><i class="fa-home"></i>Home</a>
					</li>
						<li class="active">
		
									<strong>Support</strong>
							</li>
							</ol>
			
		
		<br />
		
		
			
			
			<div class="col-md-6">
					
				<div class="panel panel-invert" data-collapsed="0"><!-- setting the attribute data-collapsed="1" will collapse the panel -->
					
					<!-- panel head -->
					<div class="panel-heading">
						<div class="panel-title">Online Chat</div>
						
						<div class="panel-options">
							<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
						</div>
					</div>
					
					<!-- panel body -->
					<div class="panel-body">
						
						<div class="scrollable" data-height="200" data-scroll-position="right" data-rail-color="#fff" data-rail-opacity=".9" data-rail-width="8" data-rail-radius="10" data-autohide="0">
							<p>Here you can talk with other people connected to the generator.</p></br>
							<div id="messages">
							<?php 
							
							$allchats = mysqli_query($con, "SELECT * FROM chat ORDER BY id DESC") or die(mysqli_error($con));
								while($row = mysqli_fetch_array($allchats)){
									echo'
							<p><font color="red">'. $row['date'] .'</font> - <b>'. htmlentities($row['username']) .'</b>: '. htmlentities($row['message']) .'</p>
								';}
							?>
							</div>
						</div>	

						<div class="panel-heading"></div>
					<form method = 'post'>
						<textarea name="message" class="form-control autogrow" id="field-ta" placeholder="You can write your message here."></textarea></br>
						<button id="submit" type="submit" class="btn btn-blue btn-block">Submit</button>
					</form>
						
					</div>
					
					
				</div>
				
			</div>
		
		
		
		
		<!-- lets do some work here... -->
		<!-- Footer -->
<?php include 'include/footer.php'; ?>
	</div>

	
	<script>
		setInterval('load_messages()', 2000)
		function load_messages(){
			
			$("#messages").load('include/load_messages.php');
			
		}
	
	</script>





	<!-- Bottom scripts (common) -->
	<script src="assets/js/gsap/TweenMax.min.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="assets/js/neon-demo.js"></script>

</body>
</html>