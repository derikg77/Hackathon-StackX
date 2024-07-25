<?php
require 'db.php'; // Certifique-se de que este arquivo contém a conexão com o banco de dados
require 'processar.php'; // Este arquivo deve conter qualquer lógica adicional necessária

// Verifica se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Processar os dados do formulário
    if (isset($_POST['nome'], $_POST['email'], $_POST['phone'], $_POST['whatsapp'])) {
        $nome = $_POST['nome']; 
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $whatsapp = $_POST['whatsapp'];
        $message = isset($_POST['message']) ? $_POST['message'] : ''; // Verifica se a mensagem foi enviada

        // Conexão com o banco de dados
        try {
            // A conexão já deve estar em 'db.php'
            // $pdo = new PDO('mysql:host=localhost;dbname=seu_banco_de_dados', 'usuario', 'senha');
            // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Prepara a consulta SQL
            $sql = "INSERT INTO home (nome, whatsapp, message) VALUES (:nome, :whatsapp, :message)";
            $stmt = $pdo->prepare($sql);
            
            // Executa a consulta
            $stmt->execute([
                ':nome' => $nome,
                ':whatsapp' => $whatsapp,
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
    // Retorna um código de status 405 se não for POST
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Método não permitido']);
}
?>
