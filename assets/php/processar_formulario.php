<?php
require 'db.php';
require 'config.php';
$servername = "localhost";
$username = "root";
$password = "Derikadr156";
$dbname = "site_palestras";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Criar conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Obter dados do formulário
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $whatsapp = isset($_POST['whatsapp']) ? $_POST['whatsapp'] : '';
    $mensagem = isset($_POST['mensagem']) ? $_POST['mensagem'] : '';

    // Preparar e executar a inserção dos dados
    $stmt = $conn->prepare("INSERT INTO home (nome, whatsapp, mensagem) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $whatsapp, $message);

    if ($stmt->execute()) {
        echo "Formulário recebido com sucesso!";
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    // Se não for um POST, retornar um erro
    http_response_code(405);
    echo "Método não permitido.";
}
?>
