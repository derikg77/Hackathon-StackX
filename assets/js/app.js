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

const form = document.querySelector('.contact-form form');
const nameInput = document.getElementById('#name');
const whatsappInput = document.getElementById('#whatsapp');
const messageInput = document.getElementById('#message');
const submitButton = document.getElementById('#submit');


if (!validateForm) {
    function validateForm() {

        // Validar campo de nome
        if (nameInput === '') {
            alert(nameInput, 'Por favor, insira seu nome.');
            return;
        }


        // Validar campo de WhatsApp
        if (whatsappInput === '') {
            alert(whatsappInput, 'Por favor, insira seu número de WhatsApp.');

        }

        // Validar campo de mensagem
        if (messageInput === '') {
            alert(messageInput, 'Por favor, insira sua mensagem.');
            return


        }

        if (submitButton === '') {
            alert(submitButton, 'Por favor, preencha o formulário')
            return


        }
    }

}


// document.querySelector('#submit').addEventListener('click', (e) => {
//     e.preventDefault();
// })


document.querySelector(".contact-form form").addEventListener('submit', (e) => {
    e.preventDefault();
    validateForm();
    form.reset();
    alert('Formulario validado');

})

