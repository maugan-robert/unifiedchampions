<?php
/*
Template Name: Page Mentions légales
*/
get_header();
?>
<style>
    body {
        background-color: #f9f9f9;
        color: #333;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 100vw;
        margin-left: 5rem;
        margin-right: 5rem;
        margin-top: 5rem;
        margin-bottom: 5rem;
        padding: 20px;
        background: white;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    h1 {
        text-align: start;
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    h2 {
        font-size: 20px;
        font-weight: 600;
        margin-top: 20px;
        padding-bottom: 5px;
        width: fit-content;
        /* Ensure the width matches the text content */
    }

    h2 span {
        display: inline-block;
        width: 100%;
        height: 1.5px;
        background-color: #333;
        margin-top: 5px;
    }

    p,
    ul {
        font-size: 16px;
        line-height: 1.6;
        max-width: 900px;
    }

    a {
        color: #007bff;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    ul {
        padding-left: 20px;
    }
</style>


<body>
    <div class="container">
        <h1>MENTIONS LÉGALES</h1>

        <h2>1. Éditeur du site<span></span></h2>
        <p><strong>Nom de l’association :</strong> Unified Champions Club</p>
        <p><strong>Adresse :</strong> Université de Franche-Comté, <a href="#">4 place Lucien Tharradin, 25200 Montbéliard</a></p>
        <p><strong>Email :</strong> <a href="mailto:unifiedchampions@gmail.com">unifiedchampions@gmail.com</a></p>
        <p><strong>Téléphone :</strong> +33 0622334455</p>
        <p><strong>SIRET :</strong> 921 095 616 00013</p>
        <p><strong>Directeur de la publication :</strong> Pascal Chatonnay</p>

        <h2>2. Hébergeur du site<span></span></h2>
        <p><strong>Nom :</strong> Infomaniak</p>
        <p><strong>Adresse :</strong> <a href="#">Rue Eugène-Marziano 25, 1227 Genève, Suisse</a></p>

        <h2>3. Responsable de la publication<span></span></h2>
        <p><strong>Responsable :</strong> Pascal Chatonnay</p>
        <p><strong>Email :</strong> <a href="mailto:pascal.chatonnay@gmail.com">pascal.chatonnay@gmail.com</a></p>

        <h2>4. Propriété intellectuelle<span></span></h2>
        <p>L’ensemble du contenu du site Unified Champions Club (textes, images, graphiques, logos, vidéos, éléments sonores, etc.) est protégé par les lois françaises et internationales relatives à la propriété intellectuelle.</p>
        <p>Toute reproduction, distribution, modification, adaptation, retransmission ou publication, même partielle, est strictement interdite sans l’accord écrit préalable de l’association.</p>

        <h2>5. Protection des données personnelles<span></span></h2>
        <p>Unified Champions Club s’engage à ce que la collecte et le traitement de vos données personnelles soient conformes au RGPD et à la loi Informatique et Libertés.</p>
        <p><strong>Responsable du traitement :</strong> Pascal Chatonnay</p>
        <p><strong>Finalité du traitement :</strong> gestion des inscriptions, newsletter…</p>
        <p><strong>Durée de conservation :</strong> [Préciser la durée de conservation des données]</p>

        <p>Vous disposez des droits suivants sur vos données personnelles :</p>
        <ul>
            <li>Droit d’accès</li>
            <li>Droit de rectification</li>
            <li>Droit à l’effacement (droit à l’oubli)</li>
            <li>Droit à la limitation du traitement</li>
            <li>Droit d’opposition</li>
            <li>Droit à la portabilité des données</li>
        </ul>
        <p>Pour exercer ces droits, contactez-nous à notre adresse électronique.</p>

        <h2>6. Cookies<span></span></h2>
        <p>Le site utilise des cookies pour améliorer l’expérience utilisateur. Les cookies sont de petits fichiers stockés sur votre appareil permettant d’analyser la navigation et de personnaliser le contenu.</p>
        <p><strong>Types de cookies utilisés :</strong></p>
        <ul>
            <li>Cookies de session</li>
            <li>Cookies analytiques (Google Analytics, par exemple)</li>
            <li>Cookies de fonctionnalités</li>
        </ul>
        <p>Vous pouvez configurer vos préférences en matière de cookies via votre navigateur.</p>

        <h2>7. Limitation de responsabilité<span></span></h2>
        <p>Unified Champions Club s’efforce de fournir des informations exactes et à jour sur le site. Toutefois, l’association ne saurait être tenue responsable des erreurs ou omissions, ni des dommages résultant de l’utilisation des informations fournies.</p>

        <h2>8. Droit applicable et juridiction compétente<span></span></h2>
        <p>Les présentes mentions légales sont soumises au droit français. En cas de litige, la juridiction compétente sera celle du siège social de l’association.</p>
        <p><strong>Date de dernière mise à jour :</strong> 19/12/2024</p>
    </div>
</body>

<?php get_footer(); ?>