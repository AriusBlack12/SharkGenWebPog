<?php

include '../include/settings.php';

if (!isset($_SESSION)) { session_start(); }

if (!isset($_SESSION['username'])) {
echo '
<script language="javascript">
    window.location.href = "../login"
</script>
';
exit();
}
		$username = htmlspecialchars($_SESSION['username']);
		
		$password = mysqli_real_escape_string($con, $_POST['password']);//password
		
		$pass_conf = mysqli_real_escape_string($con, $_POST['password_conf']);
		
		$curr_password = mysqli_real_escape_string($con, $_POST['curr_password']);
		
		$id = $_SESSION['id'];
		
		$result1 = mysqli_query($con, "SELECT * FROM `users` WHERE `username` = '$username'") or die(mysqli_error($con));
		
		$row10 = mysqli_fetch_array($result1);
		
		$pass_curr = $row10['password']; //pass


if(!(password_verify($curr_password, $pass_curr))){
echo'
<script language="JAVASCRIPT">
alert("ERROR : \n Your current password is not this !")
window.location.href = "../settings"
</script>
';
die();
}
if($password != $pass_conf){
echo'
<script language="JAVASCRIPT">
alert("ERROR : \n The passwords are not same !")
window.location.href = "../settings"
</script>
'; 
die();
}

$passs = password_hash($password, PASSWORD_BCRYPT);
mysqli_query($con,"UPDATE `users` SET `password` = '$passs' WHERE `id` = '$id'") or die(mysqli_error($con));

$_SESSION['password'] = $password;

header("Location: ../lib/logout");
?>