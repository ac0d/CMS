<?php
require_once('connect.php');
if (isset($_POST) & !empty($_POST)) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = md5($_POST['password']);
    $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $zip = mysqli_real_escape_string($connection, $_POST['zip']);
    $salary = mysqli_real_escape_string($connection, $_POST['salary']);
    $info = mysqli_real_escape_string($connection, $_POST['info']);
    $ihave = mysqli_real_escape_string($connection, $_POST['ihave']);
    $iwant = mysqli_real_escape_string($connection, $_POST['iwant']);
    
    $sql = "INSERT INTO `users` (username, password, email, firstname, lastname, zip, salary, info, ihave, iwant) 
    VALUES ('$username', '$password', '$email', '$firstname', '$lastname', '$zip', '$salary', '$info', '$ihave', '$iwant')";
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
            Email:<br>
            <input type="email" name="email"><br>
            First name:<br>
            <input type="text" name="firstname"><br>
            Last name:<br>
            <input type="text" name="lastname"><br>
            Postal Code:<br>
            <input type="text" name="zip"><br>
            Årslön:<br>
            <input type="text" name="salary">€<br>
			About You:<br>
			<input type="text" name="info"><br>
			I have a:<br>
			<input type="radio" name="ihave" value="benis">Benis<br>
            <input type="radio" name="ihave" value="bussy">Bussy<br>
            <input type="radio" name="ihave" value="both">Both<br>
            I want a:<br>
			<input type="radio" name="iwant" value="benis">Benis<br>
            <input type="radio" name="iwant" value="bussy">Bussy<br>
            <input type="radio" name="iwant" value="both">Both<br>
            <button type="submit">Register</button>
            <input type="button" onclick="location.href='index.php';" value="Login" />
        </form>
    </body>
</html>