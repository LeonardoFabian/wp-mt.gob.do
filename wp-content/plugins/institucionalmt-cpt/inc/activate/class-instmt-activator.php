<?php 
/**
 * Se ejecuta en la activación del plugin
 * 
 * @link            https://misitioweb.com
 * @since           1.0.0
 * 
 * @package         InstitucionalMT-CPT
 * @subpackage      InstitucionalMT-CPT/inc/activate
 */

  /**
   * Esta clase define todo lo necesario durante el proceso de activación del plugin
   * 
   * @since         1.0.0
   * @package       InstitucionalMT-CPT
   * @subpackage    InstitucionalMT-CPT/inc/activate
   * @author        Leonardo Fabián <ramonlfabian@gmail.com>
   */
class InstitucionalMT_Activator {

    /**
     * Método estático que se ejecuta al activar el plugin
     * 
     * Creación de la tabla {$wpdb->prefix}institucionalmt_documentos
     * para guardar toda la información necesaria de los documentos 
     * 
     * @since       1.0.0
     * @access      public static 
     */
    public static function activate(){
        
    }
}
