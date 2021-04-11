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
if ($_SESSION['rank'] < "5") {
echo '
<script language="javascript">
    window.location.href = "index?no-admin"
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
if(isset($_GET['id'])){
$getid = $_GET['id'];
$usernamine = "admin";

$isclosed = mysqli_query($con, "SELECT * FROM `ticket` WHERE `idticket` = '$getid'");
while($row = mysqli_fetch_array($isclosed)){
$isclose = $row['isclose'];
}
if(isset($_POST['newreply'])){
$addreply = mysqli_query($con, "SELECT * FROM `ticket` WHERE `idticket` = '$getid'");
while($row = mysqli_fetch_array($addreply)){
$subjecct = $row['subject'];
$users = $row['username'];
$msg = mysqli_real_escape_string($con, $_POST['newreply']);
$date = date("d-m-Y");
$datetime = date("Y-m-d H:i:s");
$hour = date("H:i");
mysqli_query($con, "INSERT INTO `support` (`idticket`, `from`, `to`, `subject`, `message`, `datetime`, `hour`, `date`) VALUES 
('$getid', 'admin', '$users', '$subjecct', '$msg', '$datetime', '$hour', '$date')") or die(mysqli_error($con));
mysqli_query($con, "UPDATE `ticket` SET `isread` = '0', `isadminread` = '1' WHERE `subject` = '$subjecct'");
}
}

function time_ago( $date )
{
    if( empty( $date ) )
    {
        return "No date provided";
    }

    $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");

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
        $tense = "ago";
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

    if( $difference != 1 )
    {
        $periods[$j].= "s";
    }

    return "$difference $periods[$j] {$tense}";

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

	<title><?php echo $website ?> | Support</title>

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
					<li><a href="admin-support">
		
									Admin </a>
							</li>
						<li class="active">
		
									<strong>Support</strong>
							</li>
							</ol>
			
		
		<br />
		<div class="wrapper row3">
  <div class="lrspace">
    <main class="container clear"> 
      <!-- main body -->
      <!-- ################################################################################################ -->
      <figure class="group">
			<div class="main-container">
				<div class="padding-md">
				<?php if(isset($getid)){
				echo'
									
				
				
	';	
?>
<?php
echo'
<div class="timeline-centered">';	
?>
<?php
$supportquery = mysqli_query($con, "SELECT * FROM `support` WHERE `idticket` = '$getid' ORDER BY `datetime`");
if(mysqli_num_rows($supportquery) < 1){
echo'
<script language="JAVASCRIPT">
alert("There is no ticket !")
window.location.href= "admin-support"
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
if($from === "admin"){
$icon = "bg-secondary";
$align = " left-aligned";

echo'
				<article class="timeline-entry'. $align .'">
				
				<div class="timeline-entry-inner">
					<time class="timeline-time" datetime="2015-11-04T03:45"><span>'. $date .'</span> <span>'.time_ago($datetime).'</span></time>
					
					<div class="timeline-icon '. $icon .'">
						<i class="entypo-user"></i>
					</div>
					
					<div class="timeline-label">
						<h2><b>You:</b></h2>
						<p>'. $message .'</p>
					</div>
				</div>
				
			</article>
			';
			
			}elseif($from != "admin"){
           $icon = "bg-info";
             $align = "";
			echo '
			<article class="timeline-entry'. $align .'">
				
				<div class="timeline-entry-inner">
					<time class="timeline-time" datetime="2015-11-04T03:45"><span>'. $date .'</span> <span>'.time_ago($datetime).'</span></time>
					
					<div class="timeline-icon '. $icon .'">
						<i class="entypo-users"></i>
					</div>
					
					<div class="timeline-label">
						<h2><b>User:</h2></b>
						<p>' .$message. '</p></div>
				</div>
				
			</article>';
			}}}?>
			<?php
			echo' </div><hr /> ';
			?>
			<?php if($isclose == "0"){
			echo'
			<form action="admin-support?id='. $getid .'" method="POST">
			<div class="col-md-12">
			<label>You:</label></br>
			<textarea type="text" name="newreply" class="form-control" style="margin-bottom: 5px;" placeholder="Reply here." rows="10" required></textarea>
			
			<button type="submit" class="btn btn-success btn-large btn-block" style="margin-bottom: 5px;">Add Reply</button></br>
		</form></div>
		';}elseif($isclose == "1"){
         echo'
         <center><h2>This ticket was closed </h2></center>
		 ';
		 
		 }}else{
				echo'
        <section id="main">
        
        
            <section id="content">
                <div class="container">
                    <div class="block-header">
                        <h2>Support</h2>

                    
                    </div>
                

                    <div class="card">
                        <div class="card-header">
                                            <div class="row">
                    <div class="col-md-10 well" style="margin-left: 10px;">
                        <legend>All tickets</legend>
				
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Username</th>
							<th>Subject</th>
							<th>Date of the ticket</th>
							<th>Notification</th>
						</tr>
					</thead>
					
					<tbody>
					';
$supportquery = mysqli_query($con, "SELECT * FROM `ticket` ORDER BY `isclose`, `isadminread`");
if(mysqli_num_rows($supportquery) < 1){
echo'
<tr>
							<td>No new ticket</td>


';
}else{
while ($row = mysqli_fetch_assoc($supportquery)) {
echo '
						<tr>
							<td>'.	$row['id']	.'</td>
							<td>'.	htmlspecialchars($row['username'])	.'</td>
							<td>'.	htmlspecialchars($row['subject'])	.'</td>
							<td>'.  $row['date']  .'</td>
							<td>'; if($row['isclose'] == "1"){
							echo'<span class="badge">Closed</span>';}elseif($row['isclose'] == "0" && $row['isadminread'] == "0"){echo '
							<a href="admin-support?id='. $row['idticket'] .'" data-target="#message'.$row['id'].'" data-parent="#menu">
							<span class="badge badge-secondary">New Reply</span>
							</a>
							';}elseif($row['isclose'] == "0" && $row['isadminread'] == "1"){
							echo'
							<a href="admin-support?id='. $row['idticket'] .'" data-target="#message'.$row['id'].'" data-parent="#menu">
							<span class="badge badge-info">Waiting Reply...</span>
							</a>
							';} echo'</td>
						</tr>
';}}
} ?>
					</tbody>
				</table>
				
			

                        </div></br>
 
                        </div>
                    </div>
                
                    </div>
            </section>
        </section>
				</div><!-- ./padding-md -->
			</div><!-- /main-container -->
		</div><!-- /wrapper -->
			  <?php include 'include/footer.php'; ?>
	</div>
      <div class="clear"></div>
    </main>
  </div>
</div>
      </figure>
      <!-- ################################################################################################ -->
      <!-- / main body -->
		<!-- lets do some work here... -->
		<!-- Footer -->
	
	





	<!-- Bottom scripts (common) -->
   <script src="assets/js/gsap/TweenMax.min.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>


	<!-- Imported scripts on this page -->
	<script src="assets/js/neon-chat.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="assets/js/neon-demo.js"></script>

</body>
</html>