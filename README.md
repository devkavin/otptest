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







# Send OTP through SMTP Using PHPMailer

## Description

This is a simple tutorial on how to send a Verification mail with phpMyAdmin using PHPMailer.

## Getting Started

### Dependencies

* [Composer](https://getcomposer.org/download/)
* XAMPP (Preconfigured to open localhost files)

### Setting up Composer

* Download the [Composer](https://getcomposer.org/download/) Setup.
* Run the default setup and make sure to enter the correct path to your php.exe file in the "/xampp/php" folder from directory you've installed xampp to.
* Once the Setup is complete, you should be able to check the composer version using a Windows Terminal or Command Prompt.

```
composer --version
```
<div>
<img src="\images\readme\cmp1.png" width="auto" height="auto">
</div>

* If you're not getting the composer verion on your terminal, restart your machine.

### Setting up SMPT in XAMPP

* Go to "your directory\xampp\php\" and open the php.ini file.


### Executing program

* How to run the program
* Step-by-step bullets
```
code blocks for commands
```

## Help

Any advise for common problems or issues.
```
command to run if program contains helper info
```

## Authors

Contributors names and contact info

ex. Dominique Pizzie  
ex. [@DomPizzie](https://twitter.com/dompizzie)

## Version History

* 0.2
    * Various bug fixes and optimizations
    * See [commit change]() or See [release history]()
* 0.1
    * Initial Release

## License

This project is licensed under the [NAME HERE] License - see the LICENSE.md file for details

## Acknowledgments

Inspiration, code snippets, etc.
* [awesome-readme](https://github.com/matiassingers/awesome-readme)
* [PurpleBooth](https://gist.github.com/PurpleBooth/109311bb0361f32d87a2)
* [dbader](https://github.com/dbader/readme-template)
* [zenorocha](https://gist.github.com/zenorocha/4526327)
* [fvcproductions](https://gist.github.com/fvcproductions/1bfc2d4aecb01a834b46)