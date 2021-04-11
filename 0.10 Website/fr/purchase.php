<?php
if (!isset($_SESSION)) { session_start(); }

if (!isset($_SESSION['username'])) {
echo '
<script language="javascript">
    window.location.href = "login"
</script>
';
exit();
}
include'../include/settings.php';
include'../connection.php';
$username = htmlspecialchars($_SESSION['username']);
$idd = $_SESSION['id'];
$rankk = $_SESSION['rank'];
$settings = mysqli_query($con, "SELECT * FROM settings");
while($row5 = mysqli_fetch_array($settings)){
$paypal = $row5['paypal'];
$website = $row5['website'];
$favicon = $row5['favicon'];
$currencydb = $row5['value'];
if($currencydb == "€"){
$currencydb = "EUR";
}elseif($currencydb == "$"){
$currencydb = "USD";
}

if(isset($_POST['purchase'])){

$id = mysqli_real_escape_string($con, $_POST['purchase']);

$pricequery = mysqli_query($con, "SELECT * FROM `package` WHERE `id` = '$id'") or die(mysqli_error($con));
while ($row = mysqli_fetch_array($pricequery)) {
    $price = $row['price'];
    $packagename = $row['name']." - ".$website;
    $custom = $row['id']."|".$username;
}
$paypalurl = "https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&amount=".urlencode($price)."&business=".urlencode($paypal)."&page_style=primary&item_name=".urlencode($packagename)."&return=http://".htmlspecialchars($_SERVER['HTTP_HOST'])."/ipn/index"."&rm=2&notify_url=http://".htmlspecialchars($_SERVER['HTTP_HOST'])."/ipn/Paypal_IPN.php"."&cancel_return=http://".htmlspecialchars($_SERVER['HTTP_HOST'])."/purchase?action=buy-error&custom=".urlencode($custom)."&currency_code=".urlencode($currencydb)."";

echo '<script> location.replace("'.$paypalurl.'"); </script>';

}
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

	<title><?php echo $website ?> | Achats</title>

	<link rel="stylesheet" href="../assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="../assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/css/neon-core.css">
	<link rel="stylesheet" href="../assets/css/neon-theme.css">
	<link rel="stylesheet" href="../assets/css/neon-forms.css">
	<link rel="stylesheet" href="../assets/css/custom.css">
	<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'><!--web font-->
	<?php 
	if($_SESSION['skin'] == "blue"){ echo'
	<link rel="stylesheet" href="../assets/css/skins/blue.css">';
	}elseif($_SESSION['skin'] == "black"){ echo'
	<link rel="stylesheet" href="../assets/css/skins/black.css">';
    }elseif($_SESSION['skin'] == "white"){ echo'
	<link rel="stylesheet" href="../assets/css/skins/white.css">';
	}elseif($_SESSION['skin'] == "purple"){ echo'
	<link rel="stylesheet" href="../assets/css/skins/purple.css">';
	}elseif($_SESSION['skin'] == "cafe"){ echo'
	<link rel="stylesheet" href="../assets/css/skins/cafe.css">';
	}elseif($_SESSION['skin'] == "red"){ echo'
	<link rel="stylesheet" href="../assets/css/skins/red.css">';
	}elseif($_SESSION['skin'] == "green"){ echo'
	<link rel="stylesheet" href="../assets/css/skins/green.css">';
	}elseif($_SESSION['skin'] == "yellow"){ echo'
	<link rel="stylesheet" href="../assets/css/skins/yellow.css">';
	}elseif($_SESSION['skin'] == "blue"){ echo'
	<link rel="stylesheet" href="../assets/css/skins/blue.css">';
	}elseif($_SESSION['skin'] == "facebook"){ echo'
	<link rel="stylesheet" href="../assets/css/skins/facebook.css">';
	}
													?>
	
	
	
	<script src="../assets/js/jquery-1.11.3.min.js"></script>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
				<?php
				$accountstest = mysqli_query($con, "SELECT * FROM `package` ORDER BY `id`") or die(mysqli_error($con));
				while($row = mysqli_fetch_assoc($accountstest)){
					echo'
				 <script  type="text/javascript">
					function myform'.$row["id"].'(){
					document.getElementById("myform'.$row["id"].'").submit()
	             }
	             </script>
				';}?>
	<!--[if lt IE 9]><script src="../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>
<body class="page-body <?php echo $_SESSION['skin']; ?>" data-url="http://neon.dev"  style="background-color:#777;">

<?php include 'include/header.php'; ?>
<hr />
		
					<ol class="breadcrumb bc-3" >
								<li>
						<a href="index"><i class="fa-home"></i>Accueil</a>
					</li>
						<li class="active">
		
									<strong>Achats</strong>
							</li>
							</ol>
				<h1>Acheter un abonnement</h1>
				<div class="main-row"> 
				<?php
$account = mysqli_query($con, "SELECT * FROM `settings`") or die(mysqli_error($con));
while($row = mysqli_fetch_assoc($account)){		
$value = $row['value'];
}
$accountsquery = mysqli_query($con, "SELECT * FROM `package` ORDER BY `id`") or die(mysqli_error($con));
while($row = mysqli_fetch_assoc($accountsquery)){
$price = mysqli_real_escape_string($con, $row['price']);
$name = $row['name'];
$length = $row['length'];
$haspriv = $row['haspriv'];
$idpackage = $row['id'];
$color = $row['color'];
$donnee = explode ("." , $price);
$donnee2 = explode (" " , $length);
if(!empty($donnee2[1])){
if($donnee2[1] == "Day" || $donnee2[1] == "Days"){
$donnee2[1] = "jour";
}

if($donnee2[1] == "Weeks"){
$donnee2[1] = "Semaine";
}

if($donnee2[1] == "Months" || $donnee2[1] == "Month"){
$donnee2[1] = "Mois";
}

if($donnee2[1] == "Years"){
$donnee2[1] = "Année";
}

if($donnee2[0] == "Lifetime"){
$donnee2[0] = "à vie";
}
}
if($row['generator'] == ""){
$generator = "All";
}else{
$generator = $row['generator'];
}

if($row['generations'] == ""){
$generations = '<font color="green">Unlimited</font>';
}else{
$generations = $row['generations']." /jour";
}

if($row['privgenerations'] == ""){
$privgenerations = "Illimité";
}else{
$privgenerations = $row['privgenerations']." /jour";
}

if($color == "normal"){
$label = "1";
$infoprice = "";
$cube = "";
$top = "";
$buy = "";
}elseif($color == "orange"){
$label = "2";
$infoprice = "two";
$cube = "2";
$top = " top-two";
$buy = " buy-two";
}elseif($color == "red"){
$label = "3";
$infoprice = "three";
$cube = "3";
$top = " top-three";
$buy = " buy-three";
}

			echo'
			<div class="pricing-grid agileits-shadow" style="margin-bottom: 100px;">
				<div class="w3ls-main">
					<div id="cube'. $cube .'" class="show-front"> 
					  <figure class="top'. $top .'"> </figure> 
					</div>
				</div>
				<div class="agileinfo-price '. $infoprice .'">
					<h3>'. $name .'</h3>
					<h5>Vous allez être abonné pour '. $donnee2[0] . ' '; if(!empty($donnee2[1])){ echo $donnee2[1];} echo '</h5>
				</div>
				<div class="price-bg">
					<p class="price-label-'. $label .'">'. $value .'<span>'. $donnee[0] .'</span><i>'; if(!empty($donnee[1]))echo  $donnee[1]; echo'</i>
					'; if($row["length"] == "Lifetime"){
					echo'</p>';
					}else{
					echo'
					/'. $donnee2[1] .'</p>
					';}
					echo'
					<ul class="count">
						<li> 24/7 Tech Support</li>
						<li> Générations: '. $generations .'</li>
						<form id="myform'.$idpackage.'" method="POST" action="purchase">
						<input type="hidden" name="purchase" value="'.$row['id'].'"/>
						<li> Durée: ';
						if($row["length"] == "Lifetime"){
							echo '<font color="green">A vie</font>';
						}else{
							echo 
							$donnee2[0].' '.$donnee2[1];
							}echo
							'</li>
						<li> Générateur privé: '; 
					if($haspriv == "no"){ 
						echo'
						<font color="red"><i class="entypo-block"></i></font>';
					}elseif($haspriv =="yes"){ 
						echo'
						<font color="green"><i class="entypo-check"></i> '. $privgenerations .'</font>
						';} 
						echo'</li>
					</ul>
					<div class="buy'. $buy .'"> 
						<a href="#" onclick="myform'.$idpackage.'()" class="bg">Acheter maintenant </a>
					</div> </form>
				</div>
				</div>
				
				
			';}
					?>	<div class="clear"> </div>			
		</div>
		<!-- pop-up-grid -->
		<!-- //pop-up-grid -->
	<!-- //main --> 
	<!-- copyright -->
	<!-- //copyright -->
	<!-- popup.js -->
	<!-- //popup.js -->
		<br />
		
		<!-- lets do some work here... -->
		<!-- Footer -->
		<div class="copyright">
<?php include '../include/footer.php'; ?>
</div>
	</div>

	





	<!-- Bottom scripts (common) -->
	<script src="../assets/js/gsap/TweenMax.min.js"></script>
	<script src="../assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="../assets/js/bootstrap.js"></script>
	<script src="../assets/js/joinable.js"></script>
	<script src="../assets/js/resizeable.js"></script>
	<script src="../assets/js/neon-api.js"></script>
<script src="../js/jquery.min.js"></script>
	<script src="../js/jquery.magnific-popup.js" type="text/javascript"></script>
	<script type="../text/javascript" src="js/modernizr.custom.53451.js"></script> 
	 <script>
		$(document).ready(function() {
		$('.popup-with-zoom-anim').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});
																		
		});
	</script>

	<!-- JavaScripts initializations and stuff -->
	<script src="../assets/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="../assets/js/neon-demo.js"></script>

</body>
</html>