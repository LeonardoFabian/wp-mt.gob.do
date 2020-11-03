<?php 

class InstitucionalMT_i18n {

    public function load_plugin_textdomain(){

        load_plugin_textdomain( 
            'institucionalmt',
            false,
            REALPATH_BASENAME_PLUGIN . '/languages'
        );

    }

}