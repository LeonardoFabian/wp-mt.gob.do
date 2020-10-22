<?php

class InstitucionalMT_Meta_Field_Usuarios
{

    public function add_meta_fields($user)
    {       

        $usuario = get_user_meta($user->ID, 'instmt_usuario', true);
        
        /*
        if(isset($usuario) && is_array($usuario)){
            extract($usuario, EXTR_OVERWRITE);
        } else {
            $usuario['telefono'] = '';
            $usuario['extension'] = '';
        }
*/
        //var_dump($usuario);         

        $html = "
        <h3>Información de contacto</h3>
            <table class='form-table'>

                <tr class='form-required user-telefono-wrap'>
                    <th scope='row'><label for='instmt_usuario[telefono]'>Teléfono</label></th>
                    <td>
                        <input type='text' class='regular-text' name='instmt_usuario[telefono]' id='telefono' size='40' value='" . $usuario['telefono'] ."'>
                    </td>        
                </tr>

                <tr class='form-required user-extension-wrap'>
                    <th scope='row'><label for='instmt_usuario[extension]'>Extensión</label></th>
                    <td>
                        <input type='text' class='regular-text' name='instmt_usuario[extension]' id='extension' size='40' value='" . $usuario['extension'] ."'>
                    </td>        
                </tr>

            </table>
        ";

        echo $html;
    }

    public function save_meta_fields( $user_id ){

        if(! current_user_can( 'edit_user' ) ) {
            return;
        }

        if( isset( $_POST['instmt_usuario'] ) ) {

            $_POST['instmt_usuario']['telefono'] = sanitize_text_field( $_POST['instmt_usuario']['telefono'] );
            $_POST['instmt_usuario']['extension'] = sanitize_text_field( $_POST['instmt_usuario']['extension'] ); 

            update_user_meta( $user_id, 'instmt_usuario', $_POST['instmt_usuario'] );

        }

    }
}
?>
