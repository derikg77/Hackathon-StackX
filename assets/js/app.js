document.addEventListener('DOMContentLoaded', function () {
    // Função para validar e enviar o formulário
    function validarFormulario() {
        const form = document.getElementById('form');
        const nome = form.querySelector('#nome');
        const whatsapp = form.querySelector('#whatsapp');
        const message = form.querySelector('#message');
        const responseDiv = document.getElementById('responseDiv');

        // Limpa a mensagem anterior
        responseDiv.style.display = 'none';
        responseDiv.className = 'message'; // Reseta a classe

        // Verifica se todos os campos estão preenchidos
        if (nome.value.trim() === '' || whatsapp.value.trim() === '' || message.value.trim() === '') {
            responseDiv.textContent = 'Por favor, preencha todos os campos do formulário.';
            responseDiv.classList.add('error');
            responseDiv.style.display = 'block';
            exibirMensagemSucesso(responseDiv);
            return false; // Impede o envio do formulário
        }

        // Envia os dados do formulário para o arquivo PHP usando Fetch
        const formData = new FormData();
        formData.append('nome', nome.value);
        formData.append('whatsapp', whatsapp.value);
        formData.append('mensagem', message.value);

        fetch('./assets/php/processar_formulario.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                alert(data); // Exibe a resposta do PHP
                form.reset(); // Limpa o formulário
            })
            .catch(error => {
                console.error('Erro:', error);
            });

        return false; // Impede o envio do formulário
    }

    function exibirMensagemSucesso(responseDiv) {
        responseDiv.textContent = 'Formulário enviado com sucesso!';
        responseDiv.className = 'success'; // Adiciona a classe de sucesso
        responseDiv.style.display = 'block'; // Mostra a mensagem

        setTimeout(() => {
            responseDiv.style.display = 'none'; // Esconde a mensagem após 3 segundos
        }, 3000);
    }

    // Adiciona o evento de validação ao formulário
    document.addEventListener('DOMContentLoaded', function(event) {
        const form = document.getElementById('form');

        if(form) {
            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Impede o envio padrão do formulário
                validarFormulario(); // Chama a função de validação e envio
            });
        }
    });
});
// // Acessibilidade para surdos e mudos
// // const contactForm = document.querySelector('.contact-form form');
// // contactForm.addEventListener('submit', function (event) {
// //     event.preventDefault();

// //     const name = document.getElementById('nome').value;
// //     const whatsapp = document.getElementById('whatsapp').value;
// //     const message = document.getElementById('message').value;

// //     const accessibilityMessage = `
// //         Nome: ${name}
// //         WhatsApp: ${whatsapp}
// //         Mensagem: ${message}
// //     `;

// //     alert('Sua mensagem foi enviada com sucesso! Aqui está o resumo: \n' + accessibilityMessage);
// });