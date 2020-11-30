<?php 

/**
 * Funcionalidades específicas de la administración del plugin
 * 
 * @package         institucionalmt-slideshow
 * @subpackage      institucionalmt-slideshow/admin
 */

/**
 * Define el nombre del plugin, la versión y dos métodos para 
 * encolar las hojas de estilo y el javascript del área de 
 * administración.
 * 
 * @since           1.0.0
 * @package         institucionalmt-slideshow
 * @subpackage      institucionalmt-slideshow/admin
 * @author          Leonardo Fabián <ramonlfabian@gmail.com>
 * 
 * @property        string      $plugin_name
 * @property        string      $plugin_version
 */
if( ! class_exists( 'InstitucionalMT_Slideshow_Admin' ) ){

    class InstitucionalMT_Slideshow_Admin{

        /**
         * Identificador único del plugin
         * 
         * @since           1.0.0
         * @access          private 
         * @var             string      $plugin_name        Identificador único del plugin
         */
        private $plugin_name;
    
        /**
         * Identificador único del plugin
         * 
         * @since           1.0.0
         * @access          private 
         * @var             string      $plugin_version     Versión actual del plugin
         * @author          Leonardo Fabián <ramonlfabian@gmail.com>
         */
        private $plugin_version;
    
        /**
         * @param       string      $plugin_name        Nombre o identificador único del plugin.
         * @param       string      $plugin_version     Versión actual del plugin.
         */
        public function __construct( $plugin_name, $plugin_version ){
    
            $this->plugin_name = $plugin_name;
            $this->plugin_version = $plugin_version;
    
        }
    
        public function institucionalmt_slideshow_admin_enqueue_styles( $hook ){
    
            /**
             * Icono o iconos del plugin
             */
            wp_enqueue_style( 'instmt_slideshow_wordpress_icon_css', INSTMT_SLIDESHOW_PLUGIN_DIR_URL . 'admin/css/instmt-slideshow-wordpress-icon.css', [], $this->plugin_version, 'all' );
    
            /**
             * Condición para controlar la carga de archivos de hojas de estilo
             * solo en las páginas del plugin, en el área de administración.
             */
            // if( $hook != "toplevel_page_XXXXX" ){
            //     return;
            // }
            // if( $hook != "widgets.php" ){
            //     return;
            // }
    
            /**
             * Framework Bootstrap CSS
             */
            wp_enqueue_style( 'instmt_slideshow_bootstrap_admin_css', INSTMT_SLIDESHOW_PLUGIN_DIR_URL . 'helpers/bootstrap-3.3.7-dist/css/bootstrap.min.css', [], '3.3.7', 'all' );
    
            /**
             * Plugin Admin CSS
             */
            wp_enqueue_style( 'instmt_slideshow_plugin_admin_styles', INSTMT_SLIDESHOW_PLUGIN_DIR_URL . 'admin/css/instmt-slideshow-plugin-admin-styles.css', [], $this->plugin_version, 'all' );
    
        }
    
    }

}