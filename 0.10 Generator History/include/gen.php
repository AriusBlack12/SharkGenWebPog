<?php 

include '../include/settings.php';   
if (!isset($_SESSION)) { 
	session_start(); }
	if (!isset($_SESSION['username'])) {
	header('Location: ../login');	
	exit();
	}
			$pos = strpos($_SERVER['HTTP_REFERER'],getenv('HTTP_HOST'));
				if($pos === false){  
				header('Location: ../purchase');
					die(); 
				}
	
$usernamee = $_SESSION['username']; 
$generator = mysqli_real_escape_string($con, $_GET['generator']);
$username = mysqli_real_escape_string($con, $_GET['username']);
$date = date("Y-m-d");

			if($username !== $usernamee){    
				header('Location: ../purchase');
					die();  
			}
  
    if($_SESSION['rank'] < 5){
$result = mysqli_query($con, "SELECT * FROM `subscriptions` WHERE `username` = '$usernamee' AND `active` = '1' AND `expire` >= '$date'") or die(mysqli_error($con));
if (mysqli_num_rows($result) < 1) 
{	$subs = "0";
}else{
    $subs = "1"  ;
    }
	if($subs == "0" && $_SESSION['rank'] !== "5"){
				header('Location: ../purchase');
					die(); 	
	}

while($row = mysqli_fetch_array($result)){
	$package = $row['package'];
}

$result = mysqli_query($con, "SELECT * FROM `package` WHERE `id` = '$package'") or die(mysqli_error($con));
while($row = mysqli_fetch_array($result)){
	$accounts = $row['generations'];
}

if($accounts != "0" && $accounts != "" && $_SESSION['rank'] != "5"){
	$result = mysqli_query($con, "SELECT * FROM `statistics` WHERE `username` = '$username' AND `date` = '$date'") or die(mysqli_error($con));
	while($row = mysqli_fetch_assoc($result)){
		if($row['generated'] >= $accounts){
			exit("Generated max per day");
		}
	}
}
}
$result = mysqli_query($con, "SELECT * FROM `$generator` ORDER BY RAND() LIMIT 1") or die(mysqli_error($con));
if(mysqli_num_rows($result) < 1){
	exit("0 Accounts in stock");
}
while($row = mysqli_fetch_array($result)){
	$alt = $row['alt'];
	echo $alt;
}
$historygen = mysqli_query($con, "SELECT * FROM generators WHERE id = $generator ");
while($row = mysqli_fetch_array($historygen)){
	$accname = $row['name'];
$ip = $_SERVER['REMOTE_ADDR'];
$dateforgen = time();
mysqli_query($con, "INSERT INTO `history` (`username`, `ip`, `accname`, `history`, `privorshare`, `date`) VALUES ('$username', '$ip', '$accname', '$alt' , 'Premium', '$dateforgen')") or die(mysqli_error($con));
	}

$genresult = mysqli_query($con, "SELECT * FROM `settings`") or die(mysqli_error($con));
while($row = mysqli_fetch_array($genresult)){
$generateeed = $row['generations'] + "1";
mysqli_query($con, "UPDATE `settings` SET `generations` = '$generateeed'") or die(mysqli_error($con));
}
$genresulta = mysqli_query($con, "SELECT * FROM `users` WHERE `username` = '$username'") or die(mysqli_error($con));
while($row = mysqli_fetch_array($genresulta)){
$generatid = $row['generations'] + "1";
mysqli_query($con, "UPDATE `users` SET `generations` = '$generatid' WHERE `username` = '$username'") or die(mysqli_error($con));
}
$date = date("Y-m-d");

$result = mysqli_query($con, "SELECT * FROM `statistics` WHERE `username` = '$username' AND `date` = '$date'") or die(mysqli_error($con));
if(mysqli_num_rows($result) < 1){
	mysqli_query($con, "INSERT INTO `statistics` (`username`, `generated`, `date`) VALUES ('$username', '1', DATE('$date'))") or die(mysqli_error($con));
}else{
	while($row = mysqli_fetch_array($result)){
		$generated = $row['generated'] + "1";
		mysqli_query($con, "UPDATE `statistics` SET `generated` = '$generated' WHERE `username` = '$username' AND `date` = '$date'") or die(mysqli_error($con));
	}
}
?>