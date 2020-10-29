<?php 

class InstitucionalMT_Heartbeat {

    public function heartbeat_receive_and_respond( $response, $data, $screen_id ){

        if( ! empty( $data['nombre'] ) && isset( $data['nombre'] ) ) {

            extract( $data, EXTR_OVERWRITE );

            $response['mensaje'] = "Hemos recibido el nombre $nombre";
            $response['screen_id'] = $screen_id;

        }

        return $response;

    }

    public function heartbeat_notificacion ($response, $data, $screen_id ){

        if( ! empty( $data['instmt_notificacion'] ) && isset( $data['instmt_notificacion'] ) ) {

            extract($data, EXTR_OVERWRITE );

            $current_user_id = (int) $instmt_notificacion['current_user_id'];
            $actualizado = $instmt_notificacion['actualizado'];
            $user_update_id = (int) $instmt_notificacion['user_update'];

            // verificando que actualizado sea true para agregar la notificacion 
            // a los administradores en la base de datos
            if( $actualizado == 'true' ){

                $args = [
                    'meta_key' => 'instmt_online',
                    'exclude' => [
                        $current_user_id
                    ]
                ];

                $usuarios = get_users( $args );

                foreach( $usuarios as $usuario ){

                    if( $usuario->instmt_online == 'true' ) {

                        // TODO : colocar user_update_id como un array para no reescribirlo
                        $datos = [
                            'user_updater_id' => $current_user_id,
                            'user_update_id' => $user_update_id,
                            'screen_id' => $screen_id,
                            'notificar' => 'true'
                        ];

                        update_user_meta( $usuario->ID, 'instmt_notificacion', $datos );

                    }

                }

            } elseif( $actualizado == 'false' ){

                $current_user = new WP_User( $current_user_id );

                if( $current_user->has_prop( 'instmt_notificacion' ) ){
                    
                    $user_updater_id = $current_user->instmt_notificacion['user_updater_id'];
                    $user_updater = new WP_User( $user_updater_id );
                    // $user_update = new WP_User( $current_user->instmt_notificacion['user_update_id']);
                    $user_update = get_post($current_user->instmt_notificacion['user_update_id']);
                    $screen_id = $current_user->instmt_notificacion['screen_id'];
                    $notificar = $current_user->instmt_notificacion['notificar'];

                    // si notificar == true
                    // responder con notificacion true
                    if( $notificar == 'true' ){

                        $response['instmt_notificacion'] = 'true';
                        $response['updater'] = [
                            'display_name' => $user_updater->display_name,
                            'avatar' => get_avatar_url( $user_updater_id )
                        ];
                        $response['user_updated'] = [
                            // 'display_name' => $user_update->display_name,
                            'display_name' => $user_update->post_title,
                        ];

                        $datos = [
                            'notificar' => 'false'
                        ];

                        update_user_meta( $current_user_id, 'instmt_notificacion', $datos );

                    }


                } 

            } else {

                $response['instmt_notificacion'] = 'false';
            
            }

        }

        return $response;

    }

}



