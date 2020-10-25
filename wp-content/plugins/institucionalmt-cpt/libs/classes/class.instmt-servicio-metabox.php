<?php

abstract class Instmt_Servicio_Metabox
{

    public static function add()
    {

        $post_types = [
            'instmt_servicio'
        ];

        add_meta_box(
            'instmt_service_details', // meta box id
            'Detalles del Servicio', // meta box title
            [self::class, 'html'], // function callback
            $post_types, // string o array of CPT
            'advanced', // postion: normal, advanced, side
            'high' // priority: high, low
        );
    }

    public static function html($post)
    {

        wp_nonce_field('instmt_security_nonce', 'instmt_servicio_nonce');

        $instmt_service = get_post_meta($post->ID, '_instmt_servicio', true);
        $precio = isset($instmt_service['precio']) ? $instmt_service['precio'] : '';
        $telefono1 = isset($instmt_service['telefono_1']) ? $instmt_service['telefono_1'] : '';
        $telefono2 = isset($instmt_service['telefono_2']) ? $instmt_service['telefono_2'] : '';
        $extension1 = isset($instmt_service['extension_1']) ? $instmt_service['extension_1'] : '';
        $extension2 = isset($instmt_service['extension_2']) ? $instmt_service['extension_2'] : '';
        $extension3 = isset($instmt_service['extension_3']) ? $instmt_service['extension_3'] : '';
        $correo1 = isset($instmt_service['correo_1']) ? $instmt_service['correo_1'] : '';
        $correo2 = isset($instmt_service['correo_2']) ? $instmt_service['correo_2'] : '';
        $desde = isset($instmt_service['desde']) ? $instmt_service['desde'] : '';
        $hasta = isset($instmt_service['hasta']) ? $instmt_service['hasta'] : '';
        $tiempo_respuesta = isset($instmt_service['tiempo_respuesta']) ? $instmt_service['tiempo_respuesta'] : '';
        $dirigido_a = isset($instmt_service['dirigido_a']) ? $instmt_service['dirigido_a'] : '';
        $area_responsable = isset($instmt_service['area_responsable']) ? $instmt_service['area_responsable'] : '';
        $requisitos = isset($instmt_service['requisitos']) ? $instmt_service['requisitos'] : '';
        $procedimiento = isset($instmt_service['procedimiento']) ? $instmt_service['procedimiento'] : '';
        $procedimiento_online = isset($instmt_service['procedimiento_online']) ? $instmt_service['procedimiento_online'] : '';
        $informacion_adicional = isset($instmt_service['informacion_adicional']) ? $instmt_service['informacion_adicional'] : '';
        $url = isset($instmt_service['servicio_url']) ? $instmt_service['servicio_url'] : '';

        $html = "
            <label for='instmt_servicio_precio'>Precio</label>
            <input type='text' class='instmt-input-group' name='instmt_servicio[precio]' id='instmt_servicio_precio' value=" . $precio . ">
        ";

        $html .= "
            <p>Teléfono</p>
            <label for='instmt_servicio_telefono_1'>Teléfono 1</label>
            <input type='text' class='instmt-input-group' name='instmt_servicio[telefono_1]' id='instmt_servicio_telefono_1' value=" . $telefono1 . ">
            <label for='instmt_servicio_telefono_2'>Teléfono 2</label>
            <input type='text' class='instmt-input-group' name='instmt_servicio[telefono_2]' id='instmt_servicio_telefono_2' value=" . $telefono2 . ">
            <br/>
            <p>Extensiones</p>
            <label for='instmt_servicio_extension_1'>Extensión 1</label>
            <input type='text' class='instmt-input-group' name='instmt_servicio[extension_1]' id='instmt_servicio_extension_1' value=" . $extension1 . ">
            <label for='instmt_servicio_extension_2'>Extensión 2</label>
            <input type='text' class='instmt-input-group' name='instmt_servicio[extension_2]' id='instmt_servicio_extension_2' value=" . $extension2 . ">
            <label for='instmt_servicio_extension_3'>Extensión 3</label>
            <input type='text' class='instmt-input-group' name='instmt_servicio[extension_3]' id='instmt_servicio_extension_3' value=" . $extension3 . ">
            <br/>
            <p>Correo Eléctronico</p>
            <label for='instmt_servicio_correo_1'>Correo 1</label>
            <input type='email' class='instmt-input-group' name='instmt_servicio[correo_1]' id='instmt_servicio_correo_1' value=" . $correo1 . ">
            <label for='instmt_servicio_correo_2'>Correo 2</label>
            <input type='email' class='instmt-input-group' name='instmt_servicio[correo_2]' id='instmt_servicio_correo_2' value=" . $correo2 . ">
        ";

        $html .= "
            <p>Horario</p>
            <label for='instmt_servicio_desde'>Desde</label>
            <select class='instmt-input-group' name='instmt_servicio[desde]' id='instmt_servicio_desde'>
                <option value=''>Seleccione un día</option>
                <option value='lunes' " . selected($desde, 'lunes', false) . ">LUN</option>
                <option value='martes' " . selected($desde, 'martes', false) . ">MAR</option>
                <option value='miercoles' " . selected($desde, 'miercoles', false) . ">MIE</option>
                <option value='jueves' " . selected($desde, 'jueves', false) . ">JUE</option>
                <option value='viernes' " . selected($desde, 'viernes', false) . ">VIE</option>
                <option value='sabado' " . selected($desde, 'sabado', false) . ">SAB</option>
                <option value='domingo' " . selected($desde, 'domingo', false) . ">DOM</option>
            </select>
            <label for='instmt_servicio_hasta'>Hasta</label>
            <select class='instmt-input-group' name='instmt_servicio[hasta]' id='instmt_servicio_hasta'>
                <option value=''>Seleccione un día</option>
                <option value='lunes' " . selected($hasta, 'lunes', false) . ">LUN</option>
                <option value='martes' " . selected($hasta, 'martes', false) . ">MAR</option>
                <option value='miercoles' " . selected($hasta, 'miercoles', false) . ">MIE</option>
                <option value='jueves' " . selected($hasta, 'jueves', false) . ">JUE</option>
                <option value='viernes' " . selected($hasta, 'viernes', false) . ">VIE</option>
                <option value='sabado' " . selected($hasta, 'sabado', false) . ">SAB</option>
                <option value='domingo' " . selected($hasta, 'domingo', false) . ">DOM</option>
            </select>
            ";

        $html .= "
            <br>
            <label for='instmt_servicio_tiempo_respuesta'>Tiempo de respuesta</label>
            <input type='text' class='instmt-input-group' name='instmt_servicio[tiempo_respuesta]' id='instmt_servicio_tiempo_respuesta' value=" . $tiempo_respuesta . ">
        ";       
        
        $html .= "
            <br>
            <label for='instmt_servicio_url'>URL del Servicio</label>
            <input type='url' class='instmt-input-group' name='instmt_servicio[url]' id='instmt_servicio_url' value=" . esc_url( $url ) . ">
        "; 

        echo $html;

        
        $html2 = "
            <hr>            
            <h3>A quién va dirigido:</h3>
        ";

        echo $html2;

        wp_editor($dirigido_a, 'instmt_servicio_dirigido_a', array('textarea_name' => 'instmt_servicio[dirigido_a]', 'textarea_rows' => 5, 'media_buttons' => false, 'editor_class' => 'editor-dirigido-a'));
        

        $html3 = "
            <hr>            
            <h3>Area responsable de ofrecer el servicio:</h3>
        ";

        echo $html3;

        wp_editor($area_responsable, 'instmt_servicio_area_responsable', array('textarea_name' => 'instmt_servicio[area_responsable]', 'textarea_rows' => 5, 'media_buttons' => false, 'editor_class' => 'editor-area-responsable'));

        $html4 = "
            <hr>            
            <h3>Requisitos:</h3>
        ";

        echo $html4;

        wp_editor($requisitos, 'instmt_servicio_requisitos', array('textarea_name' => 'instmt_servicio[requisitos]', 'textarea_rows' => 5, 'media_buttons' => false));


        $html5= "
            <hr>            
            <h3>Procedimiento (Modalidad Presencial):</h3>
        ";

        echo $html5;

        wp_editor($procedimiento, 'instmt_servicio_procedimiento', array('textarea_name' => 'instmt_servicio[procedimiento]', 'textarea_rows' => 5, 'media_buttons' => false, 'editor_class' => 'editor-procedimiento'));

        $html6= "
            <hr>            
            <h3>Procedimiento (Modalidad En Linea):</h3>
        ";

        echo $html6;

        wp_editor($procedimiento_online, 'instmt_servicio_procedimiento_online', array('textarea_name' => 'instmt_servicio[procedimiento_online]', 'textarea_rows' => 5, 'media_buttons' => false, 'editor_class' => 'editor-procedimiento-online'));

        $html7 = "
            <hr>            
            <h3>Informacion adicional:</h3>
        ";

        echo $html7;

        wp_editor($informacion_adicional, 'instmt_servicio_informacion_adicional', array('textarea_name' => 'instmt_servicio[informacion_adicional]', 'textarea_rows' => 5, 'media_buttons' => false, 'editor_class' => 'editor-informacion-adicional'));
    }

    public static function save($post_id)
    {

        $nonce_value = isset($_POST['instmt_servicio_nonce']) ? $_POST['instmt_servicio_nonce'] : '';
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

        if (array_key_exists('instmt_servicio', $_POST)) {
            update_post_meta(
                $post_id,
                '_instmt_servicio',
                $_POST['instmt_servicio']
            );
        }
    }
}

add_action('add_meta_boxes', ['Instmt_Servicio_Metabox', 'add']);
add_action('save_post', ['Instmt_Servicio_Metabox', 'save']);
