<?php
include 'Views/Navbar.php';
include 'Views/ItemPortafolio.php';
include 'Views/ItemModal.php';

?>
<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Avatar Image-->
        <img class="masthead-avatar mb-5" src="assets/img/avataaars.svg" alt="..." />
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">DESARROLLADOR JUNIOR</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">Cristoffer Alexis Falla Marroquin</p>
    </div>
</header>
<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">MIS PROYECTOS</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Portfolio Grid Items-->
        <div class="row justify-content-center">
            <?php
            // Llamar a la función para renderizar items del portafolio
            renderPortfolioItem('assets/img/portfolio/cabin.png', '#portfolioModal1');
            renderPortfolioModal(
                'portfolioModal1',
                'SITIOS WEB',
                'assets/img/portfolio/cabin.png',
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.'
            );
            renderPortfolioItem('assets/img/portfolio/cake.png', '#portfolioModal2');
            renderPortfolioModal(
                'portfolioModal2',
                'APLICACIONES MOVILES',
                'assets/img/portfolio/cake.png',
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.'
            );
            renderPortfolioItem('assets/img/portfolio/circus.png', '#portfolioModal3');
            renderPortfolioModal(
                'portfolioModal3',
                'PLATAFORMAS DE E-COMMERCE',
                'assets/img/portfolio/circus.png',
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.'
            );
            renderPortfolioItem('assets/img/portfolio/game.png', '#portfolioModal4');
            renderPortfolioModal(
                'portfolioModal4',
                'APLICACIONES WEB',
                'assets/img/portfolio/game.png',
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.'
            );
            renderPortfolioItem('assets/img/portfolio/safe.png', '#portfolioModal5');
            renderPortfolioModal(
                'portfolioModal5',
                'APLICACIONES MOVILES',
                'assets/img/portfolio/safe.png',
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.'
            );
            renderPortfolioItem('assets/img/portfolio/submarine.png', '#portfolioModal6');
            renderPortfolioModal(
                'portfolioModal6',
                'SITIOS WEB',
                'assets/img/portfolio/submarine.png',
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.'
            );
            ?>
        </div>
    </div>
</section>
<section class="page-section bg-primary text-white mb-0" id="about">
    <div class="container">
        <!-- About Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-white">MIS EXPERIENCIAS:</h2>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- About Section Content-->
        <div class="row">
            <div class=" ms-auto">
                <p class="lead">Hola, mi nombre es Cristoffer Alexis Falla Marroquin,

                Soy un desarrollador web junior, estudiante de la Universidad Mariano Gálvez de Guatemala, apasionado por la creación de aplicaciones y sitios web interactivos. Me especializo en el desarrollo frontend con tecnologías como React, CSS y HTML5, y tengo experiencia en el backend con PHP, creando aplicaciones modulares y escalables. Mi enfoque combina diseño atractivo con funcionalidad robusta, siempre buscando mejorar la experiencia del usuario y mantenerme actualizado con las últimas tendencias tecnológicas. En mi tiempo libre, disfruto explorar nuevas tecnologías para seguir mejorando mis habilidades.</p>
            </div>
        </div>
        <!-- About Section Button-->
        <div class="text-center mt-4">
            <a class="btn btn-xl btn-outline-light" href="assets/img/curriculum.jpg" download="curriculum.jpg">
                <i class="fas fa-download me-2"></i>
                Descargate mi Curriculum
            </a>
        </div>
    </div>
</section>
<?php
include 'Views/Contact.php';
include 'Views/Footer.php';
?>