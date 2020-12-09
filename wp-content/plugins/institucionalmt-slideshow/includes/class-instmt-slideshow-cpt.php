<?php 

/**
 * Registra los Custom Post Types (CPT) del plugin
 * 
 * @since           1.0.0
 */
if( ! class_exists( 'InstitucionalMT_Slideshow_CPT' ) ){

    class InstitucionalMT_Slideshow_CPT{

        public function instmt_slideshow_item(){

            $labels = [
                'name' => __( 'Slider Items', 'instmtslideshow' ),
                'singular_name' => __( 'Slider Item', 'instmtslideshow' ),
                'menu_name' => __( 'Slider Items', 'instmtslideshow')
            ];

            $args = [
                'labels' => $labels,
                'description' => __( 'Almacena todos los Banners que se mostrarán en el slider del plugin', 'instmtslideshow' ),
                'public' => true,
                'supports' => [ 'title', 'editor', 'thumbnail' ],
                'capability_type' => 'post',
                'show_ui' => true,
                'show_in_menu' => true,
                'show_in_nav_menus' => true
            ];

            register_post_type( 'instmt_slide_item', $args );

            flush_rewrite_rules();

        }

    }

}