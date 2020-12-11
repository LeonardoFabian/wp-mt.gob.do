<?php /* Template Name: Nuestro Equipo */ ?>

<?php get_header(); ?>

<?php _themename_page_header(); ?>

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