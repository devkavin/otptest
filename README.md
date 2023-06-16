
<div align="center">

[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![LinkedIn][linkedin-shield]][linkedin-url]

</div>

<br>

<div align="center">

# Send Verification codes through Gmail.

</div>

### Description

This is a simple tutorial on how to send a Verification mail with phpMyAdmin using PHPMailer through gmail.

If you haven't setup your gmail account to send SMTP mail. refer to the [Help section](#help).

## Getting Started

### Dependencies

* [Composer](https://getcomposer.org/download/)
* [XAMPP](https://www.apachefriends.org/download.html) (Preconfigured to open localhost files)

### Setting up Composer

1. Download the [Composer](https://getcomposer.org/download/) Setup.

2. Run the default setup and make sure to enter the correct path to your php.exe file in the "/xampp/php" folder from directory you've installed xampp to.

3. Once the Setup is complete, you should be able to check the composer version using a Windows Terminal or Command Prompt.

```sh
composer --version
```
<div>
<img src=".\images\readme\cmp1.png" width="auto" height="auto" style="border: 1px solid; border-radius: 10px;">
</div>

* If you're not getting the composer version on your terminal, restart your machine.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

### Setting up SMTP in XAMPP

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


## Create the Database

1. In your browser, browse the XAMPP's PHPMyAdmin [http://localhost/phpmyadmin] and create a new database named otptest.
   
2. Open the database and navigate the page to the <b>SQL Tab</b> and paste the following mysql script:

```sql
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
```

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Executing program

### Fork before testing!

  1. Click on the "Fork" button in the top-right corner of the page.

  2. Go to your forked repository on GitHub (it should be at https://github.com/{your-username}/otptest).
  
  3. Click on the green "Code" button and copy the HTTPS or SSH URL.

  4. Open a new window on VSCode and click <b>Clone Git Repository</b> then paste the copied link. Alternately you can open a terminal and use the following git clone command:

```sh
git clone https://github.com/{your-username}/otptest.git
```

<p align="right">(<a href="#readme-top">back to top</a>)</p>

### Send the OTP

#### Import Composer

   1. Open the terminal and run the following command.

```sh
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

### Create Config

  1. Create a new <b>config.php</b>
  
  2. Copy the following code into it. 

```php
<?php
define('SMTP_Username', 'yourSMTPemail@gmail.com');
define('SMTP_Password', 'yourSMTPpassword');
?>
```
* <b>Note:</b> 'yourSMTPemail@gmail.com' <i>and</i> 'yourSMTPpassword' <i>should be the email and password that you've set up on your gmail account that you want to send the OTP from.</i>


* If you're having trouble setting up your gmail account to send OTP, Refer to the [Help section](#help).

<p align="right">(<a href="#readme-top">back to top</a>)</p>

### Lets send the OTP code!

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

## Help

### Gmail and SMTP

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

<p align="right">(<a href="#readme-top">back to top</a>)</p>

### Composer help

#### System Requirements:
> Composer in its latest version requires PHP 7.2.5 to run. A long-term-support version (2.2.x) still offers support for PHP 5.3.2+ in case you are stuck with a legacy PHP version. A few sensitive php settings and compile flags are also required, but when using the installer you will be warned about any incompatibilities.

* If you're having issues with composer, check whether the <b>"composer\vendor\bin"</b> path has been added to the <b>Environment PATH variable</b> as shown in the image below:


<div>
<img src=".\images\readme\composerpath1.png" width="auto" height="auto" style="border: 1px solid; border-radius: 10px;">
</div>

* If you're still having issues with composer even after restarting your machine, follow these steps:

<p align="right">(<a href="#readme-top">back to top</a>)</p>

#### Manual Composer Setup

1. Go to your XAMPP's php folder (\xampp\php)

2. Create a text file in that folder and paste the following code:

```php
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```
3. Click save as, set the file type as "all files" and paste the following as the filename:

```
ComposerSetup.bat
```
4. Save the file and run it.

* This should install <b>composer</b> into your XAMPP's php folder. Next we have to add it to the Environment PATH variable.

5. Search for <b>"Environment variable"</b> (without " ") on the Windows search bar and open <b>System Properties</b>.

6. Click <b>Environment Variables...</b>, under <b>user variables</b> click <b>Path</b> and edit.

7. Click New and add the path to the <b>composer.phar</b> file from the \xampp\php folder.

* Restart your Machine and run the code below to check if it was installed properly:
```sh
composer --version
```

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Contact

<div align="center" style="font-size: 20px;">

Find me on:
<br>

[![Twitter][twitter-shield]][twitter-url]
[![Hashnode][Hashnode-shield]][Hashnode-url]
[![LinkedIn][linkedin-shield]][linkedin-url]

</div>

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Version History

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
[linkedin-shield]: https://img.shields.io/badge/linkedin-%230077B5.svg?style=for-the-badge&logo=linkedin&logoColor=white
[linkedin-url]: https://www.linkedin.com/in/kavindra-senanayake
[twitter-shield]: https://img.shields.io/badge/Twitter-%231DA1F2.svg?style=for-the-badge&logo=Twitter&logoColor=white
[twitter-url]: https://twitter.com/devkavinhq
[Hashnode-shield]: https://img.shields.io/badge/Hashnode-2962FF?style=for-the-badge&logo=hashnode 
[Hashnode-url]: https://hashnode.com/@devkavin
