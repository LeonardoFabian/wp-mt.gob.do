<?php
/**
 * Se activa cuando el plugin va a ser desinstalado
 * 
 * @link            https://misitioweb.com
 * @since           1.0.0
 * 
 * @package         InstitucionalMT-CTA
 */

/**
 * Evitar que se ejecuten las opciones, si no está definida la constante 
 * WP_UNINSTALL_PLUGIN
 */
if( ! defined( 'WP_UNINSTALL_PLUGIN' ) ){
    exit();
}
 
/**
 * Código para limpiar la cache
 */
// #TODO: Código para limpiar la cache en la desinstalación

 /**
  * Código para limpiar enlaces permanentes
  */
  flush_rewrite_rules();