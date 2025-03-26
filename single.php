<style>
    body {
        background-color: #FAFAFA;
    }

    .single-article {
        max-width: 800px;
        margin: 5rem auto;
        padding: 5rem;
        background-color: white;
    }

    .article-banner img {
        width: 100%;
        height: auto;
    }

    .article-tags,
    .article-meta {
        text-align: start;
        margin: 1rem 0;
        font-size: 0.9rem;
        color: #833269;
    }

    .article-title {
        font-size: 2rem;
        text-align: start;
        margin: 1.5rem 0;
    }

    .article-body {
        font-size: 1.1rem;
        line-height: 1.6;
    }

    .back-to-news {
        margin-top: 2rem;
    }

    .actu-btn {
        width: fit-content;
        gap: 8px;
        display: flex;
        padding: 0.8rem 1.5rem;
        align-items: center;
        justify-content: center;
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

    .actu-btn::before {
        content: "←";
        font-size: 16px;
        transition: transform 0.3s ease-in-out;
    }

    .actu-btn:hover::before {
        transform: translateX(-5px);
    }


    /* 📌 GRILLE DES AUTRES ARTICLES */
    .related-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-top: 15vh;
        margin-bottom: 15vh;
    }

    /* 📌 ARTICLES */
    .news-card {
        background: #fff;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .news-card:hover {
        transform: scale(1.02);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .news-card a {
        text-decoration: none;
        color: inherit;
        display: block;
    }

    /* 📌 Image des articles */
    .news-card .news-image img {
        width: 100%;
        height: auto;
        display: block;
    }

    /* 📌 Contenu de l'article */
    .news-card .news-content {
        padding: 10px;
    }

    .news-card h3 {
        font-size: 1.1rem;
        margin: 0;
    }

    .news-card .news-date {
        font-size: 0.9rem;
        color: #888;
    }

    @media (max-width: 768px) {
        .single-article {
            margin: 0 auto;
            padding-left: 20px;
            padding-right: 20px;
            padding-top: 0;
            padding-bottom: 0;
        }
    }
</style>

<?php get_header(); ?>

<main class="single-article">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <article class="article-content">
                <!-- Image en tête d'article -->
                <?php if (has_post_thumbnail()) : ?>
                    <div class="article-banner">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <?php
                $tags = get_the_tags();
                if ($tags) : ?>
                    <div class="article-tags">
                        <?php foreach ($tags as $index => $tag) : ?>
                            <span class="tag-item">
                                <a href="<?php echo get_tag_link($tag->term_id); ?>">
                                    <?php echo strtoupper($tag->name); ?>
                                </a>
                            </span>
                            <?php if ($index < count($tags) - 1) : ?>
                                <span class="tag-separator"> • </span>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>


                <div class="article-meta">
                    <?php
                    $categories = get_the_category();
                    if (!empty($categories)) :
                        $filtered_categories = array_filter($categories, function ($cat) {
                            return $cat->slug !== 'non-classe'; // Filtre la catégorie "Non classé"
                        });

                        if (!empty($filtered_categories)) :
                    ?>
                            <span class="article-category">
                                <?php foreach ($filtered_categories as $index => $category) : ?>
                                    <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
                                        <?php echo esc_html($category->name); ?>
                                    </a>
                                    <?php if ($index < count($filtered_categories) - 1) : ?>
                                        ,
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </span>
                    <?php
                        endif;
                    endif;
                    ?>

                    <time datetime="<?php echo get_the_date('c'); ?>" class="article-date">
                        <?php echo get_the_date('j F Y'); ?>
                    </time>
                </div>

                <h1 class="article-title"><?php the_title(); ?></h1>

                <div class="article-body">
                    <?php the_content(); ?>
                </div>



                <!-- Bouton retour aux actus -->
                <div class="back-to-news">
                    <a href="<?php echo site_url('/actus'); ?>" class="actu-btn">Retour aux actualités</a>
                </div>

            </article>

            <!-- Section articles liés -->
            <section class="related-articles">
                <h2>Articles similaires</h2>
                <div class="related-grid">
                    <?php
                    $related_args = array(
                        'post_type'      => 'post',
                        'posts_per_page' => 3,
                        'post__not_in'   => array(get_the_ID()), // Exclure l'article actuel
                        'tag__in'        => wp_get_post_tags(get_the_ID(), array('fields' => 'ids')), // Récupérer les articles avec les mêmes tags
                    );
                    $related_query = new WP_Query($related_args);

                    if ($related_query->have_posts()) :
                        while ($related_query->have_posts()) : $related_query->the_post();
                    ?>
                            <article class="news-card">
                                <a href="<?php the_permalink(); ?>">
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
                        echo "<p>Aucun article similaire.</p>";
                    endif;
                    ?>
                </div>
            </section>

    <?php endwhile;
    endif; ?>
</main>

<?php get_footer(); ?>