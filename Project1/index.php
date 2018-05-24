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
        <h2>Benis dating site</h2><br>
        <?php
        if(isset($_GET["page"])){
            $page = $_GET["page"];
        }else{
            $page=1;
        }
        $limit = 5;
        $offset = ($page-1) * $limit;
        echo "Page ".$page.".<br><br>";
        $sql = "SELECT email, firstname, lastname, zip, salary, info, ihave, iwant FROM users LIMIT $offset, $limit";
        $result = mysqli_query($connection, $sql);
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
            echo "You are not logged in. User e-mails hidden.<br><br>";
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
        <?php 
        $sql = "SELECT COUNT(ID) AS total FROM users";
        $result = mysqli_query($connection, $sql);
        $row = $result->fetch_assoc();
        $total_pages = ceil($row["total"] / $limit);
        echo "Pages: ";  
        for ($i=1; $i<=$total_pages; $i++)
            {
                echo "<a href='index.php?page=".$i."'";
                if ($i==$page)
                echo " class='curPage'";
                echo ">".$i."</a> "; 
            }; 
        ?>
        <br><br>
        <input type="button" onclick="location.href='login.php';" value="Login" />
        <input type="button" onclick="location.href='register.php';" value="Register" />
        <input type="button" onclick="location.href='logout.php';" value="Logout" /><br><br>
    </body>
</html>