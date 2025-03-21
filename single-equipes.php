<?php get_header(); ?>

<main class="single-equipe-page">
<img src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/Logo_Black.webp')); ?>" alt="Logo header">
<img src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/Logo_Black.webp')); ?>" alt="Logo header">
    <div class="equipe-header">
        <h1 class="equipe-title"><?php the_title(); ?></h1>
    </div>

    <nav class="equipe-navigation">
        <?php
        wp_nav_menu(array(
            'menu' => 'menu-equipes',
            'container' => false,
            'menu_class' => 'equipe-menu-list'
        ));
        ?>
    </nav>

    <div class="equipe-content">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                the_content();
            endwhile;
        endif;
        ?>





        <div class="joueurs-section">
            <h2 id="joueurs">LES JOUEURS</h2>
            <div class="joueurs-grid">
                <?php
                $joueurs = get_field('joueurs');
                if ($joueurs) :
                    foreach ($joueurs as $joueur) :
                        $numero = get_field('numero', $joueur->ID);
                        $prenom = get_field('prenom', $joueur->ID);
                        $nom = get_field('nom', $joueur->ID);
                        $image_joueur = get_field('image-joueurs', $joueur->ID);
                ?>
                    <a href="<?php echo get_permalink($joueur->ID); ?>" class="joueur-card">
                        <?php if ($image_joueur) : ?>
                            <div class="joueur-image">
                                <img src="<?php echo esc_url($image_joueur['url']); ?>" alt="<?php echo esc_attr($prenom . ' ' . $nom); ?>">
                            </div>
                        <?php endif; ?>
                        <div class="joueur-info">
                            <div class="joueur-numero">#<?php echo esc_html($numero); ?></div>
                            <h3>JOUEUR</h3>
                            <h3 class="joueur-nom"><?php echo esc_html($prenom . ' ' . $nom); ?></h3>
                        </div>
                    </a>
                <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </div>


    <section class="news-section">
            <h2 #actus >Les actus de <?php the_title(); ?></h2>
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
                    <div class="news-button-container">
                    <a href="<?php echo home_url('/actus/'); ?>" class="news-button">
                        VOIR LES ACTUS
                    </a>
                </div>
            <?php 
                endif;
            endif;
            ?>
        </section>
    </div>
</main>


<?php get_footer(); ?>