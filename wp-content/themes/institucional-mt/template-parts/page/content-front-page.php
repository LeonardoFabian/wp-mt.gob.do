<?php
/*
Template part para mostrar paginas en la portada
*/
?>

<!-- Front Hero Area -->
<div class="main-carousel">
    <?php if (is_active_sidebar('front-hero-area')) : ?>
        <?php dynamic_sidebar('front-hero-area'); ?>    
    <?php endif; ?>
</div>

<!-- Front Page Portfolio -->
<section id="_themename-front-page-portfolio-section" class="section scrollspy service-scene" style="max-height: 760px;">
    <?php if (is_active_sidebar('front-page-portfolio')) : ?>
        <div class="_themename-front-page-portfolio-section-content py-5">
            <div class="container">
                <div class="row card-deck">
                    <?php dynamic_sidebar('front-page-portfolio'); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>

<hr>
<div class="clear-fix"></div>

<!-- Front Page Blog Area -->
<section id="front-page-blog-area-section" class="section scrollspy">
    <?php if (is_active_sidebar('front-page-blog-area')) : ?>
        <div class="container py-5">
            <div class="row">
                
                <?php // TODO: Crear widget para mostrar las entrdas del blog en la pagina principal 
                ?>
                <!-- latest posts -->
                <!-- Contenido -->
                <div id="home-post-cards" class="mt-5">
                    <!-- <div class="content-title text-center">
                        <h2>Noticias Titulo prueba</h2>
                        <hr class="divisor-center">
                    </div> -->
                    <div class="container">
                        <!-- loop -->
                        <div class="row">

                            <!-- latest post -->
                            <div class="col-md-6 mb-4">
                                <?php

                                $latestPosts = new WP_Query(array(
                                    'cat' => 2,
                                    'posts_per_page'      => 1,
                                    'post_status'         => 'publish',
                                    'order'               => 'DESC',

                                ));

                                if ($latestPosts->have_posts()) :
                                    while ($latestPosts->have_posts()) : $latestPosts->the_post();

                                ?>
                                        <div class="card mb-4" style="width:100%;">

                                            <!-- Card date -->
                                            <div class="date-container text-center bg-secondary-color overlay">
                                                <div class="post-date align-self-center">
                                                    <a href="<?php echo esc_url( get_permalink() ) ?>" class="text-decoration-none" style="color:#fff;">
                                                        <h4 class="post-date-day"><time datetime="<?php echo esc_attr( get_the_date('c') ) ?>"><?php echo esc_html( get_the_date('j') ); ?></time></h4>
                                                    </a>
                                                    <a href="<?php echo esc_url( get_permalink() ) ?>" class="text-decoration-none" style="color:#fff;">
                                                        <time datetime="<?php echo esc_attr( get_the_date('c') ) ?>" class="post-date-month text-uppercase"><?php echo esc_html( get_the_date('M') ); ?></time>
                                                    </a>
                                                </div>
                                            </div>
                                            <!--Card image-->
                                            <div class="view overlay">

                                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                                    <div class="post-thumbnail-primary mask rgba-white-slight">
                                                        <!-- card-img-top img-fluid -->
                                                        <?php
                                                        if (has_post_thumbnail()) {
                                                            the_post_thumbnail('post_thumbnail', array('class' => 'card-img-top img-fluid'));
                                                        }
                                                        ?>
                                                    </div>
                                                </a>
                                            </div>
                                            <!--Card content-->
                                            <div class="last-post-card-body card-body">
                                                <div class="wrap-content">
                                                    <div class="content-title">
                                                        <!--Title-->
                                                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute() ?>" class="text-decoration-none">
                                                            <h3 class="post-card-title card-title d-none d-sm-block">
                                                                <?php the_title(); ?>
                                                            </h3>
                                                        </a>
                                                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute() ?>" class="text-decoration-none">
                                                            <h6 class="post-card-title card-title d-block d-sm-none">
                                                                <?php the_title(); ?>
                                                            </h6>
                                                        </a>
                                                    </div>
                                                    <div class="wrap-content-text">
                                                        <!--Text-->
                                                        <p class="post-card-text card-text">
                                                            <?php the_excerpt(); ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                                                <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-md d-sm-none">Leer
                                                    más</a>
                                                <!-- Social shares button -->
                                                <a class="activator waves-effect waves-light float-right d-block d-sm-none"><i class="fas fa-share-alt"></i></a>
                                            </div>

                                        </div>
                                <?php
                                    endwhile;
                                endif;
                                wp_reset_postdata();
                                ?>
                            </div>
                            <!-- end latest post -->

                            <!-- other posts here -->

                            <div class="col-sm-12 col-md-6 col-lg-6">

                                <div class="row">

                                <?php

                                $otherPosts = new WP_Query(array(
                                    'cat' => 2,
                                    'posts_per_page'      => 4,
                                    'post_status'         => 'publish',
                                    'ignore_sticky_posts' => true,
                                    'no_found_rows'       => true,
                                    'offset'              => 1,
                                    'order' => 'DESC'
                                ));

                                if ($otherPosts->have_posts()) :
                                    while ($otherPosts->have_posts()) :
                                        $otherPosts->the_post();
                                ?>

                                        <div class="col-sm-12 col-md-6 col-lg-6 d-inline-block">
                                            <!-- Card 2 -->

                                            <div class="card mb-4" style="height:95%;">
                                                <!-- Card date -->
                                                <div class="date-container text-center bg-secondary-color overlay">
                                                    <div class="post-date align-self-center">
                                                        <a href="<?php echo esc_url( get_permalink() ) ?>" class="text-decoration-none" style="color:#fff;">
                                                            <h4 class="post-date-day"><time datetime="<?php echo esc_attr( get_the_date('c') ) ?>"><?php echo esc_html( get_the_date('j') ); ?></time></h4>
                                                        </a>
                                                        <a href="<?php echo esc_url( get_permalink() ) ?>" class="text-decoration-none" style="color:#fff;">
                                                            <time datetime="<?php echo esc_attr( get_the_date('c') ) ?>" class="post-date-month text-uppercase"><?php echo esc_html( get_the_date('M') ); ?></time>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!--Card image-->
                                                <div class="view overlay">

                                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute() ?>">
                                                        <div class="post-thumbnail-columns mask rgba-white-slight">
                                                            <!-- card-img-top img-fluid -->
                                                            <?php
                                                            if (has_post_thumbnail()) {
                                                                the_post_thumbnail('post_thumbnail', array('class' => 'home-post-card-img card-img-top img-fluid'));
                                                            }
                                                            ?>
                                                        </div>
                                                    </a>

                                                </div>
                                                <!--Card content-->
                                                <div class="thumbnail-post-card-body card-body">
                                                    <div class="wrap-content">
                                                        <div class="wrap-content-title">
                                                            <!--Title-->
                                                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute() ?>" class="text-decoration-none">
                                                                <h6 class="post-card-title card-title">
                                                                    <?php
                                                                    the_title();
                                                                    ?>
                                                                </h6>
                                                            </a>
                                                        </div>
                                                        <div class="wrap-content-text d-block d-sm-none">
                                                            <!--Text-->
                                                            <p class="post-card-text card-text">
                                                                <?php the_excerpt(); ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-md d-sm-none">Leer
                                                        más</a>
                                                    <!-- Social shares button -->
                                                    <a class="activator waves-effect waves-light float-right d-block d-sm-none"><i class="fas fa-share-alt"></i></a>
                                                </div>
                                            </div>
                                            <!-- Card 2-->

                                        </div><!-- card deck -->
                                <?php
                                    endwhile;
                                endif;
                                wp_reset_postdata();
                                ?>

                                </div>

                            </div>
                        </div>
                        <!-- col right -->
                    </div>                    

                </div>

                <?php dynamic_sidebar('front-page-blog-area') ?>

            </div>
        </div>
    <?php endif; ?>        
