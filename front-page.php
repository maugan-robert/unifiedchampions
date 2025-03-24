<?php get_header(); ?>

<style>
    /* Styles de la section Hero */
    .hero {
        position: relative;
        width: 100%;
        height: calc(100vh - 131.53px);
        /* Adjusted height */
        /* Pleine hauteur de l'écran */
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    /* Image en arrière-plan */
    .hero img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 1;
    }

    /* Superposition sombre pour améliorer la lisibilité du texte */
    .hero::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.4);
        /* Assombrissement */
        z-index: 2;
    }

    /* Contenu centré */
    .hero-content {
        position: relative;
        z-index: 3;
        text-align: center;
        color: white;
    }

    /* Titre principal */
    .hero-content h1 {
        font-size: 3rem;
        font-weight: bold;
        text-transform: uppercase;
        margin-bottom: 20px;
    }

    /* Bouton stylisé */
    .hero-content a {
        background: white;
        color: black;
        padding: 15px 30px;
        font-size: 1rem;
        font-weight: bold;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .hero-content a:hover {
        background: #742B57;
        color: white;
        border: 1px solid white;

    }

    /* Section joueurs à la une */


    .joueurs-a-la-une {
        text-align: center;
        padding-top: 15vh;
        padding-bottom: 15vh;
        padding-left: 20px;
        padding-right: 20px;
        background-color: #f8f8f8;
    }

    /* Titre */
    .joueurs-a-la-une h2 {
        font-size: 35px;
        font-weight: bold;
        text-transform: uppercase;
        margin-bottom: 10vh;
    }

    /* Conteneur des joueurs */
    .joueurs-container {
        display: flex;
        justify-content: center;
        gap: 5vw;
        flex-wrap: wrap;
    }

    /* Carte joueur */
    .joueur-card {
        text-decoration: none;
        color: white;
    }

    .joueur {
        position: relative;
        width: 260px;
        height: 380px;
        display: flex;
        align-items: flex-end;
        justify-content: center;
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.8) 100%);
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .joueur:hover {
        transform: scale(1.05);
    }

    /* Image */
    .joueur img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Nom du joueur */
    .nom {
        position: absolute;
        bottom: 10px;
        left: 50%;
        transform: translateX(-50%);
        font-size: 20px;
        font-weight: bold;
        text-transform: uppercase;
        text-align: center;
        background: rgba(0, 0, 0, 0.8);
        padding: 12px 15px;
        width: 90%;
    }

    /* Version mobile */
    @media (max-width: 768px) {
        .joueurs-container {
            flex-direction: column;
            align-items: center;
        }

        .joueur {
            width: 300px;
            height: 450px;
        }
    }

    /* SECTION DE L'EQUIPE */

    .equipe-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 40px;
        padding: 15vh 10%;

    }

    /* CONTENU TEXTE */
    .equipe-content {
        flex: 1;
        max-width: 50%;
    }

    .equipe-content h3 {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 16px;
    }

    .equipe-content p {
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .btn-decouvrir {
        display: inline-block;
        padding: 12px 20px;
        border: 2px solid black;
        text-decoration: none;
        font-size: 14px;
        font-weight: bold;
        transition: background 0.3s;
    }

    .btn-decouvrir:hover {
        background: black;
        color: white;
    }

    /* IMAGE */
    .equipe-image {
        flex: 1;
        max-width: 50%;
    }

    .equipe-image img {
        width: 100%;
        height: auto;
        display: block;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .equipe-section {
            flex-direction: column;
            text-align: left;
            padding: 40px 5%;
        }

        .equipe-content {
            max-width: 100%;
        }

        .equipe-image {
            max-width: 100%;
        }

        /* Rétablir l'alignement à gauche */
        .equipe-content h3,
        .equipe-content p,
        .btn-decouvrir {
            text-align: left;
        }
    }

    /* SECTION DES JEUX */


    .games-section {
        text-align: left;
        padding: 40px 5vw;
    }

    .h2-section {
        font-size: 1.8rem;
        font-weight: bold;
        margin-bottom: 21px;
    }

    .trait-noir {
        display: block;
        width: 15vh;
        height: 3px;
        background: black;
        margin-bottom: 20px;
    }

    .games-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-top: 7vh;
        margin-bottom: 7vh;
    }

    .game-card {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 250px;
        text-decoration: none;
        color: white;
        font-weight: bold;
        overflow: hidden;
        transition: transform 0.3s ease-in-out;
    }

    .game-card:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease-in-out;
    }

    .game-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        transition: transform 0.3s ease-in-out;
    }

    .game-card:hover .game-image img {
        transform: scale(1.1);
        transition: transform 0.3s ease-in-out;
    }

    .game-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease-in-out;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1;
        transition: background 0.3s ease-in-out;
    }

    .game-card:hover .overlay {
        background: rgba(0, 0, 0, 0.7);
    }


    .image-jeux-accueil {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .game-card {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 250px;
        text-decoration: none;
        color: white;
        font-weight: bold;
        overflow: hidden;
        transition: transform 0.3s ease-in-out;
    }

    .game-card:hover {
        transform: scale(1.05);
    }

    .game-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        transition: transform 0.3s ease-in-out;
    }

    .game-card:hover .game-image img {
        transform: scale(1.1);
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1;
        transition: background 0.3s ease-in-out;
    }

    .game-card:hover .overlay {
        background: rgba(0, 0, 0, 0.7);
    }


    .game-card h3 {
        position: absolute;
        z-index: 2;
        font-size: 1.6rem;
        font-weight: 900;
        text-align: center;
        max-width: 80%;
    }

    .coming-soon {
        background: #F5F5F5;
        display: flex;
        align-items: center;
        justify-content: center;
        color: black;
    }

    /* SECTION ACTUALITE */


    .news-section {
        padding: 15vh 5vw;
        background-color: #f8f8f8;
    }

    .news-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-top: 7vh;
        margin-bottom: 7vh;
    }

    .news-card {
        background: #fff;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        height: 100%;
        transition: transform 0.3s ease-in-out;
    }

    .news-card:hover {
        transform: scale(1.05);
    }

    .news-image img {
        width: 100%;
        height: 200px;
        /* Assure une taille uniforme */
        object-fit: cover;
        display: block;
    }

    .news-content {
        padding: 15px;
        flex-grow: 1;
        /* Remplit l’espace restant */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .news-content h3 {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .news-date {
        font-size: 14px;
        color: gray;
    }

    .actu-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 10px 20px;
        font-size: 14px;
        font-weight: bold;
        color: black;
        background: white;
        border: 2px solid black;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
    }

    .actu-btn:hover {
        background: black;
        color: white;
    }

    .actu-btn::after {
        content: "➝";
        font-size: 16px;
        transition: transform 0.3s ease-in-out;
    }

    .actu-btn:hover::after {
        transform: translateX(5px);
    }


    /* Responsive */
    @media (max-width: 1024px) {
        .news-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .news-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .news-section button {
            text-align: left;
        }
    }

    /* SECTION DISCORD */

    .discord {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        height: 100vh;
        max-height: 100vh;
        /* Prend toute la hauteur de l'écran */
        padding: 4rem 2rem;
        background: #f8f8f8;
        overflow: hidden;
    }

    .discord div {
        position: relative;
        z-index: 2;
        max-width: 800px;
    }

    .discord h2 {
        font-size: 80px;
        font-weight: bold;
        color: #000;
    }

    .discord h2 strong {
        color: #656BFF;
        text-decoration: underline;
    }

    .discord a {
        margin-top: 1.5rem;
        padding: 18px 24px;
        background: #656BFF;
        color: white;
        font-size: 1rem;
        font-weight: bold;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.3s;
    }

    .discord a:hover {
        background: #4a50cc;
    }

    .discord img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 1;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .discord {
            flex-direction: column;
            padding: 2rem;
        }

        .discord h2 {
            font-size: 40px;
            /* Adjusted font size for mobile */
        }

        .discord button {
            padding: 10px 20px;
            font-size: 0.9rem;
        }
    }
