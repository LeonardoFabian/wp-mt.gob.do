<?php 
/**
 * @subpackage      _themename
 * @since           1.0
 * @version         1.0
 */
get_header(); ?>

<!-- Single Content -->

<!-- Single -->
<div id="single-content-section">

    <!-- wp single content -->

    <?php
    if (have_posts()) :
        while (have_posts()) :

            the_post();
            /*get_template_part('template-parts/post/content', 'article');*/
            get_template_part('template-parts/post/content', get_post_format());

    ?>
            <div id="post-navigation-section" class="d-none d-sm-block">
                <div class="container my-5">

                    <hr>
                    <h2><?php echo apply_filters( '_themename_related_news_section_title', esc_html__('Noticias relacionadas', '_themename') ) ?></h2>

                    <div id="cooler-nav" class="navigation">
                        <?php $prevPost = get_previous_post();
                        if ($prevPost) { ?>
                            <div class="nav-box previous">
                                <p class="text-muted"><?php echo apply_filters( '_themename_prev_post_label', esc_html__('Noticia anterior', '_themename') ) ?></p>
                                <?php $prevthumbnail = get_the_post_thumbnail($prevPost->ID, array(100, 100)); ?>
                                <?php previous_post_link('%link', "$prevthumbnail  <p>%title</p>", TRUE); ?>
                            </div>
                        <?php }
                        $nextPost = get_next_post();
                        if ($nextPost) { ?>
                            <div class="nav-box next" style="float:right;">
                            <p class="text-muted"><?php echo apply_filters( '_themename_next_post_label', esc_html__('Noticia siguiente', '_themename') ) ?></p>
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
    ?>



</div>




<!-- End Single Content -->





<?php get_footer(); ?>