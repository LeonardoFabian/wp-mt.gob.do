<?php
/*
Template part para mostrar paginas en la portada
*/
?>



<?php

if(function_exists('institucionalmt_display_carousel')){
    //institucionalmt_display_carousel();
} else {
    
}

$featuredNews = new WP_Query(array(
    'cat' => 1,
    'posts_per_page'      => 1,
    'post_status'         => 'publish',
    'ignore_sticky_posts' => true,
    'no_found_rows'       => true,
));

if ($featuredNews->have_posts()) :
    while ($featuredNews->have_posts()) :
        $featuredNews->the_post();
?>

        <!-- Bootstrap carousel -->
        <div class="main-carousel">

            <?php if (is_active_sidebar('home-top-first-widget-area')) : ?>
                <?php dynamic_sidebar('home-top-first-widget-area'); ?>
            <?php else : ?>
                <div id="main-carousel-captions" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active text-center">
                            <a href="<?php the_permalink(); ?>">
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('post_thumbnail', array('class' => 'd-block w-100 img-fluid'));
                                }
                                ?>
                            </a>
                            <div class="carousel-caption d-none d-md-block">
                                <div class="container">
                                    <div class="text-left">
                                        <a href="<?php the_permalink(); ?>">
                                            <h2 class="carousel-item-title"><?php the_title(); ?></h2>
                                        </a>
                                    </div>
                                    <div class="carousel-item-description-wrapper text-left">
                                        <p class="carousel-item-description lead">
                                            <?php the_excerpt(); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <a class="carousel-control-prev" href="#main-carousel-captions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#main-carousel-captions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            <?php endif; ?>
        </div>

<?php

    endwhile;
else :
// fallback no content message here
endif;

wp_reset_postdata();

?>


<div class="container my-5">
    <section id="second-top-section">
        <div class="row card-deck">
            <?php if (is_active_sidebar('home-top-second-widget-area')) : ?>
                <?php dynamic_sidebar('home-top-second-widget-area'); ?>
            <?php endif; ?>
        </div>
    </section>
</div>



<?php if (get_theme_mod('service_option_setting') == 'service-section-on') : ?>

    <div class="container my-5">
        <!-- Services -->
        <div id="home-service-cards">
            <div class="row">
                <div class="card-image-container col-6 col-sm-6 col-md-4 mb-4">
                    <!-- Card 1 -->
                    <div class="card card-image" style="background-image: url(images/card-image.jpg);">

                        <!-- Content -->
                        <div class="text-white text-center d-flex align-items-center py-5 px-4">
                            <div>
                                <a href="" class="text-decoration-none">
                                    <h2 class="display-4 text-center"><i class="fas fa-hand-holding"></i></h2>
                                </a>
                                <div class="card-title-wrapper">
                                    <a href="" class="text-decoration-none">
                                        <h4 class="home-card-title card-title pt-2"><strong>This is the card title with long title</strong></h4>
                                    </a>
                                </div>
                                <div class="card-text-wrapper d-none d-sm-block">
                                    <p class="d-md-none d-lg-block lead mb-4">Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit. Repellat fugiat, laboriosam,
                                        voluptatem ipsum dolor sit amet,
                                    </p>
                                </div>
                                <div class="service-card-footer text-center d-none d-sm-block">
                                    <a class="btn-template btn-primary"><i class="fas fa-clone left"></i> Ver servicio</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Card 1-->
                </div>

                <div class="card-image-container col-6 col-sm-6 col-md-4 mb-4">
                    <!-- Card 2 -->
                    <div class="card card-image" style="background-image: url(images/card-image.jpg);">

                        <!-- Content -->
                        <div class="text-white text-center d-flex align-items-center py-5 px-4">
                            <div>
                                <a href="" class="text-decoration-none">
                                    <h2 class="display-4 text-center"><i class="fas fa-building"></i></h2>
                                </a>
                                <div class="card-title-wrapper">
                                    <a href="" class="text-decoration-none">
                                        <h4 class="home-card-title card-title pt-2"><strong>This is the card title with long title</strong></h4>
                                    </a>
                                </div>
                                <div class="card-text-wrapper d-none d-sm-block">
                                    <p class="d-md-none d-lg-block lead mb-4">Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit. Repellat fugiat, laboriosam,
                                        voluptatem ipsum dolor sit amet,
                                    </p>
                                </div>
                                <div class="service-card-footer text-center d-none d-sm-block">
                                    <a class="btn-template btn-primary"><i class="fas fa-clone left"></i> Ver servicio</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Card 2-->
                </div>

                <div class="card-image-container col-6 col-sm-6 col-md-4 mb-4">
                    <!-- Card 3 -->
                    <div class="card card-image" style="background-image: url(images/card-image.jpg);">

                        <!-- Content -->
                        <div class="text-white text-center d-flex align-items-center py-5 px-4">
                            <div>
                                <a href="" class="text-decoration-none">
                                    <h2 class="display-4 text-center"><i class="fas fa-cogs"></i></h2>
                                </a>
                                <div class="card-title-wrapper">
                                    <a href="" class="text-decoration-none">
                                        <h4 class="home-card-title card-title pt-2"><strong>This is the card title with long title</strong></h4>
                                    </a>
                                </div>
                                <div class="card-text-wrapper d-none d-sm-block">
                                    <p class="d-md-none d-lg-block lead mb-4">Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit. Repellat fugiat, laboriosam,
                                        voluptatem ipsum dolor sit amet,
                                    </p>
                                </div>
                                <div class="service-card-footer text-center d-none d-sm-block">
                                    <a class="btn-template btn-primary"><i class="fas fa-clone left"></i> Ver servicio</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Card 3-->
                </div>
            </div>
        </div>

        <div class="text-center d-block d-sm-none my-5">
            <a class="btn-template btn-primary"><i class="fas fa-clone left"></i> Más servicios</a>
        </div>
    </div><!-- container -->
    <hr>

