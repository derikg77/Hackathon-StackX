<?php
require 'db.php';
include 'config.php';
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
    $email = isset($_POST['email']) ? $_POST['email']: '';
    $telefone = isset($_POST['telefone']) ? $_POST['telefone']: '';

    // Inserir dados no banco de dados
    $sql = "INSERT INTO contato (nome, telefone, email, mensagem) VALUES ('$nome', '$telefone', '$email', '$mensagem')";

    if ($conn->query($sql) === TRUE) {
        echo "Novo registro criado com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    // Se não for um POST, retornar um erro
    http_response_code(405);
    echo "Método não permitido.";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Domus Petra</title>
    <link rel="stylesheet" href="../css/styles.css"> <!-- Ajuste o caminho conforme a estrutura do seu diretório -->
    <style scoped>
        /* Seus estilos aqui */
    </style>
</head>
<body>
    <!-- Conteúdo da página -->
</body>
</html>
