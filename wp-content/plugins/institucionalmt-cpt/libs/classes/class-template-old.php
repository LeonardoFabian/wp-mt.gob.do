<?php

// ADD META BOX `custom price` TO `instmt_servicio` CPT
function institucionalmt_add_meta_box_custom_service_details(){

    $post_types = [
        'instmt_servicio'
    ];

    add_meta_box(
        'instmt_service_details', // meta box id
        'Detalles del Servicio', // meta box title
        'institucionalmt_add_meta_box_custom_service_details_html', // function callback
        $post_types, // string o array of CPT
        'side', // postion: normal, advanced, side
        'high' // priority: high, low
    );
}
add_action( 'add_meta_boxes', 'institucionalmt_add_meta_box_custom_service_details');

function institucionalmt_add_meta_box_custom_service_details_html( $post ){

    $instmt_service = get_post_meta( $post->ID, '_instmt_servicio', true);
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

    $html = "
        <label for='instmt_servicio_precio'>Precio</label>
        <input type='text' name='instmt_servicio[precio]' id='instmt_servicio_precio' value=".$precio.">
    ";

    $html .= "
        <p>Teléfono</p>
        <label for='instmt_servicio_telefono_1'>Teléfono 1</label>
        <input type='text' name='instmt_servicio[telefono_1]' id='instmt_servicio_telefono_1' value=".$telefono1.">
        <label for='instmt_servicio_telefono_2'>Teléfono 2</label>
        <input type='text' name='instmt_servicio[telefono_2]' id='instmt_servicio_telefono_2' value=".$telefono2.">
        <br/>
        <p>Extensiones</p>
        <label for='instmt_servicio_extension_1'>Extensión 1</label>
        <input type='text' name='instmt_servicio[extension_1]' id='instmt_servicio_extension_1' value=".$extension1.">
        <label for='instmt_servicio_extension_2'>Extensión 2</label>
        <input type='text' name='instmt_servicio[extension_2]' id='instmt_servicio_extension_2' value=".$extension2.">
        <label for='instmt_servicio_extension_3'>Extensión 3</label>
        <input type='text' name='instmt_servicio[extension_3]' id='instmt_servicio_extension_3' value=".$extension3.">
        <br/>
        <p>Correo Eléctronico</p>
        <label for='instmt_servicio_correo_1'>Correo 1</label>
        <input type='email' name='instmt_servicio[correo_1]' id='instmt_servicio_correo_1' value=".$correo1.">
        <label for='instmt_servicio_correo_2'>Correo 2</label>
        <input type='email' name='instmt_servicio[correo_2]' id='instmt_servicio_correo_2' value=".$correo2.">
    ";

    $html .= "
        <p>Horario</p>
        <label for='instmt_servicio_desde'>Desde</label>
        <select name='instmt_servicio[desde]' id='instmt_servicio_desde'>
            <option value=''>Seleccione un día</option>
            <option value='lunes' ".selected($desde, 'lunes', false).">LUN</option>
            <option value='martes' ".selected($desde, 'martes', false).">MAR</option>
            <option value='miercoles' ".selected($desde, 'miercoles', false).">MIE</option>
            <option value='jueves' ".selected($desde, 'jueves', false).">JUE</option>
            <option value='viernes' ".selected($desde, 'viernes', false).">VIE</option>
            <option value='sabado' ".selected($desde, 'sabado', false).">SAB</option>
            <option value='domingo' ".selected($desde, 'domingo', false).">DOM</option>
        </select>
        <label for='instmt_servicio_hasta'>Hasta</label>
        <select name='instmt_servicio[hasta]' id='instmt_servicio_hasta'>
            <option value=''>Seleccione un día</option>
            <option value='lunes' ".selected($hasta, 'lunes', false).">LUN</option>
            <option value='martes' ".selected($hasta, 'martes', false).">MAR</option>
            <option value='miercoles' ".selected($hasta, 'miercoles', false).">MIE</option>
            <option value='jueves' ".selected($hasta, 'jueves', false).">JUE</option>
            <option value='viernes' ".selected($hasta, 'viernes', false).">VIE</option>
            <option value='sabado' ".selected($hasta, 'sabado', false).">SAB</option>
            <option value='domingo' ".selected($hasta, 'domingo', false).">DOM</option>
        </select>
        ";

    $html .= "
        <label for='instmt_servicio_tiempo_respuesta'>Tiempo de respuesta</label>
        <input type='text' name='instmt_servicio[tiempo_respuesta]' id='instmt_servicio_tiempo_respuesta' value=". $tiempo_respuesta .">
    ";

    echo $html;
    
}

function institucionalmt_save_post_service_details( $post_id ){
    if(array_key_exists('instmt_servicio', $_POST )){
        update_post_meta(
            $post_id,
            '_instmt_servicio',
            $_POST['instmt_servicio']
        );
    }
}
add_action('save_post', 'institucionalmt_save_post_service_details');




