<?php

$url = "http://www.h2mdev.ml/";

$file = file_get_contents($url);

$version = "0.10";

if(!$file){
	
	echo'
	An Error Occured, your host is incompatible, 
	check the version 
	<a href="https://www.codester.com/items/4880/symphonies-account-generator-template-php-script?ref=H2MDev">here</a>
	</b>Your Version: '.$version;
	die();
	
}

if($file !== $version){
	
	echo 'A new version is available. Click <a href="https://www.codester.com/items/4880/symphonies-account-generator-template-php-script?ref=H2MDev">here </a>to download it';
	
}else{
	
	echo"You have the latest version.";
	
}


?>