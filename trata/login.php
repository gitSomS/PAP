<?php
include("../includes/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $conn->real_escape_string($_POST["email"]);
    $password = $_POST["password"];

    // Consulta o banco de dados
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verifica se a senha inserida é válida
        if (password_verify($password, $row["password"])) {
            echo "Login bem-sucedido! Bem-vindo, " . $row["username"];
        } else {
            echo "Senha incorreta!";
        }
    } else {
        echo "Utilizador não encontrado!";
    }
}
?>
