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
if(isset($_GET['deleteuser'])){
$userss = mysqli_real_escape_string($con, $_GET['deleteuser']);
mysqli_query($con, "DELETE FROM `users` WHERE `id` = '$userss'") or die(mysqli_error($con));
echo'
<script language="JAVASCRIPT">
window.location.href = "admin-users"
</script>
';
}

if(isset($_GET['banuser'])){
$userban = mysqli_real_escape_string($con, $_GET['banuser']);
mysqli_query($con, "UPDATE `users` SET `isbanned` = '1' WHERE `id` = '$userban'") or die(mysqli_error($con));
echo'
<script language="JAVASCRIPT">
window.location.href = "admin-users"
</script>
';
}

	if(isset($_GET['unbanuser'])){
	
		$userunban = mysqli_real_escape_string($con, $_GET['unbanuser']);
			
			mysqli_query($con, "UPDATE `users` SET `isbanned` = '0' WHERE `id` = '$userunban'") or die(mysqli_error($con));
				
				$msd = mysqli_query($con, "SELECT * FROM `users` WHERE `id` = '$userunban'") or die(mysqli_error($con));
					
					while ($row = mysqli_fetch_array($msd)){
							
					$userun = $row['username'];
									
				mysqli_query($con, "DELETE FROM `banned` WHERE `username` = '$userun'") or die(mysqli_error($con));
									}
echo'
<script language="JAVASCRIPT">
window.location.href = "admin-users"
</script>
';
}

if(isset($_POST['add-username']) & isset($_POST['add-password']) & isset($_POST['add-email']) & isset($_POST['add-rank'])){
$add_username = mysqli_real_escape_string($con, $_POST['add-username']);
$add_password = mysqli_real_escape_string($con, $_POST['add-password']);
$add_email = mysqli_real_escape_string($con, $_POST['add-email']);
$add_rank = mysqli_real_escape_string($con, $_POST['add-rank']);
$newpass = password_hash($add_password, PASSWORD_BCRYPT);
$ip = mysqli_real_escape_string($con, htmlspecialchars($_SERVER['REMOTE_ADDR']));
$date = date("d/m/Y");
mysqli_query($con, "INSERT INTO `users` (username, password, email, rank, ip, date) VALUES ('$add_username', '$newpass', '$add_email', '$add_rank', '$ip', '$date')") or die(mysqli_error($con));
}

if(isset($_POST['edit-username']) & isset($_POST['edit-email']) & isset($_POST['edit-rank'])){
$edit_username = mysqli_real_escape_string($con, $_POST['edit-username']);
$edit_email = mysqli_real_escape_string($con, $_POST['edit-email']);
$edit_rank = mysqli_real_escape_string($con, $_POST['edit-rank']);
$iduser = mysqli_real_escape_string($con, $_POST['iduser']);
mysqli_query($con, "UPDATE `users` SET `username` = '$edit_username', `email` = '$edit_email', `rank` = '$edit_rank' WHERE `id` = '$iduser'") or die(mysqli_error($con));
}

