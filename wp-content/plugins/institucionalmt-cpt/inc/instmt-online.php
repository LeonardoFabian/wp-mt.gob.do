<?php 

/**
 * Determina si un usuario ha iniciado sesion
 */

class InstitucionalMT_User_Online {

    public function conectado( $username, $user ){

        if( $user->has_cap( 'administrator') ){

            update_user_meta( $user->ID, 'instmt_online', 'true');

        }

    }

    public function desconectado(){

        $user_id = get_current_user_id();
        $user = new WP_User( $user_id );

        if( $user->has_cap( 'administrator') ){

            update_user_meta( $user->ID, 'instmt_online', 'false');

        }

    }

}