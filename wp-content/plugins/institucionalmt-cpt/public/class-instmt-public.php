<?php

class InstitucionalMT_Public
{

    /**
     * El identificador único de éste plugin
     * 
     * @since       1.0.0
     * @access      private
     * @var         string      $plugin_name    El nombre o identificador único de éste plugin
     */
    private $plugin_name;

    /**
     * Versión actual del plugin
     * 
     * @since       1.0.0
     * @access      private
     * @var         string      $version    La versión actual del plugin
     */
    private $version;  

    /**
     * @param   string      $plugin_name    Nombre o identificador único de éste plugin
     * @param   string      $version        Versión actual del plugin
     */
    public function __construct( $plugin_name, $version )
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;            
    }

    public function institucionalmt_public_enqueue_styles()
    {                

        wp_enqueue_style( 'instmt_public_plugin_styles', INSTMT_PLUGIN_DIR_URL . 'css/public-styles.css', [], $this->version, 'all' );                   

    }

    public function institucionalmt_public_enqueue_scripts()
    {        
        
        wp_enqueue_script( 'instmt_public_plugin_scripts', INSTMT_PLUGIN_DIR_URL . 'js/public-scripts.js', ['jquery'], $this->version, true );            

        // Required plugins
        wp_enqueue_script('imagesloaded');
        wp_enqueue_script('owl-carousel', INSTMT_PLUGIN_DIR_URL . 'public/js/owl.carousel.js', array('jquery'), '', true  );

    }

}
