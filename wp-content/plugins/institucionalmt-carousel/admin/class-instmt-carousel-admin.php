<?php 

/**
 * Funcionalidades específicas de la administración del plugin
 * 
 * @package         institucionalmt-carousel
 * @subpackage      institucionalmt-carousel/admin
 */

/**
 * Define el nombre del plugin, la versión y dos métodos para 
 * encolar las hojas de estilo y el javascript del área de 
 * administración.
 * 
 * @since           1.0.0
 * @package         institucionalmt-carousel
 * @subpackage      institucionalmt-carousel/admin
 * @author          Leonardo Fabián <ramonlfabian@gmail.com>
 * 
 * @property        string      $plugin_name
 * @property        string      $plugin_version
 */

 class InstitucionalMT_Carousel_Admin {

    /**
     * Identificador único del plugin
     * 
     * @since       1.0.0
     * @access      private
     * @var         string      $plugin_name    Nombre o identificador único del plugin.
     */
    private $plugin_name;

    /**
     * Versión del plugin
     * 
     * @since       1.0.0
     * @access      private
     * @var         string      $plugin_version    Versión actual del plugin.
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

    /**
     * Registra los archivos de hojas de estilo del área de administración.
     * 
     * @since       1.0.0
     * @access      public
     * 
     * @param       string      $hook       Devuelve el nombre del slug del menú actual, con el prefijo toplevel_page_
     */
    public function institucionalmt_carousel_admin_enqueue_styles( $hook ){

        // var_dump($hook);

        /**
         * Icono o iconos del plugin
         */
        wp_enqueue_style( 'instmt_carousel_wordpress_icon_css', INSTMT_CAROUSEL_PLUGIN_DIR_URL . 'admin/css/instmt-carousel-wordpress-icon.css', [], $this->plugin_version, 'all' );

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
        wp_enqueue_style( 'instmt_carousel_bootstrap_admin_css', INSTMT_CAROUSEL_PLUGIN_DIR_URL . 'helpers/bootstrap-3.3.7-dist/css/bootstrap.min.css', [], '3.3.7', 'all' );

        /**
         * Plugin Admin CSS
         */
        wp_enqueue_style( 'instmt_carousel_plugin_admin_styles', INSTMT_CAROUSEL_PLUGIN_DIR_URL . 'admin/css/instmt-carousel-plugin-admin-styles.css', [], $this->plugin_version, 'all' );

    }

 }