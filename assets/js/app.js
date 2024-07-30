document.addEventListener('DOMContentLoaded', function () {
    // Menu Toggle
    const menuToggle = document.querySelector('.menu-toggle');
    const navMenu = document.querySelector('.nav-menu');

    if (menuToggle && navMenu) {
        menuToggle.addEventListener('click', function () {
            navMenu.classList.toggle('active');
        });
    }

    // Seleciona o formulário e os campos
    const form = document.getElementById('meuFormulario');
    const responseDiv = document.getElementById('response');

    // Função para validar e enviar o formulário
    async function validarFormulario(event) {
        // Previne o comportamento padrão do formulário
        event.preventDefault();

        const nome = document.getElementById('nome');
        const whatsapp = document.getElementById('whatsapp');
        const message = document.getElementById('message');
        console.log('Enviando dados do formulário...');
        console.log('Dados do formulário:', { nome, whatsapp, mensagem: message });

        // Limpa a mensagem anterior
        responseDiv.style.display = 'none';
        responseDiv.className = 'message'; // Reseta a classe

        // Verifica se todos os campos estão preenchidos
        if (nome === '' || whatsapp === '' || message === '') {
            responseDiv.textContent = 'Por favor, preencha todos os campos do formulário.';
            responseDiv.classList.add('error'); // Adiciona a classe de erro
            responseDiv.style.display = 'block'; // Mostra a mensagem
            return; // Impede o envio do formulário
        }

        // Envia os dados do formulário para o arquivo PHP usando Fetch
        const formData = new FormData(form); // Cria o FormData a partir do formulário
        try {
            const response = await fetch('http://localhost/xampp/hackatton/assets/php/processar_formulario.php', {
                method: 'POST',
                body: formData,
            });

            if (!response.ok) {
                throw new Error('Erro na rede: ' + response.statusText);
            }

            const data = await response.text(); // Retorna a resposta como texto

            // Exibe a resposta do PHP
            alert(data); // Exibe a resposta do PHP
            responseDiv.textContent = 'Formulário enviado com sucesso!';
            responseDiv.className = 'success message'; // Adiciona a classe de sucesso
            responseDiv.style.display = 'block'; // Mostra a mensagem
            form.reset(); // Limpa o formulário

            // Esconde a mensagem após 3 segundos
            setTimeout(() => {
                responseDiv.style.display = 'none'; // Esconde a mensagem
            }, 3000);
        } catch (error) {
            console.error('Erro:', error);
            responseDiv.textContent = 'Ocorreu um erro ao enviar o formulário.';
            responseDiv.className = 'message error'; // Adiciona a classe de erro
            responseDiv.style.display = 'block'; // Mostra a mensagem
        }
    }

    // Adiciona o evento de validação ao formulário
    if (form) {
        form.addEventListener('submit', validarFormulario);
    } else {
        console.error('Formulário não encontrado.');
    }
});