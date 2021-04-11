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

	<title><?php echo $website ?> | All Accounts</title>

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
	
	
	
	
	<script src="assets/js/jquery-1.11.3.min.js"></script>

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
<div class="col-md-5">		
<p>All accounts available on the generator below :</p>

<hr/>
<h1><b>Premium Accounts: </h1></b>
<?php
		$result = mysqli_query($con, "SELECT * FROM generators") or die(mysqli_error($con));
		while($row = mysqli_fetch_array($result)){
			$id = $row['id'];
			$result2 = mysqli_query($con, "SELECT * FROM `$id` ORDER BY RAND()") or die(mysqli_error($con));
			$count = mysqli_num_rows($result2);
			echo'
<div class="panel panel-default" >
<div class="panel-heading" role="tab" id="heading'.$row['id'].'">
      <h4 class="panel-title">
        <a>
		'. $row['name'].' '; if($count >= 1){ echo '<span class="badge badge-primary" style="color:white; text-align: right;">In stock</span>';}else{ echo '<span class="badge badge-danger" style="color:white; text-align: right;">Out of stock</span>';} echo'
        </a>
      </h4>
		</div></div>'; }
?>
	
	</br>
	<hr/>
<h1><b><font color="red">Private</font> Accounts: </h1></b>
<?php	
		$result = mysqli_query($con, "SELECT * FROM privgen") or die(mysqli_error($con));
		while($row = mysqli_fetch_array($result)){
			$id = $row['id'];
			$result2 = mysqli_query($con, "SELECT * FROM `priv$id` ORDER BY RAND()") or die(mysqli_error($con));
			$count = mysqli_num_rows($result2);
			echo'

	<div class="panel panel-default" >
<div class="panel-heading" role="tab" id="heading'.$row['id'].'">
      <h4 class="panel-title">
        <a>
          '. $row['name'].' '; if($count >= 1){ echo '<span class="badge badge-primary" style="color:white; text-align: right;">In stock</span>';}else{ echo '<span class="badge badge-danger" style="color:white; text-align: right;">Out of stock</span>';} echo'
        </a>
      </h4>
    </div>
</div>
		'; }
	?>
	
	
	</div>
	
	
	
		<!-- Footer -->
<?php include 'include/footer.php'; ?>
	</div>

	
	





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