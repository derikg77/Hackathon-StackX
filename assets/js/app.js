// // Adicione acessibilidade para surdos e mudos
// document.addEventListener('DOMContentLoaded', function () {
//     const contactForm = document.querySelector('.contact-form form');

//     contactForm.addEventListener('submit', function (event) {
//         event.preventDefault();

//         const name = document.getElementById('name').value;
//         const whatsapp = document.getElementById('whatsapp').value;
//         const message = document.getElementById('message').value;

//         const accessibilityMessage = `
//     Nome: ${name}
//     WhatsApp: ${whatsapp}
//     Mensagem: ${message}
//     `;

//         alert('Sua mensagem foi enviada com sucesso! Aqui está o resumo: \n' + accessibilityMessage);
//     });
// });

// suavizar rolagem ao cliclar na pagina

// const navLinks = document.querySelectorAll('nav a');

// navLinks.forEach((link) => {
//     link.addEventListener('click', (e) => {
//         e.preventDefault();
//         const targetId = e.target.getAttribute('href');
//         const targetelement = document.querySelector(targetId)
//         targetelement.scrollIntoView({
//             behavior: 'smooth',
//             block: "end",
//         })
//         console.log(navLinks)
//     })
// })

// validar formulario

const form = document.getElementById('#form');
const nameInput = document.getElementById('#name');
const whatsappInput = document.getElementById('#whatsapp');
const messageInput = document.getElementById('#message');
const submitButton = document.getElementById('#submit');

if (form === '') {

    alert('Por favor, preencha todos os campos.')
}
else {
    alert('formulario validado')

}

function validateForm() {


    // Validar campo de nome
    if (nameInput === '') {
        alert(nameInput, 'Por favor, insira seu nome.');
        return;

    }


    // Validar campo de WhatsApp
    if (whatsappInput === '') {
        alert(whatsappInput, 'Por favor, insira seu número de WhatsApp.');
        return;

    }


    // Validar campo de mensagem
    if (messageInput === '') {
        alert(messageInput, 'Por favor, insira sua mensagem.');
        return;


    }
    if (submitButton === '') {
        alert(submitButton, 'formulario preenchido');
        return;

    }


}
document.addEventListener('DOMContentLoaded', (event) => {
    event.preventDefault();
    validateForm();
})

 fetch('./assets/php/salvar.php', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
    },
    body: JSON.stringify({ nome, email, mensagem }),
})
.then(response => response.json())
.then(data => {
    alert(data.message);
})
.catch((error) => {
    console.error('Erro:', error);
});
