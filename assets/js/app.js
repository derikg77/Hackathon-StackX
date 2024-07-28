document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const navMenu = document.querySelector('.nav-menu');

    menuToggle.addEventListener('click', function() {
        navMenu.classList.toggle('active');
    });
});

document.addEventListener('DOMContentLoaded', function () {
    // Função para validar e enviar o formulário
  
    function validarFormulario() {
        const nome = form.querySelector('#nome');
        const whatsapp = form.querySelector('#whatsapp');
        const message = form.querySelector('#message');
        const responseDiv = document.getElementById('response');

        // Limpa a mensagem anterior
        responseDiv.style.display = 'none';
        responseDiv.className = 'message'; // Reseta a classe

        // Verifica se todos os campos estão preenchidos
        if (nome.value.trim() === '' || whatsapp.value.trim() === '' || message.value.trim() === '') {
            responseDiv.textContent = 'Por favor, preencha todos os campos do formulário.';
            responseDiv.classList.add('error'); // Adiciona a classe de erro
            responseDiv.style.display = 'block'; // Mostra a mensagem
            return; // Impede o envio do formulário
        }

        // Envia os dados do formulário para o arquivo PHP usando Fetch
        const formData = new FormData();
        formData.append('nome', nome.value);
        formData.append('whatsapp', whatsapp.value);
        formData.append('mensagem', message.value);

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
            });
    }

    // Adiciona o evento de validação ao formulário
    const form = document.getElementById('form');

    if (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault(); // Impede o envio padrão do formulário
            validarFormulario(); // Chama a função de validação e envio
        });
    }
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