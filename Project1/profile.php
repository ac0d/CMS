<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Your Benis</title>
    </head>
    <body>
        <p> you are benis </p>
    
    
<?php
$servername = "localhost";
$username = "root";
$password = "";
// Skapa uppkoppling
$conn = new mysqli($servername, $username, $password);
// Kolla att det går att koppla sig, om ej, skriv ut felet
if ($conn->connect_error) {
    die("Något gick snett: " . $conn->connect_error);
}
echo "Uppkopplingen till databasen lyckades</br>";

$sql = "SELECT * FROM table_name WHERE some_criteria = some_value";

$result = $db->query($sql);

while($row = $result->fetch_assoc()){
   echo $row['kolumn_namn'];
}

$sql = $db->prepare("SELECT * FROM users WHERE username = ?");
$statement->bind_param('s', $name);

$name = 'Bob';
$stmt->execute();

?>
    
    
    
    
        
    </body>
</html>