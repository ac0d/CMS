<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>REGISTER!</title>
        
    </head>
    <body text-align = center>
        <h2>PLS REGISTAR</h2>
        <form>
            Username:<br>
            <input type="text" name="username"><br>
            Password:<br>
            <input type="text" name="password"><br>
            First name:<br>
            <input type="text" name="firstname"><br>
            Last name:<br>
            <input type="text" name="lastname"><br>
            E-mail:<br>
            <input type="text" name="email"><br>
            Postal Code:<br>
            <input type="text" name="postalcode"><br>
			About You:<br>
			<input type="text" name="about"><br>
            Årslön:<br>
            <input type="text" name="arslon"><br>
            I Have a:<br>
            <fieldset id="group1">
            <input type="radio" name="group1" value="benis" checked> Benis<br>
            <input type="radio" name="group1" value="bussy"> Bussy<br>
            <input type="radio" name="group1" value="both"> Both<br>
            </fieldset>
            I Want Sum:<br>
            <fieldset id="group2">
            <input type="radio" name="group2" value="benis" checked> Benis<br>
            <input type="radio" name="group2" value="busy"> Bussy<br>
            <input type="radio" name="group2" value="both"> Both<br>
            </fieldset>
             <button type="button" onclick="register();alertfunction();location.href='profile.php'" value="REGISTER"></button> 
            
            <?php
            function register(){
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "benis_users";
                // Skapa uppkoppling
                $conn = new mysqli($servername, $username, $password);
                // Kolla att det går att koppla sig, om ej, skriv ut felet
                if ($conn->connect_error) {
                    die("Något gick snett: " . $conn->connect_error);
                }
                echo "Uppkopplingen till databasen lyckades</br>";
                
                $stmt = $conn->prepare("INSERT INTO users (usrname, hashpass, firstname, lastname, mail, zip, info, salary, ihave, lookingfor)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssssisdss", $username, $hashpass, $firstname, $lastname, $mail, $zip, $info, $salary, $ihave, $lookingfor);
                
                $usrname = $_GET["username"];
                $hashpass = md5($_GET["password"]);
                $firstname = $_GET["firstname"];
                $lastname =  $_GET["lastname"];
                $mail = $_GET["email"];
                $zip = $_GET["postalcode"];
                $info = $_GET["about"];
                $salary = $_GET["arslon"];
                $ihave = $_GET["group1"];
                $lookingfor = $_GET["group2"];
                $stmt->execute();
                
                /*
                $sql = "INSERT INTO users (usrname, hashpass, firstname, lastname, mail, zip, info, salary, ihave, lookingfor)
                VALUES ($username, $hashpass,  $firstname, $lastname, $mail, $zip, $info, $salary, $ihave, $lookingfor)";
                */
            }
            ?>
            <script>
            function alertfunction() {
                alert("Account creation succesful!");
            }
            </script>
        </form>
    </body>
</html>