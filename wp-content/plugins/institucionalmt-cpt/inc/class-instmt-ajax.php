<?php

/**
 * Se activa con la activación del plugin
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
class InstitucionalMT_Ajax
{
    /**
    * Objeto wpdb
    * 
    * @since        1.0.0
    * @access       private
    * @var          object      $db     @global $wpdb
    */
    private $db;

    /**
     * Método constructor
     * 
     * Se ejecuta cuando se instancia la clase
     * 
     * @since       1.0.0
     * @access      public
     */
    public function __construct(){
        // Código a ejecutar en la instancia del objeto
        global $wpdb;
        $this->db = $wpdb;
    }

    /**
    * Método que controla el envio de datos con POST
    * desde el cliente al servidor
    * 
    * @since        1.0.0
    * @access       public
    */
    public function institucionalmt_tables(){

        // verificar nonce para evitar procesar peticiones externas
        check_ajax_referer( 'instmt_ajax_create_item_nonce', 'nonce' );

        if( current_user_can( 'manage_options' ) ){

            extract( $_POST, EXTR_OVERWRITE );

            $columns = [
                'nombre'    =>  $nombre,
                'datos'     =>  ''    
            ];

            $result = $this->db->insert( INSTMT_TABLE_ITEMS, $columns );

            $json = json_encode([
                'result' => $result,
                'nombre' => $nombre
            ]);

        }

    }

    public function in_admin_search()
    {

        // verificar nonce para evitar procesar peticiones externas
        check_ajax_referer('instmt_ajax_security_nonce', 'nonce');

        if (isset($_POST['action'])) {

            $nombre = $_POST['nombre'];

            echo json_encode(["result" => __('Se ha recibido: ', 'institucionalmt') + $nombre,  ]);

            wp_die();
        }
    }

    public function ajax_cargar_datos_representantes()
    {

        // verificar nonce para evitar procesar peticiones externas
        check_ajax_referer('instmt_ajax_security_nonce', 'nonce');

        if (isset($_POST['action'])) {

            $representante_id = $_POST['id'];

            if( $_POST['tipo'] == 'cargando' ) {

                $representante = get_post_meta( $representante_id, '_instmt_representante', true);                    

                if( isset( $representante) && is_array($representante) ) {

                    //extract( $representante, EXTR_OVERWRITE);

                    $json = [
                        'cargo' => $representante['cargo'],
                        'flota' => $representante['flota'],
                        'correo' => $representante['correo'],
                        'nombre' => $representante['nombre'],
                    ];

                } else {

                    $json = [
                        'cargo' => '',
                        'flota' => '',
                        'correo' => '',
                        'nombre' => ''
                    ];

                }

                
            }  elseif ( $_POST['tipo'] == 'guardando' ){
                
                $nombr_rep = sanitize_text_field($_POST['nombre']);
                $cargo_rep = sanitize_text_field($_POST['cargo']);
                $flota_rep = sanitize_text_field($_POST['flota']);
                $correo_rep = sanitize_text_field($_POST['correo']);               
                
                $datos_representante_RLT = [
                    'nombre' => $nombr_rep,
                    'cargo' => $cargo_rep,
                    'flota' => $flota_rep,
                    'correo' => $correo_rep,                   
                ];

                $result = update_post_meta( $representante_id, '_instmt_representante', $datos_representante_RLT );
                $representanteRLT = get_post_meta( $representante_id, '_instmt_representante', true); 
                
                // extract( $encargado, EXTR_OVERWRITE );

                // var_dump( $nombre );
                
                if( $result != false ){

                    $json = [
                        'result' => 'success',
                        'representante' => $representanteRLT['nombre']
                    ];

                } else {

                    $json = [
                        'result' => 'error',                      
                    ];

                }
                
            }
            
            echo json_encode($json);

            wp_die();

        }
    }

    public function ajax_cargar_datos_encargados_ote()
    {

        // verificar nonce para evitar procesar peticiones externas
        check_ajax_referer('instmt_ajax_security_nonce', 'nonce');

        if (isset($_POST['action'])) {

            $encargado_id = $_POST['id'];

            // var_dump($encargado_id);


            if( $_POST['tipo'] == 'cargando' ) {

                $encargadoOTE = get_post_meta( $encargado_id, '_instmt_encargado_ote', true);                    

                if( isset( $encargadoOTE) && is_array($encargadoOTE) ) {

                    //extract( $representante, EXTR_OVERWRITE);

                    $json = [
                        'cargo' => $encargadoOTE['cargo'],
                        'flota' => $encargadoOTE['flota'],
                        'correo' => $encargadoOTE['correo'],
                        'nombre' => $encargadoOTE['nombre'],
                    ];

                } else {

                    $json = [
                        'cargo' => '',
                        'flota' => '',
                        'correo' => '',
                        'nombre' => ''
                    ];

                }

                
            }  elseif ( $_POST['tipo'] == 'guardando' ){
                
                $nombre = sanitize_text_field($_POST['nombre']);
                $cargo = sanitize_text_field($_POST['cargo']);
                $flota = sanitize_text_field($_POST['flota']);
                $correo = sanitize_text_field($_POST['correo']);               
                
                $datos_encargado_OTE = [
                    'nombre' => $nombre,
                    'cargo' => $cargo,
                    'flota' => $flota,
                    'correo' => $correo,                   
                ];

                $result = update_post_meta( $encargado_id, '_instmt_encargado_ote', $datos_encargado_OTE );
                $encargado = get_post_meta( $encargado_id, '_instmt_encargado_ote', true); 
                
                // extract( $encargado, EXTR_OVERWRITE );

                // var_dump( $nombre );
                
                if( $result != false ){

                    $json = [
                        'result' => 'success',
                        'encargado' => $encargado['nombre']
                    ];

                } else {

                    $json = [
                        'result' => 'error',                      
                    ];

                }
                
            }
            
            echo json_encode($json);

            wp_die();

        }
    }


}
