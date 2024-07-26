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
    $nome = htmlspecialchars($_POST['nome']);;
    $whatsapp = htmlspecialchars($_POST['whatsapp']);;
    $message = htmlspecialchars($_POST['message']);;

    // Preparar e executar a inserção dos dados
    $stmt = $conn->prepare("INSERT INTO home (nome, whatsapp, mensagem) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $whatsapp, $message);

    if ($stmt->execute()) {
        echo "Novo registro criado com sucesso";
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Domus Petra</title>
    <link rel="stylesheet" href="../assets/css/style.css"> <!-- Ajuste o caminho conforme a estrutura do seu diretório -->
    <style scoped>
        /* Seus estilos aqui */
    </style>
</head>
<body>
    <!-- Conteúdo da página -->
</body>
</html>
