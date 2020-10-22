<?php get_header(); ?>

<div id="" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php 
            // Show selected front page cotent
            if( have_posts() ) :
                while( have_posts() ) :
                    the_post();                                    

                    //the_content();
                    get_template_part( 'template-parts/page/content', 'front-page');
                endwhile;
            else :
                _e( 'No existen publicaciones para mostrar en la págna de inicio', 'institucionalmt');
            endif;
        ?>

    </main>
</div>

<?php get_footer(); ?>