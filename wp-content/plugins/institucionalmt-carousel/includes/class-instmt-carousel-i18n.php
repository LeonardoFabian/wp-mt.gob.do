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
 * @package         institucionalmt-carousel
 * @subpackage      institucionalmt-carousel/includes
 */

/**
 * Esta clase define todo lo necesario durante la activación del plugin 
 * 
 * @since           1.0.0
 * @package         institucionalmt-carousel
 * @subpackage      institucionalmt-carousel/includes
 * @author          Leonardo Fabián <ramonlfabian@gmail.com>
 */
class InstitucionalMT_Carousel_i18n{

    /**
     * Carga el dominio de texto (textdomain) del plugin para la traducción.
     * 
     * @since       1.0.0
     * @access      public static
     */
    public function institucionalmt_carousel_load_plugin_textdomain(){

        load_plugin_textdomain(
            'institucionalmt-carousel',
            false, 
            INSTMT_CAROUSEL_REALPATH_BASENAME_PLUGIN . 'languages'
        );

    }

}