<?php
/**
 * Archivo del plugin
 * Este archivo es leído por WordPress para generar la información del plugin
 * en el área de administración del complemento. Este archivo también incluye
 * todas las dependencias utilizadas por el complemento registra las funciones
 * de activación y desactivación, y define una función que inicia el complemento.
 * 
 * @link            https://misitioweb.com
 * @since           1.0.0
 * @package         InstitucionalMT CPT
 * 
 * @wordpress-plugin
 * Plugin Name:      InstitucionalMT Custom Post Types
 * Plugin URI:
 * Description:      Añade tus propios Custom Post Types a en tu sitio WordPress (Servicios, Departamentos, Localidades, Ferias, etc.)
 * Version:          1.0.0
 * Author:           Leonardo Fabian
 * Author URI:       https://www.linkedin.com/in/leonardofabian/
 * License:          GPL2
 * License URI:      https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:      institucionalmt
 * Domain Path:      /languages
 */

/**
 * COMANDO PARA CREAR EL ARCHIVO POT
 * el comando debe ser: php {ruta_archivo\makepot.php} {tipo_de_proyecto} {ruta_del_proyecto} {ruta_guardar_archivo\nombre.pot}
 * 
 * php i18n\makepot.php wp-plugin wp-content\plugins\institucionalmt-cpt\ wp-content\plugins\institucionalmt-cpt\languages\institucionalmt.pot
 */

/**
 * Instalar (activar) plugin
 */
global $wpdb;
define( 'INSTMT_REALPATH_BASENAME_PLUGIN', dirname( plugin_basename( __FILE__ ) ) . '/' );
define( 'INSTMT_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'INSTMT_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'INSTMT_PLUGIN_DIR_URL_DIR', plugin_dir_url( __DIR__ ) );
define( 'INSTMT_TABLE_DOCS', "{$wpdb->prefix}institucionalmt_documentos");

/**
 * Código que se ejecuta en la activación del plugin
 */
if (!function_exists('activate_institucionalmt_cpt')) {
    function activate_institucionalmt_cpt(){
        require_once INSTMT_PLUGIN_DIR_PATH . 'inc/activate/class-instmt-activator.php';
        InstitucionalMT_Activator::activate();
    }    
}

/**
 * Código que se ejecuta en la desactivación del plugin
 */
if (!function_exists('deactivate_institucionalmt_cpt')) {
    function deactivate_institucionalmt_cpt() {
        require_once INSTMT_PLUGIN_DIR_PATH . 'inc/deactivate/class-instmt-deactivator.php';
        InstitucionalMT_Deactivator::deactivate();
        // Limpiar enlaces permanentes
        flush_rewrite_rules();
    }    
}

register_activation_hook( __FILE__, 'activate_institucionalmt_cpt');
register_deactivation_hook( __FILE__, 'deactivate_institucionalmt_cpt');

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

 /**
  * HELPERS
  */
//require_once plugin_dir_path(__FILE__) . 'libs/helpers.php';

/**
 * NOTIFICATIONS
 */
require_once INSTMT_PLUGIN_DIR_PATH . 'inc/notifications/notifications.php';

/**
 * Carga la dependencia de la clase Core, que es el cerebro del plugin
 */
require_once INSTMT_PLUGIN_DIR_PATH . 'inc/class-instmt-core.php';

function run_institucionalmt_core(){    
    $instmt_core = new InstitucionalMT_Core;
    $instmt_core->run();
}

run_institucionalmt_core();

/**
 * CLASSES
 */
require_once INSTMT_PLUGIN_DIR_PATH . 'libs/classes/classes.php';