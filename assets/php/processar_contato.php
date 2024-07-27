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
    $nome = htmlspecialchars($_POST['nome']);
    $whatsapp = htmlspecialchars($_POST['whatsapp']);
    $mensagem = htmlspecialchars($_POST['message']);
    $email = htmlspecialchars($_POST['email']);
    $telefone = htmlspecialchars($_POST['telefone']);

    // Inserir dados no banco de dados
    $sql = "INSERT INTO contato (nome, telefone, email, mensagem) VALUES ('$nome', '$telefone', '$email', '$mensagem')";

    if ($conn->query($sql) === TRUE) {
        echo "Novo registro criado com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
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
