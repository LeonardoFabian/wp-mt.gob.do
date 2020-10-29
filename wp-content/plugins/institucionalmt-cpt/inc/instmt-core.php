<?php 

class InstitucionalMT_Core {

    protected $plugin_dir_path;
    protected $plugin_dir_path_dir;
    protected $loader;
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

    protected $roles;
    protected $http;
    protected $ajax;

    protected $heartbeat;

    protected $online;
   

    public function __construct(){

        $this->version = '1.0.0';

        $this->plugin_dir_path = plugin_dir_path(__FILE__);
        $this->plugin_dir_path_dir = plugin_dir_path(__DIR__);
        $this->institucionalmt_load_dependencies();
        $this->institucionalmt_load_instances();
        $this->institucionalmt_define_admin_hooks();

    }

    public function institucionalmt_load_dependencies(){

        require_once $this->plugin_dir_path . 'instmt-loader.php';
        require_once $this->plugin_dir_path_dir . 'admin/instmt-admin.php';
        require_once $this->plugin_dir_path_dir . 'public/instmt-public.php';
        require_once $this->plugin_dir_path . 'instmt-cpt.php';
        require_once $this->plugin_dir_path . 'instmt-taxonomy.php';
        require_once $this->plugin_dir_path . 'instmt-meta-field-dependencias.php';
        require_once $this->plugin_dir_path . 'instmt-meta-field-usuarios.php';

        require_once $this->plugin_dir_path . 'instmt-menu-pages.php';
        require_once $this->plugin_dir_path . 'instmt-menu-pages-settings.php';
        require_once $this->plugin_dir_path . 'instmt-menu-rlt.php';
        require_once $this->plugin_dir_path . 'instmt-menu-ote.php';

        require_once $this->plugin_dir_path . 'instmt-roles.php';
        require_once $this->plugin_dir_path . 'instmt-http.php';
        require_once $this->plugin_dir_path . 'instmt-ajax.php';

        require_once $this->plugin_dir_path . 'instmt-heartbeat.php';

        require_once $this->plugin_dir_path . 'instmt-online.php';
        require_once $this->plugin_dir_path . 'instmt-widgets.php';        
        
    }

    public function institucionalmt_load_instances(){

        $this->loader = new InstitucionalMT_Loader;
        $this->taxonomy = new InstitucionalMT_Taxonomy;
        $this->admin = new InstitucionalMT_Admin( $this->version );
        $this->public = new InstitucionalMT_Public( $this->version );
        $this->cpt = new InstitucionalMT_CPT;
        $this->meta_fields_dependencias = new InstitucionalMT_Meta_Field_Dependencias;
        $this->meta_fields_usuarios = new InstitucionalMT_Meta_Field_Usuarios;

        $this->build_menupage = new InstitucionalMT_Menu_Pages;
        $this->build_menu_settings = new InstitucionalMT_Menu_Ajustes( $this->build_menupage );
        $this->build_menu_rlt = new InstitucionalMT_Menu_RLT( $this->build_menupage );
        $this->build_menu_ote = new InstitucionalMT_Menu_OTE( $this->build_menupage );

        $this->roles = new InstitucionalMT_Roles;
        $this->http = new InstitucionalMT_Http;
        $this->ajax = new InstitucionalMT_Ajax;

        $this->heartbeat = new InstitucionalMT_Heartbeat;

        $this->online = new InstitucionalMT_User_Online;        

    }

    public function institucionalmt_register_widgets(){

        register_widget( 'InstitucionalMT_Widget');

    }

    public function institucionalmt_define_admin_hooks(){

        // Cargando Taxonomias
        $this->loader->add_action( 'init', $this->taxonomy, 'institucionalmt_servicios' );
        $this->loader->add_action( 'init', $this->taxonomy, 'institucionalmt_dependencias' );
        $this->loader->add_action( 'init', $this->taxonomy, 'institucionalmt_rlt_zonas' );
        $this->loader->add_action( 'init', $this->taxonomy, 'institucionalmt_ote_zonas' );
        $this->loader->add_action( 'init', $this->taxonomy, 'institucionalmt_marco_legal' );

        // Cargando los estilos y scripts del admin
        $this->loader->add_action( 'admin_enqueue_scripts', $this->admin, 'institucionalmt_admin_enqueue_styles');
        $this->loader->add_action( 'admin_enqueue_scripts', $this->admin, 'institucionalmt_admin_enqueue_scripts');

        // Cargando los estilos y scripts publicos
        $this->loader->add_action( 'wp_enqueue_scripts', $this->public, 'institucionalmt_public_enqueue_styles');
        $this->loader->add_action( 'wp_enqueue_scripts', $this->public, 'institucionalmt_public_enqueue_scripts');

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
        $this->loader->add_action( 'admin_menu', $this->build_menu_rlt, 'options_page' );
        $this->loader->add_action( 'admin_menu', $this->build_menu_ote, 'options_page' );

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
        


    }

    public function run(){

        $this->loader->run();

    }

}