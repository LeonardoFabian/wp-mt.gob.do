<?php

abstract class Instmt_Representantes_Locales_Metabox
{

    public static function add()
    {

        $post_types = [
            'instmt_representante'
        ];

        add_meta_box(
            'instmt_representante_details', // meta box id
            'Datos del Representante Local', // meta box title
            [self::class, 'html'], // function callback
            $post_types, // string o array of CPT
            'advanced', // postion: normal, advanced, side
            'high' // priority: high, low
        );
    }

    public static function html($post)
    {

        wp_nonce_field('instmt_security_nonce', 'instmt_representante_nonce');

        $instmt_representante = get_post_meta($post->ID, '_instmt_representante', true);        
        $cargo = isset($instmt_representante['cargo']) ? $instmt_representante['cargo'] : '';      
        $flota = isset($instmt_representante['flota']) ? $instmt_representante['flota'] : '';
        $correo = isset($instmt_representante['correo']) ? $instmt_representante['correo'] : '';              

        $html = "
            <p>Datos del Representante</p>            
            <label for='instmt_representante_cargo'>Cargo</label>
            <input type='text' class='instmt-input-group' name='instmt_representante[cargo]' id='instmt_representante_cargo' value=" . $cargo . ">
        ";

        $html .= "            
            <br/>           
            <label for='instmt_representante_flota'>Flota</label>
            <input type='text' class='instmt-input-group' name='instmt_representante[flota]' id='instmt_representante_flota' value=" . $flota . ">
            <br/>           
            <label for='instmt_representante_correo'>Correo</label>
            <input type='email' class='instmt-input-group' name='instmt_representante[correo]' id='instmt_representante_correo' value=" . $correo . ">
        ";  

        echo $html;        
        
    }

    public static function save($post_id)
    {

        $nonce_value = isset($_POST['instmt_representante_nonce']) ? $_POST['instmt_representante_nonce'] : '';
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

        if (array_key_exists('instmt_representante', $_POST)) {

            $_POST['instmt_representante']['cargo'] = sanitize_text_field( $_POST['instmt_representante']['cargo'] );
            $_POST['instmt_representante']['correo'] = sanitize_email( $_POST['instmt_representante']['correo'] );


            update_post_meta(
                $post_id,
                '_instmt_representante',
                $_POST['instmt_representante']
            );
        }
    }
}

add_action('add_meta_boxes', ['Instmt_Representantes_Locales_Metabox', 'add']);
add_action('save_post', ['Instmt_Representantes_Locales_Metabox', 'save']);
