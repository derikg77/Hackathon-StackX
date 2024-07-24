<?php
require 'db.php';
// processar.php

// Configurações de conexão com o banco de dados
$host = 'localhost'; // ou o IP do seu servidor
$db = 'site_palestras';
$user = 'root'; // substitua pelo seu usuário do MySQL
$pass = 'Derikadr156'; // substitua pela sua senha do MySQL

// Conectar ao banco de dados
$conn = new mysqli($host, $user, $pass, $db);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Captura os dados do formulário
$nome = htmlspecialchars($_POST['nome']);
$whatsapp = htmlspecialchars($_POST['whatsapp']);
$message = htmlspecialchars($_POST['message']);

// Preparar e executar a consulta SQL
$sql = "INSERT INTO contatos (nome, whatsapp, message, submit) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nome, $whatsapp, $message);

if ($stmt->execute()) {
    // Redireciona para a página de confirmação
    header("Location: confirmacao.php");
    exit();
} else {
    echo "Erro: " . $stmt->error;
}

// Fechar a conexão
$stmt->close();
$conn->close();
?>
