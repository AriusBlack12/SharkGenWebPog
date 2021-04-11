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
				
				$value = $row['value'];
		}

	if(isset($_POST['add-username']) && isset($_POST['add-price']) && isset($_POST['add-package'])){
	
	$add_username = mysqli_real_escape_string($con, $_POST['add-username']);
	
	$add_price = mysqli_real_escape_string($con, $_POST['add-price']);
	
	$add_package = mysqli_real_escape_string($con, $_POST['add-package']);
	
	$date = date("Y-m-d");
		
		$tespackage = mysqli_query($con, "SELECT * FROM `package` WHERE `id` = '$add_package'") or die(mysqli_error($con));
		
		while($row = mysqli_fetch_array($tespackage)){
			
			if($row['length'] == "Lifetime"){
				
				$expiretime = "Lifetime";
				
				$expires = date("Y-m-d", strtotime("+999 years", strtotime($date)));
			
			}else{
				
				$expiretime = $row['length'];
				
				$expires = date("Y-m-d", strtotime("+$expiretime", strtotime($date)));
				
				}
			
			}
	
	mysqli_query($con, "INSERT INTO `subscriptions` (username, package, price, date, expire, active, txn_id)
	VALUES ('$add_username', '$add_package', '$add_price', '$date', '$expires', '1', 'Gift')") or die(mysqli_error($con));
	
	}
	
	if(isset($_GET['delpackage'])){
		
		$user_del = mysqli_real_escape_string($con, $_GET['delpackage']);	
			
			mysqli_query($con, "DELETE FROM `subscriptions` WHERE `username` = '$user_del'") or die(mysqli_error($con));
	
			echo' <script language="JAVASCRIPT"> window.location.href="admin-subscriptions" </script> ';
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

	<title><?php echo $website ?> | Subscriptions</title>

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
					<li>
							Admin
					</li>
						<li class="active">
		
									<strong>Subscriptions</strong>
							</li>
							</ol>
			
		
		<br />
		
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
		
		<table class="table table-bordered datatable" id="table-3">
			<thead>
				<tr class="replace-inputs">
					<th>Username</th>
					<th>Package</th>
					<th>Date of bought</th>
					<th>Expires</th>
					<th>Price</th>
					<th>Transaction ID</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
	<?php 
		$usersubs = mysqli_query($con, "SELECT * FROM `subscriptions` ORDER BY `date` DESC");
			while($row = mysqli_fetch_array($usersubs)){
			$packid = $row['package'];
			$packages = mysqli_query($con, "SELECT * FROM `package` WHERE `id` = '$packid'");
				while($row2 = mysqli_fetch_array($packages)){
				$package = $row2['name'];
				}
				echo'
				<tr class="odd gradeX">
					<td>'. $row["username"] .'</td>
					<td>'. $package .'</td>
					<td>'. $row["date"] .'</td>
					<td>'. $row["expire"] .'</td>
					<td>'. $row["price"] . $value .'</td>
					<td>'. $row["txn_id"] .'</td>
					<td>
					
						<a href="admin-subscriptions?delpackage='. $row['username'] .'" class="btn btn-danger btn-sm btn-icon icon-left">
							<i class="entypo-trash"></i>
							Delete
						</a> 
						
					</td>
				</tr>
			';} ?>
			</tbody>
			<tfoot>
				<tr>
					<th>Username</th>
					<th>Package</th>
					<th>Date of bought</th>
					<th>Expires</th>
					<th>Price</th>
					<th>Transaction ID</th>
					<th>Action </th>
				</tr>
			</tfoot>
		</table>
		</br>
		<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-member">
		<div class="btn btn-blue"style="margin-bottom: 5px;">
		Add Subscriptions
		</div>	</a>
		<div class="modal fade" id="sample-modal-dialog-member">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Add User</h4>
				</div>
				
				<div class="modal-body">
				<form action="admin-subscriptions" method="POST">
                            <label>Username :</label></br>
            <input type="text" name="add-username" class="form-control"  placeholder="Ex: username" required/></br>
			                <label>Price :</label></br>
            <input type="text" name="add-price" class="form-control"  placeholder="Ex: 10" required/></br>
							<label>Package :</label></br>
            <select name="add-package" class="form-control" style="margin-bottom: 5px;" required>
			<?php
			$packagess = mysqli_query($con, "SELECT * FROM `package`");
				while($row = mysqli_fetch_array($packagess)){
				$pakagie = $row['id'];
				$name = $row['name'];
					echo'
						<option value="'. $pakagie .'">'. $name .'</option>
						';}
				?>
			</select>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="button submit" class="btn btn-primary">Add Subscriptions</button>
					</form>
					</div>
				</div>
			</div>
		</div>	
	</div>
		
		</br>
		
		
		
		
		<!-- lets do some work here... -->
		<!-- Footer -->
<?php include 'include/footer.php'; ?>
	</div>

	
	



<link rel="stylesheet" href="assets/js/datatables/datatables.css">
	<link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">
	<link rel="stylesheet" href="assets/js/select2/select2.css">


	<!-- Bottom scripts (common) -->
	<script src="assets/js/gsap/TweenMax.min.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>

	<!-- Imported scripts on this page -->
	<script src="assets/js/datatables/datatables.js"></script>
	<script src="assets/js/select2/select2.min.js"></script>
	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="assets/js/neon-demo.js"></script>

</body>
</html>