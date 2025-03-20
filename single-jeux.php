<?php
get_header(); ?>

<div class="game-page">
    <?php 
    // Récupérer l'image du jeu
    $image_jeu = get_field('image-jeux');
    if ($image_jeu) : ?>
        <div class="game-banner">
            <img src="<?php echo esc_url($image_jeu['url']); ?>" alt="<?php echo esc_attr($image_jeu['alt']); ?>">
        </div>
    <?php endif; ?>

    <div class="game-content">
        <h1><?php the_title(); ?></h1>

        <?php 
        // Récupérer et afficher la description du jeu
        $description = get_field('description');
        if ($description) : ?>
            <div class="game-description">
                <p><?php echo esc_html($description); ?></p>
            </div>
        <?php endif; ?>

       <section class="teams-section">
    <h2>Nos Équipes</h2>
    <span class="trait-noir"></span>
    <div class="teams-grid">
        <?php
        // Récupérer les équipes associées à ce jeu via ACF
        $equipes = get_field('equipes');

        if ($equipes) :
            foreach ($equipes as $equipe) :
                $image_equipe = get_field('logo_d_equipe', $equipe->ID); // Logo de l'équipe
                $team_link = get_permalink($equipe->ID); // Lien vers la page de l'équipe
        ?>
                <a href="<?php echo esc_url($team_link); ?>" class="team-card">
                    <?php if ($image_equipe) : ?>
                        <div class="team-image">
                            <img class="image-equipe" src="<?php echo esc_url($image_equipe['url']); ?>" alt="<?php echo esc_attr($image_equipe['alt']); ?>">
                        </div>
                    <?php endif; ?>
                    <h3><?php echo esc_html(get_the_title($equipe->ID)); ?></h3>
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
    <h2>Les actus de <?php the_title(); ?></h2>
    <div class="news-grid">
        <?php
        // Récupérer le nom du jeu pour filtrer les articles avec ce tag
        $nom_jeu = get_the_title();
        $tag_slug = sanitize_title($nom_jeu); // Transformer le titre en slug utilisable pour le tag

        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => 3,
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
        <button onclick="window.location.href='<?php echo get_tag_link($tag_info->term_id); ?>'">
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
    <h3>Tu veux nous aider à gagner des<strong>trophées </strong>?</h3>
    <button>JE CANDIDATE</button>
    </div>
    <img src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/triangle-dynamique-1.webp')); ?>" alt="Logo header">
    <img src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/fond-dynamique.webp')); ?>" alt="Logo header">
    </section>




<?php get_footer(); ?>

