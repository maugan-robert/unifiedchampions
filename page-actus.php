<?php
/*
Template Name: Page Actus
*/
get_header(); ?>

<main class="news-page">
    <h1>ACTUS</h1>
    <p class="news-intro">
        Restez connectés avec les dernières nouvelles de votre équipe universitaire préférée. 
        Résultats de tournois, annonces d’événements, recrutement et conseils pour devenir meilleur !
    </p>

    <!-- Barre de recherche et filtre -->
    <div class="news-filter">
        <input type="text" id="search-bar" placeholder="🔍 Rechercher un article..." onkeyup="filterArticles()">
        
        <select id="tag-filter" onchange="filterByTag()">
            <option value="">Filtrer par étiquette</option>
            <?php
            $tags = get_tags();
            foreach ($tags as $tag) {
                echo '<option value="' . esc_attr($tag->slug) . '">' . esc_html($tag->name) . '</option>';
            }
            ?>
        </select>
    </div>

    <!-- Liste des articles avec pagination -->
    <div class="news-grid" id="news-list">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => 14,
            'paged'          => $paged
        );
        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
        ?>
                <article class="news-card" data-title="<?php echo strtolower(get_the_title()); ?>" data-tags="<?php echo implode(',', wp_get_post_tags(get_the_ID(), array('fields' => 'slugs'))); ?>">
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
            echo "<p>Aucun article trouvé.</p>";
        endif;
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
    let articles = document.querySelectorAll('.news-card');

    articles.forEach(article => {
        let tags = article.getAttribute('data-tags').split(',');

        if (selectedTag === "" || tags.includes(selectedTag)) {
            article.style.display = 'block';
        } else {
            article.style.display = 'none';
        }
    });
}
</script>

<?php get_footer(); ?>
