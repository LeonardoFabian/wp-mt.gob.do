<?php 

/**
 * Funcionalides específicas del lado del cliente/público
 * 
 * @package         institucionalmt-carousel
 * @subpackage      institucionalmt-carousel/public
 */

/**
 * Define los métodos para encolar las 
 * hojas de estilo y javascript del lado del 
 * cliente/público
 * 
 * @since           1.0.0
 * @package         institucionalmt-carousel
 * @subpackage      institucionalmt-carousel/public
 * @author          Leonardo Fabián <ramonlfabian@gmail.com>
 * 
 * @property        string      $plugin_name
 * @property        string      $plugin_version
 */

 class InstitucionalMT_Carousel_Public {

    /**
     * Identificador único del plugin
     * 
     * @since       1.0.0
     * @access      private 
     * @var         string      $plugin_name        Nombre o identificador único del plugin.
     */
    private $plugin_name;

    /**
     * Versión actual del plugin
     * 
     * @since       1.0.0
     * @access      private
     * @var         string      $version    Versión actual del plugin
     */
    private $version;

    /**
     * @param       string      $plugin_name        Nombre o identificador único del plugin.
     * @param       string      $plugin_version     Versión actual del plugin
     */
    public function __construct( $plugin_name, $plugin_version ){

        $this->plugin_name = $plugin_name;
        $this->plugin_version = $plugin_version;

    }

    public function institucionalmt_carousel_public_enqueue_styles(){

        /**
         * This plugin public styles
         */
        wp_register_style( 'instmt_carousel_plugin_public_styles', INSTMT_CAROUSEL_PLUGIN_DIR_URL . 'public/css/instmt-carousel-plugin-public-style.css' );
        wp_enqueue_style( 'instmt_carousel_plugin_public_styles' );

    }

    /**
     * Registra los scripts en el área de administración
     * 
     * @since       1.0.0
     * @access      public
     * 
     * @param       string      $hook       Devuelve el nombre del slug del menú con el prefijo toplevel_page_ 
     */
    public function institucionalmt_carousel_public_enqueue_scripts(){            

        /**
         * Public Custom JS
         */
        wp_enqueue_script( 'instmt_carousel_plugin_public_scripts', INSTMT_CAROUSEL_PLUGIN_DIR_URL . 'public/js/instmt-carousel-public-code.js', ['jquery'], $this->version, true ); 
    
    }

 }