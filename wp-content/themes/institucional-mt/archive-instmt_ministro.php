

<!--***** SERVICIOS POR TAXONOMIA *******-->

<?php
get_header();
?>

<?php _themename_page_header(); ?>

<div class="container py-5">

    <div class="row">

        <?php        

        $args = [
            'post_type' => 'instmt_ministro',
            'post_status' => 'publish',
            'posts_per_archive_page' => 1,
            'orderby' => 'date',
            'order' => 'DESC',
        ];      
       

            $query = new WP_Query( $args );
            ?>

            <?php if( $query->have_posts() ) : ?>

                <div class="col-xl-12">                    

                        <?php while($query->have_posts() ) : $query->the_post(); ?>

                            <div class="post-content-image mb-5" style="margin: 0 auto;" >
                                <?php
                                    if (has_post_thumbnail()) {
                                        the_post_thumbnail('full', array('class' => 'img-fluid'));
                                    }
                                ?>
                            </div>
                            
                            <div class="lead text-justify">
                                <?php the_content(); ?>
                            </div>

                        <?php endwhile; ?>                                    

                </div>

                <?php wp_reset_postdata(); ?>

            <?php endif; ?>          

    </div>

    <div class="row posts-pagination justify-content-center">
        <?php
        
        //echo bootstrap_pagination();
        ?>
    </div>

</div>

<?php
get_footer();
?>