<?php 
/**
 * Se activa en la desinstalación del plugin
 * 
 * @link            https://misitioweb.com
 * @since           1.0.0
 * @package         InstitucionalMT-Carousel
 */

/**
 * Evitar que se ejecuten las opciones, si no está definida
 * la constante WP_UNINSTALL_PLUGIN
 */
if( ! defined( 'WP_UNINSTALL_PLUGIN' ) ){
    exit;
} 

// TODO
/**
 * Limpiar cache
 */

/**
 * Limpiar enlaces permanentes
 */
flush_rewrite_rules();