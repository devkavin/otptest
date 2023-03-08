<!-- Landing page for the user after getting verified. -->
<!-- This page is not accessible unless the user is verified. -->

<!-- Import styles -->
<link rel="stylesheet" type="text/css" href="style.css">

<?php

// get the username from the session
session_start();
if (!isset($_SESSION['verified'])) {
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Verified</title>
</head>

<body>
    <div class="dashboard-wrap">
    <div class="welcome">
        <!-- Say Welcome followed with their name -->
        <h1>Welcome</h1>
    </div>

        <span class="verified">
            <h1>Verified</h1>
        </span>
        <!-- Logout button -->
        <div class="logout">
        <form class="" action="send.php" method="post">
            <button type="submit" name="logout">Logout</button>
        </form>
        </div>
    </div>

</body>

</html>