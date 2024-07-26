<?php
define('BASE_URL', 'http://localhost/hackatton//processar_formulario.php');

?>








<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palestras - Domus Petra</title>
    <link rel="stylesheet" href="./assets/css/style.css" type="text/css">
</head>
<body>
    <header>
        <div class="header-top">
            <div class="social-icons">
                <a href="#"><img src="./assets/img/facebook-icon.webp" alt="Facebook"></a>
                <a href="#"><img src="./assets/img/instagram-icon.webp" alt="Instagram"></a>
                <a href="#"><img src="./assets/img/linkedin-icon.webp" alt="LinkedIn"></a>
                <a href="#"><img src="./assets/img/pinterest-icon.webp" alt="Pinterest"></a>
                <a href="#"><img src="./assets/img/tiktok-icon.webp" alt="TikTok"></a>
                <a href="#"><img src="./assets/img/youtube-icon.webp" alt="YouTube"></a>
            </div>
            <a href="mailto:contato@domuspetra.com.br" class="contact-info">contato@domuspetra.com.br</a>
        </div>
        <div class="header-middle">
            <h1>Domus Petra - Palestras, Consultoria e Treinamentos de Excelência</h1>
        </div>
        <div class="header-bottom">
            <nav>
                <ul>
                    <li><a href="home.html">Home</a></li>
                    <li><a href="sobre.html">Sobre Nós</a></li>
                    <li><a href="palestra.html">Palestras</a></li>
                    <li><a href="consultoria.html">Consultoria</a></li>
                    <li><a href="treinamentos.html">Treinamentos</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="contato.html">Contato</a></li>
                </ul>
            </nav>
            <button class="schedule-button">Agende um horário</button>
        </div>
    </header>
    <main>
        <section class="palestras">
            <h2>Palestras</h2>
            <div class="palestras-content">
                <div class="palestra-item">
                    <img src="./assets/img/palestras.webp" alt="Gestão Consciente do Tempo">
                    <h3>Gestão Consciente do Tempo</h3>
                    <p>O Tempo é um dos recursos mais preciosos e escassos. A gestão consciente do tempo possibilita...</p>
                </div>
                <div class="palestra-item">
                    <img src="./assets/img/palestras.webp" alt="Atitude Eficiente: O Diferencial Competitivo">
                    <h3>Atitude Eficiente: O Diferencial Competitivo</h3>
                    <p>A palestra Atitude Eficiente promove uma profunda reflexão quanto à importância do comportamento do...</p>
                </div>
                <div class="palestra-item">
                    <img src="./assets/img/palestras.webp" alt="Inovação e Sustentabilidade">
                    <h3>Inovação e Sustentabilidade</h3>
                    <p>O papel da inovação e do comportamento humano frente aos desafios da sustentabilidade...</p>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <!-- Conteúdo do rodapé -->
    </footer>
    <script src="./assets/js/app.js"></script>
</body>
</html>