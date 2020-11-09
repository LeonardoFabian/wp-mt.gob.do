<?php 
/**
 * Archivo que define la clase del cerebro principal del plugin
 * 
 * Una definición de clase que incluye atributos y funciones que se
 * utilizan tanto del lado del público como del área de administración.
 * 
 * @link        https://www.linkedin.com/in/leonardofabian/
 * @since       1.0.0
 * 
 * @package     InstitucionalMT-CPT
 * @subpackage  InstitucionalMT-CPT/inc
 */

 /**
  * También mantiene el identificador único de este complemento,
  * así como la versión actual del plugin.
  * 
  * @since      1.0.0
  * @package    InstitucionalMT-CPT
  * @subpackage InstitucionalMT-CPT/inc
  * @author     Leonardo Fabián <ramonlfabian@gmail.com>
  * 
  * @property   object $loader
  * @property   string $plugin_name
  * @property   string $version
  */

class InstitucionalMT_Core {      

    /**
     * loader es responsable de mantener y registrar
     * todos los ganchos (hooks) que alimentan el plugin.
     * 
     * @since   1.0.0
     * @access  protected
     * @var     InstitucionalMT_Loader  $loader     Mantiene y registra todos los ganchos ( Hooks ) del plugin
     */
    protected $loader;

    /**
     * El identificador único de éste plugin
     * 
     * @since   1.0.0
     * @access  protected
     * @var     string      $plugin_name    El nombre o identificador único de éste plugin
     */
    protected $plugin_name;

    /**
     * Versión actual del plugin
     * 
     * @since   1.0.0
     * @access  protected 
     * @var     string      $version    La versión actual del plugin
     */
    protected $version;

    protected $admin;
    protected $public;
    protected $cpt;
    protected $taxonomy;
    protected $meta_fields_dependencias;
    protected $meta_fields_usuarios;

    protected $build_menupage;
    protected $build_menu_settings;
    protected $build_menu_rlt;
    protected $build_menu_ote;
    protected $build_menu_documentos;

    protected $roles;
    protected $http;
    protected $ajax;

    protected $heartbeat;
    protected $cron;

    protected $online;
   
    /**
     * Constructor
     * 
     * Defina la funcionalidad principal del plugin
     * 
     * Establece el nombre y la versión del plugin que se puede utilizar en todo el plugin.
     * Cargar las dependencias, carga de instancias, definir la configuración regional (idioma).
     * Establecer los ganchos para el área de administración y 
     * el lado público.
     * 
     * @since   1.0.0
     */
    public function __construct(){

        $this->plugin_name = 'institucionalmt';
        $this->version = '1.0.0';        
       
        $this->institucionalmt_load_dependencies();        
        $this->institucionalmt_load_instances();
        $this->institucionalmt_set_languages();
        $this->institucionalmt_define_admin_hooks();
        $this->institucionalmt_define_public_hooks();

    }