</section>

<hr>
<div class="clear-fix"></div>

<!-- Content Top 1 -->
<section id="_themename-content-top-1-section" class="section scrollspy">
    <?php if (is_active_sidebar('content-top-1-left') || is_active_sidebar('content-top-1-right')) : ?>
        <div class="container py-5">
            <div class="row">
                <?php if (is_active_sidebar('content-top-1-left') && (!is_active_sidebar('content-top-1-right'))) : ?>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <?php dynamic_sidebar('content-top-1-left'); ?>
                    </div>
                <?php elseif (!is_active_sidebar('content-top-1-left') && is_active_sidebar('content-top-1-right')) : ?>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <?php dynamic_sidebar('content-top-1-right'); ?>
                    </div>
                <?php else : ?>
                    <div class="col-sm-12 col-md-5 col-lg-5">
                        <?php dynamic_sidebar('content-top-1-left'); ?>
                    </div>
                    <div class="col-sm-12 col-md-7 col-lg-7">
                        <?php dynamic_sidebar('content-top-1-right'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</section>

<hr>
<div class="clear-fix"></div>

<!-- Content Top 2 -->
<section id="_themename-content-top-2-section" class="section scrollspy">
    <?php if (is_active_sidebar('content-top-2-left') || is_active_sidebar('content-top-2-right')) : ?>
        <div class="container py-5">
            <div class="row">
                <?php if (is_active_sidebar('content-top-2-left') && (!is_active_sidebar('content-top-2-right'))) : ?>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <?php dynamic_sidebar('content-top-2-left'); ?>
                    </div>
                <?php elseif (!is_active_sidebar('content-top-2-left') && is_active_sidebar('content-top-2-right')) : ?>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <?php dynamic_sidebar('content-top-2-right'); ?>
                    </div>
                <?php else : ?>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <?php dynamic_sidebar('content-top-2-left'); ?>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <?php dynamic_sidebar('content-top-2-right'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</section>

<hr>
<div class="clear-fix"></div>

<!-- Content Top 3 -->
<section id="_themename-content-top-3-section" class="section scrollspy">
    <?php if (is_active_sidebar('content-top-3-left') || is_active_sidebar('content-top-3-right')) : ?>
        <div class="container py-5">
            <div class="row">
                <?php if (is_active_sidebar('content-top-3-left') && (!is_active_sidebar('content-top-3-right'))) : ?>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <?php dynamic_sidebar('content-top-3-left'); ?>
                    </div>
                <?php elseif (!is_active_sidebar('content-top-3-left') && is_active_sidebar('content-top-3-right')) : ?>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <?php dynamic_sidebar('content-top-3-right'); ?>
                    </div>
                <?php else : ?>
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        <?php dynamic_sidebar('content-top-3-left'); ?>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <?php dynamic_sidebar('content-top-3-right'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</section>

<div class="clear-fix"></div>

<!-- Content Mid 1 -->
<section id="_themename-content-mid-1-section" class="section scrollspy">
    <?php if (is_active_sidebar('content-mid-1')) : ?>
        <div class="_themename-content-mid-2-section-background py-5" style="background:#dbdbdb;">
            <div class="container">
                <div class="row py-3">
                    <div class="col-sm-12 col-md-6 col-lg-6" style="display:flex;">
                        <?php dynamic_sidebar('content-mid-1'); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>

<div class="clear-fix"></div>

<!-- Content Mid 2 -->
<section id="_themename-content-mid-2-section" class="section scrollspy">
    <?php if (is_active_sidebar('content-mid-2')) : ?>
        <div class="_themename-content-mid-2-section-background" style="background:#003876;color:#FFFFFF;">
            <div class="container">
                <div class="row py-5">
                    <div class="col-sm-12 col-md-6 col-lg-6" style="display:flex;">
                        <?php dynamic_sidebar('content-mid-2'); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>

<!-- Content Mid 2 -->
<section id="_themename-content-bottom-1-section" class="section scrollspy">
    <?php if (is_active_sidebar('content-bottom-1')) : ?>
        <div class="_themename-content-bottom-1-section-background" style="background:#dbdbdb;">
            <div class="container">
                <div class="row py-5">
                    <div class="col-sm-4 col-md-4 col-lg-4" style="display:flex;">
                        <?php dynamic_sidebar('content-bottom-1'); ?>
                        <?php // TODO: Crear widget slider materialize para banners 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>

<section id="_themename-mobile-app-section" class="mobile-scene">
    <?php if( is_active_sidebar('mobile-app-sidebar') ) : ?>
        <div id="_themename-mobile-app-section-background">   
            <div class="py-5" style="max-height:700px;overflow:hidden;position:relative;">
                
                <div class="mobile-section-item" style="position:absolute;left:0;opacity:.9;">
                    <img id="mobile-img1" src="<?php echo get_template_directory_uri(); ?>/admin/image/calc-mockup.png" class="img-fluid mx-auto d-block" style="max-width: 250px;margin-top:25px;left:-100px;transform: rotate(25deg);">  
                </div>   
                <div class="mobile-section-item" style="position:absolute;right:0;top:0;z-index:9999">
                    <img id="mobile-img2" src="<?php echo get_template_directory_uri(); ?>/admin/image/coffee-cup-mockup.png" class="img-fluid mx-auto d-block" style="max-width: 300px;margin-top:20px;transform: rotate(45deg);">
                </div>
                <div class="mobile-section-item" style="position:absolute;right:0;bottom:0;">
                    <img id="mobile-img3" src="<?php echo get_template_directory_uri(); ?>/admin/image/paper-mockup.png" class="img-fluid mx-auto d-block" style="max-width: 300px;margin-top:50px;transform: rotate(-35deg);">
                </div>
                <div class="container section-overlay" style="z-index:9999;">            
                <div class="row align-content-center" >                
                    <div class="col-lg-5">
                        <img id="mobile-img-hero" src="<?php echo get_template_directory_uri(); ?>/admin/image/mobile-app.png" class="img-fluid mx-auto d-block" style="max-width: 350px;">
                    </div>
                    <div class="col-lg-5 align-self-center mobile-description">
                        <?php dynamic_sidebar('mobile-app-sidebar'); ?>
                    </div>
                </div>          
                </div>
                
            </div>                       
        </div>
    <?php endif; ?>
</section>

<section id="_themename-customers-sidebar-section">
    <?php if( is_active_sidebar('customers-sidebar') ) : ?>
        <div class="_themename-customers-sidebar-section-background">
            <div class="container">
                <?php dynamic_sidebar('customers-sidebar'); ?>
            </div>
        </div>
    <?php endif; ?>
</section>



