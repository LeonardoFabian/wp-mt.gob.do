<?php

/*
Plugin Name: InstitucionalMT Custom Post Types
Plugin URI:
Description: Añade tus propios Custom Post Types a en tu sitio WordPress (Servicios, Departamentos, Localidades, Ferias, etc.)
Version: 1.0
Author: Leonardo Fabian
Author URI: https://www.linkedin.com/in/leonardofabian/
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: institucionalmt
Domain Path: /languages
*/


/**
 * Instalar (activar) plugin
 */
if (!function_exists('institucionalmt_cpt_install')) {
    function institucionalmt_cpt_install()
    {
        require_once('inc/install/install.php');
    }
    register_activation_hook(__FILE__, 'institucionalmt_cpt_install');
}


/**
 * Desactivar plugin
 */
if (!function_exists('institucionalmt_cpt_deactivate')) {
    function institucionalmt_cpt_deactivate()
    {
        // Limpiar enlaces permanentes
        flush_rewrite_rules();
    }
    register_deactivation_hook(__FILE__, 'institucionalmt_cpt_deactivation');
}


/**
 * Desinstalar (borrar) plugin
 */
/*
if (!function_exists('institucionalmt_cpt_uninstall')) {
    function institucionalmt_cpt_uninstall()
    {
        // Borrar las tablas creadas
        // Eliminar configuraciones hechas por el plugin
    }
    register_uninstall_hook(__FILE__, 'institucionalmt_cpt_uninstall');
}
*/

$version_plugin = '1.0';
define('PLUGIN_DIR_PATH', plugin_dir_path(__FILE__));


 /**
  * HELPERS
  */
//require_once plugin_dir_path(__FILE__) . 'libs/helpers.php';

/**
 * NOTIFICATIONS
 */
require_once PLUGIN_DIR_PATH . 'inc/notifications/notifications.php';


// function institucionalmt_cpt_servicio_init(){

//     $item = 'Servicio';
//     $items = 'Servicios';

//     $labels = [
//         'name' => __("{$items}", 'institucionalmt'), // items en plural
//         'singular_name' => __("{$item}", 'institucionalmt'), // nombre en singular
//         'menu_name' => __("{$items}"),
//         'name_admin_bar' => __("{$item}"),
//         'add_new' => __('Añadir Nuevo', 'servicio'),
//         'add_new_item' => __("Añadir Nuevo {$item}"),
//         'edit_item' => __("Editar {$item}"),
//         'new_item' => __("Nuevo {$item}"),
//         'all_items' => __("Todos los {$items}"),
//         'view_item' => __("Ver {$item}"),
//         'search_items' => __("Buscar {$items}"),
//         'not_found' => __("No se encontraron {$items}"),
//         'not_found_in_trash' => __("No se encontraron {$items} en la papelera"),
//         'parent_item_colon' => __("{$item} Padre:"),
//         'featured_image' => __("Imagen del {$item}"),
//         'set_featured_image' => __('Establecer imagen de portada'),
//         'remove_featured_image' => __('Eliminar imagen de portada'),
//         'use_featured_image' => __('Usar como imagen de portada'),
//         'archives' => __("{$items}", 'Label para este tipo de publicación utilizado en los menus'),
//         'insert_into_item' => __("Añadir a este {$item}", 'Sobrescribir "Añadir a esta página o entrada" utilizado cuando agregamos un objeto a esta publicación'),
//         'filter_items_list' => __("Filtrar lista de {$items}"),
//         'items_list_navigation' => __("Navegación por lista de {$items}"),
//         'items_list'=> __("Listado de {$items}")
//     ];

//     $args = [
//         'labels' => $labels,
//         'description' => 'Contiene nuestros servicios y datos específicos de los servicios',
//         'public' => true, // Se mostraran en el frontend
//         'has_archive' => true, // Si tendra pagina para listar este custom post type
//         'supports' => ['title', 'editor', 'comments', 'revisions', 'excerpt', 'page-attributes', 'thumbnail', 'post-formats'],
//         'capability_type' => 'post',
//         'show_ui' => true, // mostrar interfaz
//         'show_in_menu' => true, // mostrar en el menu, puede recibir el slug del menu que queremos que aparezca 'servicios.php'
//         'show_in_nav_menus' => true, // mostrar en el administrador de menus
//         'show_in_admin_bar' => true, // mostrar en la barra superior de admin
//         'rewrite' => array('slug' => 'servicios'),
//         'menu_icon' => plugin_dir_url(__FILE__) . 'admin/image/domo.svg' // icon 20px x 20px
//     ];

