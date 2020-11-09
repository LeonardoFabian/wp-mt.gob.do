<?php 
/**
 * Se ejecuta en la desactivación del plugin
 * 
 * @link        https://misitioweb.com 
 * @since       1.0.0 
 * 
 * @package     InstitucionalMT-CPT
 * @subpackage  InstitucionalMT-CPT/inc/deactivate
 */

/**
 * Esta clase define todo lo necesario durante el proceso de desactivación del plugin
 * 
 * @since       1.0.0
 * @package     InstitucionalMT-CPT
 * @subpackage  InstitucionalMT-CPT/inc/deactivate
 * @author      Leonardo Fabián <ramonlfabian@gmail.com>
 */
class InstitucionalMT_Deactivator {

    /**
     * Método estático
     * 
     * Se ejecuta al desactivar el plugin
     * 
     * @since       1.0.0
     * @access      public static
     */
    public static function deactivate(){

        // Limpiar enlaces permanentes
        flush_rewrite_rules();

    }
    
}

 
  