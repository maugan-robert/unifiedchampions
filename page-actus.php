<style>
    /* 📰 SECTION ACTUS */
    .news-page {
        max-width: 100vw;
        padding: 5vh 5vw;
        background-color: #FAFAFA;
    }

    /* 📌 Titre & intro */
    .news-page h1 {
        font-size: 2.5rem;
        text-align: left;
    }

    .news-intro {
        font-size: 1.2rem;
        color: #555;
        margin-bottom: 20px;
        max-width: 900px;
    }

    /* 🎯 FILTRE */
    .news-filter {
        display: flex;
        justify-content: space-between;
    }

    .news-filter input,
    .news-filter select {
        padding: 10px;
        font-size: 1rem;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    /* 📌 GRILLE DES 2 ARTICLES RÉCENTS */
    .news-highlight {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        margin-top: 15vh;
    }

    .news-highlight .news-card {
        position: relative;
    }

    .news-highlight .news-image img {
        width: 100%;
        height: auto;
    }

    .news-image img {
        width: 100% !important;
        height: auto !important;
        max-width: none !important;
    }


    /* 📌 GRILLE DES AUTRES ARTICLES */
    .news-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-top: 15vh;
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

    .news-card .news-content {
        padding: 10px;
    }

    .news-card h3 {
        font-size: 1.1rem;
        margin: 0;
    }

    /* 📱 RESPONSIVE */
    @media (max-width: 1024px) {
        .news-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 768px) {
        .news-highlight {
            grid-template-columns: 1fr;
        }

        .news-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 480px) {
        .news-grid {
            grid-template-columns: 1fr;
        }

        .news-filter {
            flex-direction: column;
        }

        .news-filter input,
        .news-filter select {
            width: 100%;
            margin-bottom: 10px;
        }
    }

    .header-actus {
        display: flex;
        flex-direction: column;
        gap: 7vh;
    }

    .hidden {
        display: none !important;
    }
</style>


<?php
/*
Template Name: Page Actus
*/
get_header(); ?>

<main class="news-page">
    <section class="header-actus">
        <div class="title-actus">
            <h1>ACTUS</h1>
            <p class="news-intro">
                Restez connectés avec les dernières nouvelles de votre équipe universitaire préférée.
                Résultats de tournois, annonces d’événements, recrutement et conseils pour devenir meilleur !
            </p>
        </div>
        <!-- Barre de recherche et filtre -->
        <div class="news-filter">
            <input type="text" id="search-bar" placeholder="🔍 Rechercher un article..." onkeyup="filterArticles()">
            <select id="tag-filter" onchange="filterByTag()">
                <option value="">Filtrer par étiquette</option>
                <?php
                $tags = get_tags();
                $selected_tag = isset($_GET['tag']) ? sanitize_text_field($_GET['tag']) : '';
                foreach ($tags as $tag) {
                    $selected = ($selected_tag === $tag->slug) ? 'selected' : '';
                    echo '<option value="' . esc_attr($tag->slug) . '" ' . $selected . '>' . esc_html($tag->name) . '</option>';
                }
                ?>
            </select>
        </div>
    </section>

    <!-- Grille des 2 articles les plus récents -->
    <div class="news-highlight" id="news-highlight">
        <?php
        $recent_args = array(
            'post_type'      => 'post',
            'posts_per_page' => 2,
            'paged'          => 1
        );
        $recent_query = new WP_Query($recent_args);

        if ($recent_query->have_posts()) :
            while ($recent_query->have_posts()) : $recent_query->the_post(); ?>
                <article class="news-card large" data-title="<?php echo strtolower(get_the_title()); ?>" data-tags="<?php echo implode(',', wp_get_post_tags(get_the_ID(), array('fields' => 'slugs'))); ?>">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="news-image">
                                <?php the_post_thumbnail('large'); ?>
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
        <?php endwhile;
            wp_reset_postdata();
        endif; ?>
    </div>

    <!-- Grille des autres articles -->
    <div class="news-grid" id="news-list">
        <?php
        $other_args = array(
            'post_type'      => 'post',
            'posts_per_page' => 12,
            'paged'          => 1,
            'offset'         => 2
        );
        $other_query = new WP_Query($other_args);

        if ($other_query->have_posts()) :
            while ($other_query->have_posts()) : $other_query->the_post(); ?>
                <article class="news-card small" data-title="<?php echo strtolower(get_the_title()); ?>" data-tags="<?php echo implode(',', wp_get_post_tags(get_the_ID(), array('fields' => 'slugs'))); ?>">
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
        <?php endwhile;
            wp_reset_postdata();
        endif; ?>
    </div>

    <!-- Grille des articles filtrés -->
    <div class="news-grid hidden" id="filtered-news-list">
        <?php
        if (isset($_GET['tag'])) {
            $tag = sanitize_text_field($_GET['tag']);
            $filtered_args = array(
                'post_type'      => 'post',
                'posts_per_page' => -1,
                'tag'            => $tag
            );
            $filtered_query = new WP_Query($filtered_args);

            if ($filtered_query->have_posts()) :
                while ($filtered_query->have_posts()) : $filtered_query->the_post(); ?>
                    <article class="news-card small" data-title="<?php echo strtolower(get_the_title()); ?>" data-tags="<?php echo implode(',', wp_get_post_tags(get_the_ID(), array('fields' => 'slugs'))); ?>">
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
        <?php endwhile;
                wp_reset_postdata();
            else :
                echo "<p>Aucun article trouvé pour ce tag.</p>";
            endif;
        }
        ?>
    </div>

    <!-- Pagination -->
    <div class="pagination">
        <?php
        echo paginate_links(array(
            'total'   => $query->max_num_pages,
            'current' => max(1, get_query_var('paged')),
            'format'  => '?paged=%#%',
            'prev_text' => '«',
            'next_text' => '»',
            'mid_size'  => 2
        ));
        ?>
    </div>

</main>


<script>
    function filterArticles() {
        let input = document.getElementById('search-bar').value.toLowerCase();
        let articles = document.querySelectorAll('.news-card');

        articles.forEach(article => {
            let title = article.getAttribute('data-title');
            if (title.includes(input)) {
                article.style.display = 'block';
            } else {
                article.style.display = 'none';
            }
        });
    }

    function filterByTag() {
        let selectedTag = document.getElementById('tag-filter').value;
        let highlightSection = document.getElementById('news-highlight');
        let otherSection = document.getElementById('news-list');
        let filteredSection = document.getElementById('filtered-news-list');

        if (selectedTag === "") {
            highlightSection.classList.remove('hidden');
            otherSection.classList.remove('hidden');
            filteredSection.classList.add('hidden');
        } else {
            highlightSection.classList.add('hidden');
            otherSection.classList.add('hidden');
            filteredSection.classList.remove('hidden');

            // Update URL with the selected tag
            const url = new URL(window.location.href);
            url.searchParams.set('tag', selectedTag);
            window.history.pushState({}, '', url);

            // Reload the page to fetch filtered articles
            location.reload();
        }
    }

    // Ensure the correct section is displayed on page load
    document.addEventListener('DOMContentLoaded', () => {
        const urlParams = new URLSearchParams(window.location.search);
        const selectedTag = urlParams.get('tag');
        const highlightSection = document.getElementById('news-highlight');
        const otherSection = document.getElementById('news-list');
        const filteredSection = document.getElementById('filtered-news-list');

        if (selectedTag) {
            highlightSection.classList.add('hidden');
            otherSection.classList.add('hidden');
            filteredSection.classList.remove('hidden');
        } else {
            highlightSection.classList.remove('hidden');
            otherSection.classList.remove('hidden');
            filteredSection.classList.add('hidden');
        }
    });
</script>

<?php get_footer(); ?>