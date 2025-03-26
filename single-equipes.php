<style>
    /* EQUIPE HERO HEADER */

    .equipe-header {
        position: relative;
        width: 100%;
        height: calc(100vh - 123.53px);
        /* Ajuste selon la taille désirée */
        display: flex;
        flex-direction: column;
        align-items: center;
        overflow: hidden;
    }

    .equipe-header>div {
        position: relative;
        width: 100%;
        height: 80%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .image-div-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 0;
    }

    .equipe-header-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 10px;
        z-index: 1;
        padding-top: 10vh;
    }

    .equipe-title {
        font-size: 3rem;
        font-weight: bold;
        color: white;
    }

    .equipe-navigation {
        width: 100%;
        height: 20%;
        display: flex;
        align-items: center;
        /* Center items vertically */
    }

    .equipe-navigation ul {
        display: flex;
        gap: 3vw;
        list-style: none;
        padding-left: 5vw;
    }

    .equipe-navigation ul li {
        font-size: 1.2rem;
        font-weight: bold;
        color: white;
    }

    .equipe-navigation ul li a {
        text-decoration: none;
        color: inherit;
        position: relative;
        padding-bottom: 5px;
        /* Add spacing between the text and the border */
    }

    .equipe-navigation ul li a::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background: rgb(255, 255, 255);
        transition: width 0.3s ease-in;
    }

    .equipe-navigation ul li a:hover::after {
        width: 100%;
    }

    .equipe-navigation ul li a.active::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background: rgb(255, 255, 255);
    }

    /* ROASTER CONTENT */

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


    /* Grille des joueurs */
    .joueurs-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 20px;
        margin-top: 7vh;
        margin-bottom: 7vh;
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

    /* Responsive */
    @media (max-width: 768px) {
        .joueurs-grid {
            grid-template-columns: 1fr;
        }

        .joueur-card {
            flex-direction: row;
            /* align-items: center; */
        }
    }

    .equipe-content {
        padding: 40px 5vw;
        background-color: #f8f8f8;
    }


    /* SECTION ACTUALITE */


    .news-section {
        padding: 7vh 5vw;
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
</style>


<?php get_header(); ?>



<main class="single-equipe-page">
    <section class="equipe-header">
        <?php
        // Récupérer la couleur de l'équipe
        $equipe = get_queried_object(); // Retrieve the current post object
        $equipes = get_field('equipes');
        $couleur_equipe = get_field('couleur-equipe', $equipe->ID);
        $couleur_equipe_claire = lighten_color($couleur_equipe, 30); // Éclaircir de 30%
        ?>
        <div style="background-color: <?php echo esc_attr($couleur_equipe); ?>;">
            <img class="image-div-background" src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/Logo_Black.webp')); ?>" alt="Logo_fond_header">
            <div class="equipe-header-content">
                <img src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/logo_white.webp')); ?>" alt="Logo_header">
                <h1 class="equipe-title"><?php the_title(); ?></h1>
            </div>
        </div>
        <nav class="equipe-navigation" style="background-color: <?php echo esc_attr($couleur_equipe_claire); ?>;">
            <ul>
                <li><a href="#roaster">Roaster</a></li>
                <!-- <li><a href="/">Match</a></li> -->
                <li><a href="#actus">Actus</a></li>
            </ul>
        </nav>
    </section>

    <section id="roaster" class="equipe-content">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                the_content();
            endwhile;
        endif;
        ?>

        <div class="joueurs-section">
            <h2 class="h2-section" id="joueurs">Le Roaster</h2>
            <span class="trait-noir"></span>
            <div class="joueurs-grid">
                <?php
                $joueurs = get_field('joueurs');
                if ($joueurs) :
                    foreach ($joueurs as $joueur) :
                        $numero = get_field('numero', $joueur->ID);
                        $prenom = get_field('prenom', $joueur->ID);
                        $nom = get_field('nom', $joueur->ID);
                        $image_joueur = get_field('image-joueurs', $joueur->ID);
                        $titre_joueur = get_the_title($joueur->ID); // Récupère le titre du post du joueur
                ?>
                        <a href="<?php echo get_permalink($joueur->ID); ?>" class="joueur-card">
                            <?php if ($image_joueur) : ?>
                                <div class="joueur-image">
                                    <img src="<?php echo esc_url($image_joueur['url']); ?>" alt="<?php echo esc_attr($prenom . ' ' . $nom); ?>">
                                </div>
                            <?php endif; ?>
                            <div class="joueur-info">
                                <div class="joueur-titre-nom">
                                    <h3 class="joueur-titre"><?php echo esc_html($titre_joueur); ?></h3>
                                    <h4 class="joueur-nom"><?php echo esc_html($prenom . ' ' . $nom); ?></h4>
                                </div>
                                <div class="joueur-numero-container">
                                    <p>JOUEUR</p>
                                    <h4 class="joueur-numero">#<?php echo esc_html($numero); ?></h4>
                                </div>
                            </div>
                        </a>
                <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </section>

    <section id="actus" class="news-section">
        <h2 class="h2-section">Les actus de <?php the_title(); ?></h2>
        <span class="trait-noir"></span>
        <div class="news-grid">
            <?php
            // Récupérer le nom de l'équipe pour filtrer les articles avec ce tag
            $nom_equipe = get_the_title();
            $tag_slug = sanitize_title($nom_equipe);

            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => 8,
                'tag'            => $tag_slug,
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
                <p>Aucune actualité disponible pour <?php echo esc_html($nom_equipe); ?>.</p>
            <?php endif; ?>
        </div>

        <?php
        if ($query->have_posts()) :
            $tag_info = get_term_by('slug', $tag_slug, 'post_tag');
            if ($tag_info) :
        ?>


                <button class="actu-btn" onclick="window.location.href='<?php echo home_url('/actus/'); ?>'">
                    VOIR TOUTES LES ACTUS
                </button>
        <?php
            endif;
        endif;
        ?>
    </section>
    </div>
</main>

<?php get_footer(); ?>

<?php
// Function to lighten a hex color
function lighten_color($hex, $percent)
{
    $hex = str_replace('#', '', $hex);
    $r = hexdec(substr($hex, 0, 2));
    $g = hexdec(substr($hex, 2, 2));
    $b = hexdec(substr($hex, 4, 2));

    $r = min(255, $r + ($r * $percent / 100));
    $g = min(255, $g + ($g * $percent / 100));
    $b = min(255, $b + ($b * $percent / 100));

    return sprintf("#%02x%02x%02x", $r, $g, $b);
}
?>

<script>
    document.querySelectorAll('.equipe-navigation a').forEach(anchor => {
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