    /**
     * Cargue las dependencias necesarias para este plugin.
     * 
     * Incluya los siguientes archivos que componen el plugin:
     * 
     * InstitucionalMT_Loader. Itera los ganchos del plugin.
     * InstitucionalMT_i18n. Define la funcionalidad de la internacionalización.
     * InstitucionalMT_Admin. Define todos los ganchos del área de admininistración.
     * InstitucionalMT_Public. Define todos los ganchos del cliente/público.
     * 
     * @since   1.0.0
     * @access  private
     */
    private function institucionalmt_load_dependencies(){

        /**
         * Clase responsable de iterar las acciones y filtros del núcleo del plugin
         */
        require_once INSTMT_PLUGIN_DIR_PATH . 'inc/class-instmt-loader.php';

        /**
         * Clase responsable de definir la funcionalidad de la 
         * internacionalización del plugin.
         */
        require_once INSTMT_PLUGIN_DIR_PATH . 'inc/class-instmt-i18n.php';

        /**
         * Clase responsable de definir todas las acciones en el área de 
         * administración
         */
        require_once INSTMT_PLUGIN_DIR_PATH . 'admin/class-instmt-admin.php';

        /**
         * Clase responsable de definir todas las acciones en el área del
         * lado del cliente/público
         */
        require_once INSTMT_PLUGIN_DIR_PATH . 'public/class-instmt-public.php';

        /**
         * Clase responsable de definir todos los Custom Post Type (CPT)
         * creados por el plugin
         */
        require_once INSTMT_PLUGIN_DIR_PATH . 'inc/class-instmt-cpt.php';

        /**
         * Clase responsable de definir todas las taxonomias asociadas a 
         * los CPT creados por el plugin.
         */
        require_once INSTMT_PLUGIN_DIR_PATH . 'inc/class-instmt-taxonomy.php';

        require_once INSTMT_PLUGIN_DIR_PATH . 'inc/class-instmt-meta-field-dependencias.php';
        require_once INSTMT_PLUGIN_DIR_PATH . 'inc/class-instmt-meta-field-usuarios.php';

        require_once INSTMT_PLUGIN_DIR_PATH . 'inc/class-instmt-menu-pages.php';
        require_once INSTMT_PLUGIN_DIR_PATH . 'inc/class-instmt-menu-pages-settings.php';
        require_once INSTMT_PLUGIN_DIR_PATH . 'inc/class-instmt-menu-rlt.php';
        require_once INSTMT_PLUGIN_DIR_PATH . 'inc/class-instmt-menu-ote.php';
        require_once INSTMT_PLUGIN_DIR_PATH . 'inc/class-instmt-menu-documentos.php';

        require_once INSTMT_PLUGIN_DIR_PATH . 'inc/class-instmt-roles.php';
        require_once INSTMT_PLUGIN_DIR_PATH . 'inc/class-instmt-http.php';
        require_once INSTMT_PLUGIN_DIR_PATH . 'inc/class-instmt-ajax.php';

        require_once INSTMT_PLUGIN_DIR_PATH . 'inc/class-instmt-heartbeat.php';
        require_once INSTMT_PLUGIN_DIR_PATH . 'inc/class-instmt-cron.php';

        require_once INSTMT_PLUGIN_DIR_PATH . 'inc/class-instmt-online.php';
        require_once INSTMT_PLUGIN_DIR_PATH . 'inc/class-instmt-widgets.php';       
        
    }

    /**
     * Defina la configuración regional de este plugin para la internacionalización.
     * 
     * Utiliza la clase InstitucionalMT_i18n para establecer el dominio y registrar el gancho con WordPress.
     * 
     * @since   1.0.0
     * @access  private
     */
    private function institucionalmt_set_languages(){

        $instmt_i18n = new InstitucionalMT_i18n;

        $this->loader->add_action( 'plugins_loaded', $instmt_i18n, 'load_plugin_textdomain' );

    }

    /**
     * Cargar todas las instancias necesarias para el uso de los 
     * archivos de las clases agregadas
     * 
     * @since   1.0.0
     * @access  private
     */
    private function institucionalmt_load_instances(){

        // Cree una instancia del loader que se utilizará para registrar los ganchos con WordPress.
        $this->loader = new InstitucionalMT_Loader;
        $this->taxonomy = new InstitucionalMT_Taxonomy;
        $this->admin = new InstitucionalMT_Admin( $this->get_plugin_name(), $this->get_version() );
        $this->public = new InstitucionalMT_Public( $this->get_plugin_name(), $this->get_version() );
        $this->cpt = new InstitucionalMT_CPT;
        $this->meta_fields_dependencias = new InstitucionalMT_Meta_Field_Dependencias;
        $this->meta_fields_usuarios = new InstitucionalMT_Meta_Field_Usuarios;

        $this->build_menupage = new InstitucionalMT_Menu_Pages;
        $this->build_menu_settings = new InstitucionalMT_Menu_Ajustes( $this->build_menupage );
        $this->build_menu_rlt = new InstitucionalMT_Menu_RLT( $this->build_menupage );
        $this->build_menu_ote = new InstitucionalMT_Menu_OTE( $this->build_menupage );
        $this->build_menu_documentos = new InstitucionalMT_Menu_Documentos( $this->build_menupage );

        $this->roles = new InstitucionalMT_Roles;
        $this->http = new InstitucionalMT_Http;
        $this->ajax = new InstitucionalMT_Ajax;

        $this->heartbeat = new InstitucionalMT_Heartbeat;
        $this->cron = new InstitucionalMT_Cron;

        $this->online = new InstitucionalMT_User_Online;        

    }

