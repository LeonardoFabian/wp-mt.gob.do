<?php 

/**
 * Se activa cuando el plugin va a ser desinstalado
 * 
 * @link        https://misitioweb.com
 * @since       1.0.0
 * 
 * @package     InstitucionalMT-CPT
 */

// Evitar que se ejecute las opciones si no esta definida la constante WP UNINSTALL PLUGIN
if( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit(); // or die;
}

/**
 * Código para eliminar las opciones
 */
$institucionalmt_option_name = 'institucionalmt_options';
delete_option( $institucionalmt_option_name );

// remove_meta_box( 
//     'instmt_service_details', // meta box id
//     'institucionalmt_add_meta_box_custom_service_details_html', // screen
//     'side' // advanced, normal, side
// );

/**
 * Código para eliminar las bases de datos creadas por el plugin
 * 
 * @since       1.0.0
 */
global $wpdb;

$sql = "DROP TABLE IF EXISTS {$wpdb->prefix}institucionalmt_items;";
$sql .= "DROP TABLE IF EXISTS {$wpdb->prefix}institucionalmt_items_categories;";
$sql .= "DROP TABLE IF EXISTS {$wpdb->prefix}institucionalmt_hits;";

$wpdb->query( $sql );

/**
 * Código para limpiar la cache
 */

/**
 * Código para limpiar enlaces permanentes
 */