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
$site = mysqli_query($con, "SELECT * FROM `settings`") or die(mysqli_error($con));
while($row = mysqli_fetch_array($site)){
$website = $row['website'];
$favicon = $row['favicon'];
}
$username= htmlspecialchars($_SESSION['username']);
$idd = $_SESSION['id'];
$rankk = $_SESSION['rank'];
$email = $_SESSION['email'];

if(isset($_GET['settings'])){
$userss = mysqli_real_escape_string($con, $_GET['settings']);
mysqli_query($con, "DELETE FROM `history` WHERE `id` = '$userss'") or die(mysqli_error($con));
echo'
<script language="JAVASCRIPT">
window.location.href = "history"
</script>
';
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

	<title><?php echo $website ?> | History</title>

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
<body onload="showw();" class="page-body <?php echo $_SESSION['skin']; ?>" data-url="http://neon.dev">

<?php include 'include/header.php'; ?>

		<hr />
		<h1 class="margin-bottom">History</h1>
					<ol class="breadcrumb 2" >
								<li>
						<a href="index"><i class="fa-home"></i>Home</a>
					</li>
						<li class="active">
		
									<strong>Generations History</strong>
							</li>
							</ol>
				
		<br />
			
		
			
		
			<div class="row">
				<div class="col-md-12">
					
					<div class="panel panel-primary" data-collapsed="0">
					
						<div class="panel-heading">
							<div class="panel-title">
								Generation History
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
				$(this).html( '<input type="text" class="form-control" placeholder="Search ' + title + '" />' );
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
					<th>Account Type</th>
					<th>Alt</th>
					<th>Date</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
			<?php $log = mysqli_query($con, "SELECT * FROM `history` WHERE `username` = '$username' ORDER BY `date` DESC") or die(mysqli_error($con));
while ($row200 = mysqli_fetch_array($log)) {
$ip = $row200['ip'];
$accname = $row200['accname'];
$alt = $row200['history'];
$date = $row200['date'];
				   echo'
				<tr class="odd gradeX">
					<td>'.$ip.'</td>
					<td>'.$accname.'</td>
					<td>'. $alt .'</td>
					<td>'.date("Y/m/d H:i", $date).'</td>
					<td>		
						<a href="history?settings='. $row200['id'] .'" class="btn btn-danger btn-sm btn-icon icon-left">
							<i class="entypo-trash"></i>
							Delete
						</a>
					</td>
				</tr>'; }?>	
			</tbody>
			<tfoot>
				<tr>
					<th>IP</th>
					<th>Account Type</th>
					<th>Alt</th>
					<th>Date</th>
					<th>Actions</th>
				</tr>
			</tfoot>
		</table>		
						</div>
					
				</div>
			</div>
						
				</br>		
		<!-- Footer -->
<?php include 'include/footer.php'; ?>
	</div>
	
	
	
	
	<!-- Chat Histories -->

</div>
<script language="JAVASCRIPT">
window.onload = showw();
</script>
	<link rel="stylesheet" href="assets/js/datatables/datatables.css">
	<link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">
	<link rel="stylesheet" href="assets/js/select2/select2.css">
<script src="assets/js/datatables/datatables.js"></script>
<script src="assets/js/select2/select2.min.js"></script>
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