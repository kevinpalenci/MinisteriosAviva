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


function verMasBlog(title, description, imageUrl, createdAt, blogId) {
    let content = `<img src="${imageUrl}" alt="Imagen del blog" style="width:100%; height:auto;">
                   <h5>${title}</h5>
                   <p>${description}</p>
                   <p><small>Publicado el: ${new Date(createdAt).toLocaleDateString()}</small></p>`;

    if (isAuthenticated) {
        content += `<button onclick="editarBlog(${blogId})" class="btn btn-warning">Actualizar</button>
                    <button onclick="eliminarBlog(${blogId})" class="btn btn-danger">Eliminar</button>`;
    }

    Swal.fire({
        html: content,
        showCloseButton: true,
        width: '600px'
    });
}





function editarBlog(blogId) {
    // Redirigir a la página de edición del blog
    window.location.href = `/blogs/${blogId}/edit`;
}

function eliminarBlog(blogId) {
    // Primero mostramos una alerta de confirmación con SweetAlert
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminarlo',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Si el usuario confirma, procede a eliminar el blog
            fetch(`/blogs/${blogId}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error al eliminar el blog');
                }
                return response.json();
            })
            .then(data => {
                // Mostrar mensaje de éxito
                Swal.fire({
                    title: 'Eliminado!',
                    text: 'El blog ha sido eliminado con éxito.',
                    icon: 'success',
                    confirmButtonText: 'Ok'
                }).then(() => {
                    // Recargar la página para actualizar los cambios
                    location.reload();
                });
            })
            .catch(error => {
                // Mostrar mensaje de error
                Swal.fire({
                    title: 'Error!',
                    text: 'Hubo un problema al eliminar el blog.',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                });
                console.error('Error:', error);
            });
        }
    });
}

