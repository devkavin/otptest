<?php
include 'connection.php';
include 'generateotp.php';
include 'config.php';
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'Paste the path to the vendor folder here/vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


// user the SMTP Username and Password from config.php
$SMTP_user = SMTP_Username;
$SMTP_pass = SMTP_Password;


// Get Test info from index.php
if (isset($_POST['info'])) {
    $info = $_POST['info'];
}



// Send name, Email and OTP to the database
if (isset($_POST['name']) && isset($_POST['email'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $otp = $_SESSION['otp'];
    // set session verified to false
    $_SESSION['verified'] = false;
    $sql = "INSERT INTO `user` (`name`, `email`, `otp`) VALUES ('$name', '$email', '$otp')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        try {
            //Server settings
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $SMTP_user;                             //SMTP username
            $mail->Password   = $SMTP_pass;                             //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('kub7.otp@gmail.com');                       //Set the sender
            $mail->addAddress($_POST['email']);                         //Add a recipient


            //Content
            $mail->isHTML(true);                                        //Set email format to HTML
            $mail->Subject = "This is your verification code";
            $mail->Body    = "Hey " . $_POST['name'] . ", your OTP is " . $_SESSION['otp'] . ". " . $_POST['info'] . ".";


            $mail->send();
            header('location: verify.php');
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Data not inserted, message not sent";
    }
}


// user click on verify button
if (isset($_POST['otp'])) {
    $otp = $_POST['otp'];
    $sql = "SELECT * FROM `user` WHERE `otp` = '$otp'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            // If the OTP is correct, start the session and redirect to the dashboard, set the database otp to 0
            $sql = "UPDATE `user` SET `otp` = '0' WHERE `otp` = '$otp'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                session_start();
                // if otp is 0, the user is verified
                $_SESSION['verified'] = true;
                $_SESSION['username'] = $_POST['name'];
                // Redirect to the dashboard
                header('location: dashboard.php');
            } else {
                echo "Error";

            }
        } else {
            // Alert the user that the OTP is wrong
            echo "<script>alert('Wrong OTP')</script>";
        }
    } else {
        echo "Error";
    }
}

// user click on logout button
if (isset($_POST['logout'])) {
    session_start();
    session_destroy();
    header('location: index.php');
}

?>