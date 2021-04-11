<?php 
include'../include/settings.php';
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
if ($_SESSION['rank'] < "5") {
echo '
<script language="javascript">
    window.location.href = "index?no-admin"
</script>
';
exit();
}


if (isset($_POST['accounts']) & isset($_POST['accountname'])){

$accountname = strip_tags($_POST['accountname']);
mysqli_query($con,"DELETE FROM `$accountname`") or die(mysqli_error($con));
$values = htmlspecialchars($_POST['accounts']);
$array = explode("\n", $values);
foreach($array as $line){
$line = mysqli_real_escape_string($con, $line);
if (empty($line)) {
}else{
  mysqli_query($con, "INSERT INTO `$accountname` (`alt`) VALUES ('$line')") or die(mysqli_error($con));
}
}

}

if (isset($_POST['privateaccounts']) & isset($_POST['privateaccountname'])){

$accountname = strip_tags($_POST['privateaccountname']);
mysqli_query($con,"DELETE FROM `priv$accountname`") or die(mysqli_error($con));
$values = htmlspecialchars($_POST['privateaccounts']);
$array = explode("\n", $values);
foreach($array as $line){
$line = mysqli_real_escape_string($con, $line);
if (empty($line)) {
}else{
  mysqli_query($con, "INSERT INTO `priv$accountname` (`alt`) VALUES ('$line')") or die(mysqli_error($con));
}
}

}


if (isset($_POST['privateaddaccount'])){
$name = mysqli_real_escape_string($con, $_POST['privateaddaccount']);
mysqli_query($con, "INSERT INTO `privgen` (`name`) VALUES ('$name')") or die(mysqli_error($con));
$getacc = mysqli_query($con, "SELECT * FROM `privgen` WHERE `name` = '$name'") or die(mysqli_error($con));
while($row = mysqli_fetch_array($getacc)){
$idpackage = $row['id'];
mysqli_query($con, "CREATE TABLE `priv$idpackage` (id INT NOT NULL AUTO_INCREMENT,alt VARCHAR(1000),status INT(1) DEFAULT '1',primary key (id))") or die(mysqli_error($con));
}
}

if (isset($_POST['addaccount'])){
$name = mysqli_real_escape_string($con, $_POST['addaccount']);
mysqli_query($con, "INSERT INTO `generators` (`name`) VALUES ('$name')") or die(mysqli_error($con));
$getacc = mysqli_query($con, "SELECT * FROM `generators` WHERE `name` = '$name'") or die(mysqli_error($con));
while($row = mysqli_fetch_array($getacc)){
$idpackage = $row['id'];
mysqli_query($con, "CREATE TABLE `$idpackage` (id INT NOT NULL AUTO_INCREMENT,alt VARCHAR(1000),status INT(1) DEFAULT '1',primary key (id))") or die(mysqli_error($con));
}
}

if (isset($_GET['privatedeleteaccount'])){
$name = mysqli_real_escape_string($con, $_GET['privatedeleteaccount']);
mysqli_query($con, "DELETE FROM `privgen` WHERE `id` = '$name'") or die(mysqli_error($con));
mysqli_query($con, "DROP TABLE `priv$name`") or die(mysqli_error($con));
}


if (isset($_GET['deleteaccount'])){
$name = mysqli_real_escape_string($con, $_GET['deleteaccount']);
mysqli_query($con, "DELETE FROM `generators` WHERE `id` = '$name'") or die(mysqli_error($con));
mysqli_query($con, "DROP TABLE `$name`") or die(mysqli_error($con));
}

if (isset($_GET['deletepackage'])){
$name = mysqli_real_escape_string($con, $_GET['deletepackage']);
mysqli_query($con, "DELETE FROM `package` WHERE `name` = '$name'") or die(mysqli_error($con));
}

