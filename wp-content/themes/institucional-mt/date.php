<?php
/**
 * Pagina para mostar las etiquetas
 */ 
?>

<?php
get_header();
?>

<div id="archive-header" class="archive-header title-bar mb-5 d-none d-sm-block">
    <div class="container d-flex text-left overlay text-light h-100">
        <div class="align-self-center">
            <h2 class="archive-header-title"><?php the_tags(); ?></h2>
            <small class="breadcrumbs tex-muted">Rastro de navegacion pagina date.php</small>
        </div>
    </div>
</div><!-- archive-header -->

<div class="container my-5">


    <div class="row">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                //get_template_part('template-parts/content', 'archive');
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