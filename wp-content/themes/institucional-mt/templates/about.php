<?php /* Template Name: Sobre nosotros */ ?>

<?php get_header(); ?>

<div id="content-contact-header" class="content-contact-header title-bar mb-5 d-none d-sm-block">
    <div class="container d-flex text-left overlay text-light h-100">
        <div class="align-self-center">
            <h2 class="content-contact-header-title"><?php the_title(); ?></h2>
            <small class="breadcrumbs tex-muted"><?php the_breadcrumb(); ?></small>
        </div>
    </div>
</div><!-- entry-header -->

<div class="container my-5">
    <div class="row">
        <div id="contact-section" class="content-area col-md-9 lead text-justify">

            <?php
            // Show selected front page cotent
            if( is_page_template('templates/about.php') ) :
                if (have_posts()) :
                    while (have_posts()) :
                        the_post();
                        the_content();
                    //get_template_part('template-parts/page/content', 'contact');
                    endwhile;
                else :
                    get_template_part('template-parts/post/content', 'none');
                endif;
            else :
                // Page about is not use
            endif;
            ?>

        </div>

        <div class="col-md-3">
            <?php get_sidebar('about-us'); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>