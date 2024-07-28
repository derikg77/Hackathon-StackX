<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
require 'db.php';
require 'config.php';

$servername = "localhost";
$username = "root";
$password = "Derikadr156";
$dbname = "site_palestras";



try {
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

        // Verificar se todos os campos estão preenchidos
        if (!empty($nome) && !empty($whatsapp) && !empty($mensagem)) {
            // Preparar e executar a inserção dos dados
            $stmt = $conn->prepare("INSERT INTO home (nome, whatsapp, mensagem) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nome, $whatsapp, $mensagem);

            if ($stmt->execute()) {
                echo "Formulário enviado com sucesso!";
                exit; // Retorna 'success' para o JavaScript
            } else {
                http_response_code(500);
                echo "Erro ao inserir dados: " . $stmt->error ;
            }

            $stmt->close();
        } else {
            http_response_code(400);
            echo 'Dados inválidos. Por favor, preencha todos os campos.';
        }

        $conn->close(); // Fechar a conexão
    } else {
        // Se não for um POST, retornar um erro
        http_response_code(405);
        echo "Método não permitido.";
    }
} catch (Exception $e) {
    http_response_code(500);
    echo "Erro na requisição: " . $e->getMessage() . "\n";
    echo "Código do erro: " . $e->getCode() . "\n";
    echo "Arquivo: " . $e->getFile() . "\n";
    echo "Linha: " . $e->getLine() . "\n";
    echo "Rastreamento da pilha: " . $e->getTraceAsString() . "\n";
}
