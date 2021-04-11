<?php
include '../include/settings.php';
include'../connection.php';
if (!isset($_SESSION)) { session_start(); }

if (!isset($_SESSION['username'])) {
echo '
<script language="javascript">
    window.location.href = "login"
</script>
';
exit();
}
$site = mysqli_query($con, "SELECT * FROM `settings`") or die(mysqli_error($con));
while($row = mysqli_fetch_array($site)){
$website = $row['website'];
$favicon = $row['favicon'];
}
$username= htmlspecialchars($_SESSION['username']);
$idd = $_SESSION['id'];
$rankk = $_SESSION['rank'];
$email = $_SESSION['email'];

if(isset($_POST['password']) && isset($_POST['password_conf']) && isset($_POST['curr_password'])){
$password = mysqli_real_escape_string($con, $_POST['password']);
$pass_conf = mysqli_real_escape_string($con, $_POST['password_conf']);
$curr_password = mysqli_real_escape_string($con, $_POST['curr_password']);
$id = $_SESSION['id'];
$result1 = mysqli_query($con, "SELECT * FROM `users` WHERE `username` = '$username'") or die(mysqli_error($con));
$row10 = mysqli_fetch_array($result1);
$pass_curr = $row10['password']; //pass


if(!(password_verify($curr_password, $pass_curr))){

		$settings = "current";
		
			}else{
			
		if($password != $pass_conf){
		
		  $settings = "passconf";
		  
			}else{

				$passs = password_hash($password, PASSWORD_BCRYPT);
				
					mysqli_query($con,"UPDATE `users` SET `password` = '$passs' WHERE `id` = '$id'") or die(mysqli_error($con));

						$_SESSION['password'] = $password;
			
						echo'
					<script language="JAVASCRIPT">
					window.location.href = "../lib/logout"
					</script>
					'; 
				  die();
			
				}
				
			}
			
}


