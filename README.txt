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


*IMPORTANT*

>>>>> Create a file named config.php within the main folder and define your SMTP username and password there.

<?php
define('SMTP_Username', 'yourSMTPemail@domain.com');
define('SMTP_Password', 'yourSMTPpassword');
?>

>>>>> Don't forget to import Composer.

> Type composer require phpmailer/phpmailer in the terminal and hit enter.
> Set the autoloader path to the location of the generated autoload.php in send.php, you can find this file in *projectpath*/vendor/. 


I am assuming you have already configured your php.ini and sendmail.ini files to send mail through SMTP.

>>>>> The SMTP port we've used is port 465.
