document.addEventListener('DOMContentLoaded', function() {
    // Cargar blogs con AJAX
    fetch('/blogs')
        .then(response => response.json())
        .then(data => {
            let container = document.getElementById('blog-container');
            container.innerHTML = '';
            data.forEach(blog => {
                let blogHTML = `
                    <div class="blog-post">
                        <h3>${blog.title}</h3>
                        <p>${blog.description}</p>
                        <img src="${blog.image_url}" alt="Blog Image">
                    </div>`;
                container.innerHTML += blogHTML;
            });
        });
});
