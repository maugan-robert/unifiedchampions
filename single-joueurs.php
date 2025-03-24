<?php
get_header();

// Récupération des champs ACF
$pseudo = get_the_title(); // Le titre du post représente le pseudo du joueur
$prenom = get_field('prenom');
$nom = get_field('nom');
$numero = get_field('numero');
$biographie = get_field('biographie');
$equipes = get_field('equipes'); // Relation avec les équipes
$couleur_equipe = null;

// Récupérer la couleur de l'équipe si le joueur appartient à une équipe
if ($equipes && is_array($equipes) && count($equipes) > 0) {
    $couleur_equipe = get_field('couleur-equipe', $equipes[0]->ID); // Récupère la couleur de la première équipe
}

$twitch = get_field('twitch');
$instagram = get_field('instagram');
$TRN = get_field('trn');
$opgg = get_field('opgg');
$rlgg = get_field('rlgg');
$clip = get_field('clip');
$image_joueur_2 = get_field('image-joueurs-2');

?>

<style>
    :root {
        --team-color: <?php echo esc_attr($couleur_equipe); ?>;
    }

    /* SECTION HEADER PLAYER */

    .player-header {
        display: flex;
        align-items: flex-end;
        /* Alignement en bas */
        justify-content: space-between;
        padding-left: 2rem;
        padding-right: 2rem;
        padding-top: 2rem;
        background-color: var(--team-color);
        position: relative;
        height: 100%;
        /* Pleine hauteur */
    }

    .player-image {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: flex-end;
        /* Coller l'image en bas */
    }

    .player-image img {
        height: 100%;
        max-height: 300px;
        object-fit: cover;
        display: block;
    }

    .player-info {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        align-items: flex-start;
        text-align: left;
        gap: 0.5rem;
        padding-bottom: 2rem;
    }

    .player-details {
        display: flex;
        flex-direction: row;
        align-items: start;
        gap: 3vw;
    }

    .player-name {
        display: flex;
        flex-direction: column;
    }

    .player-name h1 {
        font-size: 70px;
        font-weight: bolder;
        margin: 0;
        color: #fff;
        text-transform: uppercase;
    }

    .player-real-name {
        font-size: 1.2rem;
        color: #fff;
        margin: 0;
    }

    .player-number {
        font-size: 25px;
        font-weight: bold;
        background: #aaa;
        color: white;
        padding-left: 0.6rem;
        padding-right: 0.6rem;
        padding-top: 0.6rem;
        padding-bottom: 0.3rem;
        text-align: center;
        width: fit-content;
    }

    .player-socials {
        display: flex;
        gap: 0.8rem;
        margin-top: 1rem;
    }

    .player-socials a img {
        width: 32px;
        height: 32px;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .player-header {
            align-items: center;
            text-align: center;
            flex-direction: column-reverse;
            padding-top: 4rem;
        }

        .player-image img {
            max-height: 200px;
        }

        .player-name h1 {
            justify-content: center;
        }
    }

    /* SECTION BIO PLAYER */

    .h2-section {
        font-size: 1.8rem;
        font-weight: bold;
        margin-bottom: 21px;
    }

    .trait-noir {
        display: block;
        width: 15vh;
        height: 3px;
        background: #9E2527;
        margin-bottom: 20px;
    }

    .player-bio {
        padding: 15vh 5vw;
        color: #111;

    }

    .player-bio p {
        max-width: 900px;
        font-size: 1.1rem;
        line-height: 1.6;
    }

    /* Mobile : texte centré */
    @media (max-width: 768px) {
        .player-bio {
            text-align: left;
            max-width: 90%;
        }

        .player-bio p {
            font-size: 1rem;
        }
    }

    /* SECTION TEAMS PLAYER */

    /* Grille des joueurs */
    .team-list {
        display: flex;
        flex-wrap: wrap;
        align-items: stretch;
        /* Aligne l'image et la grille sur la même hauteur */
        gap: 7vw;
        /* Espacement entre l'image et la grille */
        margin-top: 7vh;
        margin-bottom: 7vh;
    }

    .image-equipe {
        height: 300px;
        /* Hauteur fixe */
        width: auto;
        object-fit: contain;
        flex-shrink: 0;
        display: block;
        /* Empêche le redimensionnement */
    }

    /* Grille des joueurs */
    .joueurs-grid {
        display: grid;
        gap: 10px;
        flex-grow: 1;
        height: 300px;
        align-items: start;
        grid-template-columns: 1fr;
        /* Par défaut, 1 seule colonne */
    }

    /* Carte joueur */
    .joueur-card {
        display: flex;
        align-items: stretch;
        /* Permet à l'image de prendre toute la hauteur */
        background: #fff;
        overflow: hidden;
        text-decoration: none;
        color: #000;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
        border-right: 5px solid #800000;
    }

    .joueur-card:hover {
        transform: scale(1.02);
    }

    /* Image du joueur */
    .joueur-image {
        width: 100px;
        flex-shrink: 0;
        /* Empêche la réduction de la largeur */
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .joueur-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Informations du joueur */
    .joueur-info {
        flex: 1;
        padding: 10px 15px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    /* Nom et prénom */
    .joueur-titre-nom {
        font-size: 1rem;
    }

    .joueur-titre {
        font-weight: 700;
        text-transform: uppercase;
        margin: 0;
    }

    .joueur-nom {
        font-weight: 300;
        color: #666;
        margin: 0;
    }

    /* Numéro et rôle */
    .joueur-numero-container {
        display: flex;
        align-items: center;
    }

    .joueur-numero-container p {
        background: #999999;
        color: #fff;
        font-size: 0.9rem;
        font-weight: 700;
        padding: 5px 10px;
        margin: 0;
        /* Suppression de l'espace entre les éléments */
    }

    .joueur-numero {
        background: #800000;
        color: #fff;
        font-size: 0.9rem;
        font-weight: 700;
        padding: 5px 10px;
        margin: 0;
        /* Suppression de l'espace entre les éléments */
    }


    /* À partir de 3 joueurs, 2 colonnes équilibrées */
    @media (min-width: 768px) {
        .joueurs-grid:has(.joueur-card:nth-child(3)) {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    /* À partir de 5 joueurs, 3 colonnes équilibrées */
    @media (min-width: 1024px) {
        .joueurs-grid:has(.joueur-card:nth-child(5)) {
            grid-template-columns: repeat(3, 1fr);
        }
    }


    /* Responsive */
    @media (max-width: 768px) {
        .team-list {
            flex-direction: column;
            align-items: center;
        }

        .joueurs-grid {
            height: auto;
            /* Ajustement dynamique */
            width: 100%;
            grid-template-columns: 1fr;
            /* Une seule colonne */
        }

        .image-equipe {
            width: 100%;
            height: auto;
            max-height: 300px;
        }

        .joueur-card {
            flex-direction: row;
            /* align-items: center; */
        }

    }

    .player-teams {
        padding-left: 5vw;
        padding-right: 5vw;
        padding-bottom: 7vh;
    }

    .team-section {
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        gap: 2rem;
        margin-top: 7vh;
        margin-bottom: 7vh;
    }

    @media (max-width: 768px) {
        .team-section {
            flex-direction: column;
            align-items: start;
            gap: 7vh;
        }
    }

    .team-card {
        transition: transform 0.2s ease-in-out;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        height: fit-content;
        width: fit-content;
    }

    .team-card:hover {
        transform: scale(1.02);
    }

    /* SECTION CLIPS PLAYER */


    .player-clips {
        max-width: 100vw;
        padding-left: 5vw;
        padding-right: 5vw;
        padding-top: 7vh;
        padding-bottom: 15vh;
        background-color: #f8f8f8;
    }

    .player-clips video {
        width: 100%;
        max-width: 100%;
        height: auto;
        max-height: 400px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    @media (max-width: 768px) {
        .player-clips video {
            max-height: 300px;
        }
    }

    .video {
        margin-top: 7vh;
    }
</style>

<main class="player-profile">
    <section class="player-header" style="background-color: var(--team-color);">
        <div class="player-image">
            <?php if ($image_joueur_2): ?>
                <img src="<?php echo esc_url($image_joueur_2['url']); ?>" alt="<?php echo esc_attr($pseudo); ?>">
            <?php endif; ?>
        </div>
        <div class="player-info">
            <div class="player-details">
                <div class="player-name">
                    <h1><?php echo esc_html($pseudo); ?></h1>
                    <p class="player-real-name"><?php echo esc_html($prenom . ' ' . $nom); ?></p>
                </div>
                <span class="player-number"><?php echo esc_html($numero); ?></span>
            </div>
            <div class="player-socials">
                <?php if ($twitch): ?>
                    <a href="<?php echo esc_url($twitch); ?>" target="_blank"><img src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/ri_twitch_white.webp')); ?>" alt="twitch_white"></a>
                <?php endif; ?>
                <?php if ($instagram): ?>
                    <a href="<?php echo esc_url($instagram); ?>" target="_blank"><img src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/mdi_instagram_white.webp')); ?>" alt="insta_white"></a>
                <?php endif; ?>
                <?php if ($TRN): ?>
                    <a href="<?php echo esc_url($TRN); ?>" target="_blank"><img src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/TRN.webp')); ?>" alt="trn"></a>
                <?php endif; ?>
                <?php if ($opgg): ?>
                    <a href="<?php echo esc_url($opgg); ?>" target="_blank"><img src="" alt=""></a>
                <?php endif; ?>
                <?php if ($rlgg): ?>
                    <a href="<?php echo esc_url($rlgg); ?>" target="_blank"><img src="" alt=""></a>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="player-bio">
        <h2 class="h2-section">Biographie</h2>
        <span class="trait-noir"></span>
        <p><?php echo esc_html($biographie); ?></p>
    </section>



    <section class="player-teams">
        <h2 class="h2-section">Équipes de <?php echo esc_html($pseudo); ?></h2>
        <span class="trait-noir"></span>
        <?php if ($equipes): ?>
            <?php foreach ($equipes as $equipe): ?>
                <div class="team-section">
                    <?php
                    $image_equipe = get_field('logo_d_equipe', $equipe->ID);
                    ?>
                    <a class="team-card" href="<?php echo get_permalink($equipe->ID); ?>"><img class="image-equipe" src="<?php echo esc_url($image_equipe['url']); ?>" alt="<?php echo esc_attr($image_equipe['alt']); ?>"></a>

                    <?php
                    // Récupérer les joueurs liés à cette équipe, en excluant le joueur actuel
                    $args = array(
                        'post_type' => 'joueurs',
                        'posts_per_page' => -1,
                        'post__not_in' => array(get_the_ID()),
                        'meta_query' => array(
                            array(
                                'key' => 'equipes',
                                'value' => '"' . $equipe->ID . '"',
                                'compare' => 'LIKE'
                            )
                        )
                    );

                    $joueurs_query = new WP_Query($args);

                    if ($joueurs_query->have_posts()): ?>
                        <div class="joueurs-grid">
                            <?php while ($joueurs_query->have_posts()): $joueurs_query->the_post(); ?>
                                <a href="<?php the_permalink(); ?>" class="joueur-card">
                                    <?php
                                    $player_image = get_field('image-joueurs');
                                    $player_prenom = get_field('prenom');
                                    $player_nom = get_field('nom');
                                    $player_numero = get_field('numero');
                                    ?>
                                    <?php if ($player_image): ?>
                                        <div class="joueur-image">
                                            <img src="<?php echo esc_url($player_image['url']); ?>" alt="<?php the_title(); ?>">
                                        </div>
                                    <?php else: ?>
                                        <img src="https://via.placeholder.com/100" alt="Placeholder">
                                    <?php endif; ?>
                                    <div class="joueur-info">
                                        <div class="joueur-titre-nom">
                                            <h3 class="joueur-titre"><?php the_title(); ?></h3>
                                            <h4 class="joueur-nom"><?php echo esc_html($player_prenom . ' ' . $player_nom); ?></h4>
                                        </div>
                                        <div class="joueur-numero-container">
                                            <p>JOUEUR</p>
                                            <h4 class="joueur-numero">#<?php echo esc_html($player_numero); ?></h4>
                                        </div>
                                    </div>
                                </a>
                            <?php endwhile; ?>
                        </div>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>

    <section class="player-clips">
        <h2 class="h2-section">Clips</h2>
        <span class="trait-noir"></span>
        <?php if ($clip): ?>
            <video class="video" controls>
                <source src="<?php echo esc_url($clip['url']); ?>" type="video/mp4">
            </video>
        <?php endif; ?>
    </section>
</main>

<?php get_footer(); ?>