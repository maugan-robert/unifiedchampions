<?php
get_header(); 

// Récupération des champs ACF
$pseudo = get_the_title(); // Le titre du post représente le pseudo du joueur
$prenom = get_field('prenom');
$nom = get_field('nom');
$numero = get_field('numero');
$biographie = get_field('biographie');
$equipes = get_field('equipes'); // Relation avec les équipes
$twitch = get_field('twitch');
$instagram = get_field('instagram');
$opgg = get_field('opgg');
$rlgg = get_field('rlgg');
$clip = get_field('clip');
$image_joueur = get_field('image-joueurs');
$couleur_equipe = get_field('couleur-equipe'); // Utilisé pour la mise en page CSS

?>

<style>
    :root {
        --team-color: <?php echo esc_attr($couleur_equipe); ?>;
    }
</style>

<div class="player-profile">
    <div class="player-header" style="background-color: var(--team-color);">
        <div class="player-image">
            <?php if ($image_joueur): ?>
                <img src="<?php echo esc_url($image_joueur['url']); ?>" alt="<?php echo esc_attr($pseudo); ?>">
            <?php endif; ?>
        </div>
        <div class="player-info">
            <h1><?php echo esc_html($pseudo); ?> <span class="player-number"><?php echo esc_html($numero); ?></span></h1>
            <p class="player-real-name"><?php echo esc_html($prenom . ' ' . $nom); ?></p>
            <div class="player-socials">
                <?php if ($twitch): ?>
                    <a href="<?php echo esc_url($twitch); ?>" target="_blank">Twitch</a>
                <?php endif; ?>
                <?php if ($instagram): ?>
                    <a href="<?php echo esc_url($instagram); ?>" target="_blank">Instagram</a>
                <?php endif; ?>
                <?php if ($opgg): ?>
                    <a href="<?php echo esc_url($opgg); ?>" target="_blank">OP.GG</a>
                <?php endif; ?>
                <?php if ($rlgg): ?>
                    <a href="<?php echo esc_url($rlgg); ?>" target="_blank">RL.GG</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="player-bio">
        <h2>Biographie</h2>
        <p><?php echo esc_html($biographie); ?></p>
    </div>

    <div class="player-teams">
        <h2>Équipe</h2>
        <?php if ($equipes): ?>
            <div class="team-list">
                <?php foreach ($equipes as $equipe): ?>
                    <h3><?php echo esc_html(get_the_title($equipe->ID)); ?></h3>

                    <?php
                    // Récupérer les joueurs liés à cette équipe
                    $args = array(
                        'post_type' => 'joueurs', // Assure-toi que ton post type est bien "joueurs"
                        'posts_per_page' => -1,
                        'meta_query' => array(
                            array(
                                'key' => 'equipes', // Nom du champ ACF de relation
                                'value' => '"' . $equipe->ID . '"', // Vérifie que l'ID est bien en format string
                                'compare' => 'LIKE'
                            )
                        )
                    );

                    $joueurs_query = new WP_Query($args);

                    if ($joueurs_query->have_posts()): ?>
                        <div class="team-players">
                            <?php while ($joueurs_query->have_posts()): $joueurs_query->the_post(); ?>
                                <div class="team-player">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php
                                        $player_image = get_field('image-joueurs');
                                        if ($player_image): ?>
                                            <img src="<?php echo esc_url($player_image['url']); ?>" alt="<?php the_title(); ?>">
                                        <?php else: ?>
                                            <img src="https://via.placeholder.com/100" alt="Placeholder">
                                        <?php endif; ?>
                                    </a>
                                    <p class="player-pseudo"><?php the_title(); ?></p>
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <?php if ($equipes && count($equipes) === 1): // Vérifie si le joueur appartient à une seule équipe ?>
    <div class="view-team-button">
        <a href="<?php echo get_permalink($equipes[0]->ID); ?>" class="btn-view-team">Voir l'équipe</a>
    </div>
<?php endif; ?>


    <div class="player-clips">
        <h2>Clips</h2>
        <?php if ($clip): ?>
            <video controls>
                <source src="<?php echo esc_url($clip['url']); ?>" type="video/mp4">
            </video>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