if(!empty($_POST['edit-password'])){
$edit_password = mysqli_real_escape_string($con, $_POST['edit-password']);
$newpassword = password_hash($edit_password, PASSWORD_BCRYPT);
$iduser = mysqli_real_escape_string($con, $_POST['iduser']);
mysqli_query($con, "UPDATE `users` SET `password` = '$newpassword' WHERE `id` = '$iduser'") or die (mysqli_error($con));
}

				$see = mysqli_query($con, "SELECT * FROM connects WHERE bestview = '$return' AND date = '$date'") or die(mysqli_error($con));
					
					if(mysqli_num_rows($see) < 1){
					
						mysqli_query($con, "INSERT INTO connects (bestview, date) VALUES ('$return', '$date')") or die(mysqli_error($con));
					
					}
			
			$final_2 = mysqli_query($con, "SELECT max(bestview) as bestview FROM connects") or die(mysqli_error($con));
			
				while($row = mysqli_fetch_array($final_2)){
			
					$bestreturn = $row['bestview'];
			
				}
	
			$nowdate = date("d-m-Y");
	
			$dateyesterday = date("d-m-Y", strtotime("-1 day", strtotime($nowdate)));
			
			$select_alll = mysqli_query($con, "SELECT * FROM connects WHERE date = '$dateyesterday'");
			
			if(mysqli_num_rows($select_alll) < 1){
				
				$bestyesterday = "0";
				
			}else{
			
			$final_3 = mysqli_query($con, "SELECT max(bestview) as bestview FROM connects WHERE date = '$dateyesterday'") or die(mysqli_error($con));
			
 				while($row = mysqli_fetch_array($final_3)){
			
					$bestyesterday = $row['bestview'];
			
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

	<title><?php echo $website ?> | Users</title>

	<link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/neon-core.css">
	<link rel="stylesheet" href="assets/css/neon-theme.css">
	<link rel="stylesheet" href="assets/css/neon-forms.css">
	<link rel="stylesheet" href="assets/css/custom.css">
	<link rel="stylesheet" href="assets/js/datatables/datatables.css">
	<link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">
	<link rel="stylesheet" href="assets/js/select2/select2.css">
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
		<script type="text/javascript">
			setInterval(function() {
			$.ajax({
				url: "allconnect.php",
				success: function(html){
					$('#load_info').empty();
					$('#load_info').append(html);
				}
			});
			}, 1000);
		</script>

</head>
<body class="page-body <?php echo $_SESSION['skin']; ?>" data-url="http://neon.dev">

<?php include'include/header.php'; ?>
		<hr />
		
					<ol class="breadcrumb bc-3" >
								<li>
						<a href="index"><i class="fa-home"></i>Home</a>
					</li>
					<li><a>
		
									Admin </a>
							</li>
						<li class="active">
		
									<strong>Users</strong>
							</li>
							</ol>
			
		
		<br />
				<center>
				<?php
				$useragent=$_SERVER['HTTP_USER_AGENT'];
			if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
				{echo'
			<div class="col-sm-3 col-xs-12">
					
				<div class="tile-stats tile-orange">
				
					<div class="icon"><i class="entypo-trophy"></i></div>
					
						<div class="num">
						
							'.$bestreturn.'
							
						</div>
						
					<h3>Visit record</h3>
					
				</div>
					
			</div>

			<div class="col-sm-3 col-xs-6">
			
				<div class="tile-stats tile-primary">
				
					<div class="icon"><i class="entypo-user-add"></i></div>
					
						<div class="num">
						
							<div id="load_info"></div>
							
						</div>
					
					<h3>Online user(s)</h3>
					
				</div>
			
			</div>
			
			';}else{ echo'
				
			<div class="col-sm-3 col-xs-6">
			
				<div class="tile-stats tile-primary">
				
					<div class="icon"><i class="entypo-user-add"></i></div>
					
						<div class="num">
						
							<div id="load_info"></div>
							
						</div>
					
					<h3>Online user(s)</h3>
					
				</div>
			
			</div>
			
			<div class="col-sm-3 col-xs-12">
					
				<div class="tile-stats tile-orange">
				
					<div class="icon"><i class="entypo-trophy"></i></div>
					
						<div class="num">
						
							'.$bestreturn.'
							
						</div>
						
					<h3>Visit record</h3>
					
				</div>
					
			</div>
			';} ?>
			<div class="col-sm-3 col-xs-6">
					
				<div class="tile-stats tile-primary">
				
					<div class="icon"><i class="entypo-gauge"></i></div>
					
						<div class="num">
						
							<?php echo $bestyesterday ?>
							
						</div>
						
					<h3>Yesterday visit record</h3>
					
				</div>
					
			</div>
			
			</center></br>
				
				<script type="text/javascript">
		jQuery( window ).load( function() {
			var $table2 = jQuery( "#table-2" );
			
			// Initialize DataTable
			$table2.DataTable( {
				"sDom": "tip",
				"bStateSave": false,
				"iDisplayLength": 8,
				"aoColumns": [
					{ "bSortable": false },
					null,
					null,
					null,
					null
				],
				"bStateSave": true
			});
			
			// Highlighted rows
			$table2.find( "tbody input[type=checkbox]" ).each(function(i, el) {
				var $this = $(el),
					$p = $this.closest('tr');
				
				$( el ).on( 'change', function() {
					var is_checked = $this.is(':checked');
					
					$p[is_checked ? 'addClass' : 'removeClass']( 'highlight' );
				} );
			} );
			
			// Replace Checboxes
			$table2.find( ".pagination a" ).click( function( ev ) {
				replaceCheckboxes();
			} );
		} );
			
		// Sample Function to add new row
		var giCount = 1;
		
		function fnClickAddRow() {
			jQuery('#table-2').dataTable().fnAddData( [ '<div class="checkbox checkbox-replace"><input type="checkbox" /></div>', giCount + ".1", giCount + ".2", giCount + ".3", giCount + ".4" ] );
			replaceCheckboxes(); // because there is checkbox, replace it
			giCount++;
		}
		</script>
		<div class="col-md-11">
		<table class="table table-bordered table-striped datatable" id="table-2">
			<thead>
				<tr>
					<th>ID</th>
					<th>Banned</th>
					<th>Username</th>
					<th>Email</th>
					<th>Rank</th>
					<th>Register Date</th>
					<th>Register IP</th>
					<th>Double IP</th>
					<th>Has Subscription</th>
					<th>Actions</th>
				</tr>
			</thead>
			
			<tbody>
			<?php
					$usersquery = mysqli_query($con, "SELECT * FROM `users` ORDER BY `date` DESC");
					if(mysqli_num_rows($usersquery) < 1){
							echo'
						<tr>
						<td><td><td><td><td><td><td><td>Member number: 0</td></td></td></td></td></td></td></td></tr>
						';
					}else{
						while($row = mysqli_fetch_array($usersquery)){
						$date = date("Y-m-d");
						if($row['rank'] == "5"){
						$rank = "Admin";
						}else{
						$rank = "Member";
						}
						if($row['isbanned'] == "0"){
						$banned = "No";
						}else{
						$banned = '<b><font color="red">Yes</font></b>';
						}
						
						echo'
						<tr>
					<td> '. $row['id'] .' </td>	
					<td>'. $banned .'</td>
					<td>'. $row['username'] .'</td>
					<td>'. $row['email'] .'</td>
					<td>'. $rank .'</td>
					<td>'. $row['date'] .'</td>
					<td>'. $row['ip'] .'</td>
					<td>'. $row['doubleip'] .'</td>
					<td>'; 
					$result = mysqli_query($con, "SELECT * FROM `subscriptions` WHERE `username` = '". $row['username'] ."' AND `active` = '1' AND `expire` >= '$date'") or die(mysqli_error($con));
							if(mysqli_num_rows($result) < 1){ 
							echo'
							<font color="red"><i class="entypo-cancel"></i></font></td>
							';
							}else{
							echo' 
							<font color="green"><i class="entypo-check"></i></font>
							</td>'; }
							echo'
					<td>
						<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-'. $row['id'] .'">
						 <div class="btn btn-info btn-sm btn-icon icon-left">
							<i class="entypo-pencil"></i>
							Edit
						</div></a>
						<a href="admin-users?'; if($row['isbanned'] == "0") {echo'
						banuser='. $row['id'] .'"'; }else{ echo'unbanuser='. $row['id'] .'"';}  if($row['isbanned'] == "0") {echo' class="btn btn-gold btn-sm btn-icon icon-left">
							<i class="entypo-cancel"></i>
							Ban User';
							}else{ echo'
							class="btn btn-green btn-sm btn-icon icon-left">
							<i class="entypo-check"></i>
							Unban User
							';} 
							echo'
						</a>					
						<a href="admin-users?deleteuser='. $row['id'] .'" class="btn btn-danger btn-sm btn-icon icon-left">
							<i class="entypo-trash"></i>
							Delete
						</a>
					</td>
				</tr></div>'; 
												
						if($row['rank'] == "5"){
						
							$idrankk = "5";
							$rankid = "1";
							$rankkk = "Admin";
							$rank2 = "Member";
							
						}else{
						
							$idrankk = "1";
							$rankid = "5";
							$rankkk = "Member";
							$rank2 = "Admin";
							
						}
					echo'
<div class="modal fade" id="sample-modal-dialog-'. $row['id'] .'">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Configure user n°'. $row['id'] .'</h4>
				</div>
				
				<div class="modal-body">
				<form action="admin-users" method="POST">
                            <label>Username :</label></br>
            <input type="text" name="edit-username" class="form-control"  value="'. $row['username'] .'" required/></br>
			                <label>Password :</label></br>
            <input type="text" name="edit-password" class="form-control" placeholder="Leave empty" /></br>
			                <label>Email :</label></br>
            <input type="text" name="edit-email" class="form-control"  value="'. $row['email'] .'" required/></br>
							<label>Rank :</label></br>
            <select name="edit-rank" class="form-control" style="margin-bottom: 5px;" required>
					<option value="'. $idrankk .'">'. $rankkk .'</option>
					<option value="'. $rankid .'">'. $rank2 .'</option>
			</select>
						               <div style="display:none;"> <label>ID :</label></br>
            <input type="text" name="iduser" class="form-control"  value="'. $row['id'] .'" readonly/></br></div>
			</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button submit" class="btn btn-primary">Save changes</button>
					</form>
				</div>
			</div>
		</div>
	</div>	
	  
	  ';
	  }}?>
				
				
			</tbody>
		</table>
<div class="modal fade" id="sample-modal-dialog-member">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Add User</h4>
				</div>
				
				<div class="modal-body">
				<form action="admin-users" method="POST">
                            <label>Username :</label></br>
            <input type="text" name="add-username" class="form-control"  placeholder="Ex: username" required/></br>
			                <label>Password :</label></br>
            <input type="password" name="add-password" class="form-control" placeholder="Ex: abc123" /></br>
			                <label>Email :</label></br>
            <input type="text" name="add-email" class="form-control"  placeholder="Ex: email@email.com" required/></br>
							<label>Rank :</label></br>
            <select name="add-rank" class="form-control" style="margin-bottom: 5px;" required>
					<option value="1">Member</option>
					<option value="5">Admin</option>
			</select>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="button submit" class="btn btn-primary">Add Member</button>
					</form>
				</div>
			</div>
		</div>
	</div>	</div>
		<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-member">
		<div class="btn btn-blue"style="margin-bottom: 5px;">
		Add Member
		</div>	</a></br>
			  <?php include 'include/footer.php'; ?>

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


	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="assets/js/neon-demo.js"></script>

</body>
</html>