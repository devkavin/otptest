<!-- generate the otp -->
<?php
session_start();
$otp = rand(100000,999999);
$_SESSION['otp'] = $otp;
?>