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
if(isset($_GET['id'])){
$color = mysqli_real_escape_string($con, $_GET['id']);
$username = $_SESSION['username'];

if($_GET['id'] == "normal"){
include 'include/settings.php';
mysqli_query($con, "UPDATE `users` SET `skin` = '$color' WHERE username = '$username'");
unset($_SESSION['skin']);
$_SESSION['skin'] = 'normal';
echo 'Loading...';
echo'
<script language="JAVASCRIPT">
history.go(-1);
alert("Refresh the page to make it work.")
</script>
<noscript>
<meta http-equiv="refresh" content="0; url=https://arrowalts.fr/index">
</noscript>
';
die;
}


if($_GET['id'] == "normal" or $_GET['id'] == "black" or $_GET['id'] == "white" or $_GET['id'] == "purple" or
 $_GET['id'] == "cafe" or $_GET['id'] == "red" or $_GET['id'] == "green" or $_GET['id'] == "yellow" or
  $_GET['id'] == "blue" or $_GET['id'] == "facebook"){
echo 'Loading...';
$_SESSION['skin'] = $color;
include 'include/settings.php';
mysqli_query($con, "UPDATE `users` SET `skin` = '$color'");
echo'
<script language="JAVASCRIPT">
history.go(-1);
alert("Refresh the page to make it work.")
</script>
<noscript>
<meta http-equiv="refresh" content="0; url=https://arrowalts.fr/index">
</noscript>
';
die();
}else{
echo 'Skin not found</br>Cancellation in progress</br>Loading...';
echo'
<script language="JAVASCRIPT">
history.go(-1);
alert("Refresh the page to make it work.")
</script>
<noscript>
<meta http-equiv="refresh" content="0; url=https://arrowalts.fr/index">
</noscript>
';
}
}else{
echo 'Skin not found</br>Cancellation in progress</br>Loading...';
echo'
<script language="JAVASCRIPT">
history.go(-1);
alert("Refresh the page to make it work.")
</script>
<noscript>
<meta http-equiv="refresh" content="0; url=https://arrowalts.fr/index">
</noscript>
';
}
?>
