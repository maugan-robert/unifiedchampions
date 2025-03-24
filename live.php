<?php
/*
Template Name: Page Live
*/
get_header();
?>

<body style="background-color: #201E23;">
    <div class="content">
        <?php
        // Start the loop to display the content of the page
        if (have_posts()) :
            while (have_posts()) : the_post();
                the_content(); // Display the content of the page
            endwhile;
        else :
            echo '<p>No content found for this page.</p>';
        endif;
        ?>
    </div>
</body>

<?php get_footer(); ?>