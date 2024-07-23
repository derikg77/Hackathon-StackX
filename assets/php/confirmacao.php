<!-- confirmacao.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Confirmação</title>
</head>
<body>
    <h1>Mensagem Enviada!</h1>
    <p>Obrigado, <?php require 'db.php'; echo htmlspecialchars($_GET['nome'] , $_GET['numero'], $_GET['mensagem']); ?>! Sua mensagem foi enviada com sucesso.</p>
</body>
</html>