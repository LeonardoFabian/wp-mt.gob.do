<?php

abstract class Instmt_Documentos_Metabox
{

    public static function add()
    {

        $post_types = [
            'instmt_documentos'
        ];

        add_meta_box(
            'instmt_documentos_details', // meta box id
            __('Documento', 'institucionalmt'), // meta box title
            [self::class, 'html'], // function callback
            $post_types, // string o array of CPT
            'advanced', // postion: normal, advanced, side
            'high' // priority: high, low
        );
    }

    public static function html($post)
    {

        wp_nonce_field('instmt_security_nonce', 'instmt_documentos_nonce');

        $instmt_representante = get_post_meta($post->ID, '_instmt_documentos', true);    
        
        // echo "<pre>";
        // var_dump($instmt_representante);
        // echo "</pre>";

        // $nombre = isset($instmt_representante['nombre']) ? esc_html($instmt_representante['nombre']) : ''; 
        
       

        $html = "
            <label for='instmt_documentos_archivo'>" . __('Añadir un documento', 'institucionalmt') . "</label>
            <input type='text' class='instmt-input-group' name='instmt_documentos[archivo]' id='instmt_documentos_archivo' value='' >
            <button type='button' class='btn btn-lg btn-primary brnArchivo' id='btnCargarArchivos'>Seleccionar archivo</button>
            <br>
            <span class='document-file-title'></span>
            <br>
            <span class='document-file-size'></span>
            <br>
            <span class='document-file-type'></span>                
        ";      

        echo $html;        
        
    }

    public static function save($post_id)
    {

        $nonce_value = isset($_POST['instmt_documentos_nonce']) ? $_POST['instmt_documentos_nonce'] : '';
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

        if (array_key_exists('instmt_documentos', $_POST)) {

           // $_POST['instmt_documentos']['archivo'] = sanitize_text_field( $_POST['instmt_documentos']['archivo'] );
  
            update_post_meta(
                $post_id,
                '_instmt_documentos',
                $_POST['instmt_documentos']
            );
        }
    }

    
}

add_action('add_meta_boxes', ['Instmt_Documentos_Metabox', 'add']);
add_action('save_post', ['Instmt_Documentos_Metabox', 'save']);

