<!-- Page to take the OTP and verify the User -->

<!-- Import styles -->
<link rel="stylesheet" type="text/css" href="style.css">


<?php
session_start();
// If the user is verified, redirect to the dashboard
// if (isset($_SESSION['verified'])) {
//     if ($_SESSION['verified'] == true) {
//         header('location: dashboard.php?verified_user');
//     }
// }
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
            <div class="button-wrap">
            <button type="submit" name="button">Verify</button>
            </div>
        </form>
        </div>
    </body>
</html>

