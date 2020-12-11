<?php
/**
 * Pagina para mostar las etiquetas
 */ 
?>

<?php get_header(); ?>

<?php _themename_tag_page_header(); ?>

<div class="container my-5">


    <div class="row">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                get_template_part('template-parts/content', 'archive');
            }
        }
        ?>
    </div>
    <div class="row posts-pagination justify-content-center">
        <?php
        //the_posts_pagination();
        echo bootstrap_pagination();
        ?>
    </div>


</div>

<?php
get_footer();
?>