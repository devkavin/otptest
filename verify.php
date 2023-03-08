<!-- Page to take the OTP and verify the User -->

<!-- Import styles -->
<link rel="stylesheet" type="text/css" href="style.css">


<?php
session_start();
include 'controller.php';
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Verify</title>
    </head>
    <body>
        <div class="verify-wrap">
        <form class="" action="send.php" method="post">
            <!-- Alert box that says if the user is verified or not -->
            <?php
            if (isset($_SESSION['verified'])) {
                if ($_SESSION['verified'] == true) {
                    echo "<script>alert('Verified')</script>";
                } else {
                    echo "<script>alert('Not Verified')</script>";
                }
            }
            ?>
            <input type="text" name="otp" value="" placeholder="Enter OTP"><br>
            <button type="submit" name="button">Verify</button>
        </form>
        </div>
    </body>
</html>