<?php endif; ?>



<div class="clear-fix"></div>
<!-- latest posts -->
<!-- Contenido -->
<div id="home-post-cards" class="my-5">
    <div class="content-title text-center">
        <h2>Noticias Titulo prueba</h2>
        <hr class="divisor-center">
    </div>
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
                    'order'               => 'DESC'
                ));

                if ($latestPosts->have_posts()) :
                    while ($latestPosts->have_posts()) : $latestPosts->the_post();

                ?>
                        <div class="card mb-4">

                            <!-- Card date -->
                            <div class="date-container text-center bg-secondary-color overlay">
                                <div class="post-date align-self-center">
                                    <h4 class="post-date-day"><?php echo get_the_date('j'); ?></h4>
                                    <small class="post-date-month text-uppercase"><?php echo get_the_date('M'); ?></small>
                                </div>
                            </div>
                            <!--Card image-->
                            <div class="view overlay">

                                <a href="<?php the_permalink(); ?>">
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
                                    <div class="wrap-content-title">
                                        <!--Title-->
                                        <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                                            <h3 class="post-card-title card-title d-none d-sm-block">
                                                <?php the_title(); ?>
                                            </h3>
                                        </a>
                                        <a href="<?php the_permalink(); ?>" class="text-decoration-none">
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

            <div class="col-md-6 ">



                <?php

                $otherPosts = new WP_Query(array(
                    'cat' => 2,
                    'posts_per_page'      => 4,
                    'post_status'         => 'publish',
                    'ignore_sticky_posts' => true,
                    'no_found_rows'       => true,
                    'order' => 'DESC'
                ));

                if ($otherPosts->have_posts()) :
                    while ($otherPosts->have_posts()) :
                        $otherPosts->the_post();
                ?>

                        <div class="col-6 d-inline-block">
                            <!-- Card 2 -->

                            <div class="card mb-4">
                                <!-- Card date -->
                                <div class="date-container text-center bg-secondary-color overlay">
                                    <div class="post-date align-self-center">
                                        <h4 class="post-date-day"><?php echo get_the_date('j'); ?></h4>
                                        <small class="post-date-month text-uppercase"><?php echo get_the_date('M'); ?></small>
                                    </div>
                                </div>
                                <!--Card image-->
                                <div class="view overlay">

                                    <a href="<?php the_permalink(); ?>">
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
                                            <a href="<?php the_permalink(); ?>" class="text-decoration-none">
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
        <!-- col right -->
    </div>
    <!-- row posts -->
    <div class="text-center">
        <a class="btn-template btn-primary" href="">Action</a>
    </div>

</div>

<!-- /home-post-section -->