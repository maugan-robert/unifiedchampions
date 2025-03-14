<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-social">
            <a href="#" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/instagram.svg" alt="Instagram"></a>
            <a href="#" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/discord.svg" alt="Discord"></a>
            <a href="#" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/twitch.svg" alt="Twitch"></a>
        </div>
        
        <div class="footer-info">
    <h4>INFORMATIONS</h4>
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
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/societe-generale.png" alt="Société Générale">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/universite-franche-comte.png" alt="Université de Franche-Comté">
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>