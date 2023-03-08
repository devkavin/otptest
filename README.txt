This is a simple tutorial on how to send a Verification mail with phpMyAdmin using PHPMailer.


We will:

> Get the Email from the user.
> Save the Email to a Database.
> Generate an OTP
> Save the OTP to the Database
> Email the OTP to the user


Requirements:

> Composer installed
> Xampp preconfigured
> php.ini and sendmail.ini configured for SMTP, using port 465.


*IMPORTANT*

>>>>> Create a file named config.php within the main folder and define your SMTP username and password there.

<?php
define('SMTP_Username', 'yourSMTPemail@domain.com');
define('SMTP_Password', 'yourSMTPpassword');
?>

>>>>> Import Composer.

> Type "composer require phpmailer/phpmailer" in the terminal and hit enter.
> Set the autoloader path to the location of the generated autoload.php in send.php, you can find this file in "*projectpath*/vendor/". 

