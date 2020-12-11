<?php _themename_page_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <?php the_content(); ?>
                <?php if (is_active_sidebar('rlt-content-widget-area')) : ?>
                    <?php dynamic_sidebar('rlt-content-widget-area'); ?>
                <?php endif; ?>
            </div>
            <!-- Aside -->
            <div id="rlt-aside-section" class="col-12 col-md-3">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->