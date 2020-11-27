<?php
/**
 * La funcionalidad específica de administración del plugin.
 * 
 * @package         InstitucionalMT-CPT
 * @subpackage      InstitucionalMT-CPT/admin
 */

 /**
  * Define el nombre del plugin, la versión y dos métodos para
  * encolar las hoja de estilos específica de administración y
  * el javascript
  *
  * @since          1.0.0
  * @package        InstitucionalMT-CPT
  * @subpackage     InstitucionalMT-CPT/admin 
  * @author         Leonardo Fabián <ramonlfabian@gmail.com>
  * 
  * @property       string      $plugin_name
  * @property       string      $version 
  */

class InstitucionalMT_Admin
{
    /**
     * Identificador único del plugin
     * 
     * @since       1.0.0
     * @access      private
     * @var         string      $plugin_name    Nombre o identificador único de éste plugin
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
     * Objeto registrado de menús
     * 
     * @since 1.0.0
     * @access      private
     * @var         object      $build_menupage     Instancia del objeto InstitucionalMT_Menu_Pages
     */
    private $build_menupage;

    /**
     * @param       string      $plugin_name    Nombre o identificador único de éste plugin.
     * @param       string      $version        La versión actual del plugin.
     */
    public function __construct( $plugin_name, $plugin_version )
    {
        $this->plugin_name = $plugin_name;
        $this->version = $plugin_version;       
        $this->build_menupage = new InstitucionalMT_Menu_Pages();  
    }

    /**
     * Registra los archivos de hojas de estilo del área de administración
     * 
     * @since       1.0.0
     * @access      public
     * 
     * @param       string      $hook       Devuelve el nombre del slug del menú actual, con el prefijo toplevel_page_ 
     */
    public function institucionalmt_admin_enqueue_styles( $hook )
    {
        
        //var_dump($hook);

        /**
         * WordPress Plugin Icon CSS
         */
        wp_enqueue_style( 'instmt_wordpress_icon_css', INSTMT_PLUGIN_DIR_URL . 'admin/css/instmt-wordpress-icon.css', [], $this->version, 'all' );

        /**
         * Condición para controlar la carga de archivos
         * solo en las páginas del plugin
         */
        if( 
            ($hook != "toplevel_page_instmt_items") && 
            // ($hook != "post.php") && 
            ($hook != "institucionalmt-cpt/admin/partials/item-edit.php") &&
            ($hook != "institucionalmt-cpt/admin/partials/item-new.php") &&
            ($hook != "institucionalmt-cpt/admin/partials/item-category.php") &&
            ($hook != "institucionalmt-cpt/admin/partials/item-category-new.php")
        ){
            return;
        }

        // if ($hook != 'post.php') {
        //     return;
        // }

        wp_enqueue_style( 'bootstrap_animate_css', INSTMT_PLUGIN_DIR_URL . 'admin/inc/animate.css', [], $this->version, 'all' );   
        #FIXME: modal-content with box-shadow in material class                
        // wp_enqueue_style( 'bootstrap_admin_css', INSTMT_PLUGIN_DIR_URL . 'admin/inc/bootstrap-3.3.7-dist/css/bootstrap.min.css', [], $this->version, 'all' );                   
        
        /**
         * Framework Materialize CSS
         * https://materializecss.com/getting-started.html
         * Material Icons Google
         */
        wp_enqueue_style( 'instmt_admin_material_icons', 'https://fonts.googleapis.com/icon?family=Material+Icons', [], $this->version, 'all' );    
        wp_enqueue_style( 'instmt_admin_materialize_css', INSTMT_PLUGIN_DIR_URL . 'helpers/materialize/css/materialize.min.css', [], '1.0.0', 'all' ); 
        
        /**
         * Sweet Alert CSS
         * http://labs.bootstrapthemes.co/demo/html/sweetalert-master/
         */        
        wp_enqueue_style( 'instmt_admin_sweetalert_css', INSTMT_PLUGIN_DIR_URL . 'helpers/sweetalert-master/dist/sweetalert.css', [], $this->version, 'all' ); 
        
        /**
         * Admin Custom CSS
         */
        wp_enqueue_style( 'instmt_admin_plugin_styles', INSTMT_PLUGIN_DIR_URL . 'admin/css/admin-styles.css', [], $this->version, 'all' );  

    }

