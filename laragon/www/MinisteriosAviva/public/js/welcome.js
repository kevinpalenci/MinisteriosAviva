document.getElementById('subscribeForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const email = document.getElementById('email').value;

    // Validación simple de correo
    if (!validateEmail(email)) {
        Swal.fire({
            icon: 'error',
            title: 'Correo no válido',
            text: 'Por favor, ingresa un correo electrónico válido.',
        });
        return;
    }

    // Simulación del envío a la base de datos
    Swal.fire({
        icon: 'success',
        title: 'Enviado con éxito',
        text: 'Te has suscrito correctamente al boletín.',
    });

    // Aquí agregarías la lógica para guardar el correo en la base de datos usando AJAX o un formulario Laravel
});

function validateEmail(email) {
    const re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    return re.test(email);
}


function verMasBlog(title, description, imageUrl) {
    Swal.fire({
        title: title,
        text: description,
        imageUrl: imageUrl,
        imageWidth: 400,
        imageHeight: 200,
        imageAlt: 'Imagen del blog',
    });
}

