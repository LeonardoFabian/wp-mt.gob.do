<?php 
/**
 * @subpackage      _themename
 * @since           1.0
 * @version         1.0
 */
get_header(); ?>

<!-- Single Content -->

<!-- Single -->
<div id="single-content-service-section" class="content" style="padding-top:0;">

    <!-- wp single content -->

    <?php

    $args = [
        'post_type' => 'instmt_servicio',
        'p' => $post->ID
    ];

    $query = new WP_Query( $args );

    if ( $query->have_posts() ) :
        while ( $query->have_posts() ) :
?>
            <article id='<?php echo "servicio-{$post->ID}" ?>' <?php post_class(); ?> >
<?php
            $query->the_post();
            /*get_template_part('template-parts/post/content', 'article');*/
            get_template_part('template-parts/servicio/content', get_post_format());

    ?>
            
            </div>
    <?php
        endwhile;

    else : ?>

    <h2>No hay publicaciones para mostrar.</h2>

<?php
    endif;
    ?>



</div>




<!-- End Single Content -->





<?php get_footer(); ?>