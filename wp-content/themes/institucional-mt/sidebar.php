<!--
<div class="my-3">
    <h3>Más noticias</h3>
    <hr class="divisor-left">
    <div class="col-4">
        <img src="images/carousel-item-2.jpg" alt="" class="img-fluid">
    </div>
    <div class="col-8">
        <span class="text-muted">01 de septiembre 2020</span>
        <h4 class="my-3">This is an example of a single page</h4>
    </div>
</div>
-->

<?php // if( is_active_sidebar( 'post-right-widget-area' ) ) :

//dynamic_sidebar( 'post-right-widget-area' ) 

// endif; 
?>


<div id="sidebar" style="padding:0px 0px 30px 30px;">
    
        

    <?php 
    
    if (is_home()) {
        // Código para la página de Inicio
    }

    if( is_page() ){
        // plugin _themename-cpt/public/class-instmt-public.php
        do_action('instmt_sidebar_menu');
    }

    if (is_page('433')) {
        // Código para las páginas
        if (is_active_sidebar('service-right-widget-area')) {

            dynamic_sidebar('service-right-widget-area');
        }
    }       
  

    // Sidebar: Quienes somos, Historia, Organigrama, Direcciones y Dependencias, Representaciones Locales
    if ( is_page_template( 'templates/about.php' ) ) {
        // Código para las páginas About Us        
       // include('sidebar-about.php');
      
       dynamic_sidebar('about-us-right-sidebar');
       dynamic_sidebar('banners-pages-sidebar');
    }

    if (is_single()) {
        // Código para los detalles de las entradas
        if (is_active_sidebar('post-right-widget-area')) {

            dynamic_sidebar('post-right-widget-area');

            // plugin _themename-cpt/public/class-instmt-public.php
            do_action('instmt_latest_post_per_category_collection');
        }
    }

    if (is_category('servicios')) {
        // Código para los detalles de las categorias
        if (is_active_sidebar('service-right-widget-area')) {

            dynamic_sidebar('service-right-widget-area');
        }
    }

    if (is_page_template('contacto')) {
        // Código si tenemos una plantilla de página "contacto"       

    } ?>
</div>