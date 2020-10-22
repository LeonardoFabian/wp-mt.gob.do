<?php 
/** 
 * Template Name: Servicios 
 */

get_header(); 

?>

<div id="services-list" class="content-area">
    <main id="services" class="site-services" role="">

        <?php 
            // Show selected front page cotent
            if( have_posts() ) :
                while( have_posts() ) :
                    the_post();
                    //the_content();
                    get_template_part( 'template-parts/page/content', 'service');
                endwhile;
            else :
                get_template_part( 'template-parts/post/content', 'none');
            endif;
        ?>

    </main>
</div>

<?php get_footer(); ?>