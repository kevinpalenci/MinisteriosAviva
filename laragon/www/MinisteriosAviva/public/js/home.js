// Lógica para ocultar y mostrar el menú lateral con íconos
function toggleSidebar() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.toggle('collapsed');
}

// Lógica para mostrar secciones dinámicas
function mostrarSeccion(seccion) {
    const secciones = document.querySelectorAll('.seccion-activa, .seccion-oculta');
    secciones.forEach(sec => sec.classList.add('seccion-oculta'));
    document.getElementById(seccion).classList.remove('seccion-oculta');
    document.getElementById(seccion).classList.add('seccion-activa');
}