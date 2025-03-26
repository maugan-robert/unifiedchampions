<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-social">
            <a href="https://www.instagram.com/unifiedchampionsclub/" target="_blank"><img src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/mdi_instagram.webp')); ?>" alt="Instagram"></a>
            <a href="https://discord.gg/aDABnPxtXQ" target="_blank"><img src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/ic_baseline_discord.webp')); ?>" alt="Discord"></a>
            <a href="https://www.twitch.tv/unifiedchampions" target="_blank"><img src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/ri_twitch_fill.webp')); ?>" alt="Twitch"></a>
        </div>

        <div class="footer-info">
            <h4 class="title-footer">INFORMATIONS</h4>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'footer-menu', // L'identifiant de l'emplacement du menu
                'container'      => false,         // Pas de div container supplémentaire
                'menu_class'     => '',           // Pas de classe CSS supplémentaire sur le ul
                'fallback_cb'    => false         // Pas de menu par défaut si aucun n'est défini
            ));
            ?>
        </div>

        <div class="footer-partners">
            <h4 class="title-footer">PARTENAIRES</h4>
            <div class="partners-logos">
                <img src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/logo_societe.webp')); ?>" alt="Société Générale">
                <img src="<?php echo esc_url(home_url('/wp-content/uploads/2025/03/logo_univ.webp')); ?>" alt="Université de Franche-Comté">
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>