$log = mysqli_query($con, "SELECT * FROM `ip` WHERE `username` = '$username' ORDER BY datetime DESC") or die(mysqli_error($con));
while ($row200 = mysqli_fetch_array($log)) {
$username = $row200['username'];
$ip = $row200['ip'];
$date = $row200['datetime'];
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

	<title><?php echo $website ?> | Ajustes</title>

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


</head>
<style type="text/css">
.login-error h3{
  background: #b62020;
  padding: 10px;
  margin: auto;
  width: 320px;
  font-size: 12px;
  -webkit-border-radius: 3px 3px 0 0;
  -webkit-background-clip: padding-box;
  -moz-border-radius: 3px 3px 0 0;
  -moz-background-clip: padding;
  border-radius: 3px 3px 0 0;
  background-clip: padding-box;
  color: white;
  text-align: center;
  font-size: 1.0em;

}
.login-error p{
   background: #cc2424;
  padding: 20px;
  margin: auto;
   width: 320px;
  margin-bottom: 20px;
  font-size: 12px;
  -webkit-border-radius: 3px 3px 0 0;
  -webkit-background-clip: padding-box;
  -moz-border-radius: 3px 3px 0 0;
  -moz-background-clip: padding;
  border-radius: 0px 0px 5px 5px;
  background-clip: padding-box;
  text-align: center;
  color: white;
  margin-
}
</style>
<script>
	
  function showw(){
  
			$("#error-<?php echo $settings?>").css("display", "block");
			
}
		
</script>
<body onload="showw();" class="page-body <?php echo $_SESSION['skin']; ?>">

<?php include 'include/header.php'; ?>

		<hr />
		<h1 class="margin-bottom">Ajustes de tu Cuenta</h1>
					<ol class="breadcrumb 2" >
								<li>
						<a href="index"><i class="fa-home"></i>Inicio</a>
					</li>
						<li class="active">
		
									<strong>Ajustes</strong>
							</li>
							</ol>
				
		<br />
			
			
		<form method="post" class="form-horizontal form-groups-bordered validate" action="settings">
		
			<div class="row">
				<div class="col-md-12">
					
					<div class="panel panel-primary" data-collapsed="0">
					
						<div class="panel-heading">
							<div class="panel-title">
								Ajustes Generales
							</div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
								<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
							</div>
						</div>
	
			<div id="error-passconf" class="login-error" style="display:none;"></br>
			<h3> Error </h3>
			<p> Las nuevas contraseñas no coinciden ! </p>
			</div>
			<div id="error-current" class="login-error" style="display:none;"></br>
			<h3> Error </h3>
				<p> Tu contraseña actual es incorrecta ! </p>
			</div>
						
						
						
						
						<div class="panel-body">
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Usuario:</label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" value="<?php echo $username?>" readonly>
									<span class="description">Tu no puedes modificar tu nombre de usuario.</span>
								</div>
							</div>
			
							<div class="form-group">
								<label for="field-2" class="col-sm-3 control-label">Correo</label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-2" value="<?php echo $email ?>" readonly>
									<span class="description">Tu no puedes modificar tu correo.</span>
								</div>
							</div>
				<hr />
							<div class="form-group">
								<label for="field-3" class="col-sm-3 control-label">Contraseña Actual:</label>
								
								<div class="col-sm-5">
									<input type="password" class="form-control" name="curr_password" id="field-3" required>
								</div>
							</div>
			
							<div class="form-group">
								<label for="field-4" class="col-sm-3 control-label">Nueva Contraseña:</label>
								
								<div class="col-sm-5">
									<input type="password" class="form-control" name="password" id="field-4" required>
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-4" class="col-sm-3 control-label">Confirma Nueva Contraseña:</label>
								
								<div class="col-sm-5">
									<input type="password" class="form-control" name="password_conf" id="field-4" required>
								</div>
							</div>
							
						</div>
					
					</div>
							<center>							<div class="form-group default-padding col-md-12">
				<button type="submit" class="btn btn-success">Guardar Cambios</button>
				<button type="reset" class="btn">Volver a Anterior</button>
			                </div></center>
							</form>
				</div>
			</div>
		
			<div class="row">
				<div class="col-md-12">
					
					<div class="panel panel-primary" data-collapsed="0">
					
						<div class="panel-heading">
							<div class="panel-title">
								Registro de Conexión
							</div>
						</div>
						
					</div>
				
				</div>
				<script type="text/javascript">
		jQuery( document ).ready( function( $ ) {
			var $table3 = jQuery("#table-3");
			
			var table3 = $table3.DataTable( {
				"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
			} );
			
			// Initalize Select Dropdown after DataTables is created
			$table3.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
				minimumResultsForSearch: -1
			});
			
			// Setup - add a text input to each footer cell
			$( '#table-3 tfoot th' ).each( function () {
				var title = $('#table-3 thead th').eq( $(this).index() ).text();
				$(this).html( '<input type="text" class="form-control" placeholder="Chercher ' + title + '" />' );
			} );
			
			// Apply the search
			table3.columns().every( function () {
				var that = this;
			
				$( 'input', this.footer() ).on( 'keyup change', function () {
					if ( that.search() !== this.value ) {
						that
							.search( this.value )
							.draw();
					}
				} );
			} );
		} );
		</script>		
				
				<div class="col-md-13">
					
					
						
						<div class="panel-body">
		<table class="table table-bordered datatable" id="table-3">
			<thead>
				<tr class="replace-inputs">
					<th>IP</th>
					<th>Fecha</th>
					<th>Sistema Operativo</th>
				</tr>
			</thead>
			<tbody>
			<?php $log = mysqli_query($con, "SELECT * FROM `ip` WHERE `username` = '$username' ORDER BY `datetime` DESC") or die(mysqli_error($con));
while ($row200 = mysqli_fetch_array($log)) {
$username = $row200['username'];
$ip = $row200['ip'];
$date = $row200['datetime'];
$os = $row200['os'];
				   echo'
				<tr class="odd gradeX">
					<td>'.$ip.'</td>
					<td>'.$date.'</td>
					<td class="center">Logueado desde '.$os.'</td>
				</tr>'; }?>	
			</tbody>
			<tfoot>
				<tr>
					<th>IP</th>
					<th>Fecha</th>
					<th>Sistema Operativo</th>
				</tr>
			</tfoot>
		</table>		
						</div>
					
				</div>
			</div>
						
				</br>		
		<!-- Footer -->
<?php include '../include/footer.php'; ?>
	</div>
	
	
	
	
	<!-- Chat Histories -->

</div>
<script language="JAVASCRIPT">
window.onload = showw();
</script>
	<link rel="stylesheet" href="../assets/js/datatables/datatables.css">
	<link rel="stylesheet" href="../assets/js/select2/select2-bootstrap.css">
	<link rel="stylesheet" href="../assets/js/select2/select2.css">
<script src="../assets/js/datatables/datatables.js"></script>
<script src="../assets/js/select2/select2.min.js"></script>
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