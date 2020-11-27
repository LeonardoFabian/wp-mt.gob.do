<?php get_header(); ?>

<!-- Single Content -->

<!-- Single -->
<div id="single-content-section">

    <!-- wp single content -->

    <?php
    if (have_posts()) :
        while (have_posts()) :

            the_post();
            /*get_template_part('template-parts/post/content', 'article');*/
            get_template_part('template-parts/page/content', 'page');

    ?>
            <div id="post-navigation-section" class="d-none d-sm-block">
                <div class="container my-5">

                    <hr>
                    <h2>Noticias destacadas</h2>

                    <div id="cooler-nav" class="navigation">
                        <?php $prevPost = get_previous_post();
                        if ($prevPost) { ?>
                            <div class="nav-box previous">
                                <p>Noticia anterior</p>
                                <?php $prevthumbnail = get_the_post_thumbnail($prevPost->ID, array(100, 100)); ?>
                                <?php previous_post_link('%link', "$prevthumbnail  <p>%title</p>", TRUE); ?>
                            </div>
                        <?php }
                        $nextPost = get_next_post();
                        if ($nextPost) { ?>
                            <div class="nav-box next" style="float:right;">
                                <?php $nextthumbnail = get_the_post_thumbnail($nextPost->ID, array(100, 100)); ?>
                                <?php next_post_link('%link', "$nextthumbnail  <p>%title</p>", TRUE); ?>
                            </div>
                        <?php } ?>
                    </div>
                    <!--#cooler-nav div -->


                </div>
            </div>
    <?php
        endwhile;
    endif;

    wp_reset_postdata();
    
    ?>



</div>




<!-- End Single Content -->





<?php get_footer(); ?>