</style>

<main class="home-page">
    <!-- Section Hero -->
    <section class="hero">
        <img src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/image-accueil.webp')); ?>" alt="Logo header">
        <div class="hero-content">
            <h1><?php echo get_theme_mod('hero_title', 'Bienvenue sur le nouveau site de UNIFIED CHAMPIONS'); ?></h1>
            <a href="#alaune">EN SAVOIR PLUS</a>
        </div>

    </section>







    <section id="alaune" class="joueurs-a-la-une">
        <h2>JOUEURS À LA UNE !</h2>
        <div class="joueurs-container">
            <?php
            $args = [
                'post_type'      => 'joueurs',
                'posts_per_page' => 3,
                'meta_query'     => [
                    [
                        'key'   => 'joueur-a-la-une',
                        'value' => '1',
                    ]
                ]
            ];

            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    $image = get_field('image-joueurs');
                    if ($image) : ?>
                        <a href="<?php the_permalink(); ?>" class="joueur-card">
                            <div class="joueur">
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                <div class="nom"><?php the_title(); ?></div>
                            </div>
                        </a>
            <?php endif;
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </section>

    <section class="equipe-section">
        <div class="equipe-content">
            <h3>L'ÉQUIPE UNIVERSITAIRE QUI VISE LES SOMMETS !</h3>
            <p>
                Unified Champions s’est rapidement affirmée comme une équipe universitaire de référence.
                Créée par Pascal Chatonnay, Stéphane Laurent et Éric Monnin, l’équipe combine performance sportive
                et esprit collectif pour viser toujours plus haut. Avec des ambitions qui dépassent les frontières,
                Unified Champions s’est donné un objectif clair : exceller dans toutes ses disciplines et porter fièrement
                les couleurs de l’université sur les plus grandes scènes.
            </p>
            <a href="#" class="btn-decouvrir">DÉCOUVRIR</a>
        </div>

        <div class="equipe-image">
            <img src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/image-club-pres.webp')); ?>" alt="Unified Champions">
        </div>
    </section>







    <!-- Section Jeux -->
    <section class="games-section">
        <h2 class="h2-section">Nos Sports</h2>
        <span class="trait-noir"></span>
        <div class="games-grid">
            <?php
            $args = array(
                'post_type' => 'jeux',
                'posts_per_page' => -1
            );
            $games = new WP_Query($args);

            if ($games->have_posts()) :
                while ($games->have_posts()) : $games->the_post();
                    $image_jeux = get_field('image-jeux');
            ?>
                    <a href="<?php the_permalink(); ?>" class="game-card">
                        <div class="overlay"></div>
                        <?php if ($image_jeux) : ?>
                            <div class="game-image">
                                <img class="image-jeux-accueil" src="<?php echo esc_url($image_jeux['url']); ?>" alt="<?php echo esc_attr($image_jeux['alt']); ?>">
                            </div>
                        <?php endif; ?>
                        <h3><?php the_title(); ?></h3>
                    </a>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>

            <!-- Card "Bientôt disponible" ajoutée statiquement -->
            <div class="game-card coming-soon">
                <h3>Bientôt disponible...</h3>
            </div>
        </div>
    </section>










    <!-- Section Actualités -->
    <section class="news-section">
        <h2 class="h2-section">Les actus</h2>
        <span class="trait-noir"></span>
        <div class="news-grid">
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 4
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
            ?>
                    <article class="news-card">
                        <a href="<?php the_permalink(); ?>" class="read-more">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="news-image">
                                    <?php the_post_thumbnail('medium'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="news-content">
                                <h3><?php the_title(); ?></h3>
                                <time datetime="<?php echo get_the_date('c'); ?>" class="news-date">
                                    <?php echo get_the_date('j F Y'); ?>
                                </time>
                            </div>
                        </a>
                    </article>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
        <button class="actu-btn">VOIR LES ACTUS</button>
    </section>







    <!-- Section Discord -->
    <section class="discord">
        <div>
            <h2>Tu veux faire partie de la <strong>communauté </strong>?</h2>
            <a href="https://discord.gg/uCnvuGDTqu" target="_blank">REJOINDRE LE DISCORD</a>
        </div>
        <img src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/fonddynamique.webp')); ?>" alt="fond-dynamique">
    </section>

</main>
<?php get_footer(); ?>

<script>
    document.querySelectorAll('.hero-content a').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
</script>