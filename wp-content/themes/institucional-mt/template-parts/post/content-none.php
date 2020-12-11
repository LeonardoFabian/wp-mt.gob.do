<?php
/*
Template part para mostrar un mensaje cuando una pagina no este disponible
*/
?>

<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title"><?php _e( 'Nothing Found', '_themename') ?></h1>
    </header>
    <div class="page-content">
        <?php 
            if( is_home() && current_user_can( 'publish_posts') ) :
        ?>
        <p>
            <?php 
                printf( __('¿Listo para publicar tu primera entrada?', '_themename') );
            ?>
        </p>
        <?php
            endif;
        ?>
    </div>
</section>