<style>
    /* HERO SECTION */

    .game-hero {
        position: relative;
        width: 100%;
        height: calc(100vh - 123.53px);
        /* Prend toute la hauteur de l'écran */
        display: flex;
        align-items: flex-end;
        overflow: hidden;
    }

    .game-banner {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: -1;
    }

    .game-hero::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0));
        z-index: 0;
    }

    .game-hero h1 {
        position: relative;
        font-size: 80px;
        color: #fff;
        font-weight: bold;
        margin-bottom: 5vw;
        margin-left: 5vw;
        z-index: 1;
    }

    /* DESCRIPTION SECTION */

    .game-description {
        text-align: center;
        max-width: 800px;
        margin: 0 auto;
        padding: 50px 20px;
    }

    .game-description h2 {
        font-size: 20px;
        font-weight: bold;
        text-transform: uppercase;
        color: #742B57;
        /* Couleur du texte */
        position: relative;
        display: inline-block;
    }

    .game-description h2::before,
    .game-description h2::after {
        content: "";
        position: absolute;
        width: 50px;
        height: 2px;
        background-color: #742B57;
        /* Couleur des lignes */
        top: 50%;
    }

    .game-description h2::before {
        left: -60px;
    }

    .game-description h2::after {
        right: -60px;
    }

    .game-description p {
        font-size: 16px;
        color: #333;
        line-height: 1.6;
        margin-top: 10px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .game-description {
            padding: 30px 15px;
        }

        .game-description h2::before,
        .game-description h2::after {
            width: 30px;
        }

        .game-description h2::before {
            left: -40px;
        }

        .game-description h2::after {
            right: -40px;
        }

        .game-description p {
            font-size: 14px;
        }
    }

    /* TEAMS SECTION */

    .trait-noir {
        display: block;
        width: 15vh;
        height: 3px;
        background: black;
        margin-bottom: 20px;
    }

    .h2-section {
        font-size: 1.8rem;
        font-weight: bold;
        margin-bottom: 21px;
    }

    .teams-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        margin-top: 7vh;
        margin-bottom: 7vh;
    }

    .team-card {
        grid-column: span 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-decoration: none;
        color: black;
        background: white;
        padding: 20px;
        transition: transform 0.2s ease-in-out;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 768px) {
        .teams-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    .team-card:hover {
        transform: scale(1.02);
    }

    .team-image {
        width: 100%;
        max-width: 300px;
        /* Augmente la taille du logo */
    }

    .image-equipe {
        width: 100%;
        height: auto;
    }

    .team-name {
        font-size: 1.5rem;
        /* Texte plus grand */
        font-weight: bold;
        text-align: center;
        margin-top: 15px;
    }

    .teams-section {
        padding: 40px 5vw;
        text-align: left;
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
        color: #742B57;
        text-decoration: underline;
    }

    .discord button {
        margin-top: 1.5rem;
        padding: 18px 24px;
        background: #742B57;
        color: white;
        font-size: 1rem;
        font-weight: bold;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.3s;
    }

    .discord button:hover {
        background: rgb(138, 52, 103);
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


<?php
get_header(); ?>

<section class="game-page">
    <section class="game-hero">
        <?php
        // Récupérer l'image du jeu
        $image_jeu = get_field('image-jeux');
        if ($image_jeu) : ?>
            <img class="game-banner" src="<?php echo esc_url($image_jeu['url']); ?>" alt="<?php echo esc_attr($image_jeu['alt']); ?>">
        <?php endif; ?>
        <h1><?php the_title(); ?></h1>
    </section>

    <section class="game-description">
        <?php
        // Récupérer et afficher la description du jeu
        $description = get_field('description');
        if ($description) : ?>
            <h2><?php the_title(); ?></h2>
            <p><?php echo esc_html($description); ?></p>
        <?php endif; ?>
    </section>





    <section class="teams-section">
        <h2 class="h2-section">Nos Équipes</h2>
        <span class="trait-noir"></span>
        <div class="teams-grid">
            <?php
            // Récupérer les équipes associées à ce jeu via ACF
            $equipes = get_field('equipes');

            if ($equipes) :
                foreach ($equipes as $equipe) :
                    $image_equipe = get_field('logo_d_equipe', $equipe->ID); // Logo de l'équipe
                    $team_link = get_permalink($equipe->ID); // Lien vers la page de l'équipe
                    $fond_equipe = get_field('fond_d_equipe', $equipe->ID); // fond de l'équipe

            ?>
                    <a href="<?php echo esc_url($team_link); ?>" class="team-card" style="position: relative; overflow: hidden;">
                        <img style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0; z-index: 0;" src="<?php echo esc_url($fond_equipe['url']); ?>" alt="<?php echo esc_attr($fond_equipe['alt']); ?>" alt="Fond de l'équipe">
                        <?php if ($image_equipe) : ?>
                            <div class="team-image" style="z-index: 1; position: relative;">
                                <img class="image-equipe" src="<?php echo esc_url($image_equipe['url']); ?>" alt="<?php echo esc_attr($image_equipe['alt']); ?>" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                            </div>
                        <?php endif; ?>
                        <h3 class="team-name" style="z-index: 1; position: relative;"><?php echo esc_html(get_the_title($equipe->ID)); ?></h3>
                    </a>
            <?php
                endforeach;
            else :
                echo "<p>Aucune équipe n'est associée à ce jeu.</p>";
            endif;
            ?>
        </div>
    </section>


    <!-- Section Actualités du jeu -->
    <section class="news-section">
        <h2 class="h2-section">Les actus de <?php the_title(); ?></h2>
        <span class="trait-noir"></span>
        <div class="news-grid">
            <?php
            // Récupérer le nom du jeu pour filtrer les articles avec ce tag
            $nom_jeu = get_the_title();
            $tag_slug = sanitize_title($nom_jeu); // Transformer le titre en slug utilisable pour le tag

            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => 4,
                'tag'            => $tag_slug, // Filtrer avec le nom du jeu
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
            else :
                ?>
                <p>Aucune actualité disponible pour <?php the_title(); ?>.</p>
            <?php endif; ?>
        </div>

        <?php
        // Lien vers la page listant toutes les actus du jeu si des articles existent
        if ($query->have_posts()) :
            $tag_info = get_term_by('slug', $tag_slug, 'post_tag');
            if ($tag_info) :
        ?>
                <button class="actu-btn" onclick="window.location.href='<?php echo get_tag_link($tag_info->term_id); ?>'">
                    VOIR TOUTES LES ACTUS
                </button>
        <?php
            endif;
        endif;
        ?>
    </section>



    <!-- Section Discord -->
    <section class="discord">
        <div>
            <h2>Tu veux faire partie de la <strong>communauté </strong>?</h2>
            <button>REJOINDRE LE DISCORD</button>
        </div>
        <img src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/fond_dynamique_jeu.webp')); ?>" alt="fond-dynamique">
    </section>
    <?php get_footer(); ?>