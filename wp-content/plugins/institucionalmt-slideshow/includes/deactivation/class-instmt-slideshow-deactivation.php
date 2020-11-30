<?php 
/**
 * Código que se ejecutará durante la desactivación del plugin
 * 
 * @link            https://misitioweb.com
 * @since           1.0.0
 * 
 * @package         institucionalmt-slideshow
 * @subpackage      institucionalmt-slideshow/includes/deactivation
 */

/**
 * Clase que define lo necesario durante el proceso de desactivación
 * 
 * @since           1.0.0
 * @package         institucionalmt-slideshow
 * @subpackage      institucionalmt-slideshow/includes/deactivation
 * @author          Leonardo Fabián <ramonlfabian@gmail.com>
 */
if( ! class_exists( 'InstitucionalMT_Slideshow_Deactivation' ) ){

    class InstitucionalMT_Slideshow_Deactivation {

        /**
         * Método estático que se ejecuta al desactivar el plugin
         * 
         * @since       1.0.0
         * @access      public static
         */
        public static function deactivate(){
    
            // Limpiar enlaces permanentes
            flush_rewrite_rules();
    
        }
    
    }

}