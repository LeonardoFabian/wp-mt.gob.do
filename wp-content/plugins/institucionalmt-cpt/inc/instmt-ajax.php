<?php

class InstitucionalMT_Ajax
{

    public function in_admin_search()
    {

        // verificar nonce para evitar procesar peticiones externas
        check_ajax_referer('instmt_ajax_security_nonce', 'nonce');

        if (isset($_POST['action'])) {

            $nombre = $_POST['nombre'];

            echo json_encode(["result" => "Se ha recibido: $nombre"]);

            wp_die();
        }
    }

    public function ajax_cargar_datos_representantes()
    {

        // verificar nonce para evitar procesar peticiones externas
        check_ajax_referer('instmt_ajax_security_nonce', 'nonce');

        if (isset($_POST['action'])) {

            if( $_POST['tipo'] == 'cargando' ) {

                $representante = get_post_meta( $_POST['id'], '_instmt_representante', true);                    

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

            if( $_POST['tipo'] == 'cargando' ) {

                $encargadoOTE = get_post_meta( $_POST['id'], '_instmt_encargado_ote', true);                    

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

                
            }  
            
            echo json_encode($json);

            wp_die();

        }
    }


}
