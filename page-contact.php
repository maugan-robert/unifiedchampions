<?php
/*
Template Name: Page Contact
*/
get_header(); ?>

<main class="contact-page">
    <h1>CONTACTEZ-NOUS</h1>

    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_contact'])) {
        $prenom_nom = sanitize_text_field($_POST["prenom_nom"]);
        $email = sanitize_email($_POST["email"]);
        $sujet = sanitize_text_field($_POST["sujet"]);
        $message = sanitize_textarea_field($_POST["message"]);

        if (!empty($prenom_nom) && !empty($email) && !empty($sujet) && !empty($message)) {
            $to = get_option('admin_email'); // Envoie l'email à l'admin du site
            $headers = "From: " . $prenom_nom . " <" . $email . ">\r\n";

            $body = "Nom: $prenom_nom\n";
            $body .= "Email: $email\n";
            $body .= "Sujet: $sujet\n\n";
            $body .= "Message:\n$message\n";

            if (wp_mail($to, $sujet, $body, $headers)) {
                echo '<p class="success-message">Votre message a bien été envoyé !</p>';
            } else {
                echo '<p class="error-message">Une erreur est survenue. Veuillez réessayer.</p>';
            }
        } else {
            echo '<p class="error-message">Tous les champs sont obligatoires.</p>';
        }
    }
    ?>

    <form method="post" action="">
        <label for="prenom_nom">Prénom et nom</label>
        <input type="text" id="prenom_nom" name="prenom_nom" placeholder="Votre prénom et votre nom..." required>

        <label for="email">Mail</label>
        <input type="email" id="email" name="email" placeholder="Indiquez votre mail..." required>

        <label for="sujet">Sujet</label>
        <input type="text" id="sujet" name="sujet" placeholder="Le sujet de votre message..." required>

        <label for="message">Message</label>
        <textarea id="message" name="message" rows="5" placeholder="Écrivez votre message..." required></textarea>

        <button type="submit" name="submit_contact">ENVOYER</button>
    </form>
</main>

<?php get_footer(); ?>
