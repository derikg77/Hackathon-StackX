<?php
require 'db.php';
require 'insert.php';
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
$email = htmlspecialchars($_POST['email']);
$phone = htmlspecialchars($_POST['phone']);



// Preparar e executar a consulta SQL
$sql = "INSERT INTO contato (nome, whatsapp, message, email, phone) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nome, $whatsapp, $message, $email, $phone);

if ($stmt->execute()) {
    // Redireciona para a página de contato
    header("Location:assets/php/contato.php");
    exit();
} else {
    echo "Erro: " . $stmt->error;
}

// Fechar a conexão
$stmt->close();
$conn->close();
?>
