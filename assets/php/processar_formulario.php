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
    <link rel="stylesheet" href="./assets/css/style.css" type="text/css">

</head>
</head>

<body>
    <header>
        <div class="header-content">
            <div class="logo">
                <img src="./assets/img/logo.webp" alt="Domus Petra Logo">
            </div>
            <div class="social-media">
                <a href="http://www.facebook.com/DomusPetra"><img src="./assets/img/facebook-icon.webp"
                        alt="Facebook"></a>
                <a href="#"><img src="./assets/img/instagram-icon.webp" alt="Instagram"></a>
                <a href="#"><img src="./assets/img/linkedin-icon.webp" alt="LinkedIn"></a>
                <a href="#"><img src="./assets/img/pinterest-icon.webp" alt="Pinterest"></a>
                <a href="#"><img src="./assets/img/tiktok-icon.webp" alt="TikTok"></a>
                <a href="#"><img src="./assets/img/youtube-icon.webp" alt="YouTube"></a>
                <a href="mailto:contato@domuspetra.com.br"><img src="./assets/img/google-plus-icon..webp"
                        alt="Email"></a>
            </div>
            <div class="contact">
                <a href="mailto:contato@domuspetra.com.br">contato@domuspetra.com.br</a>
                <a href="#" class="appointment-button">Agende um horário</a>
            </div>
        </div>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="sobre-nos.html">Sobre Nós</a></li>
                <li><a href="palestras.html">Palestras</a></li>
                <li><a href="consultoria.html">Consultoria</a></li>
                <li><a href="treinamentos.html">Treinamentos</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="contato.html">Contato</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="content">
            <div class="projects">
                <div class="project">
                    <div class="project-content">
                        <img src="./assets/img/palestras.webp" alt="Palestras">
                        <h3>Palestras</h3>
                        <p>Descrição das Palestras</p>
                        <a href="#">Leia Mais</a>
                    </div>
                </div>
                <div class="project">
                    <div class="project-content">
                        <img src="./assets/img/consultoria.webp" alt="Consultoria">
                        <h3>Consultoria</h3>
                        <p>Descrição da Consultoria</p>
                        <a href="#">Leia Mais</a>
                    </div>
                </div>
                <div class="project">
                    <div class="project-content">
                        <img src="./assets/img/treinamento.webp" alt="Treinamento">
                        <h3>Treinamento</h3>
                        <p>Descrição dos Treinamentos</p>
                        <a href="#">Leia Mais</a>
                    </div>
                </div>
            </div>
            <div id="form-contact" method="POST" id="form">
                <h2>Entre em contato conosco!</h2>
                <form form action="assets/php/processar_formulario.php" method="POST" onsubmit="return validarFormulario();"  
                
                action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" >
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required>
            
                    <label for="whatsapp">WhatsApp:</label>
                    <input type="tel" id="whatsapp" name="whatsapp" required placeholder="(11) 00000-0000">
            
                    <label for="message">Mensagem:</label>
                    <textarea id="message" name="message" required></textarea>
            
                    <button type="submit">Enviar</button>
                </form>
            
                <div id="response" class="message"></div>
            
            </div>
        </div>
    </main>
    <script src="./assets/js/app.js">

        
    </script>
</body>

</html>