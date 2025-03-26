<style>
    /* Styles généraux */
    body {
        background-color: #FAFAFA;
    }

    .contact-page {
        margin: 4rem;
    }

    .contact-form {
        max-width: 700px;
        margin: 50px auto;
        padding: 4rem;
        color: #333;
        background: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    /* Titre */
    .contact-page h1 {
        font-size: 35px;
        font-weight: 700;
        text-transform: uppercase;
        margin-bottom: 20px;
    }

    .contact-page p {
        max-width: 900px;
        margin-bottom: 20px;
    }

    /* Labels */
    .contact-page label {
        display: block;
        font-weight: 600;
        margin-top: 15px;
        margin-bottom: 10px;
        margin-left: 10px;
    }

    /* Champs de saisie */
    .contact-page input,
    .contact-page textarea {
        width: 100%;
        padding: 17px;
        border: 1px solid #000;
        border-radius: 5px;
        font-size: 16px;
        background: #fff;
        outline: none;
        transition: border 0.3s ease-in-out;
        font-family: 'industry', sans-serif;
    }

    .contact-page input:focus,
    .contact-page textarea:focus {
        border-color: #6A1B9A;
    }

    /* Bouton */
    .contact-page button {
        display: block;
        width: 150px;
        padding: 12px;
        background: #6A1B9A;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 4rem;
        text-transform: uppercase;
        transition: background 0.3s ease-in-out;
        margin-left: auto;
        /* Aligne le bouton à droite */
        margin-right: 0;
    }

    .contact-page button:hover {
        background: #4A148C;
    }

    /* Messages de validation */
    .success-message {
        color: green;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .error-message {
        color: red;
        font-weight: bold;
        margin-bottom: 15px;
    }

    /* Responsive */
    @media screen and (max-width: 768px) {
        .contact-page {
            max-width: 90%;
            margin: 30px auto;
        }

        .contact-page h1 {
            font-size: 20px;
        }

        .contact-page button {
            width: 100%;
        }
    }
</style>


<?php
/*
Template Name: Page Contact
*/
get_header(); ?>

<main class="contact-page">
    <h1>CONTACTEZ-NOUS</h1>
    <p>Une question ? Un problème, ou juste envie de papoter ? N'hésitez pas à utiliser notre formulaire de contact afin de nous dire tout ce qu'il vous passe par la tête !</p>
    <section class="contact-form">

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
    </section>
</main>

<?php get_footer(); ?>