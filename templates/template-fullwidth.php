<?php
/*
Template Name: Full Width
*/

get_header(); ?>

    <main class="fullwidth">

        <?php
        while ( have_posts() ) :
            the_post();
            the_content();
        endwhile;
        ?>

    </main>

<?php get_footer();