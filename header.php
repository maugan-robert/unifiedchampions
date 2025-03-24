<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php the_title(); ?></title>
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
  <style>
    .mobile-menu {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100vh;
      background: white;
      color: black;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      padding-top: 12vh;
      transform: translateY(-100%);
      transition: transform 0.4s ease-in-out;
      z-index: 1000;
      gap: 7vh;
    }

    .mobile-menu.open {
      transform: translateY(0);
    }

    .mobile-menu a {
      text-transform: uppercase;
      font-weight: bold;
      font-size: 1.2em;
      padding: 15px 0;
      display: block;
      max-width: 100%;
      text-align: center;
    }

    .mobile-menu,
    .menu-list a:first-child {
      color: black;
    }

    .mobile-menu-toggle {
      display: none;
      flex-direction: column;
      gap: 5px;
      background: none;
      border: none;
      cursor: pointer;
      position: relative;
      z-index: 1010;
    }

    .mobile-menu-toggle span {
      display: block;
      width: 30px;
      height: 3px;
      background: black;
      transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
    }

    .mobile-menu-toggle span:nth-child(2) {
      margin-top: 6px;
    }

    .mobile-menu-toggle.open span:nth-child(1) {
      transform: rotate(45deg) translate(5px, 5px);
    }

    .mobile-menu-toggle.open span:nth-child(2) {
      transform: rotate(-45deg) translate(5px, -5px);
    }

    .mobile-menu-toggle.open span:nth-child(3) {
      opacity: 0;
    }

    .desktop-menu {
      display: flex;
      justify-content: space-between;
      align-items: center;
      max-width: 100%;
      padding-left: 5vw;
      padding-right: 5vw;
      background-color: white;
    }

    .desktop-menu a {
      text-transform: uppercase;
      font-weight: bold;
      font-size: 16px;
      padding: 15px 0;
      display: block;
      width: 100%;
      text-align: center;
      text-decoration: none;
    }

    .desktop-menu a.active::after {
      content: '';
      display: block;
      width: 100%;
      height: 3px;
      background: rgb(246, 246, 246);
      margin-top: 3px;
    }

    .mobile-menu-list,
    .menu-list {
      list-style: none;
      padding: 0;
      margin: 0;

    }

    .menu-list {
      display: flex;
      gap: 30px;
      padding: 0;
      margin: 0;

    }

    .menu-list li {
      list-style: none;
    }



    .header-social {
      display: flex;
      gap: 20px;
    }

    .header-social img {
      width: 31px;
      height: auto;
    }

    .small-logo {
      width: 200px;
      height: auto;
      padding-top: 15px;
      padding-bottom: 15px;
    }

    .mobile-menu-list a {
      max-width: 100%;
      border-bottom: 2px solid rgb(173, 173, 173);
      text-decoration: none;
    }

    .mobile-menu-list a:hover {
      max-width: 100%;
      border-bottom: 2px solid #742B57;
      transition: border-bottom 0.3s ease-in;
      text-decoration: none;
    }

    .mobile-menu-list {
      max-width: 100%;
      text-decoration: none;

    }


    .logo-mobile {
      display: block;
    }

    .logo-mobile a {
      display: block;
      padding: 15px 0;
    }


    @media (min-width: 900px) {
      .logo-mobile {
        display: none;
      }
    }

    @media (max-width: 900px) {
      .header-content {
        align-items: center;
        display: flex;
        justify-content: space-between;
        padding-left: 5vw;
        padding-right: 5vw;
        background-color: white;
      }
    }



    @media (max-width: 900px) {
      .mobile-menu-toggle {
        display: flex;
      }

      .desktop-menu {
        display: none;
      }
    }


    .menu-list a {
      transition: border-bottom 0.3s ease-in;
    }

    .menu-list a {
      position: relative;
      overflow: hidden;
    }

    .menu-list a::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 0;
      height: 2px;
      background: #742B57;
      transition: width 0.3s ease-in;
    }


    .menu-list a:hover::after {
      width: 100%;
    }

    .menu-list a.active::after,
    .mobile-menu-list a.active::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 2px;
      background: #742B57;
    }
  </style>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div class="wrap">
    <header class="site-header">
      <div class="header-content">

        <!-- Logo -->
        <div class="logo-mobile">
          <a href="<?php echo home_url(); ?>">
            <img class="small-logo" src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/logo-header.webp')); ?>" alt="Logo header">
          </a>
        </div>


        <!-- Mobile Menu Button -->
        <button id="mobile-menu-toggle" class="mobile-menu-toggle">
          <span></span>
          <span></span>
        </button>

        <!-- Desktop Menu -->

        <nav class="desktop-menu">
          <!-- Logo -->
          <div class="logo">
            <a href="<?php echo home_url(); ?>">
              <img class="small-logo" src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/logo-header.webp')); ?>" alt="Logo header">
            </a>
          </div>
          <?php
          wp_nav_menu(array(
            'theme_location' => 'header-menu',
            'container' => false,
            'menu_class' => 'menu-list',
            'walker' => new Sports_Menu_Walker()
          ));
          ?>
          <!-- Social Links -->
          <div class="header-social">
            <a href="#" target="_blank"><img src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/mdi_instagram.webp')); ?>" alt="Instagram"></a>
            <a href="#" target="_blank"><img src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/ic_baseline_discord.webp')); ?>" alt="Discord"></a>
            <a href="#" target="_blank"><img src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/ri_twitch_fill.webp')); ?>" alt="Twitch"></a>
          </div>
        </nav>


      </div>

      <!-- Mobile Menu -->
      <nav id="mobile-menu" class="mobile-menu">

        <!-- Logo -->
        <div class="logo-mobile">
          <a href="<?php echo home_url(); ?>">
            <img class="small-logo" src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/logo-header.webp')); ?>" alt="Logo header">
          </a>
        </div>

        <?php
        wp_nav_menu(array(
          'theme_location' => 'header-menu',
          'container' => false,
          'menu_class' => 'mobile-menu-list',
          'walker' => new Sports_Menu_Walker()
        ));
        ?>
        <!-- Social Links -->
        <div class="header-social">
          <a href="#" target="_blank"><img src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/mdi_instagram.webp')); ?>" alt="Instagram"></a>
          <a href="#" target="_blank"><img src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/ic_baseline_discord.webp')); ?>" alt="Discord"></a>
          <a href="#" target="_blank"><img src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/ri_twitch_fill.webp')); ?>" alt="Twitch"></a>
        </div>
      </nav>


    </header>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
      const mobileMenu = document.getElementById('mobile-menu');

      mobileMenuToggle.addEventListener('click', function() {
        mobileMenu.classList.toggle('open');
        mobileMenuToggle.classList.toggle('open');
      });

      const currentUrl = window.location.href;
      const links = document.querySelectorAll('.menu-list a, .mobile-menu-list a');

      links.forEach(link => {
        if (link.href === currentUrl) {
          link.classList.add('active');
        }
      });

      const mobileLinks = document.querySelectorAll('.mobile-menu-list a');

      mobileLinks.forEach(link => {
        if (link.href === currentUrl) {
          link.classList.add('active');
          link.style.borderBottom = '2px solid #742B57'; // Add violet border-bottom for active mobile menu link
        }
      });
    });
  </script>

  <?php wp_footer(); ?>
</body>

</html>