<?php 

/**
 * Código que se ejecutará durante la desactivación del plugin
 * 
 * @link            https://misitioweb.com
 * @since           1.0.0
 * 
 * @package         InstitucionalMT-Carousel
 * @subpackage      InstitucionalMT-Carousel/includes/deactivate
 */

/**
 * Define lo necesario durante el proceso de desactivación
 * 
 * @since           1.0.0
 * @package         InstitucionalMT-Carousel
 * @subpackage      InstitucionalMT-Carousel/includes/deactivate
 * @author          Leonardo Fabián <ramonlfabian@gmail.com>
 */
class InstitucionalMT_Carousel_Deactivation{

    /**
     * Método estático que se ejecuta al desactivar el plugin
     * 
     * @since       1.0.0
     * @access      public static
     */
    public static function deactivate(){

        //TODO: Si se crearon tablas, eliminarlas

        // Limpiar enlaces permanentes
        flush_rewrite_rules();

    }

}