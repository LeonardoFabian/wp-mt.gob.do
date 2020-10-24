<?php

class InstitucionalMT_Admin
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

    public function institucionalmt_admin_enqueue_styles( $hook )
    {

        //var_dump($hook);

        if ($hook != 'post.php') {
            return;
        }

        wp_enqueue_style( 'instmt_admin_plugin_styles', $this->plugin_dir_url . 'css/admin-styles.css', [], $this->version, 'all' );                   

    }

    public function institucionalmt_admin_enqueue_scripts( $hook ){

        // var_dump($hook);

        // if( $hook != 'toplevel_page_instmt_settings' && $hook != 'post.php' ){
        //     //echo "<script>alert('Aqui no esta');</script>";
        //     return;
        // }        

        wp_enqueue_script( 'instmt_admin_plugin_scripts', $this->plugin_dir_url . 'js/admin-scripts.js', ['jquery'], $this->version, true );            

        wp_localize_script( 
            'instmt_admin_plugin_scripts', 
            'instmt_object',  
            [
                'url' => admin_url( 'admin-ajax.php' ), // return the route wp-admin/admin-ajax.php
                'security' => wp_create_nonce( 'instmt_ajax_security_nonce' ),
            ]
        );

    }

}
