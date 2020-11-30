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
 * @package         institucionalmt-slideshow
 * @subpackage      institucionalmt-slideshow/includes
 */

/**
 * También mantiene el identificador único de este complemento,
 * así como la versión actual del plugin.
 * 
 * @since           1.0.0
 * @package         institucionalmt-slideshow
 * @subpackage      institucionalmt-slideshow/includes
 * @author          Leonardo Fabián <ramonlfabian@gmail.com>
 * 
 * @property        object      $loader
 * @property        string      $plugin_name
 * @property        string      $plugin_version
 */
if( ! class_exists( 'InstitucionalMT_Slideshow_Core' ) ){

    class InstitucionalMT_Slideshow_Core{

        /**
         * loader es responsable de mantener y registrar
         * todos los ganchos (hooks) que alimentan el plugin
         * 
         * @since       1.0.0
         * @access      protected
         * @var         InstitucionalMT_Slideshow_Loader      $loader     Mantiene y registra todos los ganchos (hooks) del plugin
         */
        protected $loader;
    
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
        protected $cpt;
    
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
    
            $this->plugin_name = 'institucionalmt_slideshow';
            $this->plugin_version = '1.0.0';
    
            $this->institucionalmt_slideshow_load_dependencies();        
            $this->institucionalmt_slideshow_load_instances();
            $this->institucionalmt_slideshow_set_languages();             
            $this->institucionalmt_slideshow_define_admin_hooks();
            $this->institucionalmt_slideshow_define_public_hooks();
    
        }
    
        /**
         * Carga las dependencias necesarias para este plugin
         * 
         * Incluya los siguientes archivos que componen el plugin:
         * 
         * InstitucionalMT_Slideshow_Loader: itera los ganchos del plugin.
         * InstitucionalMT_Slideshow_i18n: Define la funcionalidad de la internacionalización.
         * InstitucionalMT_Slideshow_Admin: Define todos los ganchos del área de administración.
         * InstitucionalMT_Slideshow_Public: Define todos los ganchos del cliente/público.
         * 
         * @since           1.0.0
         * @access          private
         */
        private function institucionalmt_slideshow_load_dependencies(){
    
            /**
             * Clase responsable de iterar las acciones y filtros del núcleo del plugin.
             */       
            require_once( INSTMT_SLIDESHOW_PLUGIN_DIR_PATH . 'includes/class-instmt-slideshow-loader.php' );
    
            /**
             * Clase responsable de definir la funcionalidad de la
             * internacionalización (i18n) del plugin
             */       
            require_once( INSTMT_SLIDESHOW_PLUGIN_DIR_PATH . 'includes/class-instmt-slideshow-i18n.php' );
    
            /**
             * Clase responsable de definir todas las acciones y filtros del área de administración.
             */        
            require_once( INSTMT_SLIDESHOW_PLUGIN_DIR_PATH . 'admin/class-instmt-slideshow-admin.php' );
           
    
            /**
             * Clase responsable de definir todas las acciones y filtros del lado cliente/público.
             */        
            require_once( INSTMT_SLIDESHOW_PLUGIN_DIR_PATH . 'public/class-instmt-slideshow-public.php' );

            /**
             * Clase responsable de definir todos los Custom Post Types del plugin.
             */
            require_once( INSTMT_SLIDESHOW_PLUGIN_DIR_PATH . 'includes/class-instmt-slideshow-cpt.php' );
    
            /**
             * Clase responsable de definir todos los widgets del plugin.
             */        
            require_once( INSTMT_SLIDESHOW_PLUGIN_DIR_PATH . 'includes/class-instmt-slideshow-widgets.php' );
    
            /**
             * Clase responsable de definir todos los shortcodes del plugin
             */
            require_once( INSTMT_SLIDESHOW_PLUGIN_DIR_PATH . 'includes/instmt-slideshow-shortcodes.php' );
    
        }
    
        /**
         * Carga todas las instancias necesarias para el uso de los
         * archivos de las clases agregadas
         * 
         * @since           1.0.0
         * @access          private
         */
        private function institucionalmt_slideshow_load_instances(){
    
            // Instancia del loader que se utiliza para registrar los ganchos con WordPress
            $this->loader = new InstitucionalMT_Slideshow_Loader;
    
            $this->admin = new InstitucionalMT_Slideshow_Admin( $this->get_plugin_name(), $this->get_plugin_version() );
            $this->public = new InstitucionalMT_Slideshow_Public( $this->get_plugin_name(), $this->get_plugin_version() );

            $this->cpt = new InstitucionalMT_Slideshow_CPT;
    
        }
    
        /**
         * Define la configuración regional de este plugin para la internacionalización.
         * 
         * Utiliza la clase InstitucionalMT_Carousel_i18n para establecer 
         * el textdomain y registrar el gancho con WordPress.
         * 
         * @since           1.0.0
         * @access          private
         */
        private function institucionalmt_slideshow_set_languages(){
    
            $instmt_slideshow_i18n = new InstitucionalMT_Slideshow_i18n;
    
            $this->loader->add_action( 'plugins_loaded', $instmt_slideshow_i18n, 'institucionalmt_slideshow_load_plugin_textdomain' );
    
        }
    
        /**
         * Registrar todas las clases Widgets que serán creados por el plugin,
         * pasandole como parametro el nombre de la clase, a la función 
         * register_widget().
         * 
         * @since           1.0.0
         * @access          public
         */
        public function institucionalmt_slideshow_register_widgets(){
    
            register_widget( 'InstitucionalMT_Slideshow_Widget' );
    
        }   
    
        /**
         * Registrar todos los shortcodes que serán creados por el plugin
         * 
         * @since           1.0.0
         * @access          public
         */
        public function institucionalmt_slideshow_add_shortcodes(){
    
            add_shortcode( 'instmt_slideshow', 'institucionalmt_slideshow_shortcode_atts' );
    
        }
    
        /**
         * Registra todos los ganchos relacionados con el área de 
         * administración del plugin.
         * 
         * @since           1.0.0
         * @access          private
         */
        private function institucionalmt_slideshow_define_admin_hooks(){
    
            // Cargando los estilos y scripts del admin
            $this->loader->add_action( 'admin_enqueue_scripts', $this->admin, 'institucionalmt_slideshow_admin_enqueue_styles' );

            // Cargando los Custom Post Types (CPT)
            $this->loader->add_action( 'init', $this->cpt, 'instmt_slideshow_item' );
    
            // Registrar los widgets
            $this->loader->add_action( 'widgets_init', $this, 'institucionalmt_slideshow_register_widgets' );
    
            // Añadir los shortcodes
            $this->loader->add_action( 'widgets_init', $this, 'institucionalmt_slideshow_add_shortcodes' );
    
        }
    
        /**
         * Registra todos los ganchos relacionados con el lado 
         * del cliente/público.
         * 
         * @since           1.0.0
         * @access          private
         */
        private function institucionalmt_slideshow_define_public_hooks(){
    
            // Cargando los estilos y scripts publicos
            $this->loader->add_action( 'wp_enqueue_scripts', $this->public, 'institucionalmt_slideshow_public_enqueue_styles' );
            $this->loader->add_action( 'wp_enqueue_scripts', $this->public, 'institucionalmt_slideshow_public_enqueue_scripts' );
    
        }
    
        /**
         * Ejecuta el loader para ejecutar todos los ganchos con WordPress
         * 
         * @since           1.0.0
         * @access          public
         */
        public function instmt_slideshow_run(){
    
            $this->loader->run();
    
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

}