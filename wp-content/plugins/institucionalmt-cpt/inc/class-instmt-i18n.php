<?php 
/**
 * Define la funcionalidad de internacionalización
 * 
 * Carga y define los archivos de internacionalización de este plugin
 * para que éste listo para su traducción.
 * 
 * @link        https://misitioweb.com
 * @since       1.0.0
 * 
 * @package     InstitucionalMT-CPT
 * @subpackage  InstitucionalMT-CPT/inc
 */

/**
 * Esta clase define todo lo necesario durante la activación del plugin
 * 
 * @since       1.0.0
 * @package     InstitucionalMT-CPT
 * @subpackage  InstitucionalMT-CPT/inc
 * @author      Leonardo Fabián <ramonlfabian@gmail.com>
 */
class InstitucionalMT_i18n {

    /**
     * Carga el dominio de texto ( textdomain ) del plugin para la traducción.
     * 
     * @since       1.0.0
     * @access      public      static
     */
    public function load_plugin_textdomain(){

        load_plugin_textdomain( 
            'institucionalmt',
            false,
            INSTMT_REALPATH_BASENAME_PLUGIN . 'languages'
        );

    }

}