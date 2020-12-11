<?php 

/***************************************************************
 Enqueue styles
 ***************************************************************/
if( !function_exists( '_themename_enqueue_styles' ) ){
    function _themename_enqueue_styles(){
        $version = wp_get_theme()->get('Version');
        wp_enqueue_style('_themename-style', get_template_directory_uri() . '/style.css', array('_themename-bootstrap'), $version, 'all');
        wp_enqueue_style('_themename-stylesheet', get_template_directory_uri() . '/dist/assets/css/bundle.css', array(), $version, 'all' );
        wp_enqueue_style('_themename-bootstrap', get_template_directory_uri() . '/admin/css/bootstrap/bootstrap.min.css', array(), '4.5.2', 'all');
        wp_enqueue_style('_themename-fontawesome', 'https://use.fontawesome.com/releases/v5.14.0/css/all.css', array(), '5.14.0', 'all');

        /**
        * Custom Carousel Bootstrap 4 
        * for Banner Slider
        */
        wp_enqueue_style('_themename-banner-carousel-css', get_template_directory_uri() . '/public/css/custom-banner-bootstrap-carousel.css', array(), '4.5.2', 'all');
    }
}

add_action('wp_enqueue_scripts', '_themename_enqueue_styles');

/**
* Registra y encola los estilos en el área de administración
* 
* @since            1.0.0
* @access           public
*/
if( !function_exists( '_themename_admin_enqueue_styles' ) ){
    function _themename_admin_enqueue_styles(){
        $version = wp_get_theme()->get('Version');
        wp_enqueue_style('_themename-admin-stylesheet', get_template_directory_uri() . '/dist/assets/css/admin.css', array(), $version, 'all' );
    }
}

add_action('admin_enqueue_scripts', '_themename_admin_enqueue_styles');


/***************************************************************
 Enqueue scripts
 ***************************************************************/
/**
* Registra y encola los scripts en el lado del cliente/público
* 
* @since            1.0.0
* @access           public
*/
if( !function_exists( '_themename_enqueue_scripts' ) ){
    function _themename_enqueue_scripts(){
        $version = wp_get_theme()->get('Version');
        // wp_enqueue_script('jquery');
        wp_enqueue_script('_themename-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', array(), '1.16.1', true);
        wp_enqueue_script('_themename-fontawesome', 'https://kit.fontawesome.com/cece37c6b0.js', array(), '5.14.0', true);
        wp_enqueue_script('_themename-bootstrap', get_template_directory_uri() . '/admin/js/bootstrap/bootstrap.min.js', array(), '4.5.2', true);
    
        /**
         * Libreria TweenMax (javascript)
         * Herramienta de animaciones
         * https://greensock.com/get-started
         */
        wp_enqueue_script('_themename-tweenmax-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js', array('jquery'), '3.5.1', true);
    
        /**
         * Libreria ScrollMagic (javascript)
         * Sincronizar animaciones con el scroll
         * https://scrollmagic.io/
         */
        wp_enqueue_script('_themename-ScrollMagic-js', get_template_directory_uri() . '/helpers/scrollmagic/minified/ScrollMagic.min.js', array('jquery'), '2.0.7', true);
        wp_enqueue_script('_themename-ScrollMagic-Animation-js', get_template_directory_uri() . '/helpers/scrollmagic/minified/plugins/animation.gsap.min.js', array('jquery'), '2.0.7', true);
        wp_enqueue_script('_themename-code', get_template_directory_uri() . '/admin/js/code.js', array('jquery'), $version, true);
        wp_enqueue_script('_themename-scripts', get_template_directory_uri() . '/dist/assets/js/bundle.js', array('jquery'), $version, true);
        wp_enqueue_script('_themename-Public-js', get_template_directory_uri() . '/public/js/institucionalmt-public-code.js', array('jquery'), $version, true);
        
    }
}
add_action('wp_enqueue_scripts', '_themename_enqueue_scripts');

/**
* Registra y encola los scripts en el área de administración
* 
* @since            1.0.0
* @access           public
*/
if( !function_exists( '_themename_admin_enqueue_scripts' ) ){
    function _themename_admin_enqueue_scripts(){
        $version = wp_get_theme()->get('Version');
        wp_enqueue_script('_themename-admin-scripts', get_template_directory_uri() . '/dist/assets/js/admin.js', array('jquery'), $version, true );
    }
}
add_action('admin_enqueue_scripts', '_themename_admin_enqueue_scripts');