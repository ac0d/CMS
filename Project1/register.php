<?php
require_once('connect.php');
if (isset($_POST) & !empty($_POST)) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = md5($_POST['password']);
    $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $zip = mysqli_real_escape_string($connection, $_POST['zip']);
    $info = mysqli_real_escape_string($connection, $_POST['info']);
    $salary = mysqli_real_escape_string($connection, $_POST['salary']);
    
    $sql = "INSERT INTO `users` (username, password, firstname, lastname, email, zip, info, salary) 
    VALUES ('$username', '$password', '$firstname', '$lastname', '$email', '$zip', '$info', '$salary',)";
    $result = mysqli_query($connection, $sql);
    if($result){
        $smsg = "User Registration Succesful";
    }else{
        $fmsg = "User Registraion Failed";
    }
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
            First name:<br>
            <input type="text" name="firstname"><br>
            Last name:<br>
            <input type="text" name="lastname"><br>
            Email:<br>
            <input type="email" name="email"><br>
            Postal Code:<br>
            <input type="text" name="zip"><br>
			About You:<br>
			<input type="text" name="info"><br>
            Årslön:<br>
            <input type="text" name="salary"><br>
            <button type="submit">Register</button>
            <input type="button" onclick="location.href='index.php';" value="Login" />
        </form>
    </body>
</html>