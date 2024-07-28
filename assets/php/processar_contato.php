<?php
require 'db.php';
include 'config.php';
$servername = "localhost";
$username = "root";
$password = "Derikadr156";
$dbname = "site_palestras";

// Permitir requisições de qualquer origem
header("Access-Control-Allow-Origin: *");
// Permitir métodos específicos
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
// Permitir cabeçalhos específicos
header("Access-Control-Allow-Headers: Content-Type");

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

    if (!empty($nome) && !empty($email) && !empty($whatsapp) && !empty($mensagem) && !empty($email)  && !empty($email)) {
        // Aqui você pode adicionar a lógica para enviar o e-mail
        // mail($to, $subject, $message, $headers);
        
        echo 'success'; // Retorna 'success' para o JavaScript
        exit; // Encerra o script
        
    

  

    // Inserir dados no banco de dados
    $sql = "INSERT INTO contato (nome, telefone, email, mensagem) VALUES ('$nome', '$telefone', '$email', '$mensagem')";

    if ($conn->query($sql) === TRUE) {
        echo "Novo registro criado com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}} else {
    // Se não for um POST, retornar um erro
    http_response_code(405);
    echo "Método não permitido.";
}
?>

