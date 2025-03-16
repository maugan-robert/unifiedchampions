<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php the_title(); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div class="wrap">
      <header class="site-header">
        <div class="header-content">
          <!-- Logo -->
          <div class="logo">
            <a href="<?php echo home_url(); ?>">
            <img src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/logo-header.webp')); ?>" alt="Logo header">
            </a>
          </div>

          <!-- Desktop Menu -->
          <nav class="desktop-menu">
            <?php
              wp_nav_menu(array(
                'theme_location' => 'header-menu',
                'container' => false,
                'menu_class' => 'menu-list',
              ));
            ?>
          </nav>

          <!-- Mobile Menu Burger -->
          <div class="burger-menu">
            <div class="burger-icon">
              <span></span>
              <span></span>
            </div>
          </div>
        </div>

        <!-- Mobile Menu -->
        <nav class="mobile-menu">
          <?php
            wp_nav_menu(array(
              'theme_location' => 'header-menu',
              'container' => false,
              'menu_class' => 'mobile-menu-list',
            ));
          ?>
        </nav>
        <div class="header-social">
            <a href="#" target="_blank"><img src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/mdi_instagram.webp')); ?>" alt="Instagram"></a>
            <a href="#" target="_blank"><img src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/ic_baseline_discord.webp')); ?>" alt="Discord"></a>
            <a href="#" target="_blank"><img src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/ri_twitch_fill.webp')); ?>" alt="Twitch"></a>
        </div>
      </header>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>
