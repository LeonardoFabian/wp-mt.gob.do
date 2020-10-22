

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

            //output the post titles in a list

           

                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();   
                            
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

            wp_reset_postdata();            

        
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