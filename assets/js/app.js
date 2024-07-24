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

function validateForm() {

    const form = document.getElementById('#form');
    const nameInput = document.getElementById('#nome');
    const whatsappInput = document.getElementById('#whatsapp');
    const messageInput = document.getElementById('#message');
    const submitButton = document.getElementById('#submit');

    if (nameInput == '') {
        alert(nameInput, 'Por favor, insira seu nome.'); // validar campo nome
        return;

    }else if (whatsappInput === '') {
        alert(whatsappInput, 'Por favor, insira seu número de WhatsApp.'); // validar campo whatsapp
        return;

    } else  if (messageInput === '') {
        alert(messageInput, 'Por favor, insira sua mensagem.'); // validar campo mensagem
        return;


    }else if (submitButton === '') {
        alert(submitButton, 'Por favor, preencha o formulario');
        return;

    } else {
        // alert(form.value, 'formulario validado')
    }


}
document.addEventListener('DOMContentLoaded', (event) => {
    
    event.preventDefault();
    validateForm();
})

fetch('assets/php/insert.php', {
    method: 'POST',
    
    body: new URLSearchParams({
        'name': nome,
        'telefone': whatsapp,
        'mensagem': message,
        'submit': submit,
    })
})
.then(response => response.text())
.then(data => {
    document.getElementById('resultado').innerHTML = data; // Mostra a resposta do PHP
}).catch(error => {
    console.error('Erro:', error);
});