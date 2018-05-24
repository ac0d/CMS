<?php
session_start();
require_once('connect.php');
?>
<!DOCTYPE HTML>  
<html>
    <head>
        <style>
            .error {color: #FF0000;}
        </style>
        <meta charset="UTF-8">
        <title>Get Benis</title>
    </head>
    <body>  
    <?php
    $usernameErr = $passwordErr = $firstnameErr = $lastnameErr = $emailErr = $zipErr = $salaryErr = $ihaveErr = $iwantErr = "";
    $username = $password = $firstname = $lastname = $email = $zip = $salary = $info = $ihave = $iwant = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["username"])){
            $usernameErr = "Username is required";
        }else{
            $username = mysqli_real_escape_string($connection, $_POST['username']);
        }
        if(empty($_POST["password"])){
            $passwordErr = "Passwrod is required";
        }else{
            $password = md5($_POST['password']);
        }
        if (empty($_POST["email"])){
            $emailErr = "Email is required";
        }else{
            $email = mysqli_real_escape_string($connection, $_POST['email']);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailErr = "Invalid email format"; 
            }
        }
        if(empty($_POST["firstname"])){
            $firstnameErr = "Firstname is required";
        }else{
            $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
        }
        if(empty($_POST["lastname"])){
            $lastnameErr = "Lastname is required";
        }else{
            $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
        }
        if(empty($_POST["zip"])){
            $zipErr = "Postal code is required";
        }else{
            $zip = mysqli_real_escape_string($connection, $_POST['zip']);
        }
        if(empty($_POST["salary"])){
            $salaryErr = "Anual salary is required";
        }else{
            $salary = $_POST['salary'];
        }
        if(empty($_POST["info"])){
            $info = "";
        }else{
            $info = mysqli_real_escape_string($connection, $_POST['info']);
        }
        if(empty($_POST["ihave"])) {
            $ihaveErr = "Gender is required";
        }else{
            $ihave = mysqli_real_escape_string($connection, $_POST['ihave']);
        }
        if(empty($_POST["iwant"])) {
            $iwantErr = "Gender is required";
        }else{
            $iwant = mysqli_real_escape_string($connection, $_POST['iwant']);
        }
        if(!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["zip"]) && !empty($_POST["salary"]) && !empty($_POST["ihave"]) && !empty($_POST["iwant"])){
            $sql = "INSERT INTO `users` (username, password, email, firstname, lastname, zip, salary, info, ihave, iwant) 
            VALUES ('$username', '$password', '$email', '$firstname', '$lastname', '$zip', '$salary', '$info', '$ihave', '$iwant')";
            $result = mysqli_query($connection, $sql);
            if($result){
                $smsg = "User Registration Succesful";
            }else{
                $fmsg = "User Registraion Failed";
            }
        }else{
            $fmsg = "User Registraion Failed";
        }
        
    }
    ?>
    <?php if(isset($smsg)){ ?><?php echo $smsg; ?><?php } ?><br>
    <?php if(isset($fmsg)){ ?><?php echo $fmsg; ?><?php } ?><br>
    <p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
      Username: <input type="text" name="username" value="<?php echo $username;?>">
      <span class="error">* <?php echo $usernameErr;?></span>
      <br><br>
      Password: <input type="password" name="password">
      <span class="error">* <?php echo $passwordErr;?></span>
      <br><br>
      E-mail: <input type="email" name="email" value="<?php echo $email;?>">
      <span class="error">* <?php echo $emailErr;?></span>
      <br><br>
      Firstname: <input type="text" name="firstname" value="<?php echo $firstname;?>">
      <span class="error">* <?php echo $firstnameErr;?></span>
      <br><br>
      Lastname: <input type="text" name="lastname" value="<?php echo $lastname;?>">
      <span class="error">* <?php echo $lastnameErr;?></span>
      <br><br>
      Postal Code: <input type="text" name="zip" value="<?php echo $zip;?>">
      <span class="error">* <?php echo $zipErr;?></span>
      <br><br>
      Anual Salary: <input type="text" name="salary" value="<?php echo $salary;?>">
      <span class="error">* <?php echo $salaryErr;?></span>
      <br><br>
      About You: <textarea name="info" rows="5" cols="40"><?php echo $info;?></textarea>
      <br><br>
      I have a:
      <input type="radio" name="ihave" <?php if (isset($ihave) && $ihave=="Benis") echo "checked";?> value="Benis">Benis
      <input type="radio" name="ihave" <?php if (isset($ihave) && $ihave=="Bussy") echo "checked";?> value="Bussy">Bussy
      <input type="radio" name="ihave" <?php if (isset($ihave) && $ihave=="Both") echo "checked";?> value="Both">Both
      <span class="error">* <?php echo $ihaveErr;?></span>
      <br><br>
      I'm looking for:
      <input type="radio" name="iwant" <?php if (isset($iwant) && $iwant=="Benis") echo "checked";?> value="Benis">Benis
      <input type="radio" name="iwant" <?php if (isset($iwant) && $iwant=="Bussy") echo "checked";?> value="Bussy">Bussy
      <input type="radio" name="iwant" <?php if (isset($iwant) && $iwant=="Both") echo "checked";?> value="Both">Both
      <span class="error">* <?php echo $iwantErr;?></span>
      <br><br>
      <input type="submit" name="submit" value="Register">
      <input type="button" onclick="location.href='login.php';" value="Login" />
      <input type="button" onclick="location.href='index.php';" value="Home" />
    </form>
    </body>
</html>