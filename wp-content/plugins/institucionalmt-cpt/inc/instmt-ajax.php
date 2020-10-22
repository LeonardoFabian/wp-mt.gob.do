<?php

class InstitucionalMT_Ajax {

    public function in_admin_search(){

        // verificar nonce para evitar procesar peticiones externas
        check_ajax_referer('instmt_ajax_security_nonce', 'nonce' );

        if( isset( $_POST['action'] ) ){

            $nombre = $_POST['nombre'];

            echo json_encode(["result" => "Se ha recibido: $nombre"]);

            wp_die();

        }

    }
}