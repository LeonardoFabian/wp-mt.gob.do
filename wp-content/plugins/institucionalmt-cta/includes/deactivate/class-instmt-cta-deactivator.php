<?php 
/**
 * Código que se ejecutará cuando se desactive el plugin
 * 
 * @link            https://misitioweb.com
 * @since           1.0.0
 * 
 * @package         InstitucionalMT-CTA
 * @subpackage      InstitucionalMT-CTA/includes/deactivate
 */

 /**
  * Esta clase define todo lo necesario durante el proceso de desactivación
  * del plugin
  * @since          1.0.0
  * @package        InstitucionalMT-CTA
  * @subpackage     InstitucionalMT-CTA/includes/deactivate
  * @author         Leonardo Fabián <ramonlfabian@gmail.com>
  */
  class InstitucionalMT_CTA_Deactivator{

    /**
     * Método estático que se ejecuta al desactivar el plugin.
     * 
     * @since       1.0.0
     * @access      public static
     */
    public static function deactivate(){

        // #TODO: Si se crearon las tablas, eliminarlas\

        // Limpiar enlaces permanentes
        flush_rewrite_rules();

    }

  }
