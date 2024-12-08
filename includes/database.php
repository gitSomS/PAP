<?php
include("config.php");

// Função para verificar a conexão (opcional)
function verificarConexao() {
    global $conn;
    if ($conn) {
        echo "Ligação estabelecida com sucesso!";
    } else {
        echo "Erro ao conectar a base de dados.";
    }
}
?>
