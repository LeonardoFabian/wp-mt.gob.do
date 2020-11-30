<?php

function institucionalmt_multiple_items_slide()
{

    $args = [
        'post_type' => 'instmt_slide_item',
        'post_per_page' => 3
    ];

    $query = new WP_Query($args);

    if ($query->have_posts()) : ?>

        <div id="institucionalmtSlideshow" class="container my-4">

            <!--Carousel Wrapper-->
            <div id="instmt-slideshow-items" class="carousel slide carousel-multi-item" data-ride="carousel">

                <!--Controls-->
                <div class="controls-top">
                    <a class="btn-floating" href="#instmt-slideshow-items" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                    <a class="btn-floating" href="#instmt-slideshow-items" data-slide="next"><i class="fa fa-chevron-right"></i></a>
                </div>
                <!--/.Controls-->

                <!--Indicators-->
                <ol class="carousel-indicators">
                    <li data-target="#instmt-slideshow-items" data-slide-to="0" class="active"></li>
                    <li data-target="#instmt-slideshow-items" data-slide-to="1"></li>
                    <li data-target="#instmt-slideshow-items" data-slide-to="2"></li>
                </ol>
                <!--/.Indicators-->

                <!--Slides-->
                <div class="carousel-inner" role="listbox">

                    <?php while ($query->have_posts()) : $query->the_post(); ?>

                        <!--First slide-->
                        <div class="carousel-item active">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card mb-2">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php
                                            if (has_post_thumbnail()) :
                                                the_post_thumbnail('post_thumbnail', array('class' => 'd-block w-100 img-fluid'));
                                            endif;
                                            ?>
                                        </a>
                                        <!-- <div class="card-body">
                                            <h4 class="card-title"><?php the_title(); ?></h4>
                                            <p class="card-text"><?php the_content(); ?></p>
                                        </div> -->
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!--/.First slide-->

                    <?php endwhile; ?>

                </div>
                <!--/.Slides-->

            </div>
            <!--/.Carousel Wrapper-->


        </div>

<?php endif;

}
