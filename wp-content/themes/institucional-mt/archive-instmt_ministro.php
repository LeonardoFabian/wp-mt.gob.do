

<!--***** SERVICIOS POR TAXONOMIA *******-->

<?php
get_header();
?>

<div id="posts-header" class="posts-header title-bar mb-5 d-none d-sm-block">
    <div class="container d-flex text-left overlay text-light h-100">
        <div class="align-self-center">
            <h2 class="institucionalmt-title"><?php the_title(); ?><span></span></h2>
            <small class="breadcrumbs tex-muted"><?php the_breadcrumb(); ?></small>
        </div>
    </div>
</div><!-- the_posts-header -->

<div class="container py-5">

    <div class="row">
        <?php
/*
        $terms = get_terms('dependencias_taxonomy', array(            
            'orderby' => 'name',
            'order' => 'asc',
            'parent' => 0,
            'hide_empty' => 0,
            
        ));
        
        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
            $count = count( $terms );
            $i = 0;
            $term_list = '<div class="col-xl-3">';
            foreach ( $terms as $term ) {
                $i++;
                $term_list .= '<a href="' . esc_url( get_term_link( $term ) ) . '" alt="' . esc_attr( sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) ) . '"><h2>' . $term->name . '</h2></a>';
                if ( $count != $i ) {
                    $term_list .= ' &middot; ';
                }
                else {
                    $term_list .= '</div>';
                }
            }
            echo $term_list;
        }          
        */
        

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