<?php /* Template Name: Nuestro Equipo */ ?>

<?php
get_header();
?>

<div id="posts-header" class="posts-header title-bar mb-5 d-none d-sm-block">
    <div class="container d-flex text-left overlay text-light h-100">
        <div class="align-self-center">
            <h2 class="posts-header-title"><?php the_title(); ?></h2>
            <small class="breadcrumbs tex-muted"><?php the_breadcrumb(); ?></small>
        </div>
    </div>
</div><!-- the_posts-header -->

<div class="container py-5">

    <div class="row">

        <div class="col-sm-12 col-md-12 col-lg-8">           
        
            <?php dynamic_sidebar( 'our-team-page-content-area' ); ?>

        </div>

        <!-- Aside -->
        <div id="single-aside-section" class="col-md-12 col-lg-4">

            <?php get_sidebar(); ?>      
            <?php dynamic_sidebar('about-us-right-sidebar'); ?>
            
        </div>



    </div>

</div>


<?php
get_footer();
?>