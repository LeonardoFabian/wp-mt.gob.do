<?php /* Template Name: Sobre nosotros */ ?>

<?php get_header(); ?>

<div id="content-contact-header" class="content-contact-header title-bar  d-none d-sm-block">
    <div class="container d-flex text-left overlay text-light h-100">
        <div class="align-self-center">
            <h2 class="content-contact-header-title"><?php the_title(); ?></h2>
            <small class="breadcrumbs tex-muted"><?php the_breadcrumb(); ?></small>
        </div>
    </div>
</div><!-- entry-header -->

<div class="content">

<div class="container">
    <div class="row">
        <div id="contact-section" class="content-area col-sm-12 col-md-8 col-lg-8 lead text-justify">

            <?php
            // Show selected front page cotent
            if( is_page_template('templates/about.php') ) :
                if (have_posts()) :
                    while (have_posts()) :
                        the_post();
                        ?>
                            <div class="post-content-image mb-5">
                                <?php
                                    if (has_post_thumbnail()) :
                                        the_post_thumbnail('post-thumbnail', array('class' => 'img-fluid'));
                                    endif;
                                ?>
                            </div>                           
                            <div class="single-content-description lead text-justify mb-3">
                                <?php the_content(); ?>
                            </div>
                        <?php
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

        <div class="col-md-4 col-lg-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

</div>

<?php get_footer(); ?>