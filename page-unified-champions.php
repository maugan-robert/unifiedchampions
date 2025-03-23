<style>
    /* Page header */


    .page-header {
        max-width: 1200px;
        padding: 15vh 7vw;
        display: flex;
        flex-direction: column;
        gap: 40px;
    }

    /* Première section avec le logo, le texte et une image */
    .page-header-content-1 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        align-items: start;
        gap: 40px;
    }

    .page-header-text {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }


    .page-header-text h1 {
        font-size: 50px;
        line-height: 1.6;
        margin: 0;
    }

    /* Image de droite */
    .page-header-content-1 img:last-child {
        height: 100%;
        object-fit: cover;
    }

    /* Deuxième section avec texte et image */
    .page-header-content-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        align-items: start;
        gap: 40px;
    }

    .page-header-content-2 p,
    .page-header-content-1 p {
        font-size: 16px;
        line-height: 1.6;
        color: #333;
        margin: 0;
    }

    /* Image de gauche */
    .page-header-content-2 img {
        height: 100%;
        object-fit: cover;
    }

    /* Responsive */
    @media (max-width: 1024px) {

        .page-header-content-1,
        .page-header-content-2 {
            grid-template-columns: 1fr;
        }

    }

    @media (max-width: 768px) {
        .page-header-text {
            flex-direction: column-reverse;
            /* Inverse l'ordre des éléments au format mobile */
        }

        .page-header-content-1 {
            display: flex;
            flex-direction: column-reverse;
            /* Inverse l'ordre des colonnes au format mobile */
        }

        /* Ajout pour que les images prennent toute la largeur du viewport */
        .page-header img {
            width: 100vw;
            height: auto;
            object-fit: cover;
        }

        .page-header {
            padding: 15vh 0; /* Supprime les padding latéraux */
        }
    }
</style>


<?php
/*
Template Name: Unified Champions
*/

get_header(); ?>

<main class="unified-champions-page">

    <section class="page-header">
        <div class="page-header-content-1">
            <div class="page-header-text">
                <h1>Unified Champions Club</h1>
                <p>L’association Unified Champions Club a été fondée en 2022, avec pour ambition de représenter l’Université de Franche-Comté dans le monde de l’esport universitaire. Dès sa création, l'association s’est donnée pour objectif de fédérer les étudiants autour de la passion du gaming tout en permettant à ses membres de se former et de se perfectionner dans un environnement compétitif. Aujourd'hui, l'association compte 6 équipes en professionnalisation, spécialisées dans des jeux tels que League of Legends, Valorant et Rocket League, avec des joueurs évoluant à des niveaux toujours plus élevés dans les compétitions nationales et internationales.  Au-delà de ses performances sportives, Unified Champions Club se distingue par sa dimension éducative et sociale. L’association est un véritable lieu de loisirs, de rencontres et de formation aux enjeux de l’esport. Nous avons mis en place une communauté Discord qui regroupe plus de 500 membres actifs, où les étudiants peuvent échanger, s’entraider, et participer à des événements, des tournois internes et des animations. Cette plateforme est également utilisée pour interagir en direct avec nos supporters et proposer des activités ludiques, tout en modérant les échanges via nos bénévoles et modérateurs. Nos bénévoles jouent un rôle clé en animant aussi bien la communauté Discord que le chat sur notre plateforme de diffusion Twitch, où nous partageons nos matchs et événements en direct.</p>
            </div>
            <img src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/1_1staff_1.webp')); ?>" alt="Logo header">
        </div>
        <div class="page-header-content-2">
            <img src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/2_1_targon.webp')); ?>" alt="Logo header">
            <p>
                Le staff de l’association est composé de passionnés et de professionnels, avec des membres tels que Pascal Chatonnay et Léna Chatonnay, qui ont contribué à l'organisation et à la structuration du projet, ainsi que des étudiants et bénévoles engagés qui apportent leur expertise pour faire grandir l'association.
                En 2023, Unified Champions Club a franchi un nouveau cap en collaborant avec un enseignant-chercheur de l’université pour lancer une unité d’enseignement libre sur les enjeux de l’esport. Ce programme comprend 24 heures de cours optionnels, dont 12 heures de pratique, afin de permettre aux étudiants de découvrir et de se former aux différents aspects du secteur, du gameplay à la gestion des équipes en passant par la stratégie.
                Dans cette dynamique de croissance, Unified Champions Club entend continuer à s’impliquer activement dans la formation des futurs professionnels de l’esport, tout en cultivant un esprit d’équipe et de convivialité. Notre objectif reste de jouer ensemble, s’amuser ensemble, apprendre ensemble et, bien sûr, gagner ensemble, tout en construisant une communauté soudée et engagée autour de l’esport universitaire.</p>
        </div>
    </section>

    <div class="page-content">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                the_content();
            endwhile;
        endif;
        ?>

        <section class="staff-section">
            <h2>LE STAFF</h2>
            <div class="staff-grid">
                <?php
                $args = array(
                    'post_type' => 'staff',
                    'posts_per_page' => -1
                );

                $staff_query = new WP_Query($args);

                if ($staff_query->have_posts()) :
                    while ($staff_query->have_posts()) : $staff_query->the_post();
                        $role = get_field('role');
                ?>
                        <div class="staff-card">

                            <h3 class="staff-name"><?php the_title(); ?></h3>
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="staff-image">
                                    <?php the_post_thumbnail('medium'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($role) : ?>
                                <div class="staff-role"><?php echo esc_html($role); ?></div>
                            <?php endif; ?>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>