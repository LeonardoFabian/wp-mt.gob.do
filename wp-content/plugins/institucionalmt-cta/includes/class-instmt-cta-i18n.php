<?php
/**
 * Define la funcionalidad de internacionalización (i18n)
 * 
 * Carga y define los archivos de internacionalización de este plugin
 * para que esté listo para su traducción.
 * 
 * @link            https://misitioweb.com
 * @since           1.0.0
 * 
 * @package         InstitucionalMT-CTA
 * @subpackage      InstitucionalMT-CTA/includes
 */

/**
 * Esta clase define todo lo necesario durante la activación del plugin 
 * 
 * @since           1.0.0
 * @package         InstitucionalMT-CTA
 * @subpackage      InstitucionalMT-CTA/includes
 * @author          Leonardo Fabián <ramonlfabian@gmail.com>
 */
class InstitucionalMT_CTA_i18n{

    /**
     * Carga el dominio de texto (textdomain) del plugin para la traducción.
     * 
     * @since       1.0.0
     * @access      public static
     */
    public function institucionalmt_cta_load_plugin_textdomain(){

        load_plugin_textdomain(
            'institucionalmt-cta',
            false, 
            INSTMT_CTA_REALPATH_BASENAME_PLUGIN . 'languages'
        );

    }

}