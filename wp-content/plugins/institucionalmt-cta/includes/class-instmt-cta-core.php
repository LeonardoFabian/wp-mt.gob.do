<?php 

/**
 * Archivo que define la clase principal del plugin
 * 
 * Una definición de clase que incluye atributos y funciones que se
 * utilizan tanto del lado del público como del área de administración
 * 
 * @link            https://misitioweb.com
 * @since           1.0.0
 * 
 * @package         InstitucionalMT-CTA
 * @subpackage      InstitucionalMT-CTA/includes
 */

/**
 * También mantiene el identificador único de este complemento,
 * así como la versión actual del plugin.
 * 
 * @since           1.0.0
 * @package         InstitucionalMT-CTA
 * @subpackage      InstitucionalMT-CTA/includes
 * @author          Leonardo Fabián <ramonlfabian@gmail.com>
 * 
 * @property        object      $loader
 * @property        string      $plugin_name
 * @property        string      $plugin_version
 */
class InstitucionalMT_CTA_Core {

    /**
     * loader es responsable de mantener y registrar
     * todos los ganchos (hooks) que alimentan el plugin
     * 
     * @since       1.0.0
     * @access      protected
     * @var         InstitucionalMT_CTA_Loader      $loader     Mantiene y registra todos los ganchos (hooks) del plugin
     */
    protected $instmt_cta_loader;

    /**
     * Identificador único de éste plugin
     * 
     * @since       1.0.0
     * @access      protected
     * @var         string      $plugin_name    El nombre o identificador único del plugin
     */
    protected $plugin_name;

    /**
     * Versión actual del plugin
     * 
     * @since       1.0.0
     * @access      protected
     * @var         string      $plugin_version    La versión actual del plugin
     */
    protected $plugin_version;

    protected $admin;
    protected $public;

    /**
     * Método Constructor
     * 
     * Define la funcionalidad principal del plugin
     * 
     * Establece el nombre y la versión del plugin que se puede utilizar en 
     * todo el plugin. Carga las dependencias, instancias, define la configuración
     * regional (idioma). Establece los ganchos de acción para el área de administración
     * y del cliente (público).
     * 
     * @since           1.0.0
     */
    public function __construct(){

        $this->plugin_name = 'institucionalmt-cta';
        $this->plugin_version = '1.0.0';

        $this->institucionalmt_cta_load_dependencies();        
        $this->institucionalmt_cta_load_instances();
        $this->institucionalmt_cta_set_languages();             
        $this->institucionalmt_cta_define_admin_hooks();
        $this->institucionalmt_cta_define_public_hooks();

    }

    /**
     * Carga las dependencias necesarias para este plugin
     * 
     * Incluya los siguientes archivos que componen el plugin:
     * 
     * InstitucionalMT_CTA_Loader: itera los ganchos del plugin.
     * InstitucionalMT_CTA_i18n: Define la funcionalidad de la internacionalización.
     * InstitucionalMT_CTA_Admin: Define todos los ganchos del área de administración.
     * InstitucionalMT_CTA_Public: Define todos los ganchos del cliente/público.
     * 
     * @since           1.0.0
     * @access          private
     */
    private function institucionalmt_cta_load_dependencies(){

        /**
         * Clase responsable de iterar las acciones y filtros del núcleo del plugin.
         */       
        require_once( INSTMT_CTA_PLUGIN_DIR_PATH . 'includes/class-instmt-cta-loader.php' );

        /**
         * Clase responsable de definir la funcionalidad de la
         * internacionalización (i18n) del plugin
         */       
        require_once( INSTMT_CTA_PLUGIN_DIR_PATH . 'includes/class-instmt-cta-i18n.php' );

        /**
         * Clase responsable de definir todas las acciones y filtros del área de administración.
         */        
        require_once( INSTMT_CTA_PLUGIN_DIR_PATH . 'admin/class-instmt-cta-admin.php' );

        /**
         * Clase responsable de definir todas las acciones y filtros del lado cliente/público.
         */        
        require_once( INSTMT_CTA_PLUGIN_DIR_PATH . 'public/class-instmt-cta-public.php' );

        /**
         * Clase responsable de definir todos los widgets del plugin.
         */        
        require_once( INSTMT_CTA_PLUGIN_DIR_PATH . 'includes/class-instmt-cta-widgets.php' );

        /**
         * Clase responsable de definir todos los shortcodes del plugin
         */
        require_once( INSTMT_CTA_PLUGIN_DIR_PATH . 'includes/instmt-cta-shortcodes.php' );

    }

