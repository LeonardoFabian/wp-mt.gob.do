

<!--***** SERVICIOS POR TAXONOMIA *******-->

<?php
get_header();
?>

<div id="posts-header" class="posts-header title-bar mb-5 d-none d-sm-block">
    <div class="container d-flex text-left overlay text-light h-100">
        <div class="align-self-center">
            <h2 class="posts-header-title"><?php post_type_archive_title(); ?></h2>
            <small class="breadcrumbs tex-muted">Rastro de navegacion pagina de entradas</small>
        </div>
    </div>
</div><!-- the_posts-header -->

<div class="container py-5">

    <div class="row">
        <?php

        $terms = get_terms('servicios_taxonomy', array(
            'orderby' => '',
            'hide_empty' => 0
        ));
        
        foreach( $terms as $term){

            $term_link = get_term_link( $term );

            $args = [
                'post_type' => 'instmt_servicio',
                'servicios_taxonomy'   => $term->slug              
            ];

            $query = new WP_Query( $args );

            echo '<ul class="nav tabs-orange" id="service-category-tabs" role="tablist">';

                echo '<li class="nav-item">';

                    echo '<a href="' . esc_url( $term_link ) . '" class="nav-link active show"  data-toggle="tab" role="tab"><h2><i class="fas fa-user fa-2x pb-2"></i><br>' . $term->name . '</h2></a>';

                echo '</li>';

            echo '</ul>';


            //output the post titles in a list

            echo '<div class="tab-content card">';

                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post();   
                            
                        ?>
                            <div class="service-category" id="<?php the_ID(); ?>" role="">
                                <a href="<?php the_permalink(); ?>" class="nav-link waves-light" id="">
                                    
                                    <?php the_title(); ?>
                                </a>
                            </div>
                        <?php
                        //get_template_part('template-parts/content', 'service');
                    }
                }

            echo '</div>';

                

            wp_reset_postdata();

        }

        

        

        
        ?>

    </div>
    <div class="row posts-pagination justify-content-center">
        <?php
        //the_posts_pagination();
        echo bootstrap_pagination();
        ?>
    </div>

</div>

<?php
get_footer();
?>