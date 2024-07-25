document.addEventListener('DOMContentLoaded', function () {
    // Função para validar e enviar o formulário
    function validateAndSubmitForm(formId) {
        const form = document.getElementById(formId);
        const nome = form.querySelector('#nome');
        const whatsapp = form.querySelector('#whatsapp');
        const email = form.querySelector('#email');
        const phone = form.querySelector('#phone');
        const message = form.querySelector('#message');
        const responseDiv = document.getElementById('response');

        // Limpa a mensagem anterior
        responseDiv.style.display = 'none';
        responseDiv.className = 'message'; // Reseta a classe

        // Verifica se todos os campos estão preenchidos
        if (nome.value.trim() === '' || whatsapp.value.trim() === '' || email.value.trim() === '' || phone.value.trim() === '' || message.value.trim() === '') {
            responseDiv.textContent = 'Por favor, preencha todos os campos do formulário.';
            responseDiv.classList.add('error');
            responseDiv.style.display = 'block';
            return false; // Impede o envio do formulário
        }

        // Envia os dados do formulário para o arquivo PHP usando Fetch
        fetch('assets/php/insert.php', {
            method: 'POST',
            body: new URLSearchParams({
                'nome': nome.value,
                'whatsapp': whatsapp.value,
                'email': email.value,
                'phone': phone.value,
                'message': message.value,
            })
        })
        .then(response => response.json())
        .then(data => {
            responseDiv.textContent = data.message;
            responseDiv.className = data.status === 'success' ? 'success' : 'error';
            responseDiv.style.display = 'block';
        })
        .catch(error => {
            console.error('Erro:', error);
            responseDiv.textContent = 'Ocorreu um erro ao enviar a mensagem.';
            responseDiv.classList.add('error');
            responseDiv.style.display = 'block';
        });

        // Limpa os campos do formulário
        nome.value = '';
        whatsapp.value = '';
        email.value = '';
        phone.value = '';
        message.value = '';

        return false; // Impede o envio do formulário
    }

    // Adiciona o evento de validação ao formulário
    document.getElementById('form-contact').onsubmit = function(event) {
        event.preventDefault(); // Impede o envio padrão do formulário
        validateAndSubmitForm('form-contact'); // Chama a função de validação e envio
    };

    // Suavizar rolagem ao clicar nos links de navegação
    const navLinks = document.querySelectorAll('nav a');
    navLinks.forEach((link) => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const targetId = e.target.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: "start",
                });
            }
        });
    });

    // Acessibilidade para surdos e mudos
    const contactForm = document.querySelector('.contact-form form');
    contactForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const name = document.getElementById('nome').value;
        const whatsapp = document.getElementById('whatsapp').value;
        const message = document.getElementById('message').value;

        const accessibilityMessage = `
            Nome: ${name}
            WhatsApp: ${whatsapp}
            Mensagem: ${message}
        `;

        alert('Sua mensagem foi enviada com sucesso! Aqui está o resumo: \n' + accessibilityMessage);
    });
});
