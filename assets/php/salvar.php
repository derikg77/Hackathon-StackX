<?php
$servername = "localhost";
$username = "root";
$password = ""; 

// Criar conexão
$conn = new mysqli($servername, $username, $password);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
echo "Conexão bem sucedida";

// Selecionar o banco de dados
$conn->select_db("treinamento_site");

// Fechar conexão
$conn->close();
?>