if (isset($_POST['name']) & isset($_POST['price']) & isset($_POST['length']) & isset($_POST['colorpackage'])){
$name = mysqli_real_escape_string($con, $_POST['name']);
$price = mysqli_real_escape_string($con, $_POST['price']);
$generator = mysqli_real_escape_string($con, $_POST['generator']);
$accounts = mysqli_real_escape_string($con, $_POST['accounts']);
$length = mysqli_real_escape_string($con, $_POST['length']);
$haspriv = mysqli_real_escape_string($con, $_POST['haspriv']);
$privgenerations = mysqli_real_escape_string($con, $_POST['privgenerations']);
$colorpackage = mysqli_real_escape_string($con, $_POST['colorpackage']);
mysqli_query($con, "INSERT INTO `package` (`color`, `name`, `price`, `length`, `generator`, `generations`, `haspriv`, `privgenerations`) VALUES ('$colorpackage', '$name', '$price', '$length', '$generator', '$accounts', '$haspriv', '$privgenerations')") or die(mysqli_error($con));
}

if (isset($_POST['website']) & isset($_POST['favicon'])){
$websitee = mysqli_real_escape_string($con, $_POST['website']);
$favicon = mysqli_real_escape_string($con, $_POST['favicon']);
$valuee = mysqli_real_escape_string($con, $_POST['value']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$paypall = mysqli_real_escape_string($con, $_POST['paypal']);
mysqli_query($con, "UPDATE `settings` SET `website` = '$websitee'") or die(mysqli_error($con));
mysqli_query($con, "UPDATE `settings` SET `favicon` = '$favicon'") or die(mysqli_error($con));
mysqli_query($con, "UPDATE `settings` SET `value` = '$valuee'") or die(mysqli_error($con));
mysqli_query($con, "UPDATE `settings` SET `email` = '$email'") or die(mysqli_error($con));
mysqli_query($con, "UPDATE `settings` SET `paypal` = '$paypall'") or die(mysqli_error($con));
}

$site = mysqli_query($con, "SELECT * FROM `settings`") or die(mysqli_error($con));
while($row = mysqli_fetch_array($site)){
$website = $row['website'];
$favicone = $row['favicon'];
$value = $row['value'];
$emaill = $row['email'];
$paypal = $row['paypal'];
}
if($value === "€"){
$value1 = "€";
$value2 = "$";
}elseif($value === "$"){
$value1 = "$";
$value2 = "€";
}

if (isset($_POST['message']) & isset($_POST['writer']) & isset($_POST['title'])){
$title = mysqli_real_escape_string($con, $_POST['title']);
$message = mysqli_real_escape_string($con, $_POST['message']);
$writer = mysqli_real_escape_string($con, $_POST['writer']);
$color = mysqli_real_escape_string($con, $_POST['color']);
$hour = date("H:i");

$date = date("d-m-Y");
$datetime = date("Y-m-d H:i:s");
mysqli_query($con, "INSERT INTO `news` (`color`, `title`, `message`, `hour`, `date`, `datetime`, `writer`) VALUES ('$color', '$title', '$message', '$hour', '$date', '$datetime', '$writer')") or die(mysqli_error($con));
}

if (isset($_GET['deletenew'])){
$name = mysqli_real_escape_string($con, $_GET['deletenew']);
mysqli_query($con, "DELETE FROM `news` WHERE `id` = '$name'") or die(mysqli_error($con));
}

if(isset($_POST['edit-title']) && isset($_POST['edit-message']) && isset($_POST['edit-writer']) && isset($_POST['idnews'])){
$edittitle = mysqli_real_escape_string($con, $_POST['edit-title']);
$editmessage = mysqli_real_escape_string($con, $_POST['edit-message']);
$editwriter = mysqli_real_escape_string($con, $_POST['edit-writer']);
$idnews = mysqli_real_escape_string($con, $_POST['idnews']);
mysqli_query($con, "UPDATE `news` SET `title` = '$edittitle' WHERE id = '$idnews'") or die(mysqli_error($con));
mysqli_query($con, "UPDATE `news` SET `message` = '$editmessage' WHERE id = '$idnews'") or die(mysqli_error($con));
mysqli_query($con, "UPDATE `news` SET `writer` = '$editwriter' WHERE id = '$idnews'") or die(mysqli_error($con));
}
if(isset($_POST['edit-generationspackage']) && isset($_POST['edit-pricepackage']) && isset($_POST['edit-namepackage'])){
$editgen = mysqli_real_escape_string($con, $_POST['edit-generationspackage']);
$editprice = mysqli_real_escape_string($con, $_POST['edit-pricepackage']);
$editname = mysqli_real_escape_string($con, $_POST['edit-namepackage']);
$packageid = mysqli_real_escape_string($con, $_POST['idpackage']);
$editprivgen = mysqli_real_escape_string($con, $_POST['edit-privgen']);
mysqli_query($con, "UPDATE `package` SET `name` = '$editname' WHERE id = '$packageid'") or die(mysqli_error($con));
mysqli_query($con, "UPDATE `package` SET `price` = '$editprice' WHERE id = '$packageid'") or die(mysqli_error($con));
mysqli_query($con, "UPDATE `package` SET `generations` = '$editgen' WHERE id = '$packageid'") or die(mysqli_error($con));
mysqli_query($con, "UPDATE `package` SET `privgenerations` = '$editprivgen' WHERE id = '$packageid'") or die(mysqli_error($con));
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

	<link rel="icon" href="<?php echo $favicone ?>">

	<title><?php echo $website ?> | Gérer (Admin)</title>

<link rel="stylesheet" href="../assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="../assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/css/neon-core.css">
	<link rel="stylesheet" href="../assets/css/neon-theme.css">
	<link rel="stylesheet" href="../assets/css/neon-forms.css">
	<link rel="stylesheet" href="../assets/css/custom.css">
			<!-- Imported styles on this page -->
	<link rel="stylesheet" href="../assets/js/vertical-timeline/css/component.css">

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
<script type="text/javascript">
<!----------------
function chiffres(objInput){
   if(isNaN(objInput.value)){
      objInput.value = objInput.value.substring(0,objInput.value.length-1);
	  alert("Seulement les nombres sont autorisés !")
   }
}
</script>
	<!--[if lt IE 9]><script src="../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>
<body class="page-body <?php echo $_SESSION['skin']; ?>">

<?php include'include/header.php'; ?>
		<hr />
		
					<ol class="breadcrumb bc-3" >
								<li>
						<a href="index"><i class="fa-home"></i>Accueil</a>
					</li>
						<li>
		
									Admin
							</li>
							<li class="active">
		
									<strong>Gérer</strong>
							</li>
							</ol>
			
		
		<br />
		
<div class="row">
<div class="col-lg-3">
			
				<div class="panel panel-info" data-collapsed="0">
					
					<!-- panel head -->
					<div class="panel-heading" >
						<div class="panel-title" style="font-color:white;">Gérer Générateur Premium</div>
						
						<div class="panel-options">
							<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
						</div>
					</div>
					
					<!-- panel body -->
					<div class="panel-body">
	<?php
$accountsquery = mysqli_query($con, "SELECT * FROM `generators`") or die(mysqli_error($con));
while($row = mysqli_fetch_assoc($accountsquery)){

$accountnamee = $row['id'];
if(!($getaccountsquery = mysqli_query($con, "SELECT * FROM `$accountnamee`"))){
 
	echo 'The generator (id '. $accountnamee .') has been removed (Debug mode), please refresh the page.';
	mysqli_query($con, "DELETE FROM `generators` WHERE `id` = '$accountnamee'");
	die();
 }else{
	$getaccountsquery = mysqli_query($con, "SELECT * FROM `$accountnamee`");
 
 
$accountamount = mysqli_num_rows($getaccountsquery);
echo'
						<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading'.$row['id'].'">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse'.$row['id'].'" data-rel="collapse">
          '.$row['name'].' <span class="badge badge-secondary" style="color:white; text-align: right;">'.$accountamount.'</span>
        </a>
      </h4>
	  <a href="admin-manage?deleteaccount='.$accountnamee.'" class="btn btn-sm btn-default pull-right" data-rel="collapse"><i class="entypo-cancel"></i></a>
    </div>
    <div id="collapse'.$row['id'].'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'.$row['id'].'" style="height: 0px;">
      <div class="panel-body">
    <center>
<form action="admin-manage" method="POST">
<input type="hidden" name="accountname" value="'.$row['id'].'"/>
<textarea name="accounts" rows="10" class="form-control" placeholder="pseudonyme : mot de passe
pseudonyme : mot de passe
...">';
while($row = mysqli_fetch_assoc($getaccountsquery))
{
  echo $row['alt']."\n";
}

echo '</textarea>
<br>
<button type="submit" class="btn btn-info btn-large btn-block">Mettre à jour</button>
</form>
    </center>
      </div>
    </div>
  </div>
';}}
  ?>
  					<form action="admin-manage" method="POST">
<input type="text" name="addaccount" class="form-control" placeholder="Nom" style="margin-bottom: 5px;" required>
<button type="submit" class="btn btn-blue btn-large btn-block">Ajouter un type de compte</button>
</form>
					</div>
					
				</div>
				
			</div>
			
			
			
<div class="col-lg-3">
			
				<div class="panel panel-info" data-collapsed="0">
					
					<!-- panel head -->
					<div class="panel-heading" >
						<div class="panel-title" style="font-color:white;">Gérer Générateur Privé</div>
						
						<div class="panel-options">
							<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
						</div>
					</div>
					
					<!-- panel body -->
					<div class="panel-body">
					<center><i>
  <p>Le générateur privé supprime le compte/clé lorsqu'il est généré.</p>
					</i>
							</center>
	<?php
$accountsquery = mysqli_query($con, "SELECT * FROM `privgen`") or die(mysqli_error($con));
if(mysqli_num_rows($accountsquery) < 1){
echo'<center> <p>(0 accounts = disabled)</p>
<button style="margin-bottom: 5px;" class="btn btn-red popover-secondary" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Add an account below to activate it." data-original-title="How to enable it?">Private Generator is disabled.</button>
</center>
';
}else{
while($row = mysqli_fetch_assoc($accountsquery)){

$accountnamee = $row['id'];
if(!($getaccountsquery = mysqli_query($con, "SELECT * FROM `priv$accountnamee`"))){
	echo 'The private generator (id '. $accountnamee .') has been removed (Debug mode), please refresh the page.';
	mysqli_query($con, "DELETE FROM `privgen` WHERE `id` = '$accountnamee'");
	die();
 }else{
	 
$getaccountsquery = mysqli_query($con, "SELECT * FROM `priv$accountnamee`") or die(mysqli_error($con));


$accountamount = mysqli_num_rows($getaccountsquery);
echo'
						<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading'.$row['id'].'">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse'.$row['id'].'" data-rel="collapse">
          '.$row['name'].' <span class="badge badge-secondary" style="color:white; text-align: right;">'.$accountamount.'</span>
        </a>
      </h4>
	  <a href="admin-manage?privatedeleteaccount='.$accountnamee.'" class="btn btn-sm btn-default pull-right" data-rel="collapse"><i class="entypo-cancel"></i></a>
    </div>
    <div id="collapse'.$row['id'].'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'.$row['id'].'" style="height: 0px;">
      <div class="panel-body">
    <center>
<form action="admin-manage" method="POST">
<input type="hidden" name="privateaccountname" value="'.$row['id'].'"/>
<textarea name="privateaccounts" rows="10" class="form-control" placeholder="pseudonyme : mot de passe
pseudonyme : mot de passe
...">';
while($row = mysqli_fetch_assoc($getaccountsquery))
{
  echo $row['alt']."\n";
}

echo '</textarea>
<br>
<button type="submit" class="btn btn-info btn-large btn-block">Mettre à jour</button>
</form>
    </center>
      </div>
    </div>
  </div>
';}}}
  ?>
  					<form action="admin-manage" method="POST">
<input type="text" name="privateaddaccount" class="form-control" placeholder="Nom" style="margin-bottom: 5px;" required>
<button type="submit" class="btn btn-blue btn-large btn-block">Ajouter un type de compte</button>
</form>
					</div>
					
				</div>
				
			</div>
			
			
<div class="col-lg-3">
			
				<div class="panel panel-info" data-collapsed="0">
					
					<!-- panel head -->
					<div class="panel-heading" >
						<div class="panel-title" style="font-color:white;">Gérer les abonnements</div>
						
						<div class="panel-options">
							<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
						</div>
					</div>
					
					<!-- panel body -->
					<div class="panel-body">
	<?php
$accountsquery = mysqli_query($con, "SELECT * FROM `package`") or die(mysqli_error($con));
while($row = mysqli_fetch_assoc($accountsquery)){

$idpackage = $row['id'];
$accountname = $row['name'];
$price = $row['price'];
$generations = $row['generations'];
$accountamount = $row['price']." ".$value;
$privgenerationss = $row['privgenerations'];
echo'
						<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-'.$accountname.'" class="bg"><div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading'.$row['id'].'">
      <h4 class="panel-title">
          '.$row['name'].' <span class="badge badge-secondary" style="color:white; text-align: right;">'.$accountamount.'</span>
        </a>
      </h4>
	  <a href="admin-manage?deletepackage='.$accountname.'" class="btn btn-sm btn-default pull-right" data-rel="collapse"><i class="entypo-cancel"></i></a>
    </div>
    </div>
	  ';
	echo'
<div class="modal fade" id="sample-modal-dialog-'.$accountname.'">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Configurer l\'abonnement '.$accountname.'</h4>
				</div>
				
				<div class="modal-body">
				<form action="admin-manage" method="POST">
					<label>Nom :</label></br>
            <input type="text" name="edit-namepackage" class="form-control"  value="'.$accountname.'" required/></br>
					<label>Prix (<span class="badge badge-info" style="color:white; text-align: right;">'. $value .'</span>) :</label></br>
            <input type="text" name="edit-pricepackage" class="form-control"  value="'. $price .'" required/></br>
								<label>Générations (<span class="badge badge-info" style="color:white; text-align: right;">par jours</span>):</label></br>
            <input type="text" name="edit-generationspackage" class="form-control" placeholder="Laissez vide pour illimité" value="'. $generations .'" onKeydown="chiffres(this)" /></br>
			<label>Générations Privé (<span class="badge badge-info" style="color:white; text-align: right;">par jours</span>):</label></br>
            <input type="text" name="edit-privgen" class="form-control" placeholder="Laissez vide pour illimité" value="'. $privgenerationss .'" onKeydown="chiffres(this)" /></br>
									               <div style="display:none;"> <label>ID :</label></br>
            <input type="text" name="idpackage" class="form-control"  value="'. $idpackage.'" readonly/></br></div>
			</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
					<button type="button submit" class="btn btn-primary">Sauvegarder les changements</button>
					</form>
				</div>
			</div>
		</div>
	</div>	
	  
	  ';
	  } 
  ?><hr />
  <center><i>
  <p>Crée un nouveau grade.</p>
					</i>
							</center>
    					<form action="admin-manage" method="POST">
<input type="text" name="name" class="form-control" placeholder="nom" style="margin-bottom: 5px;" required>
<input type="text" name="price" class="form-control" placeholder="prix" style="margin-bottom: 5px;" required>
<input type="text" name="accounts" onKeydown="chiffres(this)" class="form-control" placeholder="max de comptes par jour(Laissez vide pour illimité)" style="margin-bottom: 5px;">
<select name="generator" class="form-control" style="margin-bottom: 5px;" required>
<option value="all">Tous les générateurs</option>
<?php 
$accountsquery = mysqli_query($con, "SELECT * FROM `generators`") or die(mysqli_error($con));
while($row = mysqli_fetch_assoc($accountsquery)){

echo '
<option value="'.$row["name"].'"> '.$row["name"] .'</option>
';
} ?>
</select>
<select name="colorpackage" class="form-control" style="margin-bottom: 5px;" required>
<option value="">Couleur</option>
<option value="orange">Orange</option>
<option value="red">Rouge</option>
<option value="normal">Violet</option>
</select>
<select name="length" class="form-control" style="margin-bottom: 5px;" required>
<option value="Lifetime">A vie</option>
<option value="1 Day">1 Jour</option>
<option value="3 Days">3 Jours</option>
<option value="1 Week">1 Semaine</option>
<option value="1 Month">1 Mois</option>
<option value="2 Months">2 Mois</option>
<option value="3 Months">3 Mois</option>
<option value="4 Months">4 Mois</option>
<option value="5 Months">5 Mois</option>
<option value="6 Months">6 Mois</option>
<option value="7 Months">7 Mois</option>
<option value="8 Months">8 Mois</option>
<option value="9 Months">9 Mois</option>
<option value="10 Months">10 Mois</option>
<option value="11 Months">11 Mois</option>
<option value="12 Months">12 Mois</option>
</select>



<select name="haspriv" id="colorselector" class="form-control" style="margin-bottom: 5px;" required>
<option value="">Possède le générateur privé?</option>
<option value="no">Non</option>
<option value="yes">Oui</option>
</select>
<div id="yes" class="colors yes" style="display: none;">
<input type="text" name="privgenerations" class="form-control" placeholder="Combien de générations privées? (vide = illimité)" style="margin-bottom: 5px;">
</div>




<button type="submit" class="btn btn-blue btn-large btn-block">Ajouter un abonnement</button>
</form>
  </div>
  </div>
				</div>
				<div class="col-lg-3">
								<div class="panel panel-danger" data-collapsed="0">
					
					<!-- panel head -->
					<div class="panel-heading" >
						<div class="panel-title" style="font-color:white;">Gérer les paramètres</div>
						
						<div class="panel-options">
							<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
						</div>
					</div>
					
					<!-- panel body -->
					<div class="panel-body">
            <div class="container col-md-12">
            <form method="POST" action="admin-manage"/>
            <label>Favicon:</label></br>
            <input type="text" name="favicon" class="form-control"  value="<?php echo $favicone;?>" required/></br>
            <label>Nom du site:</label></br>
            <input type="text" name="website" class="form-control"  value="<?php echo $website;?>" required/></br>
			<label>Paypal:</label></br>
            <input type="text" name="paypal" class="form-control"  placeholder="***@**.**" value="<?php echo $paypal;?>" required/></br>
			<label>Email personnel:</label></br>
            <input type="text" name="email" class="form-control"  value="<?php echo $emaill;?>" required/></br>
			<label>Valeur:</label></br>
			<select name="value" class="form-control" style="margin-bottom: 5px;" required>
			<option value="<?php echo $value1; ?>"><?php echo $value1; ?></option>
			<option value = "<?php echo $value2; ?>"><?php echo $value2; ?></option>
			</select>
            <label>Bitcoin:</label></br>
            <input type="text" name="bitcoin" class="form-control"  placeholder="Leave empty" value="<?php echo $bitcoin;?>" disabled/></br>
            <button class="btn btn-red btn-large btn-block">Mettre à jour</button>
            </form>
            </div>
                    </div>
  </div>
 
				
			</div>
			<div class="col-md-12">
				<div class="panel panel-success" data-collapsed="0">
					
					<!-- panel head -->
					<div class="panel-heading" >
						<div class="panel-title" style="font-color:white;">Gérer les nouveautés</div>
						
						<div class="panel-options">
							<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
						</div>
					</div>
					
					
					
					<!-- panel body -->
					<div class="panel-body">
					<div class="col-md-6">
    <form action="admin-manage" method="POST">
	<label>Titre:</label></br>
<input type="text" name="title" class="form-control" style="margin-bottom: 5px;" required>
<label>Message:</label></br>
<textarea type="text" name="message" class="form-control" placeholder="Ecrivez ici..." rows="3" style="margin-bottom: 5px;" required></textarea>
<label>Auteur:</label></br>
<input type="text" name="writer" class="form-control" style="margin-bottom: 5px;" required>
<label>Couleur:</label></br>
<select name="color" class="form-control" style="margin-bottom: 5px;" required>
<option value="red">Rouge </option>
<option value="white">Blanc </option>
<option value="yellow">Jaune </option>
<option value="blue">Bleu </option>
<option value="green">Vert </option>
</select></br>
<button type="submit" class="btn btn-success btn-large btn-block">Ajouter la nouveauté</button>
</form>
<hr />
</div>
  <div class="col-md-6">
<br /> <?php
		$result3 = mysqli_query($con, "SELECT * FROM `news` ORDER BY datetime DESC") or die(mysqli_error($con));
while($row = mysqli_fetch_array($result3)){
$idnew = $row['id'];
$title = $row['title'];
$message = $row['message'];
$hour = $row['hour'];
$datee = $row['date'];
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
		 echo'
		 
		 
		 
					<ul class="cbp_tmtimeline">
			
                 <li>
				<time class="cbp_tmtime" datetime="2015-11-03T13:22"><span>'.$hour.'</span> </time>
				
				<div class="'.$div.'">
					<i class="entypo-lamp"></i>
				</div>
				
				<div class="cbp_tmlabel">
				
				<a href="admin-manage?deletenew='.$idnew.'" class="btn btn-sm btn-default pull-right" data-rel="collapse"><i class="entypo-cancel"></i></a>
				<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-'.$idnew.'" class="btn btn-sm btn-default pull-right" data-rel="collapse"><i class="entypo-cog"></i></a>
					<h2><a href="#">'.$title.'</a></h2>
					<p>'.$message.' | <strong>'.$writer.'</strong></p>
				</div>
			</li>
';
echo'

<div class="modal fade" id="sample-modal-dialog-'.$idnew.'">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Configurer la nouveauté n°'.$idnew . '</h4>
				</div>
				
				<div class="modal-body">
				<form action="admin-manage" method="POST">
                            <label>Titre :</label></br>
            <input type="text" name="edit-title" class="form-control"  value="'. $title .'" required/></br>
			                <label>Message :</label></br>
            <input type="text" name="edit-message" class="form-control"  value="'. $message . '" required/></br>
			                <label>Auteur :</label></br>
            <input type="text" name="edit-writer" class="form-control"  value="'. $writer.'" required/></br>
						               <div style="display:none;"> <label>ID :</label></br>
            <input type="text" name="idnews" class="form-control"  value="'. $idnew.'" readonly/></br></div>
			</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
					<button type="button submit" class="btn btn-primary">Sauvegarder les changements</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	';
	}		
	?>		
		</ul>
			</div>		
			</div>	
				</div>
				
				</div>
				
				</div>
				
							<center><h3>Template made by <a href="https://www.twitter.com/H2M_Dev" color='grey'>H2M_Dev</a> </h3>
			<b><h5> V0.10 </h5></b>
			</center>	
				
				
<?php include '../include/footer.php'; ?>
	</div>

<script>
$(function() {
  $('#colorselector').change(function(){
    $('.colors').hide();
    $('#' + $(this).val()).show();
  });
});
</script>



	<!-- Bottom scripts (common) -->
	<script src="../assets/js/gsap/TweenMax.min.js"></script>
	<script src="../assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="../assets/js/bootstrap.js"></script>
	<script src="../assets/js/joinable.js"></script>
	<script src="../assets/js/resizeable.js"></script>
	<script src="../assets/js/neon-api.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="../assets/js/jquery.inputmask.bundle.js"></script>
	<script src="../assets/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="../assets/js/neon-demo.js"></script>

</body>
</html>