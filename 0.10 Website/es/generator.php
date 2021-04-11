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

$username = htmlspecialchars($_SESSION['username']);
$idd = $_SESSION['id'];
$rankk = $_SESSION['rank'];
$date = date("Y-m-d");
include'../include/settings.php';
include'../connection.php';
$site = mysqli_query($con, "SELECT * FROM `settings`") or die(mysqli_error($con));
while($row = mysqli_fetch_array($site)){
$website = $row['website'];
$favicon = $row['favicon'];
$totalgen = $row['generations'];
}
if($_SESSION['rank'] !== '5'){
$result = mysqli_query($con, "SELECT * FROM `subscriptions` WHERE `username` = '$username' AND `active` = '1'") or die(mysqli_error($con));
if (mysqli_num_rows($result)) {
echo '
<script language="javascript">
    window.location.href = "purchase?noaccess"
</script>
';
die();
}
while($row = mysqli_fetch_array($result)){
$packages = $row['package'];
}

$resulte = mysqli_query($con, "SELECT * FROM `package` WHERE `id` = '$packages'") or die(mysqli_error($con));
while($row = mysqli_fetch_array($resulte)){
$generator = $row['generator'];
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

	<title><?php echo $website ?> | Generador</title>

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

	<!--[if lt IE 9]><script src="../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script type="text/javascript">
				function select_all(obj) {
					var text_val=eval(obj);
					text_val.focus();
					text_val.select();
					if (!document.all) return; // IE only
					r = text_val.createTextRange();
					r.execCommand('copy');
				}
			  </script>
</head>
<style>
button.btn:active{
background-color: #fff;
color: #000;
}
a.btn-block:active{
background-color: #fff;
color: #000;
}
</style>
<body class="page-body <?php echo $_SESSION['skin']; ?>" data-url="http://neon.dev">

<?php include'include/header.php'; ?>
		<hr />
		
					<ol class="breadcrumb bc-4" >
								<li>
						<a href="index"><i class="fa-home"></i>Inicio</a>
					</li>
						<li class="active">
		
									<strong>Generador</strong>
							</li>
							</ol><?php
									if($_SESSION['rank'] == 5 || $generator == "all"){
						$generatorquery = "SELECT * FROM `generators`";
					}else{
						$generatorquery = "SELECT * FROM `generators` WHERE `generator` = ".$generator;
					}
					$result = mysqli_query($con, $generatorquery) or die(mysqli_error($con));
					while ($row = mysqli_fetch_array($result)) {
								$name = $row['name'];
			                    $id = $row['id'];
								$color = $row['color'];
						echo'
							<div class="col-sm-3">
								<div id="tile-id'. $id .'" class="tile-block tile-'. $color .'">
					
									<div class="tile-header">
						
									<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-'. $id .'">
									<i class="glyphicon glyphicon-cloud"></i>
						
								<a href="#">
							'. $name .'
							<span>Genera tu '; if($name === "Steam"){echo
							'steam ';}
							else
							{echo 'Cuenta ';} echo'!</span>
						</a>
					</div>
					
					<div class="tile-content">
					'; if($name === "Steam"){
					echo'
						<font color="white"><center><h2>***** <i class="entypo-minus"></i> ***** <i class="entypo-minus"></i> *****</h2></center></font>
						';}else{
						echo'
						<font color="white"><center><h2><i class="entypo-user"></i>:<i class="entypo-key"></i></h2></center></font>';} echo'
						<input type="text" id="generator'.$row["id"].'" onclick="select_all(this)" class="text-center form-control" placeholder="usuario:contraseña" readonly />
						
						
					</div>
					
					<div class="tile-footer">
					<button type="button" id="generate'.$row["id"].'" class="btn btn-block">Generar</button>
						                        <a onclick="myFunction'.$row["id"].'()" id="copy'.$row["id"].'" data-clipboard-target="generator'.$row["id"].'" title="Copy" class="btn btn-block">Copiar</a>
                    </div>
                </div>
                 <script>function myFunction'.$row["id"].'() {
  /* Get the text field */
  var copyText = document.getElementById("generator'.$row["id"].'");
 
  /* Select the text field */
  copyText.select();
 
  /* Copy the text inside the text field */
  document.execCommand("Copy");
 
}
</script>
 
 
                </div>
        ';
		echo'
	<!-- ################################################# -->	
	<script type="text/javascript">
		function changeClass'. $id .'(value) {
			document.getElementById("tile-id'. $id .'").className = value;
		}
	</script>
		<div class="modal fade" id="sample-modal-dialog-'. $id .'">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Configure color n°'.$id . '</h4>
				</div>
				
				<div class="modal-body">
			                <label>Color :</label></br>
           <select onchange="changeClass'. $id .'(this.value)" name="color" class="form-control" style="margin-bottom: 5px;" required>
<option value="tile-block tile-blue">Blue</option>
<option value="tile-block tile-cyan">Cyan</option>
<option value="tile-block tile-red">Red</option>
<option value="tile-block tile-green">Green</option>
<option value="tile-block tile-aqua">Aqua</option>
<option value="tile-block tile-purple">Purple</option>
<option value="tile-block tile-pink">Pink</option>
<option value="tile-block tile-orange">Orange</option>
<option value="tile-block tile-brown">Brown</option>
<option value="tile-block tile-plum">Plum</option>
<option value="tile-block tile-gray">Gray</option>
<option value="tile-block tile-black">Black</option>
</select>
						               <div style="display:none;"> <label>ID :</label></br>
            <input type="text" name="idnews" class="form-control"  value="'. $id.'" readonly/></br></div>
			</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div> ';} ?>
		<!-- ################################################# -->		
		<!-- lets do some work here... -->
		<!-- Footer -->
		<div class="col-md-12">
<?php include '../include/footer.php'; ?>
</div>
	</div>

	
	



<?php
	
	$result = mysqli_query($con, $generatorquery) or die(mysqli_error($con));
	while ($row = mysqli_fetch_array($result)) {
		echo '
			<script>
			$(document).ready(function(){
				$("#generate'.$row["id"].'").click(function(){
				 $.get("include/gen?generator='.$row["id"].'&username='.$username.'", function(response){
					$("#generator'.$row["id"].'").val(response);
					$("#flag'.$row["id"].'").val(response);
				 });
				});
			});
			
			var client = new ZeroClipboard( document.getElementById("copy'.$row["id"].'") );

			client.on( "ready", function( readyEvent ) {

			  client.on( "aftercopy", function( event ) {
			  } );
			} );

			</script>
		';
	}
	
	?>

	<!-- Bottom scripts (common) -->
	<script src="../assets/js/gsap/TweenMax.min.js"></script>
	<script src="../assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="../assets/js/bootstrap.js"></script>
	<script src="../assets/js/joinable.js"></script>
	<script src="../assets/js/resizeable.js"></script>
	<script src="../assets/js/neon-api.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="../assets/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="../assets/js/neon-demo.js"></script>

</body>
</html>