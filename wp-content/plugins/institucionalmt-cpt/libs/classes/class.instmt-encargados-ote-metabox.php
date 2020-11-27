<?php

abstract class Instmt_Encargados_OTE_Metabox
{

    public static function add()
    {

        $post_types = [
            'instmt_encargado_ote'
        ];

        add_meta_box(
            'instmt_encargado_ote_details', // meta box id
            __('Datos del Encargado', 'institucionalmt'), // meta box title
            [self::class, 'html'], // function callback
            $post_types, // string o array of CPT
            'advanced', // postion: normal, advanced, side
            'high' // priority: high, low
        );
    }

    public static function html($post)
    {

        wp_nonce_field('instmt_security_nonce', 'instmt_encargado_ote_nonce');

        $instmt_representante = get_post_meta($post->ID, '_instmt_encargado_ote', true);    
        
        // echo "<pre>";
        // var_dump($instmt_representante);
        // echo "</pre>";

        $nombre = isset($instmt_representante['nombre']) ? esc_html($instmt_representante['nombre']) : '';    
        $cargo = isset($instmt_representante['cargo']) ? esc_attr($instmt_representante['cargo']) : '';      
        $flota = isset($instmt_representante['flota']) ? esc_attr($instmt_representante['flota']) : '';
        $correo = isset($instmt_representante['correo']) ? esc_attr($instmt_representante['correo']) : '';              

        $html = "
            <div class='had-container'>
            <p>" . __('Datos del Encargado', 'institucionalmt') . "</p>  
            <label for='instmt_encargado_ote_nombre'>" . __('Nombre Completo', 'institucionalmt') . "</label>
            <input type='text' class='instmt-input-group' name='instmt_encargado_ote[nombre]' id='instmt_encargado_ote_nombre' value='" . esc_attr($nombre) . "'>          
            <br>
            <label for='instmt_encargado_ote_cargo'>" . __('Cargo', 'institucionalmt') . "</label>
            <input type='text' class='instmt-input-group' name='instmt_encargado_ote[cargo]' id='instmt_encargado_ote_cargo' value='" . esc_attr($cargo) . "'>
        ";

        $html .= "            
            <br/>           
            <label for='instmt_encargado_ote_flota'>" . __('Flota', 'institucionalmt') . "</label>
            <input type='text' class='instmt-input-group' name='instmt_encargado_ote[flota]' id='instmt_encargado_ote_flota' value='" . esc_attr($flota) . "'>
            <br/>           
            <label for='instmt_encargado_ote_correo'>" . __('Correo', 'institucionalmt') . "</label>
            <input type='email' class='instmt-input-group' name='instmt_encargado_ote[correo]' id='instmt_encargado_ote_correo' value='" . esc_attr($correo) . "'>
            </div>
        ";  

        echo $html;        
        
    }

    public static function save($post_id)
    {

        // Ignoramos los auto guardados.
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }

        $nonce_value = isset($_POST['instmt_encargado_ote_nonce']) ? $_POST['instmt_encargado_ote_nonce'] : '';
        $nonce_action = 'instmt_security_nonce';

        if (!isset($nonce_value)) {
            return;
        }

        if (!wp_verify_nonce($nonce_value, $nonce_action)) {
            return;
        }

        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        // now we can actually save the data  
        $allowed = array(
            'a' => array( // on allow a tags  
                'href' => array() // and those anchors can only have href attribute  
            ),
            'iframe' => array(
                'src' => array(),
                'title' => array()
            )
        );


       

        if (array_key_exists('instmt_encargado_ote', $_POST)) {

            // if( isset( $_POST['instmt_representante']['nombre'] ) && $_POST['instmt_representante']['nombre'] != "" ) {
            //     update_post_meta( $post_id, '_instmt_representante', $_POST['instmt_representante']['nombre'] );
            // } else {
            //     delete_post_meta( $post_id, '_instmt_representante' );
            // }

            // if( isset( $_POST['instmt_representante']['cargo'] ) && $_POST['instmt_representante']['cargo'] != "" ) {
            //     update_post_meta( $post_id, '_instmt_representante', $_POST['instmt_representante']['cargo'] );
            // } else {
            //     delete_post_meta( $post_id, '_instmt_representante' );
            // }

            // $_POST['instmt_representante']['nombre'] = sanitize_text_field( $_POST['instmt_representante']['nombre'] );
            // $_POST['instmt_representante']['cargo'] = sanitize_text_field( $_POST['instmt_representante']['cargo'] );
            // $_POST['instmt_representante']['correo'] = sanitize_email( $_POST['instmt_representante']['correo'] );

            

            // if( isset( $_POST['my_meta_box_text'] ) )
            //     update_post_meta( $post_id, 'my_meta_box_text', wp_kses( $_POST['my_meta_box_text'], $allowed ) );
        
            // if( isset( $_POST['my_meta_box_select'] ) )
            //     update_post_meta( $post_id, 'my_meta_box_select', esc_attr( $_POST['my_meta_box_select'] ) );
        
            
            // $check = isset( $_POST['my_meta_box_check'] ) && $_POST['my_meta_box_select'] ? 'on' : 'off';
            // update_post_meta( $post_id, 'my_meta_box_check', $check );

             update_post_meta(
                 $post_id,
                  '_instmt_encargado_ote',
                $_POST['instmt_encargado_ote']
            );
        }
    }
}

add_action('add_meta_boxes', ['Instmt_Encargados_OTE_Metabox', 'add']);
add_action('save_post', ['Instmt_Encargados_OTE_Metabox', 'save']);