    /**
     * Define la configuración regional de este plugin para la internacionalización.
     * 
     * Utiliza la clase InstitucionalMT_CTA_i18n para establecer 
     * el textdomain y registrar el gancho con WordPress.
     * 
     * @since           1.0.0
     * @access          private
     */
    private function institucionalmt_cta_set_languages(){

        $instmt_cta_i18n = new InstitucionalMT_CTA_i18n;

        $this->instmt_cta_loader->add_action( 'plugins_loaded', $instmt_cta_i18n, 'institucionalmt_cta_load_plugin_textdomain' );

    }

    /**
     * Carga todas las instancias necesarias para el uso de los
     * archivos de las clases agregadas
     * 
     * @since           1.0.0
     * @access          private
     */
    private function institucionalmt_cta_load_instances(){

        // Instancia del loader que se utiliza para registrar los ganchos con WordPress
        $this->instmt_cta_loader = new InstitucionalMT_CTA_Loader;

        $this->admin = new InstitucionalMT_CTA_Admin( $this->get_plugin_name(), $this->get_plugin_version() );
        $this->public = new InstitucionalMT_CTA_Public( $this->get_plugin_name(), $this->get_plugin_version() );

    }

    /**
     * Registrar todas las clases Widgets que serán creados por el plugin,
     * pasandole como parametro el nombre de la clase, a la función 
     * register_widget().
     * 
     * @since           1.0.0
     * @access          public
     */
    public function institucionalmt_cta_register_widgets(){

        register_widget( 'InstitucionalMT_CTA_Button_Widget' );

    }    

    /**
     * Registrar todos los shortcodes que serán creados por el plugin
     * 
     * @since           1.0.0
     * @access          public
     */
    public function institucionalmt_cta_add_shortcodes(){

        add_shortcode( 'instmt_cta_button', 'institucionalmt_cta_button_shortcode_atts' );

    }

    /**
     * Registra todos los ganchos relacionados con el área de 
     * administración del plugin.
     * 
     * @since           1.0.0
     * @access          private
     */
    private function institucionalmt_cta_define_admin_hooks(){

        // Cargando los estilos y scripts del admin
        $this->instmt_cta_loader->add_action( 'admin_enqueue_scripts', $this->admin, 'institucionalmt_cta_admin_enqueue_styles' );

        // Registrar los widgets
        $this->instmt_cta_loader->add_action( 'widgets_init', $this, 'institucionalmt_cta_register_widgets' );

        // Añadir los shortcodes
        $this->instmt_cta_loader->add_action( 'widgets_init', $this, 'institucionalmt_cta_add_shortcodes' );

    }

    /**
     * Registra todos los ganchos relacionados con el lado 
     * del cliente/público.
     * 
     * @since           1.0.0
     * @access          private
     */
    private function institucionalmt_cta_define_public_hooks(){

        // Cargando los estilos y scripts publicos
        $this->instmt_cta_loader->add_action( 'wp_enqueue_scripts', $this->public, 'institucionalmt_cta_public_enqueue_styles' );

    }

    /**
     * Ejecuta el loader para ejecutar todos los ganchos con WordPress
     * 
     * @since           1.0.0
     * @access          public
     */
    public function instmt_cta_run(){

        $this->instmt_cta_loader->run();

    }

    /**
     * Retorna el nombre del plugin, utilizado para identificarlos
     * de forma exclusiva en el contexto de WordPress y para definir la funcionalidad
     * de internacionalización.
     * 
     * @since           1.0.0
     * @access          public
     * @return          string      Nombre del plugin
     */
    public function get_plugin_name(){

        return $this->plugin_name;

    }

    /**
     * Retorna el número de la versión del plugin.
     * 
     * @since           1.0.0
     * @access          public
     * @return          string      Versión del plugin
     */
    public function get_plugin_version(){

        return $this->plugin_version;

    }



}