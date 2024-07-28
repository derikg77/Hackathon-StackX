document.addEventListener('DOMContentLoaded', function() {
    // Menu Toggle
    const menuToggle = document.querySelector('.menu-toggle');
    const navMenu = document.querySelector('.nav-menu');

    if (menuToggle && navMenu) {
        menuToggle.addEventListener('click', function() {
            navMenu.classList.toggle('active');
        });
    }

    // Função para validar e enviar o formulário
    function validarFormulario(event) {
        // Previne o comportamento padrão do formulário
        event.preventDefault();

        // Seleciona o formulário e os campos
        const form = document.getElementById('form');
        const nome = form.querySelector('#nome');
        const whatsapp = form.querySelector('#whatsapp');
        const message = form.querySelector('#message');
        const responseDiv = document.getElementById('response');

        // Limpa a mensagem anterior
        responseDiv.style.display = 'none';
        responseDiv.className = 'message'; // Reseta a classe

        // Verifica se todos os campos estão preenchidos
        if (nome  === '' || whatsapp  === '' || message  === '') {
            responseDiv.textContent = 'Por favor, preencha todos os campos do formulário.';
            responseDiv.classList.add('error'); // Adiciona a classe de erro
            responseDiv.style.display = 'block'; // Mostra a mensagem
            return; // Impede o envio do formulário
        }

        // Envia os dados do formulário para o arquivo PHP usando Fetch
        const formData = new FormData();
        formData.append('nome', nome);
        formData.append('whatsapp', whatsapp);
        formData.append('mensagem', message);

        fetch('assets/php/processar_formulario.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            // Exibe a resposta do PHP
            alert(data); // Exibe a resposta do PHP
            responseDiv.textContent = 'Formulário enviado com sucesso!';
            responseDiv.className = 'message success'; // Adiciona a classe de sucesso
            responseDiv.style.display = 'block'; // Mostra a mensagem
            form.reset(); // Limpa o formulário

            // Esconde a mensagem após 3 segundos
            setTimeout(() => {
                responseDiv.style.display = 'none'; // Esconde a mensagem
            }, 3000);
        })
        .catch(error => {
            console.error('Erro:', error);
            responseDiv.textContent = 'Ocorreu um erro ao enviar o formulário.';
            responseDiv.className = 'message error'; // Adiciona a classe de erro
            responseDiv.style.display = 'block'; // Mostra a mensagem
        });
    }

    // Adiciona o evento de validação ao formulário
    const form = document.getElementById('form');

    if (form) {
        form.addEventListener('submit', validarFormulario);
    } else {
        console.error('Formulário não encontrado.');
    }
});
