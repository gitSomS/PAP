<?php

include("../includes/config.php");

if (!isset($conn)) {
    die("Erro: Ligação com a base de dados não foi estabelecida.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Informação recebida:<br>";
    print_r($_POST);

    $username = $conn->real_escape_string($_POST["txt"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $phone = $conn->real_escape_string($_POST["broj"]);
    $password = password_hash($_POST["pswd"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, phone, password) VALUES ('$username', '$email', '$phone', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Utilizador registrado com sucesso!";
    } else {
        echo "Erro ao registrar utilizador: " . $conn->error;
    }
    $conn->close();
}
?>
