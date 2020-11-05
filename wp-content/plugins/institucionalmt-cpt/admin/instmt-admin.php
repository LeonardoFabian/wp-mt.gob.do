<?php
/**
 * La funcionalidad específica de administración del plugin.
 * 
 * @package     InstitucionalMT_CPT
 * @subpackage  InstitucionalMT_CPT/admin
 */

 /**
  * Define el nombre del plugin, la versión y dos métodos para
  * encolar las hoja de estilos específica de administración y
  * el javascript
  *
  * @since      1.0.0
  * @package    InstitucionalMT_CPT
  * @subpackage InstitucionalMT_CPT/admin 
  * @author     Leonardo Fabián <ramonlfabian@gmail.com>
  * 
  * @property   string      $plugin_name
  * @property   string      $version 
  */

class InstitucionalMT_Admin
{
    /**
     * El identificador único de éste plugin
     * 
     * @since   1.0.0
     * @access  private
     * @var     string      $plugin_name    El nombre o identificador único de éste plugin
     */
    private $plugin_name;

    /**
     * Versión actual del plugin
     * 
     * @since   1.0.0
     * @access  private
     * @var     string      $version    La versión actual del plugin
     */
    private $version;
     
    private $plugin_dir_url_dir;

    /**
     * @param   string      $plugin_name    Nombre o identificador único de éste plugin.
     * @param   string      $version        La versión actual del plugin.
     */
    public function __construct( $plugin_name, $version )
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;          

        $this->plugin_dir_url_dir = plugin_dir_url( __DIR__ );

    }

    public function institucionalmt_admin_enqueue_styles( $hook )
    {

        //var_dump($hook);

        // if ($hook != 'post.php') {
        //     return;
        // }

        wp_enqueue_style( 'bootstrap_animate_css', INSTMT_PLUGIN_DIR_URL . 'admin/inc/animate.css', [], $this->version, 'all' );                   
        wp_enqueue_style( 'bootstrap_admin_css', INSTMT_PLUGIN_DIR_URL . 'admin/inc/bootstrap-3.3.7-dist/css/bootstrap.min.css', [], $this->version, 'all' );                   
        wp_enqueue_style( 'instmt_admin_plugin_styles', INSTMT_PLUGIN_DIR_URL . 'admin/css/admin-styles.css', [], $this->version, 'all' );                   

    }

    public function institucionalmt_admin_enqueue_scripts( $hook ){

        var_dump($hook);

        // if( $hook != 'toplevel_page_instmt_settings' && $hook != 'post.php' ){
        //     //echo "<script>alert('Aqui no esta');</script>";
        //     return;
        // }        

        if( $hook == "post.php"){
             wp_enqueue_media();
        }

        wp_enqueue_script( 'bootstrap_admin_js', INSTMT_PLUGIN_DIR_URL . 'admin/inc/bootstrap-3.3.7-dist/js/bootstrap.min.js', ['jquery'], $this->version, true );  
        wp_enqueue_script( 'bootstrap_admin_notify', INSTMT_PLUGIN_DIR_URL . 'admin/inc/bootstrap-notify/bootstrap-notify.min.js', ['jquery'], $this->version, true );  
        wp_enqueue_script( 'instmt_admin_plugin_scripts', INSTMT_PLUGIN_DIR_URL . 'admin/js/admin-scripts.js', ['jquery'], $this->version, true );            

        wp_localize_script( 
            'instmt_admin_plugin_scripts', 
            'instmt_object',  
            [
                'url' => admin_url( 'admin-ajax.php' ), // return the route wp-admin/admin-ajax.php
                'security' => wp_create_nonce( 'instmt_ajax_security_nonce' ),
                'current_user_id' => get_current_user_id()
            ]
        );

        wp_localize_script( 
            'instmt_admin_plugin_scripts', 
            'traductor',  
            [
                'actualizar' => [
                    'success' => __('Se han actualizado los datos del Representante: ', 'institucionalmt'),
                    'error' => __('Ha ocurrido un error al intentar guardar los datos', 'institucionalmt')
                ]
            ]
        );

    }

}
