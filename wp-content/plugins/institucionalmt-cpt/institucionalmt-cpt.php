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
 * @package         InstitucionalMT-CPT
 * 
 * @wordpress-plugin
 * Plugin Name:      InstitucionalMT Custom Post Types
 * Plugin URI:
 * Description:      Añade tus propios Custom Post Types a en tu sitio WordPress (Servicios, Departamentos, Localidades, Ferias, etc.)
 * Version:          1.0.0
 * Author:           Leonardo Fabian
 * Author URI:       https://www.linkedin.com/in/leonardofabian/
 * License:          GPL v3
 * License URI:      http://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:      institucionalmt
 * Domain Path:      /languages
 * 
 * Institucional MT Custom Post Types
 * Copyright (C) 2020-2024, Leonardo Fabián
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * COMANDO PARA CREAR EL ARCHIVO POT
 * el comando debe ser: php {ruta_archivo\makepot.php} {tipo_de_proyecto} {ruta_del_proyecto} {ruta_guardar_archivo\nombre.pot}
 * 
 * php i18n\makepot.php wp-plugin wp-content\plugins\institucionalmt-cpt\ wp-content\plugins\institucionalmt-cpt\languages\institucionalmt.pot
 */

/**
* Asegurando que todas las instrucciones se ejecuten desde WordPress
*/
if ( ! defined( 'WPINC' ) ) {
	die;
}
// defined('ABSPATH') or die;

/**
 * Instalar (activar) plugin
 */
global $wpdb;
define( 'INSTMT_REALPATH_BASENAME_PLUGIN', dirname( plugin_basename( __FILE__ ) ) . '/' );
define( 'INSTMT_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'INSTMT_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'INSTMT_PLUGIN_DIR_URL_DIR', plugin_dir_url( __DIR__ ) );
define( 'INSTMT_TABLE_DOCS', "{$wpdb->prefix}institucionalmt_documentos");
define( 'INSTMT_TABLE_ITEMS', "{$wpdb->prefix}institucionalmt_items");
define( 'INSTMT_TABLE_ITEMS_CATEGORIES', "{$wpdb->prefix}institucionalmt_items_categories");
define( 'INSTMT_TABLE_HITS', "{$wpdb->prefix}institucionalmt_hits");

/**
 * Código que se ejecuta en la activación del plugin
 */
if (!function_exists('activate_institucionalmt_cpt')) {
    function activate_institucionalmt_cpt(){
        /**
        * Incluyendo el archivo upgrade.php 
        * para crear las tablas utilizando la función dbDelta()
        */
        include_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

        include_once( INSTMT_PLUGIN_DIR_PATH . 'inc/activate/class-instmt-activator.php' );
        require_once( INSTMT_PLUGIN_DIR_PATH . 'inc/activate/class-instmt-activator.php' );
        InstitucionalMT_Activator::activate();
    }    
}

/**
 * Código que se ejecuta en la desactivación del plugin
 */
if (!function_exists('deactivate_institucionalmt_cpt')) {
    function deactivate_institucionalmt_cpt() {
        include_once( INSTMT_PLUGIN_DIR_PATH . 'inc/deactivate/class-instmt-deactivator.php' );
        require_once( INSTMT_PLUGIN_DIR_PATH . 'inc/deactivate/class-instmt-deactivator.php' );
        InstitucionalMT_Deactivator::deactivate();        
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