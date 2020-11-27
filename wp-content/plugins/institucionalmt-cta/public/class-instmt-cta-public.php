<?php 

/**
 * Funcionalides específicas del lado del cliente/público
 * 
 * @package         InstitucionalMT-CTA
 * @subpackage      InstitucionalMT-CTA/public
 */

/**
 * Define los métodos para encolar las 
 * hojas de estilo y javascript del lado del 
 * cliente/público
 * 
 * @since           1.0.0
 * @package         InstitucionalMT-CTA
 * @subpackage      InstitucionalMT-CTA/public
 * @author          Leonardo Fabián <ramonlfabian@gmail.com>
 * 
 * @property        string      $plugin_name
 * @property        string      $plugin_version
 */

 class InstitucionalMT_CTA_Public {

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

    public function institucionalmt_cta_public_enqueue_styles(){

        /**
         * This plugin public styles
         */
        wp_register_style( 'instmt_cta_plugin_public_styles', INSTMT_CTA_PLUGIN_DIR_URL . 'public/css/instmt-cta-plugin-public-style.css' );
        wp_enqueue_style( 'instmt_cta_plugin_public_styles' );

    }

 }