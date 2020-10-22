<?php

class InstitucionalMT_Public
{

    private $version;
    private $plugin_dir_path;
    private $plugin_dir_url;
    private $plugin_dir_url_dir;

    public function __construct( $version )
    {

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
