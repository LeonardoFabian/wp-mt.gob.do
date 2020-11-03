<?php

class InstitucionalMT_Public
{

    /**
     * El identificador único de éste plugin
     * 
     * @since   1.0.0
     * @access  private
     * @var     string      $plugin_name    El nombre o identificador único de éste plugin
     */
    private $plugin_name;
    
    private $version;
    private $plugin_dir_path;
    private $plugin_dir_url;
    private $plugin_dir_url_dir;

    public function __construct( $plugin_name, $version )
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
        $this->plugin_dir_path = plugin_dir_path(__FILE__);
        $this->plugin_dir_url = plugin_dir_url( __FILE__ );
        $this->plugin_dir_url_dir = plugin_dir_url( __DIR__ );

    }

    public function institucionalmt_public_enqueue_styles()
    {                

        wp_enqueue_style( 'instmt_public_plugin_styles', $this->plugin_dir_url . 'css/public-styles.css', [], $this->version, 'all' );                   

    }

    public function institucionalmt_public_enqueue_scripts()
    {        
        
        wp_enqueue_script( 'instmt_public_plugin_scripts', $this->plugin_dir_url . 'js/public-scripts.js', ['jquery'], $this->version, true );            

        // Required plugins
        wp_enqueue_script('imagesloaded');
        wp_enqueue_script('owl-carousel', plugins_url('public/js/owl.carousel.js', __FILE__), array('jquery'), '', true  );

    }

}