    /**
     * Registrar todos las clases widgets que serán creados por el plugin
     * mediante la clase InstitucionalMT_Widgets, pasandole como parametro el nombre de la
     * clase a la función register_widget()
     * 
     * @since       1.0.0
     * @access      public
     */
    public function institucionalmt_register_widgets(){

        register_widget( 'InstitucionalMT_Widget');

    }

    /**
     * Registrar todos los ganchos relacionados con la funcionalidad del área de administració del plugin
     * 
     * @since       1.0.0
     * @access      private
     */
    private function institucionalmt_define_admin_hooks(){

        // Cargando Taxonomias
        $this->loader->add_action( 'init', $this->taxonomy, 'institucionalmt_servicios' );
        $this->loader->add_action( 'init', $this->taxonomy, 'institucionalmt_dependencias' );
        $this->loader->add_action( 'init', $this->taxonomy, 'institucionalmt_rlt_zonas' );
        $this->loader->add_action( 'init', $this->taxonomy, 'institucionalmt_ote_zonas' );
        $this->loader->add_action( 'init', $this->taxonomy, 'institucionalmt_marco_legal' );

        // Cargando los estilos y scripts del admin
        $this->loader->add_action( 'admin_enqueue_scripts', $this->admin, 'institucionalmt_admin_enqueue_styles');
        $this->loader->add_action( 'admin_enqueue_scripts', $this->admin, 'institucionalmt_admin_enqueue_scripts');        

        // Cargando los tipos de post personalizados
        $this->loader->add_action( 'init', $this->cpt, 'ministro');
        $this->loader->add_action( 'init', $this->cpt, 'viceministros');
        $this->loader->add_action( 'init', $this->cpt, 'servicios');
        $this->loader->add_action( 'init', $this->cpt, 'dependencias');
        $this->loader->add_action( 'init', $this->cpt, 'rlt');
        $this->loader->add_action( 'init', $this->cpt, 'ote');
        $this->loader->add_action( 'init', $this->cpt, 'documentos');
        $this->loader->add_action( 'init', $this->cpt, 'representantes_locales');
        $this->loader->add_action( 'init', $this->cpt, 'encargados_ote');

        // Agregando campo de metadato para la taxonomia servicios_taxonomy
        // el campo se define define: {taxonomy}_{add||edit}_form_fields
        // el campo se guarda/actualiza {create||edited}_{taxonomy}

        // $this->loader->add_action( 'category_add_form_fields', $this->PROPERTY, 'FUNCTION');
        $this->loader->add_action( 'dependencias_add_form_fields', $this->meta_fields_dependencias, 'add_meta_field');
        $this->loader->add_action( 'dependencias_edit_form_fields', $this->meta_fields_dependencias, 'edit_meta_field');
        $this->loader->add_action( 'create_dependencias', $this->meta_fields_dependencias, 'save_meta_field');
        $this->loader->add_action( 'edited_dependencias', $this->meta_fields_dependencias, 'save_meta_field');

        // Agregando campos metadatos al agregar, mostrar o editar nuevo usuario
        $this->loader->add_action( 'user_new_form', $this->meta_fields_usuarios, 'add_meta_fields');
        $this->loader->add_action( 'show_user_profile', $this->meta_fields_usuarios, 'add_meta_fields');
        $this->loader->add_action( 'edit_user_profile', $this->meta_fields_usuarios, 'add_meta_fields');

        // Guardando los datos de los campos metadatos al agregar, mostrar o editar usuario
        $this->loader->add_action( 'user_register', $this->meta_fields_usuarios, 'save_meta_fields');
        $this->loader->add_action( 'personal_options_update', $this->meta_fields_usuarios, 'save_meta_fields');
        $this->loader->add_action( 'edit_user_profile_update', $this->meta_fields_usuarios, 'save_meta_fields');

        // Agregando menus al admin
        $this->loader->add_action( 'admin_menu', $this->build_menu_settings, 'options_page' );
        //$this->loader->add_action( 'admin_menu', $this->build_menu_rlt, 'options_page' );
        //$this->loader->add_action( 'admin_menu', $this->build_menu_ote, 'options_page' );
        $this->loader->add_action( 'admin_menu', $this->build_menu_documentos, 'options_page' );

        // Manipulacion de roles
        $this->loader->add_action( 'init', $this->roles, 'manipulate_roles' );

        // Peticiones HTTP
        $this->loader->add_action('print_map', $this->http, 'print_data');

        // Ajax
        $this->loader->add_action('wp_ajax_admin_search', $this->ajax, 'in_admin_search' );
        $this->loader->add_action('wp_ajax_cargar_datos_representantes', $this->ajax, 'ajax_cargar_datos_representantes' );
        $this->loader->add_action('wp_ajax_cargar_datos_encargados_ote', $this->ajax, 'ajax_cargar_datos_encargados_ote' );

        // Peticiones Ajax usuario no logueado 'wp_ajax_nopriv'
        // $this->loader->add_action('wp_ajax_nopriv_ACTION', $this->ajax, 'FUNCTION' );

        // Agregando filtros
        //$this->loader->add_filter('heartbeat_received', $this->heartbeat, 'heartbeat_receive_and_respond', 10, 3 );
        $this->loader->add_filter('heartbeat_received', $this->heartbeat, 'heartbeat_notificacion', 10, 3 );

        // Hook de login y logout
        $this->loader->add_action('wp_login', $this->online, 'conectado', 10, 2 );
        $this->loader->add_action('wp_logout', $this->online, 'desconectado' );

        // Registrar los Widgets
        $this->loader->add_action('widgets_init', $this, 'institucionalmt_register_widgets' );

        // Registrar Intervalos WP Cron perzonalizados
        $this->loader->add_filter('cron_schedules', $this->cron, 'institucionalmt_cron_intervalos' );
        $this->loader->add_action('instmt_cron', $this->cron, 'institucionalmt_cron_enviar_ultima_publicacion', 10, 2 );
        //$this->loader->add_action('instmt_cron', $this->cron, 'institucionalmt_cron_enviar_ultima_publicacion');
        $this->loader->add_action('init', $this->cron, 'institucionalmt_cron_init' );

    }

