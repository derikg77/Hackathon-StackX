<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
require 'db.php'; // Certifique-se de que este arquivo contém as credenciais corretas
require 'config.php';

$servername = "localhost";
$username = "root";
$password = "Derikadr156"; // Considere usar variáveis de ambiente para senhas
$dbname = "site_palestras";

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Criar conexão
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar conexão
        if ($conn->connect_error) {
            http_response_code(500);
            echo "Erro ao conectar ao banco de dados.";
            exit; // Interrompe a execução se a conexão falhar
        }

        // Obter dados do formulário e sanitizar
        $nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
        $whatsapp = isset($_POST['whatsapp']) ? trim($_POST['whatsapp']) : '';
        $mensagem = isset($_POST['mensagem']) ? trim($_POST['mensagem']) : '';

        // Verificar se todos os campos estão preenchidos
        if (!empty($nome) && !empty($whatsapp) && !empty($mensagem)) {
            // Preparar e executar a inserção dos dados
            $stmt = $conn->prepare("INSERT INTO home (nome, whatsapp, mensagem) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nome, $whatsapp, $mensagem);

            if ($stmt->execute()) {
                echo json_encode(['status' => 'success', 'message' => 'Formulário enviado com sucesso!']);
            } else {
                http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Por favor, preencha todos os campos.']);
            }

            $stmt->close();
        } else {
            http_response_code(400);
            echo 'Por favor, preencha todos os campos.';
        }

        $conn->close(); // Fechar a conexão
    } else {
        // Se não for um POST, retornar um erro
        http_response_code(405);
        echo json_encode(['status' => 'error', 'message' => 'Método não permitido.']);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo "Ocorreu um erro ao processar sua solicitação. Tente novamente mais tarde.";
}