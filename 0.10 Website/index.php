<?php
include 'include/settings.php';
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
$timestamp = time();
$site = mysqli_query($con, "SELECT * FROM `settings`") or die(mysqli_error($con));
while($row = mysqli_fetch_array($site)){
$website = $row['website'];
$favicon = $row['favicon'];
$totalgen = $row['generations'];
}
$username = htmlspecialchars($_SESSION['username']);
$idd = $_SESSION['id'];
$rankk = $_SESSION['rank'];
$date = date("Y-m-d");
$userss = mysqli_query($con, "SELECT * FROM `users`") or die(mysqli_error($con));
	$allusers = mysqli_num_rows($userss);
$subss = mysqli_query($con, "SELECT * FROM `subscriptions` WHERE active = '1'") or die(mysqli_error($con));
	$allsubs = mysqli_num_rows($subss);
	$result = mysqli_query($con, "SELECT * FROM `subscriptions` WHERE `username` = '$username' AND `active` ='1'") or die(mysqli_error($con));
		while($row = mysqli_fetch_array($result)){
			if(strtotime($row['expire']) <= $timestamp){
				mysqli_query($con, "UPDATE `subscriptions` SET `active` = '0' WHERE `username` = '$username'");
			}
	}

$result = mysqli_query($con, "SELECT * FROM `subscriptions` WHERE `username` = '$username' AND `active` = '1'") or die(mysqli_error($con));
	if(mysqli_num_rows($result) < 1){
$subscription = "0";
}else{
while($row = mysqli_fetch_array($result)){
$paidusername = $row['username'];
$paidid = $row['package'];
$paiddate = $row['date'];
$paidexpire = $row['expire'];
$subscription = "1";
}
}
if($subscription == "1"){
$resultt = mysqli_query($con, "SELECT * FROM `package` WHERE `id` = '$paidid'") or die(mysqli_error($con));
while($row = mysqli_fetch_array($resultt)){
$packagename = $row['name'];
$packageprice = $row['price'];
$packagegen = $row['generator'];
if($row['generations'] == ""){
		$generations = "Unlimited";
	}else{
		$generations = $row['generations'];
	}
}

mysqli_query($con, "DELETE FROM `privstatistics` WHERE `date` < '$date'") or die(mysqli_error($con));

$result2 = mysqli_query($con, "SELECT * FROM `statistics` WHERE `username` = '$username' AND `date` = '$date'") or die(mysqli_error($con));
if(mysqli_num_rows($result2) < 1){
mysqli_query($con, "DELETE FROM `statistics` WHERE `date` < '$date'") or die(mysqli_error($con));
mysqli_query($con, "INSERT INTO `statistics` (`username`, `generated`, `date`) VALUES ('$username', '0', '$date')") or die(mysqli_error($con));
if(empty($generations)){
$todaygenerations = "Unlimited";
}else{
$todaygenerations = $generations;
}
}else{
while($row = mysqli_fetch_array($result2)){
if(empty($generations)){
$todaygenerations = "Unlimited";
}else{
$todaygenerations = $generations - $row['generated'];
}
}
}



}
$resulte = mysqli_query($con, "SELECT * FROM `users` WHERE `username` = '$username'") or die(mysqli_error($con));
while($row = mysqli_fetch_array($resulte)){
$allgenerations = $row['generations'];
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
	$select_all_gen = mysqli_query($con, "SELECT * FROM generators") or die(mysqli_error($con));
		
		$allnormalgen = mysqli_num_rows($select_all_gen);
		
	$select_priv_gen = mysqli_query($con, "SELECT * FROM privgen") or die(mysqli_error($con));
	
		$allprivgen = mysqli_num_rows($select_priv_gen);
		
	$all_generators = $allnormalgen + $allprivgen;
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

	<title><?php echo $website ?> | Dashboard</title>

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
			<!-- Imported styles on this page -->
	<link rel="stylesheet" href="assets/js/vertical-timeline/css/component.css">

	<script src="assets/js/jquery-1.11.3.min.js"></script>

	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
<script type="text/javascript">
		jQuery(document).ready(function($)
		{

			// Rickshaw
			var seriesData = [ [], [] ];
		
			var random = new Rickshaw.Fixtures.RandomData(50);
		
			for (var i = 0; i < 50; i++)
			{
				random.addData(seriesData);
			}
		
			var graph = new Rickshaw.Graph( {
				element: document.getElementById("rickshaw-chart-demo"),
				height: 193,
				renderer: 'area',
				stroke: false,
				preserve: true,
				series: [{
						color: '#73c8ff',
						data: seriesData[0],
						name: 'Upload'
					}, {
						color: '#e0f2ff',
						data: seriesData[1],
						name: 'Download'
					}
				]
			} );
		
			graph.render();
		
			var hoverDetail = new Rickshaw.Graph.HoverDetail( {
				graph: graph,
				xFormatter: function(x) {
					return new Date().toString();
				}
			} );
		
			var legend = new Rickshaw.Graph.Legend( {
				graph: graph,
				element: document.getElementById('rickshaw-legend')
			} );
		
			var highlighter = new Rickshaw.Graph.Behavior.Series.Highlight( {
				graph: graph,
				legend: legend
			} );
		
			setInterval( function() {
				random.removeData(seriesData);
				random.addData(seriesData);
				graph.update();
		
			}, 500 );
		});
		
		
		function getRandomInt(min, max)
		{
			return Math.floor(Math.random() * (max - min + 1)) + min;
		}
		</script>

</head>
<body class="page-body <?php echo $_SESSION['skin']; ?> page-fade">

			
									
			<?php include 'include/header.php'; ?>

				
		
		<hr />
		
		
		</br>
			<div class="col-sm-3 col-xs-6">
		
				<div class="tile-stats tile-red">
					<div class="icon"><i class="entypo-users"></i></div>
					<div class="num" data-start="0" data-end="<?php echo $allusers ?>" data-postfix="" data-duration="1500" data-delay="0">0</div>
		
					<h3>Registered Users</h3>
					<p>Total Users on the Generator.</p>
				</div>
		
			</div>
		
			<div class="col-sm-3 col-xs-6">
		
				<div class="tile-stats tile-green">
					<div class="icon"><i class="entypo-trophy"></i></div>
					<div class="num" data-start="0" data-end="<?php echo $all_generators ?>" data-postfix="" data-duration="1500" data-delay="600">0</div>
		
					<h3>Account Types</h3>
					<p>Total Account Types we have.</p>
				</div>
		
			</div>
			
			<div class="clear visible-xs"></div>
		
			<div class="col-sm-3 col-xs-6">
		
				<div class="tile-stats tile-aqua">
					<div class="icon"><i class="entypo-arrows-ccw"></i></div>
					<div class="num" data-start="0" data-end="<?php echo $totalgen; ?>" data-postfix="" data-duration="1500" data-delay="800">0</div>
		
					<h3>Total Generations</h3>
					<p>Total Accounts Generated.</p>
				</div>
		
			</div>
		
			<div class="col-sm-3 col-xs-6">
		
				<div class="tile-stats tile-blue">
					<div class="icon"><i class="entypo-basket"></i></div>
					<div class="num" data-start="0" data-end="<?php echo $allsubs ?>" data-postfix="" data-duration="1500" data-delay="1200">0</div>
		
					<h3>Total Memberships</h3>
					<p>Total Amount of Paid Users</p>
				</div>
		
			</div>
		
		<div class="clear visible-xs"></div>
		<br />
		<div class="row">
		
		<div class="col-sm-<?php
		if($subscription == "0" && $_SESSION['rank'] !== "5"){
		
		
	echo '12';
	}elseif($subscription == "1" || $_SESSION['rank'] == "5"){
	echo '6';
	}
		?>
		">
		
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="panel-title">
							<h4>
								Real Time Server Stats
								<br /></br>
								<small>The current server uptime</small>
							</h4>
						</div>
						<div class="panel-options">
							<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
							<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
						</div>
					</div>
		
					<div class="panel-body no-padding">
						<div id="rickshaw-chart-demo">
							<div id="rickshaw-legend"></div>
						</div>
					</div>
				</div>
		
			</div><?php
   if($subscription == "1" && $_SESSION['rank'] !== '5'){
	echo '
	
	<div class="col-sm-6">
					
				<div class="panel panel-invert" data-collapsed="0"><!-- setting the attribute data-collapsed="1" will collapse the panel -->
					
					<!-- panel head -->
					<div class="panel-heading">
						<div class="panel-title">Your Statistics</div>
						
						<div class="panel-options">
							<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
						</div>
					</div>
					
					<!-- panel body -->
					<div class="panel-body">
						
						<div data-height="200" data-scroll-position="right" data-rail-color="#fff" data-rail-opacity=".9" data-rail-width="8" data-rail-radius="10" data-autohide="0">
							<center><i class="entypo-user" style="font-size:100px;"></i></center><div class="title"><center><p style="font-size:30px;"> '.$username.' </center>
						<center><p style="font-size:20px;"><i class="entypo-trophy"></i> Your Subscription : ' . $packagename . '</p>
						<p style="font-size:20px;"><i class="entypo-cancel"></i>Will end : ' .$paidexpire. '</p>
						<p style="font-size:20px;"><i class="entypo-lock"></i> Generations : '.$generations.' /day</p>
						<p style="font-size:20px;"><i class="entypo-cw"></i> Remaining Generations: '.$todaygenerations.'</p>
						<p style="font-size:20px;"><i class="entypo-arrows-ccw"></i> Total Generations: '.$allgenerations.'</p></br>
						</center>
					</div>
					</div>						
					</div>
					
				</div>
				
			</div>
	
	';
	}elseif($_SESSION['rank'] == "5"){
	echo'
		<div class="col-md-6">
					
				<div class="panel panel-invert" data-collapsed="0"><!-- setting the attribute data-collapsed="1" will collapse the panel -->
					
					<!-- panel head -->
					<div class="panel-heading">
						<div class="panel-title">Your Statistics</div>
						
						<div class="panel-options">
							<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
						</div>
					</div>
					
					<!-- panel body -->
					<div class="panel-body">
						
						<div data-height="200" data-scroll-position="right" data-rail-color="#fff" data-rail-opacity=".9" data-rail-width="8" data-rail-radius="10" data-autohide="0">
							<center><i class="entypo-plus-squared" style="font-size:100px;"></i></center><div class="title"><center><p style="font-size:30px;"> '.$username.' </center></br>
						<center><p style="font-size:20px;"><i class="entypo-trophy"></i> Your Membership : Admin </p>
						<p style="font-size:20px;"><i class="entypo-lock"></i> Generations : Unlimited</p>
						<p style="font-size:20px;"><i class="entypo-cw"></i> Remaining Generations: Unlimited</p>
						<p style="font-size:20px;"><i class="entypo-arrows-ccw"></i> Total Generations: '.$allgenerations.'</p></br>
						</center>
					</div>
					</div>						
					</div>
					
				</div>
				
			</div>
	
	';
	}
		?>
		</div>	
		
		<hr />
		<br /> <?php
		$result3 = mysqli_query($con, "SELECT * FROM `news` ORDER BY datetime DESC") or die(mysqli_error($con));
while($row = mysqli_fetch_array($result3)){
$title = $row['title'];
$message = $row['message'];
$hour = $row['hour'];
$datee = $row['datetime'];
$writer = $row['writer'];
$color = $row['color'];
if($color == "red"){
$div = "cbp_tmicon bg-secondary";
}elseif($color == "green"){
$div = "cbp_tmicon bg-success";
}elseif($color == "blue"){
$div = "cbp_tmicon bg-info";
}elseif($color == "yellow"){
$div = "cbp_tmicon bg-warning";
}elseif($color == "white"){
$div = "cbp_tmicon";
}
		$today = date('d-m-Y');
		if($datee == $today){
		$expiress = "Today";
		}else
		if($datee == date("d-m-Y", strtotime("-1 day", strtotime($today)))){
		$expiress = "Yesterday";
		}elseif($datee == date("d-m-Y", strtotime("-2 days", strtotime($today)))){
		$expiress = "2 days ago";
		 }else{
		 $expiress = $datee;
		 }
		 if($hour >= date("d-m-Y", strtotime("+11 hours", strtotime($today)))){
		 $hour = $hour.'PM';
		 }else{
		 $hour = $hour.'AM';
		 }
		 echo'
					<ul class="cbp_tmtimeline">
			
                 <li>
				<time class="cbp_tmtime" datetime="2015-11-03T13:22"><span>'.$hour.'</span> <span>'.time_ago($datee).'</span></time>
				
				<div class="'.$div.'">
					<i class="entypo-lamp"></i>
				</div>
				
				<div class="cbp_tmlabel">
					<h2><a href="#">'.$title.'</a></h2>
					<p>'.$message.' | <strong>'.$writer.'</strong></p>
				</div>
			</li>
';}
			
	?>		
			
		</ul>
		
<div class="col-md-12">
		
		
		
		<script type="text/javascript">
			// Code used to add Todo Tasks
			jQuery(document).ready(function($)
			{
				var $todo_tasks = $("#todo_tasks");
		
				$todo_tasks.find('input[type="text"]').on('keydown', function(ev)
				{
					if(ev.keyCode == 13)
					{
						ev.preventDefault();
		
						if($.trim($(this).val()).length)
						{
							var $todo_entry = $('<li><div class="checkbox checkbox-replace color-white"><input type="checkbox" /><label>'+$(this).val()+'</label></div></li>');
							$(this).val('');
		
							$todo_entry.appendTo($todo_tasks.find('.todo-list'));
							$todo_entry.hide().slideDown('fast');
							replaceCheckboxes();
						}
					}
				});
			});
		</script>
		
		<!-- Footer -->
		<?php include 'include/footer.php' ?>
	</div>
</div>
		
	




	<!-- Imported styles on this page -->
	<link rel="stylesheet" href="assets/js/jvectormap/jquery-jvectormap-1.2.2.css">
	<link rel="stylesheet" href="assets/js/rickshaw/rickshaw.min.css">

	<!-- Bottom scripts (common) -->
	<script src="assets/js/gsap/TweenMax.min.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>
	<script src="assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>


	<!-- Imported scripts on this page -->
	<script src="assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
	<script src="assets/js/jquery.sparkline.min.js"></script>
	<script src="assets/js/rickshaw/vendor/d3.v3.js"></script>
	<script src="assets/js/rickshaw/rickshaw.min.js"></script>
	<script src="assets/js/raphael-min.js"></script>
	<script src="assets/js/morris.min.js"></script>
	<script src="assets/js/toastr.js"></script>
	<script src="assets/js/neon-chat.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="assets/js/neon-demo.js"></script>



</body>
</html>