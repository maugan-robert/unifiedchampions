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


class Sports_Menu_Walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        
        // Check if this is the Sports menu item
        if (strtolower($item->title) === 'sports') {
            $classes[] = 'menu-item-sports';
            
            // Get the games from CPT UI
            $games = get_posts(array(
                'post_type' => 'jeux', // Your CPT UI post type name
                'posts_per_page' => -1
            ));
            
            $item_output = '<a href="#">' . $item->title . '</a>';
            if (!empty($games)) {
                $item_output .= '<ul class="sub-menu">';
                foreach ($games as $game) {
                    $item_output .= '<li><a href="' . get_permalink($game->ID) . '">' . $game->post_title . '</a></li>';
                }
                $item_output .= '</ul>';
            }
        } else {
            $item_output = '<a href="' . $item->url . '">' . $item->title . '</a>';
        }
        
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        
        $output .= '<li' . $class_names . '>';
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}