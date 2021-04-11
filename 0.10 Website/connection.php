<?php
include 'include/settings.php';

$ipaddr = $_SERVER['REMOTE_ADDR'];
$time = time();
$date = date("d-m-Y");

		$retour = mysqli_query($con, "SELECT * FROM connection WHERE ip = '$ipaddr'") or die (mysqli_error($con));
		
			if(mysqli_num_rows($retour) < 1){
			
				mysqli_query($con, "INSERT INTO connection (ip, timestamp) VALUES ('$ipaddr', '$time')") or die(mysqli_error($con));
				
			}else{
			
				mysqli_query($con, "UPDATE connection SET timestamp = '$time' WHERE ip = '$ipaddr'") or die(mysqli_error($con));
				
			}
		
		$timestamp_2mn = time() - (60 * 2); // 60 = 60 seconds, 2 = 2 minutes
		
			mysqli_query($con, "DELETE FROM connection WHERE timestamp < '".$timestamp_2mn."'") or die(mysqli_error($con));
			
			$final = mysqli_query($con, "SELECT * FROM connection") or die(mysqli_error($con));
			
			$return = mysqli_num_rows($final);

			
			?>