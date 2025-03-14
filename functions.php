<?php
// Activer les vignettes pour les articles
add_theme_support('post-thumbnail');
add_theme_support('post-thumbnails');

// Charger les styles (Google Fonts et Adobe Fonts)
function theme_enqueue_styles()
{
    // Importer le CSS principal
    wp_enqueue_style('style', get_stylesheet_uri());

    // Importer la police DM Sans depuis Google Fonts
    wp_enqueue_style('dm-sans-font', 'https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap', false);

    // Importer la police Adobe Fonts (remplacez "emz3bcr" par votre Kit ID)
    wp_enqueue_style('adobe-fonts', 'https://use.typekit.net/emz3bcr.css', array(), null);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

// Ajouter une nouvelle zone de menu au thème
function register_my_menu()
{
    register_nav_menus(array(
        'header-menu' => __('Header'),
        'footer-menu' => __('Footer'),
    ));
}
add_action('init', 'register_my_menu', 0);
