<?php
$servername = "localhost";
$username = "root";
$password = ""; // Substitua pela senha correta
$dbname = "pap"; // Certifique-se de que o nome está correto

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Ligação bem-sucedida!";
?>
