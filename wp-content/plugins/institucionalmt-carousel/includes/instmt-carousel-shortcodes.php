<?php 

/**
 * Añade un carousel de tus entradas con la categoria noticias-destacadas
 * Shortcode: [instmt_carousel]
 * 
 * @since           1.0.0
 * @access          public
 */
function institucionalmt_carousel_shortcode_atts( $atts, $content = null ){

    $args = [       
        'post_type' => 'post',
        'posts_per_page' => '5',
        'taxonomy' => 'category',
        'field' => 'slug',
        'terms' => 'noticias-destacadas',
    ];

    $atts = shortcode_atts( $args, $atts, 'instmt_carousel' );

    ob_start();

    $args = array(
        'post_type' => $atts['post_type'],
        'posts_per_page' => 5,
        'tax_query' => array(
            array(
                'taxonomy' => $atts['taxonomy'],
                'field' => $atts['field'],
                'terms' => $atts['terms']
            )
         )
    );

    $query = new WP_Query($args);   ?>

    <?php if ($query->have_posts()) : ?>
     
        <div id="institucionalmtCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">

                <!-- ul width adjust to the (N*100)% of container -->   
                <?php while ($query->have_posts()) : $query->the_post(); ?>

                    <div class="carousel-item text-center">      
                        
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute() ?>">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('post_thumbnail', array('class' => 'd-block w-100 img-fluid'));
                            }
                            ?>
                        </a>

                        <div class="carousel-caption d-none d-md-block">
                            <div class="container">
                                <div class="text-left">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute() ?>">
                                        <h3 class="carousel-item-title"><?php the_title(); ?></h3>
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

                <?php endwhile; ?>                  

            </div>

            <a class="carousel-control-prev" href="#institucionalmtCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#institucionalmtCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>

    <?php endif; ?>

    <?php wp_reset_postdata(); ?>

    <?php

    return ob_get_clean();

}