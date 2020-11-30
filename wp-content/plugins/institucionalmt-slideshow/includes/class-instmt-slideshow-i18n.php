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
 * @package         institucionalmt-slideshow
 * @subpackage      institucionalmt-slideshow/includes
 */

/**
 * Esta clase define todo lo necesario durante la activación del plugin 
 * 
 * @since           1.0.0
 * @package         institucionalmt-slideshow
 * @subpackage      institucionalmt-slideshow/includes
 * @author          Leonardo Fabián <ramonlfabian@gmail.com>
 */
if( ! class_exists( 'InstitucionalMT_Slideshow_i18n' ) ){

    class InstitucionalMT_Slideshow_i18n{

        /**
         * Carga el dominio de texto del plugin para las traducciones
         * 
         * @since           1.0.0
         * @access          public
         */
        public function institucionalmt_slideshow_load_plugin_textdomain(){
    
            load_plugin_textdomain(
                'instmtslideshow',
                false,
                INSTMT_SLIDESHOW_PLUGIN_REALPATH_BASENAME . 'languages'
            );
    
        }
    
    }

}