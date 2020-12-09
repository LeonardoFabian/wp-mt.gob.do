<?php

function institucionalmt_multiple_items_slide()
{

    global $post;

    $args = [
        'post_type' => 'instmt_slide_item',
        'numberposts' => -1
    ];

    $items = get_posts($args);

    $items_array = [];

?>


    <!--Carousel Wrapper-->
    <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

        <!--Controls-->
        <div class="controls-top">
            <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
            <a class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fas fa-chevron-right"></i></a>
        </div>
        <!--/.Controls-->

        <!--Indicators-->
        <ol class="carousel-indicators">
            <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
            <li data-target="#multi-item-example" data-slide-to="1"></li>
            <li data-target="#multi-item-example" data-slide-to="2"></li>
        </ol>
        <!--/.Indicators-->

        <!--Slides-->
        <div class="carousel-inner" role="listbox">

            <?php

            foreach ($items as $post) :
                $items_array[] += $post->ID; //setup_postdata( $post ); 
            endforeach;                       

            ?>

<?php foreach($items_array as $post){ setup_postdata(get_post($post['id'])); ?>

            <!--First slide-->
            <div class="carousel-item">
                <div class="row">

                    <?php // var_dump($post); ?>

                             
                        

                        <div class="col-md-4">

                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" target="_blank">
                            <?php
                            if (has_post_thumbnail()) :
                                the_post_thumbnail($post['id'], 'post_thumbnail', array('class' => 'd-block h-100 w-auto img-fluid'));
                            endif;
                            ?>
                        </a>

                        </div>                     

                   
                </div>
            </div>
            <!--/.First slide-->

            <?php } ?>

        </div>
        <!--/.Slides-->

    </div>
    <!--/.Carousel Wrapper-->

<?php
}