//     register_post_type( 'instmt_servicio', $args );

//     flush_rewrite_rules();

// }

// add_action( 'init', 'institucionalmt_cpt_servicio_init');

/**
 * REGISTRANDO LIBRERIAS DE ESTILO AL ADMIN
 */
// function institucionalmt_custom_admin_register_libs( $hook){

//     //var_dump($hook);

//     if( $hook != 'post.php'){
//         return;
//     }

//     wp_register_style(
//         'instmt_admin_plugin_styles',
//         plugins_url('admin/css/admin-styles.css', __FILE__),
//         [],
//         '1.0',
//         'all'
//     );

//     wp_register_script(
//         'instmt_admin_plugin_scripts',
//         plugins_url('admin/js/admin-scripts.js', __FILE__),
//         ['jquery'],
//         '1.0',
//         true
//     );

// }
// add_action('admin_enqueue_scripts', 'institucionalmt_custom_admin_register_libs');

/**
 * REGISTRANDO LIBRERIAS DE ESTILO AL ADMIN
 */
// function institucionalmt_custom_public_register_libs( ){  

    
//     wp_register_style(
//         'instmt_public_plugin_styles',
//         plugins_url('public/css/public-styles.css', __FILE__),
//         [],
//         '1.0',
//         'all'
//     );

//     wp_register_script(
//         'instmt_public_plugin_scripts',
//         plugins_url('public/js/public-scripts.js', __FILE__),
//         ['jquery'],
//         '1.0',
//         true
//     );

// }
// add_action('wp_enqueue_scripts', 'institucionalmt_custom_public_register_libs');


/**
 * TAB SHORTCODE
 */
/*
function institucionalmt_service_tab($atts, $content = null) {
 
    extract(shortcode_atts(array(), $atts));
 
        $output = '';
 
        static $id_counter = 1;
 
        $class   = array();
        $class[] = 'instmt-tab';
        $class[] = 'instmt-clearfix';
 
        $output .='<div id="instmt-tab-'.$id_counter.'" class="'.implode(" ", $class).'">';
                $output .= do_shortcode($content);
        $output .= '</div>';
 
        $id_counter++;
 
        return $output;
 
}
add_shortcode('instmt_tab', 'institucionalmt_service_tab');
*/

/**
 * TAB CHILD SHORTCODE
 */
/*
function institucionalmt_service_tab_item($atts, $content = null) {
 
    extract(shortcode_atts(array(
                'title'  => '',
                'active' => 'false',
        ), $atts));
 
        $output = '';
 
        static $id_counter = 1;
 
    $class   = array();
        $class[] = 'instmt-tab-item';
    $class[] = 'instmt-clearfix';
        $class[] = 'active-'.esc_attr($active);
 
        $output .= '<div data-target="tab-'. sanitize_title( $title ) .'" class="'.implode(' ',$class).'">';
                if (isset($title) && !empty($title)) {
                        $output .= esc_attr($title);
                }
        $output .= '</div> ';
        $output .= '<div id="tab-'.sanitize_title($title).'-'.$id_counter.'" class="tab-content et-clearfix">';
            $output .= do_shortcode($content);
        $output .= '</div>';
 
        $id_counter++;
 
        return $output;
}
add_shortcode('instmt_tab_item', 'institucionalmt_service_tab_item');




*/






/**
 * CLASSES
 */
require_once PLUGIN_DIR_PATH . 'libs/classes/classes.php';

/**
 * CORE
 */
require_once PLUGIN_DIR_PATH . 'inc/instmt-core.php';

function run_institucionalmt_core(){
    
    $instmt_core = new InstitucionalMT_Core;
    $instmt_core->run();

}

run_institucionalmt_core();

/**
 * TAXONOMIAS
 */
//require_once PLUGIN_DIR_PATH . 'inc/instmt-taxonomy.php';





