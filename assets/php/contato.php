<?php
require 'db.php';
require 'insert.php'; // Arquivo com as configurações de conexão com o banco de dados

// Verifica se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Processar os dados do formulário
    if (isset($_POST['nome'], $_POST['email'], $_POST['phone'])) {
        $nome = $_POST['nome']; 
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = isset($_POST['message']) ? $_POST['message'] : ''; // Verifica se a mensagem foi enviada

        try {
            // Prepara a consulta SQL
            $sql = "INSERT INTO contato (nome, email, phone, message) VALUES (:nome, :email, :phone, :message)";
            $stmt = $pdo->prepare($sql);
            
            // Executa a consulta
            $stmt->execute([
                ':nome' => $nome,
                ':email' => $email,
                ':phone' => $phone,
                ':message' => $message,
            ]);

            // Resposta de sucesso
            echo json_encode(['status' => 'success', 'message' => 'Dados inseridos com sucesso!']);
        } catch (PDOException $e) {
            echo json_encode(['status' => 'error', 'message' => 'Erro ao inserir dados: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Por favor, preencha todos os campos.']);
    }
} else {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Método não permitido']);
}
?>

