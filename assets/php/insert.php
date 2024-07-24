<?php

require 'db.php';
require 'confirmacao.php';

if (isset($_POST['nome']) && isset($_POST['whatsapp']) && isset($_POST['message']) ){
    $nome = $_POST['nome'];
    $whatsapp = $_POST['whatsapp'];
    $message = $_POST['message'];
   

    $sql = "INSERT INTO home (nome, whatsapp, message) VALUES (:nome, :whatsapp, :message)";
    $stmt = $pdo->prepare($sql);
    
    $stmt->execute([
        ':nome' => $nome,
        ':whatsapp' => $whatsapp,
        ':message' => $message,

    ]);
    echo "<p>Formulário enviado!</p>";
  
    // Resto do código
} 
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form method="POST">
        Nome: <input type="text" name="nome" required><br>
        Numero: <input type="text" name="whatsapp" required><br>
        Mensagem: <textarea name="message" required></textarea><br>
        <input type="submit" value="Inserir Dados da Home">
    </form>
</body>
</html> -->
 
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        Título: <input type="text" name="titulo" required><br>
        Descrição: <textarea name="descricao" required></textarea><br>
        Data: <input type="date" name="data" required><br>
        Local: <input type="text" name="local" required><br>
        <input type="submit" value="Inserir Palestra">
    </form>
    
</body>
</html> -->



<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form method="POST">
        Título: <input type="text" name="titulo" required><br>
        Descrição: <textarea name="descricao" required></textarea><br>
        Data: <input type="date" name="data" required><br>
        Local: <input type="text" name="local" required><br>
        <input type="submit" value="Inserir Treinamento">
    </form>
</body>
</html> -->




<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form method="POST">
        Título: <input type="text" name="titulo" required><br>
        Descrição: <textarea name="descricao" required></textarea><br>
        Data: <input type="date" name="data" required><br>
        Local: <input type="text" name="local" required><br>
        <input type="submit" value="Inserir Consultoria">
    </form>
</body>
</html> -->


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form method="POST">
        Título: <input type="text" name="titulo" required><br>
        Conteúdo: <textarea name="conteudo" required></textarea><br>
        Data: <input type="date" name="data" required><br>
        <input type="submit" value="Inserir Post de Blog">
    </form>
</body>
</html> -->


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form method="POST">
        Nome: <input type="text" name="nome" required><br>
        Email: <input type="email" name="email" required><br>
        Mensagem: <textarea name="mensagem" required></textarea><br>
        Data: <input type="date" name="data" required><br>
        <input type="submit" value="Enviar Mensagem">
    </form>
</body>
</html> -->