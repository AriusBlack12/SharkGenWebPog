<?php
include'../include/settings.php';
include'../connection.php';
if (!isset($_SESSION)) { session_start(); }

if (!isset($_SESSION['username'])) {
echo '
<script language="javascript">
    window.location.href = "login.php"
</script>
';
exit();
}

$usernamemin = mb_strtolower($_SESSION['username']);

if(isset($_GET['id'])){
$getid = $_GET['id'];
}else{
echo'
<script language="JAVASCRIPT">
alert("There is no ticket !")
window.location.href= "support"
</script>
';
die();
}
$site = mysqli_query($con, "SELECT * FROM `settings`") or die(mysqli_error($con));
while($row = mysqli_fetch_array($site)){
$website = $row['website'];
$favicon = $row['favicon'];
$email = $row['email'];
}

if(isset($_POST['closeticket'])){
mysqli_query($con, "UPDATE `ticket` SET `isclose` = '1', `isread` = '1', `isadminread` = '1' WHERE `idticket` = '$getid'");
}
$isclosed = mysqli_query($con, "SELECT * FROM `ticket` WHERE `idticket` = '$getid'");
while($row = mysqli_fetch_array($isclosed)){
$isclose = $row['isclose'];
}
if(isset($_POST['newreply'])){
$addreply = mysqli_query($con, "SELECT * FROM `ticket` WHERE `idticket` = '$getid'");
while($row = mysqli_fetch_array($addreply)){
$subjecct = $row['subject'];
$msg = mysqli_real_escape_string($con, $_POST['newreply']);
$date = date("d-m-Y");
$datetime = date("Y-m-d H:i:s");
$hour = date("H:i");
mysqli_query($con, "INSERT INTO `support` (`idticket`, `from`, `to`, `subject`, `message`, `datetime`, `hour`, `date`) VALUES 
('$getid', '$usernamemin', 'admin', '$subjecct', '$msg', '$datetime', '$hour', '$date')") or die(mysqli_error($con));
mysqli_query($con, "UPDATE `ticket` SET `isread` = '1', `isadminread` = '0' WHERE `subject` = '$subjecct'");
}
}

function time_ago( $date )
{
    if( empty( $date ) )
    {
        return "No date provided";
    }

    $periods = array("segundo", "minuto", "hora", "dia", "semana", "mes", "año", "década");

    $lengths = array("60","60","24","7","4.35","12","10");

    $now = time();

    $unix_date = strtotime( $date );

    // check validity of date

    if( empty( $unix_date ) )
    {
        return "Bad date";
    }

    // is it future date or past date

    if( $now > $unix_date )
    {
        $difference = $now - $unix_date;
        $tense = "Hace";
    }
    else
    {
        $difference = $unix_date - $now;
        $tense = "from now";
    }

    for( $j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++ )
    {
        $difference /= $lengths[$j];
    }

    $difference = round( $difference );

	if( $periods[$j] = 'mes'){
	
		    if( $difference != 1 )
    {
        $periods[$j].= "es";
    }
	
	}else{
	
    if( $difference != 1 )
    {
        $periods[$j].= "s";
    }
	}

    return "{$tense} $difference $periods[$j]";

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<link rel="icon" href="../assets/images/favicon.ico">

	<title><?php echo $website ?> | Soporte</title>

	<link rel="stylesheet" href="../assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="../assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/css/neon-core.css">
	<link rel="stylesheet" href="../assets/css/neon-theme.css">
	<link rel="stylesheet" href="../assets/css/neon-forms.css">
	<link rel="stylesheet" href="../assets/css/custom.css">

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
	<SCRIPT language="JavaScript">
function say_hi()
{
alert("¿Estás seguro? (Si no, ¡no haga clic en Aceptar y actualice la página!)");
}
 </SCRIPT>

	<!--[if lt IE 9]><script src="../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	
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
						<a href="index"><i class="fa-home"></i>Inicio</a>
					</li>
													<li>
						<a href="support"><i class="fa-home"></i>Soporte</a>
					</li>
						<li class="active">
									<strong>Ticket</strong>
								
							</li>
							</ol>
							
							<div class="timeline-centered">
			<?php
$supportquery = mysqli_query($con, "SELECT * FROM `support` WHERE `idticket` = '$getid' ORDER BY `datetime`");
if(mysqli_num_rows($supportquery) < 1){
echo'
<script language="JAVASCRIPT">
alert("No hay boleto para este nombre !")
window.location.href= "support"
</script>
';
die();
}else{
while ($row = mysqli_fetch_assoc($supportquery)) {
$message = htmlspecialchars($row['message']);
$date = $row['date'];
$datetime = $row['datetime'];
$subject = htmlspecialchars($row['subject']);
$from = $row['from'];
$to = $row['to'];
if($from === $usernamemin || $to === $usernamemin){
if($from === $usernamemin){
$icon = "bg-info";
$align = " left-aligned";
echo'
				<article class="timeline-entry'. $align .'">
				
				<div class="timeline-entry-inner">
					<time class="timeline-time" datetime="2015-11-04T03:45"><span>'. $date .'</span> <span>'.time_ago($datetime).'</span></time>
					
					<div class="timeline-icon '. $icon .'">
						<i class="entypo-user"></i>
					</div>
					
					<div class="timeline-label">
						<h2><b>Tu:</b></h2>
						<p>'. $message .'</p>
					</div>
				</div>
				
			</article>
			';
			
			}elseif($from != $usernamemin){
           $icon = "bg-secondary";
             $align = "";
			echo '
			<article class="timeline-entry'. $align .'">
				
				<div class="timeline-entry-inner">
					<time class="timeline-time" datetime="2015-11-04T03:45"><span>'. $date .'</span> <span>'.time_ago($datetime).'</span></time>
					
					<div class="timeline-icon '. $icon .'">
						<i class="entypo-users"></i>
					</div>
					
					<div class="timeline-label">
						<h2><b>Admin:</h2></b>
						<p>' .$message. '</p></div>
				</div>
				
			</article>';
			}}}}?>
			</div><hr />
			<?php if($isclose == "0"){
			echo'
			<form action="ticket?id='. $getid .'" method="POST">
			<div class="col-md-12">
			<label>Tu:</label></br>
						<textarea type="text" name="newreply" class="form-control" style="margin-bottom: 5px;" placeholder="Escribe una respuesta." rows="10" required></textarea>
			
			<button type="submit" class="btn btn-success btn-large btn-block" style="margin-bottom: 5px;">Enviar Respuesta</button></br>
		</form>
		<form action="ticket?id=' . $getid . '" method="POST">
		<button name= "closeticket" type="submit" class="btn btn-red btn-large btn-block" onClick="say_hi()">Marcar como Resuelto</button></br></div>
		</form>
		';}elseif($isclose == "1"){
         echo'
         <center><h2>El boleto está cerrado </h2></center>
		 ';}
		 ?>
		<!-- lets do some work here... -->
		<!-- Footer -->
<?php include '../include/footer.php'; ?>
	</div>
	

	
	





	<!-- Imported styles on this page -->
	<link rel="stylesheet" href="../assets/js/select2/select2-bootstrap.css">
	<link rel="stylesheet" href="../assets/js/select2/select2.css">
	<link rel="stylesheet" href="../assets/js/selectboxit/jquery.selectBoxIt.css">
	<link rel="stylesheet" href="../assets/js/daterangepicker/daterangepicker-bs3.css">
	<link rel="stylesheet" href="../assets/js/icheck/skins/minimal/_all.css">
	<link rel="stylesheet" href="../assets/js/icheck/skins/square/_all.css">
	<link rel="stylesheet" href="../assets/js/icheck/skins/flat/_all.css">
	<link rel="stylesheet" href="../assets/js/icheck/skins/futurico/futurico.css">
	<link rel="stylesheet" href="../assets/js/icheck/skins/polaris/polaris.css">

	<!-- Bottom scripts (common) -->
	<script src="../assets/js/gsap/TweenMax.min.js"></script>
	<script src="../assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="../assets/js/bootstrap.js"></script>
	<script src="../assets/js/joinable.js"></script>
	<script src="../assets/js/resizeable.js"></script>
	<script src="../assets/js/neon-api.js"></script>


	<!-- Imported scripts on this page -->
	<script src="../assets/js/select2/select2.min.js"></script>
	<script src="../assets/js/bootstrap-tagsinput.min.js"></script>
	<script src="../assets/js/typeahead.min.js"></script>
	<script src="../assets/js/selectboxit/jquery.selectBoxIt.min.js"></script>
	<script src="../assets/js/bootstrap-datepicker.js"></script>
	<script src="../assets/js/bootstrap-timepicker.min.js"></script>
	<script src="../assets/js/bootstrap-colorpicker.min.js"></script>
	<script src="../assets/js/moment.min.js"></script>
	<script src="../assets/js/daterangepicker/daterangepicker.js"></script>
	<script src="../assets/js/jquery.multi-select.js"></script>
	<script src="../assets/js/icheck/icheck.min.js"></script>
	<script src="../assets/js/neon-chat.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="../assets/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="../assets/js/neon-demo.js"></script>

</body>
</html>