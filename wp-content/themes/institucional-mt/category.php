<?php
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