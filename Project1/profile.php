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
        echo "You are logged in as: " . $_SESSION['username'] . ".<br><br>";
        ?>
        This is your profile
        
        <input type="button" onclick="location.href='logout.php';" value="Logout" />
        <input type="button" onclick="location.href='index.php';" value="Home" />
    </body>
</html>