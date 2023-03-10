<!-- generate the otp -->
<?php
$otp = rand(100000,999999);
$_SESSION['otp'] = $otp;
?>