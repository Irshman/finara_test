<?php
/*******
 ****Template Name: Content Page
 */

get_header();

?>

<main id="primary" class="homepage">
    <?php

    if( have_rows('page_content') ) {
        while ( have_rows('page_content') ) { 
            the_row();

            if( get_row_layout() == 'hero_block' ) {
                get_template_part( '/template-parts/hero-block' );
            }
            elseif( get_row_layout() == 'how_it_works' ) {
                get_template_part( '/template-parts/how-works' );
            }
        };
    };


    the_content();
    ?>
</main>


<?php get_footer(); ?>
