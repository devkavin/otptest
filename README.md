<!-- This is a simple tutorial on how to send a Verification mail with phpMyAdmin using PHPMailer.


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
> Set the autoloader path to the location of the generated autoload.php in send.php, you can find this file in "*projectpath*/vendor/".  -->



[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![LinkedIn][linkedin-shield]][linkedin-url]


# Send OTP through SMTP Using PHPMailer

## Description

This is a simple tutorial on how to send a Verification mail with phpMyAdmin using PHPMailer through gmail.

If you haven't setup your gmail account to send OTP mail. refer to the [Help section](#help)

# Getting Started

## Dependencies

* [Composer](https://getcomposer.org/download/)
* XAMPP (Preconfigured to open localhost files)

## Setting up Composer

* Download the [Composer](https://getcomposer.org/download/) Setup.
* Run the default setup and make sure to enter the correct path to your php.exe file in the "/xampp/php" folder from directory you've installed xampp to.
* Once the Setup is complete, you should be able to check the composer version using a Windows Terminal or Command Prompt.

```
composer --version
```
<div>
<img src=".\images\readme\cmp1.png" width="auto" height="auto" style="border: 1px solid; border-radius: 10px;">
</div>

* If you're not getting the composer version on your terminal, restart your machine.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Setting up SMTP in XAMPP

1. First, locate your XAMPP's <b>php.ini</b> file and open it with a text editor such as notepad++, sublime text or VSCode. 
2. In your text editor find the mail configuration by searching it using "[mail function]". Then, follow the configuration shown in the image below.

<div>
<img src=".\images\readme\phpini1.png" width="auto" height="auto" style="border: 1px solid; border-radius: 10px;">
</div>

 Note that <b>"sendmail_from = "</b> should have the email address that you want to send the OTP from.

3. Next we'll edit the XAMPP's <b>sendmail</b> configuration. Locate and open the sendmail.ini file in your text editor. Then, follow the configuration shown in the image below.

<div>
<img src=".\images\readme\sendmailini1.png" width="auto" height="auto" style="border: 1px solid; border-radius: 10px;">
</div>

* <b>Note:</b> Use your gmail credential of the account you want use to send mail.

<p align="right">(<a href="#readme-top">back to top</a>)</p>


# Create the Database

1. In your browser, browse the XAMPP's PHPMyAdmin [http://localhost/phpmyadmin] and create a new database named otptest.
   
2. Open the database and navigate the page to the <b>SQL Tab</b> and paste the following mysql script:

```
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
```

<p align="right">(<a href="#readme-top">back to top</a>)</p>

# Executing program

## Fork before testing!

  1. Click on the "Fork" button in the top-right corner of the page.

  2. Go to your forked repository on GitHub (it should be at https://github.com/{your-username}/otptest).
  
  3. Click on the green "Code" button and copy the HTTPS or SSH URL.

  4. Open a new window on VSCode and click <b>Clone Git Repository</b> then paste the copied link. Alternately you can open a terminal and use the following git clone command:

```
git clone https://github.com/{your-username}/otptest.git
```

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Send the OTP

### Import Composer

   1. Open the terminal and run the following command.

```
composer require phpmailer/phpmailer
```
   2. Copy the path to the <autoload.php> file in the generated "/vendor" folder.
   
   3. Navigate to send.php and paste the path as shown in the image below.

<div>
<img src=".\images\readme\autoloadimport1.png" width="auto" height="auto" style="border: 1px solid; border-radius: 10px;">
</div>

* Your Path should look like its on the image below:

<div>
<img src=".\images\readme\autoloadimport2.png" width="auto" height="auto" style="border: 1px solid; border-radius: 10px;">
</div>

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Create Config

  1. Create a new <b>config.php</b>
  
  2. Copy the following code into it. 

```
<?php
define('SMTP_Username', 'yourSMTPemail@gmail.com');
define('SMTP_Password', 'yourSMTPpassword');
?>
```
* <b>Note:</b> 'yourSMTPemail@gmail.com' <i>and</i> 'yourSMTPpassword' <i>should be the email and password that you've set up on your gmail account that you want to send the OTP from.</i>


* If you're having trouble setting up your gmail account to send OTP, Refer to the [Help section](#help).

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Lets send the OTP code!

1. Run XAMPP and start the Apache and MySQL servers.

2. On a browser of your choice, navigate to [http://localhost/otptest/index.php](http://localhost/otptest/index.php)

3. Enter any text into the <b>Test Info</b> box. (Additional Text button to keep track of the test mail)

4. Fill in your name and Email then click send. You should receive an email with the OTP code.


<div>
<img src=".\images\readme\indexpage1.png" width="auto" height="auto" style="border: 1px solid; border-radius: 10px;">
</div>

* This sample code auto generates the OTP and stores it in the database.

5. Verify the OTP

<div>
<img src=".\images\readme\verifyotp1.png" width="auto" height="auto" style="border: 1px solid; border-radius: 10px;">
</div>

* If you followed all the steps right, you should see the dashboard page.

<div>
<img src=".\images\readme\dashboard1.png" width="auto" height="auto" style="border: 1px solid; border-radius: 10px;">
</div>

<p align="right">(<a href="#readme-top">back to top</a>)</p>

# Help

## Gmail and SMTP

Google has removed the less secure apps option as of May 30th, 2022, and it is no longer possible to turn it on. To use Google's SMTP server, you have to enable 2-factor authentication and create an app password to use instead of your true password in the code.

Follow these steps to enable 2-factor authentication (<i>2 Step verification</i>) and create an app password:

1. Go to your Google Account settings (https://myaccount.google.com/) and click on <b>"Security"</b> in the left sidebar.

2. Scroll down to <b>"Signing in to Google"</b> and click on <b>"2-Step Verification."</b>

3. Follow the prompts to enable 2-step verification for your Google account. This will require you to enter a code from your phone in addition to your password when signing in to Google.

4. Once 2-step verification is enabled, scroll down to the "App passwords" section and click on <b>"Generate new app password."</b>

<div>
<img src=".\images\readme\signingin1.png" width="auto" height="auto" style="border: 1px solid; border-radius: 10px;">
</div>

5. Choose <b>"Mail"</b> as the app and select the device or application that you'll be using to send emails (e.g. <b>"Windows Computer"</b> or <b>"PHPMailer"</b>).
6. Click on <b>"Generate"</b> to generate a new app password. Copy this password and save it in a secure location.

Any advise for common problems or issues.
```
command to run if program contains helper info
```

# Contact

devkavin - [@devkavinhq](https://twitter.com/devkavinhq)

<!-- [![Twitter](https://img.shields.io/twitter/url/https/twitter.com/devkavinhq.svg?style=social&label=Follow%20%40devkavinhq)](https://twitter.com/devkavinhq) -->

[![Twitter Follow](https://img.shields.io/twitter/follow/devkavinhq?style=social)](https://twitter.com/devkavinhq)

<p align="right">(<a href="#readme-top">back to top</a>)</p>

# Version History

* 0.1
    * Initial Release

<p align="right">(<a href="#readme-top">back to top</a>)</p>


<!-- MARKDOWN Links -->
[contributors-shield]: https://img.shields.io/github/contributors/devkavin/otptest.svg?style=for-the-badge
[contributors-url]: https://github.com/devkavin/otptest/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/devkavin/otptest.svg?style=for-the-badge
[forks-url]: https://github.com/devkavin/otptest/network/members
[stars-shield]: https://img.shields.io/github/stars/devkavin/otptest.svg?style=for-the-badge
[stars-url]: https://github.com/devkavin/otptest/stargazers
[issues-shield]: https://img.shields.io/github/issues/devkavin/otptest.svg?style=for-the-badge
[issues-url]: https://github.com/devkavin/otptest/issues
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://www.linkedin.com/in/kavindra-senanayake