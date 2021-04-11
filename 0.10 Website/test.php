<?php
$timestamp = time();

$timestamp_add1 = strtotime('+1 day', $timestamp);
$timestamp_1 =  time() + 24*60*60;

echo $timestamp_add1."</br>";
echo $timestamp."</br>";
echo $timestamp_1."</br>";
?>