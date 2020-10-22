<div id="content-page-representaciones-locales-header" class="content-page-representaciones-locales-header title-bar mb-5 d-none d-sm-block">
    <div class="container d-flex text-left overlay text-light h-100">
        <div class="align-self-center">
            <h2 class="content-page-representaciones-locales-header-title"><?php the_title(); ?></h2>
            <small class="breadcrumbs tex-muted">Mostrar aqui rastro de navegacion</small>
        </div>
    </div>
</div><!-- entry-header -->

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