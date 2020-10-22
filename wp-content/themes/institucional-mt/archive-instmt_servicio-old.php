<?php
get_header();
?>

<div id="posts-header" class="posts-header title-bar mb-5 d-none d-sm-block">
    <div class="container d-flex text-left overlay text-light h-100">
        <div class="align-self-center">
            <h2 class="posts-header-title"><?php post_type_archive_title(); ?></h2>
            <small class="breadcrumbs tex-muted">Rastro de navegacion pagina de entradas</small>
        </div>
    </div>
</div><!-- the_posts-header -->

<div class="container py-5">

    <div class="row">
        <?php

        $args = [
            'post_type' => 'instmt_servicio',
            'orderby'   => 'title',
            'order'     => 'ASC',
        ];

        $query = new WP_Query( $args );

        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post();
                get_template_part('template-parts/content', 'service');
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