<?php

require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $numero = $_POST['numero'];
    $mensagem = $_POST['mensagem'];
   
    $sql = "INSERT INTO palestras (nome, numero, mensagem) VALUES (:nome, :numero, :mensagem)";
    $stmt = $pdo->prepare($sql);
    
    $stmt->execute([
        ':nome' => $nome,
        ':numero' => $numero,
        ':mensagem' => $mensagem,
    ]);

    echo "Home inserida com sucesso!";
}
?>
<form method="POST">
    Nome: <input type="text" name="nome" required><br>
    Numero: <input type="text" name="numero" required><br>
    Mensagem: <textarea name="mensagem" required></textarea><br>
    <input type="submit" value="Inserir Dados da Home">
</form>
<?php

require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $data = $_POST['data'];
    $local = $_POST['local'];

    $sql = "INSERT INTO palestras (titulo, descricao, data, local) VALUES (:titulo, :descricao, :data, :local)";
    $stmt = $pdo->prepare($sql);
    
    $stmt->execute([
        ':titulo' => $titulo,
        ':descricao' => $descricao,
        ':data' => $data,
        ':local' => $local
    ]);

    echo "Palestra inserida com sucesso!";
}
?>

<form method="POST">
    Título: <input type="text" name="titulo" required><br>
    Descrição: <textarea name="descricao" required></textarea><br>
    Data: <input type="date" name="data" required><br>
    Local: <input type="text" name="local" required><br>
    <input type="submit" value="Inserir Palestra">
</form>

<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $data = $_POST['data'];
    $local = $_POST['local'];

    $sql = "INSERT INTO treinamentos (titulo, descricao, data, local) VALUES (:titulo, :descricao, :data, :local)";
    $stmt = $pdo->prepare($sql);
    
    $stmt->execute([
        ':titulo' => $titulo,
        ':descricao' => $descricao,
        ':data' => $data,
        ':local' => $local
    ]);

    echo "Treinamento inserido com sucesso!";
}
?>

<form method="POST">
    Título: <input type="text" name="titulo" required><br>
    Descrição: <textarea name="descricao" required></textarea><br>
    Data: <input type="date" name="data" required><br>
    Local: <input type="text" name="local" required><br>
    <input type="submit" value="Inserir Treinamento">
</form>

<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $data = $_POST['data'];
    $local = $_POST['local'];

    $sql = "INSERT INTO consultoria (titulo, descricao, data, local) VALUES (:titulo, :descricao, :data, :local)";
    $stmt = $pdo->prepare($sql);
    
    $stmt->execute([
        ':titulo' => $titulo,
        ':descricao' => $descricao,
        ':data' => $data,
        ':local' => $local
    ]);

    echo "Consultoria inserida com sucesso!";
}
?>

<form method="POST">
    Título: <input type="text" name="titulo" required><br>
    Descrição: <textarea name="descricao" required></textarea><br>
    Data: <input type="date" name="data" required><br>
    Local: <input type="text" name="local" required><br>
    <input type="submit" value="Inserir Consultoria">
</form>

<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];
    $data = $_POST['data'];

    $sql = "INSERT INTO blog (titulo, conteudo, data) VALUES (:titulo, :conteudo, :data)";
    $stmt = $pdo->prepare($sql);
    
    $stmt->execute([
        ':titulo' => $titulo,
        ':conteudo' => $conteudo,
        ':data' => $data
    ]);

    echo "Post de blog inserido com sucesso!";
}
?>

<form method="POST">
    Título: <input type="text" name="titulo" required><br>
    Conteúdo: <textarea name="conteudo" required></textarea><br>
    Data: <input type="date" name="data" required><br>
    <input type="submit" value="Inserir Post de Blog">
</form>

<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];
    $data = $_POST['data'];

    $sql = "INSERT INTO contato (nome, email, mensagem, data) VALUES (:nome, :email, :mensagem, :data)";
    $stmt = $pdo->prepare($sql);
    
    $stmt->execute([
        ':nome' => $nome,
        ':email' => $email,
        ':mensagem' => $mensagem,
        ':data' => $data
    ]);

    echo "Mensagem de contato enviada com sucesso!";
}
?>

<form method="POST">
    Nome: <input type="text" name="nome" required><br>
    Email: <input type="email" name="email" required><br>
    Mensagem: <textarea name="mensagem" required></textarea><br>
    Data: <input type="date" name="data" required><br>
    <input type="submit" value="Enviar Mensagem">
</form>