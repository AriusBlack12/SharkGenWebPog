<?php

if (!isset($_SESSION)) { session_start(); }

if (!isset($_SESSION['username'])) {
echo '
<script language="javascript">
    window.location.href = "login.php"
</script>
';
exit();
}

include '../include/settings.php';
include'../connection.php';

$username = mb_strtolower($_SESSION['username']);


$site = mysqli_query($con, "SELECT * FROM `settings`") or die(mysqli_error($con));
while($row = mysqli_fetch_array($site)){
$website = $row['website'];
$favicon = $row['favicon'];
$emaillll = $row['email'];
}

if (isset($_POST['message']) & isset($_POST['subject']) & isset($_SESSION['username'])) {
	$characts  = '1234567890'; 
	$code_aleatoire      = ''; 
	for($i=10;$i < 15;$i++)    //10 est le nombre de caractères
	{ 
        $code_aleatoire .= md5(substr($characts,rand()%(strlen($characts)),2)); 
	}
$ip = mysqli_real_escape_string($con, htmlspecialchars($_SERVER['REMOTE_ADDR']));
$subject = mysqli_real_escape_string($con, $_POST['subject']);
$message = mysqli_real_escape_string($con, $_POST['message']);
$date = date("d-m-Y");
$datetime = date("Y-m-d H:i:s");
$hour = date("H:i");
$sitee = mysqli_query($con, "SELECT * FROM `support` WHERE `idticket` = '$code_aleatoire'") or die(mysqli_error($con));
if(mysqli_num_rows($sitee) < 1){
mysqli_query($con, "INSERT INTO `ticket` (`idticket`, `date`, `subject`, `username`, `isread`)
 VALUES 
('$code_aleatoire', '$date', '$subject', '$username', '1')") or die(mysqli_error($con));
mysqli_query($con, "INSERT INTO `support` (`idticket`, `from`, `to`, `subject`, `message`, `datetime`, `hour`, `date`) VALUES ('$code_aleatoire', '$username', 'admin', '$subject', '$message', '$datetime', '$hour', '$date')") or die(mysqli_error($con));


        $email = "$emaillll";
        $suujet = "$website : Support";
        $contenu_message = "Hi Administrator,
A support ticket has been opened,
Please visit the website
Topic = ". $subject ."
Message = " .$message. "
Request sent by ". $ip;
        $adresse_exp = "From: support@ ".$website. ".com";
		$succes = mail(html_entity_decode($email), $suujet, $contenu_message, $adresse_exp);
		header("Location: support");
		die();
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
	<script type="text/javascript">
 function MaxLengthTextarea(objettextarea,maxlength){
  if (objettextarea.value.length > maxlength) {
    objettextarea.value = objettextarea.value.substring(0, maxlength);
    alert('Limite de charactères detecté : '+maxlength+' characters max!');
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
						<a href="index"><i class="fa-home"></i>Inicio</a>
					</li>
						<li class="active">
		
									<strong>Soporte</strong>
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
        <section id="main">
        
        
            <section id="content">
                <div class="container">
                    <div class="block-header">
                        <h2>Soporte</h2>

                    
                    </div>
                

                    <div class="card">
                        <div class="card-header">
                                            <div class="row">
											<div style="display:flex">
                    <div class="col-md-6 well">
                        <legend>Tus Tickets</legend>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="home">
        <div id="menu">
                    <div class="list-group">
<?php
$supportquery = mysqli_query($con, "SELECT * FROM `ticket` WHERE `username` = '$username' ORDER BY `date`");
while ($row = mysqli_fetch_assoc($supportquery)) {
echo '
    <a href="ticket?id='. $row['idticket'] .'"  class="list-group-item" data-target="#message'.$row['id'].'" data-parent="#menu">
        <span class="name" style="min-width: 120px;display: inline-block;">'.htmlspecialchars($_SESSION["username"]).'</span> <span class="">'.htmlspecialchars($row["subject"]).'</span>
          <span class="badge">'.$row["date"].'</span> 
        </span>
    </a>
';}
?>
                    </div>
        </div>
        </div>
    </div>

                        </div>
						</div></br>
		<div style="display:flex;">
            <div class="col-md-6 well">
                       <legend>Crear un Ticket</legend>
            <form method="POST"/>
            <label>Titulo:</label></br>
            <div class="fg-line">
            <input type="text" name="subject" class="form-control input-sm" placeholder="Escribe un Asunto" maxlength="20" onkeyup="javascript:MaxLengthTextarea(this, 20);" required>
            </div></br>
            <label>Mensaje:</label></br>
			
            <textarea name="message" class="form-control" rows="8" placeholder="Escribe tu problema" ></textarea></br>

            <button class="btn btn-blue btn-large btn-block ">Enviar</button>
            </form>
                    </div>
					</div>
                        </div>
                    </div>
                
                    </div>
            </section>
        </section>
				</div><!-- ./padding-md -->
			</div><!-- /main-container -->
		</div><!-- /wrapper -->
      </figure>
      <!-- ################################################################################################ -->
      <!-- / main body -->
	  <?php include '../include/footer.php'; ?>
	</div>
      <div class="clear"></div>
    </main>
  </div>
</div>
		<!-- lets do some work here... -->
		<!-- Footer -->
	
	





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