<?php get_header(); ?>




<main class="home-page">
    <!-- Section Hero -->
    <section class="hero">
    <img src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/image-accueil.webp')); ?>" alt="Logo header">
        <div class="hero-content">
            <h1><?php echo get_theme_mod('hero_title', 'Bienvenue sur le nouveau site de UNIFIED CHAMPIONS'); ?></h1>
        </div>
        <button>EN SAVOIR PLUS</button>
    </section>







    <section class="joueurs-a-la-une">
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

<section>
    <div class="equipe">
        <h3>L'ÉQUIPE UNIVERSITAIRE QUI VISE LES SOMMETS !</h3>
        <p>Unified Champions s’est rapidement affirmée comme une équipe universitaire de référence. Créée par Pascal Chatonnay, Stéphane Laurent et Éric Monnin, l’équipe combine performance sportive et esprit collectif pour viser toujours plus haut. Avec des ambitions qui dépassent les frontières, Unified Champions s’est donné un objectif clair : exceller dans toutes ses disciplines et porter fièrement les couleurs de l’université sur les plus grandes scènes.</p>
    </div>
    <img src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/image-club-pres.webp')); ?>" alt="Logo header">
</section>







<!-- Section Jeux -->
<section class="games-section">
        <h2>Nos Sports</h2>
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
        </div>
    </section>








        <!-- Section Actualités -->
        <section class="news-section">
        <h2>Les actus</h2>
        <div class="news-grid">
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 3
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
                    </div>
                    </a>
                </article>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
        <button>VOIR LES ACTUS</button>
    </section>






    <!-- Section Discord -->
    <section class="discord">
    <div>
    <h3>Tu veux faire partie de la <strong>communauté </strong>?</h3>
    <button>REJOINDRE LE DISCORD</button>
    </div>
    <img src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/triangle-dynamique.webp')); ?>" alt="Logo header">
    <img src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/fond-dynamique.webp')); ?>" alt="Logo header">
    </section>







</main>
<?php get_footer(); ?>