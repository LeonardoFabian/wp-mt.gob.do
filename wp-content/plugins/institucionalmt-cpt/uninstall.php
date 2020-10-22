<?php 

// Evitar que se ejecute las opciones si no esta definida la constante WP UNINSTALL PLUGIN
if( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit(); // or die;
}

// Eliminar las opciones
$institucionalmt_option_name = 'institucionalmt_options';
delete_option( $institucionalmt_option_name );

remove_meta_box( 
    'instmt_service_details', // meta box id
    'institucionalmt_add_meta_box_custom_service_details_html', // screen
    'side' // advanced, normal, side
);

// Acceder a la interfaz wpdb que permite interactuar con otras tablas de la base de datos
global $wpdb;


$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}institucionalmt_cpt");