    /**
     * Registra los scripts en el área de administración
     * 
     * @since       1.0.0
     * @access      public
     * 
     * @param       string      $hook       Devuelve el nombre del slug del menú con el prefijo toplevel_page_ 
     */
    public function institucionalmt_admin_enqueue_scripts( $hook ){

        var_dump($hook);

        // if( $hook != 'toplevel_page_instmt_settings' && $hook != 'post.php' ){
        //     //echo "<script>alert('Aqui no esta');</script>";
        //     return;
        // }   
        
        /**
         * Condición para controlar la carga de archivos
         * solo en las páginas del plugin
         */
        if( ($hook != "toplevel_page_instmt_items") && 
            //($hook != "post.php") && 
            ($hook != "institucionalmt-cpt/admin/partials/item-edit.php") &&
            ($hook != "institucionalmt-cpt/admin/partials/item-new.php") &&
            ($hook != "institucionalmt-cpt/admin/partials/item-category.php") &&
            ($hook != "institucionalmt-cpt/admin/partials/item-category-new.php")
        ){
             return;
        }

        if( $hook == "institucionalmt-cpt/admin/partials/item-new.php"){
             wp_enqueue_media();
        }

        wp_enqueue_script( 'bootstrap_admin_js', INSTMT_PLUGIN_DIR_URL . 'admin/inc/bootstrap-3.3.7-dist/js/bootstrap.min.js', ['jquery'], $this->version, true );  
        wp_enqueue_script( 'bootstrap_admin_notify', INSTMT_PLUGIN_DIR_URL . 'admin/inc/bootstrap-notify/bootstrap-notify.min.js', ['jquery'], $this->version, true );  

        /**
         * Framework Materialize JS
         * https://materializecss.com/getting-started.html
         */           
        wp_enqueue_script( 'instmt_admin_materialize_js', INSTMT_PLUGIN_DIR_URL . 'helpers/materialize/js/materialize.min.js', ['jquery'], '1.0.0', true ); 
        
        /**
         * Sweet Alert JS
         * http://labs.bootstrapthemes.co/demo/html/sweetalert-master/
         */        
        wp_enqueue_script( 'instmt_admin_sweetalert_js', INSTMT_PLUGIN_DIR_URL . 'helpers/sweetalert-master/dist/sweetalert.min.js', ['jquery'], $this->version, true ); 
        

        /**
         * Admin Custom JS
         */
        wp_enqueue_script( 'instmt_admin_plugin_scripts', INSTMT_PLUGIN_DIR_URL . 'admin/js/admin-scripts.js', ['jquery'], $this->version, true ); 
        
        /**
         * Items custom JS
         */
        /**
         * Admin Custom JS
         */
        wp_enqueue_script( 'instmt_plugin_item_scripts', INSTMT_PLUGIN_DIR_URL . 'admin/js/instmt-items-scripts.js', ['jquery'], $this->version, true ); 

        /**
        * Localizando el archivo javascript principal del área de administración
        * para pasarle el objeto "instmt_object" con los parametros:
        * 
        * @param    instmt_object.url        URL del archivo admin-ajax.php
        * @param    instmt_object.security   Nonce de seguridad para el envio de datos
        * @param    instmt_object.current_user_id   ID del usuario actual
        */
        wp_localize_script( 
            'instmt_admin_plugin_scripts', 
            'instmt_object',  
            [
                'url' => admin_url( 'admin-ajax.php' ), // return the route wp-admin/admin-ajax.php
                'security' => wp_create_nonce( 'instmt_ajax_security_nonce' ),
                'current_user_id' => get_current_user_id()
            ]
        );

        /**
        * (Opcional) Traducciones javascript
        * Localizando el archivo javascript principal del área de administración
        * para pasarle el objeto "traductor" con los parametros:
        * 
        * @param    traductor.success   Traduccion para cuando devuelva success
        * @param    traductor.error     Traduccion para cuando devuelva error
        */
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

        /**
        * Localizando el archivo javascript principal del área de administración
        * para pasarle el objeto "instmt_table" con los parametros:
        * 
        * @param    instmt_table.url        URL del archivo admin-ajax.php
        * @param    instmt_table.security   Nonce de seguridad para el envio de datos
        */
        wp_localize_script(
            'instmt_admin_plugin_scripts',
            'instmt_table',
            [
                'url' => admin_url( 'admin-ajax.php' ),
                'security' => wp_create_nonce( 'instmt_ajax_create_table_nonce' )
            ]
        );

    }

    /**
     * Registra el menú "Items" en el área de administración
     * para administrar los registros de la tabla intitucionalmt_item
     * 
     * @since       1.0.0
     * @access      public
     */
    public function institucionalmt_add_menu_items(){

        $this->build_menupage->add_menu_page(
            __('Items', 'institucionalmt'), 
            __('Items', 'institucionalmt'), 
            'manage_options', 
            INSTMT_PLUGIN_DIR_PATH . 'admin/partials/item-edit.php', //'instmt_items', 
            null, // [$this, 'institucionalmt_view_menu_items'],             
            'dashicons-instmt',
            33 
        );

        $this->build_menupage->add_submenu_page( 
            'institucionalmt-cpt/admin/partials/item-edit.php', 
            __('Añadir nuevo item', 'institucionalmt'), 
            __('Añadir nuevo', 'institucionalmt'), 
            'manage_options', 
            'institucionalmt-cpt/admin/partials/item-new.php',//[$this, 'institucionalmt_view_new_item'], 
            false 
        );

        $this->build_menupage->add_submenu_page( 
            'institucionalmt-cpt/admin/partials/item-edit.php', 
            __('Categorías', 'institucionalmt'), 
            __('Categorías', 'institucionalmt'), 
            'manage_options', 
            'institucionalmt-cpt/admin/partials/item-category.php',//[$this, 'institucionalmt_view_new_item'], 
            false 
        );

        $this->build_menupage->add_submenu_page( 
            'institucionalmt-cpt/admin/partials/item-edit.php', 
            __('Añadir nueva categoría', 'institucionalmt'), 
            __('Nueva Categoría', 'institucionalmt'), 
            'manage_options', 
            'institucionalmt-cpt/admin/partials/item-category-new.php',//[$this, 'institucionalmt_view_new_item'], 
            false 
        );

        $this->build_menupage->run();

    }

    /**
     * Controla la vista del menú "Documentos" en el área de administración
     * 
     * @since       1.0.0
     * @access      public
     */
    public function institucionalmt_view_menu_items(){

        if( current_user_can( 'manage_options' ) ){

            if( $_GET['page'] == 'instmt_items' &&
                $_GET['action'] == 'new' && 
                isset( $_GET['id'])
            ){
                header("Location: admin.php?page=instmt_items&action=new&id=1");
                //require_once INSTMT_PLUGIN_DIR_PATH . "admin/partials/item-new.php";  

            } else {
                
                require_once INSTMT_PLUGIN_DIR_PATH . "admin/partials/item-edit.php";      

            }

        } else {

            ?>

                <p>Su usuario no tiene permisos para acceder a esta sección, por favor comuniquese con el Administrador</p>

            <?php

        }

    }    

}
