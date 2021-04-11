<?php
/**
 * Paypal IPN Class (Testing Only)
 *
 * @author		JREAM
 * @link		http://jream.com
 * @copyright		2011 Jesse Boyer (contact@jream.com)
 * @license		GNU General Public License 3 (http://www.gnu.org/licenses/)
 *
 * This program is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details:
 * http://www.gnu.org/licenses/
 */
 if (!isset($_SESSION)) { session_start(); }

if (!isset($_SESSION['username'])) {
echo '
<script language="javascript">
    window.location.href = "login.php"
</script>
';
exit();
}


class Paypal_IPN
{
	/** @var string $_url The paypal url to go to through cURL
	private $_url;

	/**
	* @param string $mode 'live' or 'sandbox' 
	*/
	public function __construct($mode = 'live')
	{
		if ($mode == 'live')
		$this->_url = 'https://www.paypal.com/cgi-bin/webscr';
		
		else
		$this->_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
	}

	public function run()
	{
		$postFields = 'cmd=_notify-validate';
		
		foreach($_POST as $key => $value)
		{
			$postFields .= "&$key=".urlencode($value);
		}
	
		$ch = curl_init();

		curl_setopt_array($ch, array(
			CURLOPT_URL => $this->_url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $postFields
		));
		
		$result = curl_exec($ch);
		curl_close($ch);
		
	if($result == "VERIFIED"){
	
	  $username = $_SESSION['username'];
		
	  include '../include/settings.php';
		
		$donnee = explode(" - ", $_POST['item_name']);
		
		$nameuh = $donnee[0];
		
		$test = mysqli_query($con, "SELECT * FROM `package` WHERE `name` = '$nameuh'") or die (mysqli_error($con));
		
		while($row = mysqli_fetch_array($test)){
		
			$txn_id = $_POST['txn_id'];
			
			$idpackage = $row['id'];
			
				if($row['name'] == "$nameuh" && $_POST['mc_gross'] == $row['price']){
				
					$priice = $_POST['mc_gross'];
					
					$date = date("Y-m-d");
					
						if($row['length'] == "Lifetime"){
						
							$expiretime = "Lifetime";
							
							$expires = date("Y-m-d", strtotime("+999 years", strtotime($date)));
							
						}else{
						
							$expiretime = $row['length'];
							
							$expires = date("Y-m-d", strtotime("+$expiretime", strtotime($date)));
							
							}
							
					mysqli_query($con, "INSERT INTO `subscriptions` (username, package, price, date, expire, active, txn_id) VALUES ('$username', '$idpackage', '$priice', '$date', '$expires', '1', '$txn_id')") or die (mysqli_error($con));
					
					echo '
					
						<h3>Thank You ! </br>Loading...</h3>
						<script language="JAVASCRIPT">
						window.location.href= "../index?buy-success"
						</script>
						';
						
				}else{
				
					echo '
					
					<script language="JAVASCRIPT">
					window.location.href= "../index?buy-deny"
					alert("An Error Occured")
					</script>
					
					';}
					
					}
					
	}else{
	
		echo'INVALID';}
		
			$fh = fopen('result.txt', 'w');
			
				fwrite($fh, $result . ' -- ' . $postFields);
				
					fclose($fh);
	
	}
}