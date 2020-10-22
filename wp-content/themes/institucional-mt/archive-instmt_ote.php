

<!--***** SERVICIOS POR TAXONOMIA *******-->

<?php
get_header();
?>

<div id="posts-header" class="posts-header title-bar mb-5 d-none d-sm-block">
    <div class="container d-flex text-left overlay text-light h-100">
        <div class="align-self-center">
            <h2 class="posts-header-title"><?php post_type_archive_title(); ?></h2>
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

                <div class="col-xl-12">

                    <a href="<?php esc_url( get_term_link( $term ) ); ?>"><h2><?php echo $term->name; ?></h2></a>

                    <ul class="list-unstyled">

                        <?php while($query->have_posts() ) : $query->the_post(); ?>

                            <li><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></li>

                        <?php endwhile; ?>
                    
                    </ul>

                </div>

                <?php wp_reset_postdata(); ?>

            <?php endif; ?>

            <?php } ?>

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