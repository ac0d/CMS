<?php
session_start();
require_once('connect.php');
if (isset($_POST) & !empty($_POST)) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM `users` WHERE username='$username' AND password='$password'";
    $result = mysqli_query($connection, $sql);
    $count = mysqli_num_rows($result);
    if($count == 1){
        $_SESSION['username'] = $username;
    }else{
        $fmsg = "Invalid username/password";
    }
}
if(isset($_SESSION['username'])){
    $smsg = "User already logged in";
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Get Benis</title>
    </head>
    <body>
        <?php if(isset($smsg)){ ?><?php echo $smsg; ?><?php } ?><br>
        <?php if(isset($fmsg)){ ?><?php echo $fmsg; ?><?php } ?><br>
        <form method="POST">
            Username:<br>
            <input type="text" name="username"><br>
            Password:<br>
            <input type="password" name="password"><br>
            <button type="submit">Login</button>
            <input type="button" onclick="location.href='register.php';" value="Register" />
        </form>
        
    </body>
</html>