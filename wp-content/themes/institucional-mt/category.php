<?php 

/**
 *  Template Name: Blog
 */

/**
 * Página para listar las entradas del blog
 * 
 * Se debe asignar una página estatica
 * y seleccionar en los "Atributos de página" la plantilla: Blog
 */

get_header();

?>

<div id="posts-header" class="posts-header title-bar mb-5 d-none d-sm-block">
    <div class="container d-flex text-left overlay text-light h-100">
        <div class="align-self-center">
            <h2 class="posts-header-title"><?php single_cat_title(); ?></h2>
            <small class="breadcrumbs tex-muted">Rastro de navegacion pagina de entradas</small>
        </div>
    </div>
</div><!-- the_posts-header -->

<div class="container py-5">

    <div class="row">
        <?php

        $args = [
            'post_type' => 'post'
        ];

        $query = new WP_Query( $args );

        if ( $query->have_posts()) {
            while ( $query->have_posts()) {
                $query->the_post();
                get_template_part('template-parts/content', 'archive');
            }
        }

        wp_reset_postdata();
        
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