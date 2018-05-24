<?php
session_start();
require_once('connect.php');
$sql = "SELECT email, firstname, lastname, zip, salary, info, ihave, iwant FROM users";
$result = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Get Benis</title>
    </head>
    <body>
        <?php
        if(isset($_SESSION['username'])){
            echo "You are logged in as: " . $_SESSION['username'] . ".<br><br>";
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "Name: ".$row["firstname"]." ".$row["lastname"]." | E-mail: ".$row["email"]." | Postal code: ".$row["zip"]." | Anual salary: ".$row["salary"]."€".
                    "<br>I have a: ".$row["ihave"]." | I'm looking for: ".$row["iwant"]." | About me: ".$row["info"]."<br><br>";
                }
            }else{
                echo "0 results";
            }
        }else{
            echo "You are not logged in.<br><br>";
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                echo "Name: ".$row["firstname"]." ".$row["lastname"]." | Postal code: ".$row["zip"]." | Anual salary: ".$row["salary"]."€".
                    "<br>I have a: ".$row["ihave"]." | I'm looking for: ".$row["iwant"]." | About me: ".$row["info"]."<br><br>";
                }
            }else{
                echo "0 results";
            }
        }
        ?>
        <input type="button" onclick="location.href='login.php';" value="Login" />
        <input type="button" onclick="location.href='register.php';" value="Register" />
        <input type="button" onclick="location.href='logout.php';" value="Logout" />
    </body>
</html>