    /**
     * Registrar todos los ganchos relacionados con la funcionalidad del lado cliente/público del plugin
     * 
     * @since       1.0.0
     * @access      private
     */
    private function institucionalmt_define_public_hooks(){
        // Cargando los estilos y scripts publicos
        $this->loader->add_action( 'wp_enqueue_scripts', $this->public, 'institucionalmt_public_enqueue_styles');
        $this->loader->add_action( 'wp_enqueue_scripts', $this->public, 'institucionalmt_public_enqueue_scripts');
    }

    /**
     * Ejecuta el cargador para ejecutar todos los ganchos con WordPress.
     * 
     * @since   1.0.0
     * @access  public
     */
    public function run(){
        $this->loader->run();
    }

    /**
     * El nombre del plugin utilizado para identificarlo de forma exclusiva en el contexto de WordPress
     * y para definir la funcionalidad de internacionalización.
     * 
     * @since   1.0.0
     * @access  public
     * @return  string      El nombre del plugin
     */
    public function get_plugin_name(){
        return $this->plugin_name;
    }

    /**
     * La referencia a la clase que itera los ganchos con el plugin
     * 
     * @since   1.0.0
     * @access  public
     * @return  InstitucionalMT_Loader      Itera los ganchos del plugin
     */
    public function get_loader(){
        return $this->loader;
    }

    /**
     * Retorna el número de la versión del plugin
     * 
     * @since   1.0.0
     * @access  public
     * @return  string      El número de la versión del plugin
     */
    public function get_version(){
        return $this->version;
    }

}