<?php
include("../includes/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validando se os campos foram enviados
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $email = $conn->real_escape_string($_POST["email"]);
        $password = $_POST["password"];

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
            echo "Usuário não encontrado!";
        }
    } else {
        echo "Campos obrigatórios não enviados!";
    }
}
?>
