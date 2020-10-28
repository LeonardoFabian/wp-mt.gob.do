<?php

abstract class Instmt_RLT_Metabox
{

    public static function add()
    {

        $post_types = [
            'instmt_rlt'
        ];

        add_meta_box(
            'instmt_rlt_details', // meta box id
            'Detalles de la Representación Local', // meta box title
            [self::class, 'html'], // function callback
            $post_types, // string o array of CPT
            'advanced', // postion: normal, advanced, side
            'high' // priority: high, low
        );
    }

    public static function html($post)
    {

        wp_nonce_field('instmt_security_nonce', 'instmt_rlt_nonce');

        $instmt_rlt = get_post_meta($post->ID, '_instmt_rlt', true);
        $representantel = isset($instmt_rlt['representante']) ? $instmt_rlt['representante'] : '';
        $nombre = isset($instmt_rlt['nombre']) ? $instmt_rlt['nombre'] : '';
        $representanteRLT = isset($instmt_rlt['representante_rlt']) ? $instmt_rlt['representante_rlt'] : '';
        //$cargo = '';
        $cargo = isset($instmt_rlt['cargo']) ? $instmt_rlt['cargo'] : '';
        $direccion1 = isset($instmt_rlt['direccion_1']) ? $instmt_rlt['direccion_1'] : '';
        $direccion2 = isset($instmt_rlt['direccion_2']) ? $instmt_rlt['direccion_2'] : '';
        $sector = isset($instmt_rlt['sector']) ? $instmt_rlt['sector'] : '';
        $municipio = isset($instmt_rlt['municipio']) ? $instmt_rlt['municipio'] : '';
        $provincia = isset($instmt_rlt['provincia']) ? $instmt_rlt['provincia'] : '';
        $telefono = isset($instmt_rlt['telefono']) ? $instmt_rlt['telefono'] : '';
        $extension1 = isset($instmt_rlt['extension_1']) ? $instmt_rlt['extension_1'] : '';
        $extension2 = isset($instmt_rlt['extension_2']) ? $instmt_rlt['extension_2'] : '';
        $flota = isset($instmt_rlt['flota']) ? $instmt_rlt['flota'] : '';
        $correo = isset($instmt_rlt['correo']) ? $instmt_rlt['correo'] : '';
        //$flota = '';
       // $correo = '';
        $horario = isset($instmt_rlt['horario']) ? $instmt_rlt['horario'] : '';
        $iframe = isset($instmt_rlt['map_iframe']) ? $instmt_rlt['map_iframe'] : '';
        
        $args = array(
            'post_type' => 'instmt_representante',
            'post_status' => 'publish',
            'orderby' => 'title',
            'order' => 'ASC',
        );

        $representante = new WP_Query( $args );    
        
        // echo '<pre>';
        // var_dump($representante);
        // echo '</pre>';

        $representanteActual = get_post( $representanteRLT, 'instmt_representante');               

        $html = "
            <p>Datos del Representante</p>            
            <label for='instmt_rlt_representante_rlt'>Cambiar Representante Local actual</label>
            <select class='select-representante-rlt instmt-input-group' id='representante' name='instmt_rlt[representante_rlt]' value=''>
                <option value=''> -- Seleccionar -- </option>";                             

                while( $representante->have_posts() ) : $representante->the_post();

                    $ID = get_the_ID();
                    $name = get_the_title();

                    // $r = get_post_meta( $ID, '_instmt_representante');   

                    // echo '<pre>';
                    // var_dump($r);
                    // echo '</pre>';
                    
                    $html .= "<option value='". $ID . selected($representanteRLT, $ID, false) . "'>". $name ."</option>";

                endwhile;

                wp_reset_postdata();

        $html .= "
            </select>
            <p class='description'> Listado de los Representantes Locales, añadidos en el menu 'Representantes Locales'.</p>
            <br>
            <label for='instmt_rep_nombre'>Representante Local</label>
            <input type='text' class='instmt-input-group' name='instmt_rlt[nombre]' id='instmt_rep_nombre' value='" . $nombre . "' readonly >
            <input type='hidden' id='id-representante-rlt' value='". $representanteRLT . "'>
            <br>
            <label for='instmt_rep_cargo'>Cargo</label>
            <input type='text' class='instmt-input-group' name='instmt_rlt[cargo]' id='instmt_rep_cargo' value='" . $cargo . "' >
            <br>
            <label for='instmt_rep_flota'>Flota</label>
            <input type='text' class='instmt-input-group' name='instmt_rlt[flota]' id='instmt_rep_flota' value='" . $flota . "' >
            <br/>           
            <label for='instmt_rep_correo'>Correo</label>
            <input type='email' class='instmt-input-group' name='instmt_rlt[correo]' id='instmt_rep_correo' value='" . $correo . "' >
            <br>

            <button type='button' id='actualizar-representante-rlt' class='btn btn-primary btn-lg'>
                <span class='glyphicon glyphicon-refresh' aria-hidden='true'></span> Actualizar Datos del Representante
            </button>
        ";

        $html .= "
            <p>Dirección</p>
            <label for='instmt_rlt_direccion_1'>Dirección 1</label>
            <input type='text' class='instmt-input-group' name='instmt_rlt[direccion_1]' id='instmt_rlt_direccion_1' value='" . $direccion1 . "'>
            <label for='instmt_rlt_direccion_2'>Dirección 2</label>
            <input type='text' class='instmt-input-group' name='instmt_rlt[direccion_2]' id='instmt_rlt_direccion_2' value='" . $direccion2 . "'>
            <br/>
            <label for='instmt_rlt_sector'>Sector</label>
            <input type='text' class='instmt-input-group' name='instmt_rlt[sector]' id='instmt_rlt_sector' value='" . $sector . "'>
            <label for='instmt_rlt_municipio'>Municipio</label>
            <input type='text' class='instmt-input-group' name='instmt_rlt[municipio]' id='instmt_rlt_municipio' value='" . $municipio . "'>
            <br/>
            <label for='instmt_rlt_provincia'>Provincia</label>
            <select class='instmt-input-group' name='instmt_rlt[provincia]' id='instmt_rlt_provincia'>
                <option value=''>Seleccione un Provincia</option>
                <option value='azua' " . selected($provincia, 'azua', false) . ">Azua</option>
                <option value='bahoruco' " . selected($provincia, 'bahoruco', false) . ">Bahoruco</option>
                <option value='barahona' " . selected($provincia, 'barahona', false) . ">Barahona</option>
                <option value='dajabon' " . selected($provincia, 'dajabon', false) . ">Dajabón</option>
                <option value='distrito-nacional' " . selected($provincia, 'distrito-nacional', false) . ">Distrito Nacional</option>
                <option value='duarte' " . selected($provincia, 'duarte', false) . ">Duarte</option>
                <option value='elias-pina' " . selected($provincia, 'elias-pina', false) . ">Elías Piña</option>
                <option value='el-seibo' " . selected($provincia, 'el-seibo', false) . ">El Seibo</option>
                <option value='espaillat' " . selected($provincia, 'espaillat', false) . ">Espaillat</option>
                <option value='hato-mayor' " . selected($provincia, 'hato-mayor', false) . ">Hato Mayor</option>
                <option value='hermanas-mirabal' " . selected($provincia, 'hermanas-mirabal', false) . ">Hermanas Mirabal</option>
                <option value='independencia' " . selected($provincia, 'independencia', false) . ">Independencia</option>
                <option value='la-altagracia' " . selected($provincia, 'la-altagracia', false) . ">La Altagracia</option>
                <option value='la-romana' " . selected($provincia, 'la-romana', false) . ">La Romana</option>
                <option value='la-vega' " . selected($provincia, 'la-vega', false) . ">La Vega</option>
                <option value='maria-trinidad-sanchez' " . selected($provincia, 'maria-trinidad-sanchez', false) . ">María Trinidad Sánchez</option>
                <option value='monsenor-nouel' " . selected($provincia, 'monsenor-nouel', false) . ">Monseñor Nouel</option>
                <option value='monte-cristi' " . selected($provincia, 'monte-cristi', false) . ">Monte Cristi</option>
                <option value='monte-plata' " . selected($provincia, 'monte-plata', false) . ">Monte Plata</option>
                <option value='pedernales' " . selected($provincia, 'pedernales', false) . ">Pedernales</option>
                <option value='peravia' " . selected($provincia, 'peravia', false) . ">Peravia</option>
                <option value='puerto-plata' " . selected($provincia, 'puerto-plata', false) . ">Puerto Plata</option>
                <option value='samana' " . selected($provincia, 'samana', false) . ">Samaná</option>
                <option value='san-cristobal' " . selected($provincia, 'san-cristobal', false) . ">San Cristóbal</option>
                <option value='san-jose-de-ocoa' " . selected($provincia, 'san-jose-de-ocoa', false) . ">San José de Ocoa</option>
                <option value='san-juan' " . selected($provincia, 'san-juan', false) . ">San Juan</option>
                <option value='san-pedro-de-macoris' " . selected($provincia, 'san-pedro-de-macoris', false) . ">San Pedro de Macorís</option>
                <option value='sanchez-ramirez' " . selected($provincia, 'sanchez-ramirez', false) . ">Sánchez Ramírez</option>
                <option value='santiago' " . selected($provincia, 'santiago', false) . ">Santiago</option>
                <option value='santiago-rodriguez' " . selected($provincia, 'santiago-rodriguez', false) . ">Santiago Rodríguez</option>
                <option value='santo-domingo' " . selected($provincia, 'santo-domingo', false) . ">Santo Domingo</option>
                <option value='valverde' " . selected($provincia, 'valverde', false) . ">Valverde</option>
            </select>
            <br/>
            <hr>
            <p><strong>Contacto</strong></p>            
            <label for='instmt_rlt_telefono'>Teléfono</label>
            <input type='text' class='instmt-input-group' name='instmt_rlt[telefono]' id='instmt_rlt_telefono' value='" . $telefono . "'>           
            <label for='instmt_rlt_extension_1'>Extensión 1</label>
            <input type='text' class='instmt-input-group' name='instmt_rlt[extension_1]' id='instmt_rlt_extension_1' value='" . $extension1 . "'>
            <label for='instmt_rlt_extension_2'>Extensión 2</label>
            <input type='text' class='instmt-input-group' name='instmt_rlt[extension_2]' id='instmt_rlt_extension_2' value='" . $extension2 . "'>
        ";         
        
        $html .= "
            <br>
            <label for='instmt_rlt_map_iframe'>Código de Google Maps</label><br>
            <input type='text' class='instmt-input-group' name='instmt_rlt[map_iframe]' id='instmt_rlt_map_iframe' value='" . $iframe . "'>
            <br>
            <label for='instmt_rlt_horario'>Horario</label>
            <input type='text' class='instmt-input-group' name='instmt_rlt[horario]' id='instmt_rlt_horario' value='" . $horario . "'>
        "; 

        echo $html;        
        
    }

    public static function save($post_id)
    {

        $nonce_value = isset($_POST['instmt_rlt_nonce']) ? $_POST['instmt_rlt_nonce'] : '';
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

        if (array_key_exists('instmt_rlt', $_POST)) {

            $_POST['instmt_rlt']['map_iframe'] = sanitize_text_field( $_POST['instmt_rlt']['map_iframe'] );
            $_POST['instmt_rlt']['representante'] = sanitize_text_field( $_POST['instmt_rlt']['representante'] );
            $_POST['instmt_rlt']['cargo'] = sanitize_text_field( $_POST['instmt_rlt']['cargo'] );

            update_post_meta(
                $post_id,
                '_instmt_rlt',
                $_POST['instmt_rlt']
            );
        }
    }
}

add_action('add_meta_boxes', ['Instmt_RLT_Metabox', 'add']);
add_action('save_post', ['Instmt_RLT_Metabox', 'save']);
