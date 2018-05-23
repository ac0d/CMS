<?php
session_start();
require_once('connect.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Get Benis</title>
    </head>
    <body>
        <?php
        echo "Welcome " . $_SESSION['username'] . ".<br>"
        ?>
        This is your profile
        <input type="button" onclick="location.href='logout.php';" value="Logout" />
    </body>
</html>