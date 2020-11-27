<?php 

/**
 * Define la funcionalidad del contador de visitas
 * 
 * Define los métodos del lado del cliente/público
 * para administrar los registros de la tabla intitucionalmt_hits
 * 
 * @link        https://misitioweb.com
 * @since       1.0.0
 * 
 * @package     InstitucionalMT-CPT
 * @subpackage  InstitucionalMT-CPT/inc
 */

 class InstitucionalMT_Hits {       

    /**
    * Registra las visitas utilizando el metodo the_content()
    * 
    * @since        1.0.0
    * @access       public
    */
    public function institucionalmt_register_hit( $content ){     

        // Ejecutar solo si está dentro de una publicación
        if( ! is_single() ){
            return $content;
        }

        // datos
        $post_id = get_the_ID();
        $ip = $_SERVER['REMOTE_ADDR'];

        // Registrar visita
        global $wpdb;

        $data = [
            'hit_ip' => $ip,
            'hit_post_id' => $post_id, 
            'hit_date' => current_time( 'mysql' )
        ];

        $wpdb->insert( INSTMT_TABLE_HITS, $data );

        return $content;

    }
 }