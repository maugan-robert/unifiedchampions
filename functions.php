<?php
// vignettes
add_theme_support( 'post-thumbnail' );
add_theme_support( 'post-thumbnails' );
// menus

function theme_enqueue_styles() {
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('dm-sans-font', 'https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap', false);

function add_adobe_fonts() {
        // Remplacez abc1234 par votre kit ID Adobe Fonts
        wp_enqueue_style('adobe-fonts', 'https://use.typekit.net/emz3bcr.css', array(), null);
    }
    add_action('wp_enqueue_scripts', 'add_adobe_fonts');
  }
  add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

//ajouter une nouvelle zone de menu à mon thème
function register_my_menu(){
    register_nav_menus( array(
        'header-menu' => __( 'Header'),
        'footer-menu'  => __( 'Footer'),
    ) );
}
add_action( 'init', 'register_my_menu', 0 );