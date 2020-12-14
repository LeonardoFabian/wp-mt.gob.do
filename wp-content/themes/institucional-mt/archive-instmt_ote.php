<!--// OTE //-->

<?php
get_header();
?>

<div id="posts-header" class="posts-header title-bar mb-5 d-none d-sm-block">
    <div class="container d-flex text-left overlay text-light h-100">
        <div class="align-self-center">
            <h2 class="posts-header-title"><?php post_type_archive_title(); ?></h2>
            <small class="breadcrumbs tex-muted"><?php _themename_breadcrumb(); ?></small>
        </div>
    </div>
</div><!-- the_posts-header -->

<div class="container py-5">   


        <?php
		
        $page = ( get_query_var('paged') ) ? get_query_var( 'paged' ) : 1;
        $taxonomy = 'ote_taxonomy';
        $offset = ( $page-1) * 100;

        $args = [
            'number' => 100,
            'offset' => $offset,
            'orderby' => 'name',
            'order' => 'DESC'
        ];

        $terms = get_terms( $taxonomy, $args );

        foreach( $terms as $term ){

            $query = new WP_Query( array(
                'post_type' => 'instmt_ote',
                'tax_query' => array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => $taxonomy,
                        'field' => 'slug',
                        //'terms' => 'direcciones', 
                        'terms' => array($term->slug),
                        'operator' => 'IN'
                    ),
                )
            ) );
            ?>

            <?php if( $query->have_posts() ) : ?>          
                   


                        <div class="mb-5">
                            <a href="<?php esc_url( get_term_link( $term ) ); ?>"><h2><?php echo $term->name; ?></h2></a>
                        </div>
                        
                        <div class="ote-cards row card-deck mb-5">
                            <?php while($query->have_posts() ) : $query->the_post(); ?>    

                            <div class="col-md-4">
                        
                                
                                <?php get_template_part('template-parts/ote/content', get_post_format()); ?>

                            </div>

                            <?php endwhile; ?>

                        </div>

                        <?php wp_reset_postdata(); ?>                             

                

            <?php endif; ?>


            <?php } ?>


    

</div>

<?php
get_footer();
?>