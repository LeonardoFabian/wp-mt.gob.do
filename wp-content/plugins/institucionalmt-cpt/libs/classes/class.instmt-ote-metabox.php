<?php

abstract class Instmt_OTE_Metabox
{

    public static function add()
    {

        $post_types = [
            'instmt_ote'
        ];

        add_meta_box(
            'instmt_ote_details', // meta box id
            'Detalles de las Oficinas Territoriales', // meta box title
            [self::class, 'html'], // function callback
            $post_types, // string o array of CPT
            'advanced', // postion: normal, advanced, side
            'high' // priority: high, low
        );
    }

    public static function html($post)
    {

        wp_nonce_field('instmt_security_nonce', 'instmt_ote_nonce');

        $instmt_ote = get_post_meta($post->ID, '_instmt_ote', true);
        // $representantel = isset($instmt_rlt['encargado']) ? $instmt_rlt['encargado'] : '';
        $nombre = isset($instmt_ote['nombre']) ? $instmt_ote['nombre'] : '';
        $encargadoOTE = isset($instmt_ote['encargado_ote']) ? $instmt_ote['encargado_ote'] : '';
        //$cargo = '';
        $cargo = isset($instmt_ote['cargo']) ? $instmt_ote['cargo'] : '';
        $direccion1 = isset($instmt_ote['direccion_1']) ? $instmt_ote['direccion_1'] : '';
        $direccion2 = isset($instmt_ote['direccion_2']) ? $instmt_ote['direccion_2'] : '';
        $sector = isset($instmt_ote['sector']) ? $instmt_ote['sector'] : '';
        $municipio = isset($instmt_ote['municipio']) ? $instmt_ote['municipio'] : '';
        $provincia = isset($instmt_ote['provincia']) ? $instmt_ote['provincia'] : '';
        $telefono = isset($instmt_ote['telefono']) ? $instmt_ote['telefono'] : '';
        $extension1 = isset($instmt_ote['extension_1']) ? $instmt_ote['extension_1'] : '';
        $extension2 = isset($instmt_ote['extension_2']) ? $instmt_ote['extension_2'] : '';
        $flota = isset($instmt_ote['flota']) ? $instmt_ote['flota'] : '';
        $correo = isset($instmt_ote['correo']) ? $instmt_ote['correo'] : '';
        //$flota = '';
       // $correo = '';
        $horario = isset($instmt_ote['horario']) ? $instmt_ote['horario'] : '';
        $iframe = isset($instmt_ote['map_iframe']) ? $instmt_ote['map_iframe'] : '';
        
        $args = array(
            'post_type' => 'instmt_encargado_ote',
            'post_status' => 'publish',
            'orderby' => 'title',
            'order' => 'ASC',
        );

        $encargado = new WP_Query( $args );    
        
        // echo '<pre>';
        // var_dump($encargado);
        // echo '</pre>';

        $encargadoActual = get_post( $encargadoOTE, 'instmt_encargado_ote');               

        $html = "
            <p>Datos del Encargado</p>            
            <label for='instmt_ote_encargado_ote'>Cambiar Encargado actual</label>
            <select class='select-encargado-ote instmt-input-group' id='encargado' name='instmt_ote[encargado_ote]' value=''>
                <option value=''> -- Seleccionar -- </option>";                             

                while( $encargado->have_posts() ) : $encargado->the_post();

                    $ID = get_the_ID();
                    $name = get_the_title();

                     $r = get_post_meta( $ID, '_instmt_encargado_ote');   

                    // echo '<pre>';
                    // var_dump($r);
                    // echo '</pre>';
                    
                    $html .= "<option value='". $ID . selected($encargadoOTE, $ID, false) . "'>". $name ."</option>";

                endwhile;

                wp_reset_postdata();

        $html .= "
            </select>
            <p class='description'> Listado de Encargados, añadidos en el menu 'Encargados OTE'.</p>
            <br>
            <label for='instmt_enc_nombre'>Encargado</label>
            <input type='text' class='instmt-input-group' name='instmt_ote[nombre]' id='instmt_enc_nombre' value='" . $nombre . "' readonly >
            <input type='hidden' id='id-encargado-ote' value='". $encargadoOTE . "'>
            <label for='instmt_enc_cargo'>Cargo</label>
            <input type='text' class='instmt-input-group' name='instmt_ote[cargo]' id='instmt_enc_cargo' value='" . $cargo . "' >
            <br>
            <label for='instmt_enc_flota'>Flota</label>
            <input type='text' class='instmt-input-group' name='instmt_ote[flota]' id='instmt_enc_flota' value='" . $flota . "' >         
            <label for='instmt_enc_correo'>Correo</label>
            <input type='email' class='instmt-input-group' name='instmt_ote[correo]' id='instmt_enc_correo' value='" . $correo . "' >

            <button type='button' id='actualizar-encargado-ote' class='btn btn-primary btn-lg'>
                <span class='glyphicon glyphicon-refresh' aria-hidden='true'></span> Actualizar Datos del Encargado
            </button>
        ";

        $html .= "
            <p>Dirección</p>
            <label for='instmt_ote_direccion_1'>Dirección 1</label>
            <input type='text' class='instmt-input-group' name='instmt_ote[direccion_1]' id='instmt_ote_direccion_1' value='" . $direccion1 . "'>
            <label for='instmt_ote_direccion_2'>Dirección 2</label>
            <input type='text' class='instmt-input-group' name='instmt_ote[direccion_2]' id='instmt_ote_direccion_2' value='" . $direccion2 . "'>
            <br/>
            <label for='instmt_ote_sector'>Sector</label>
            <input type='text' class='instmt-input-group' name='instmt_ote[sector]' id='instmt_ote_sector' value='" . $sector . "'>
            <label for='instmt_ote_municipio'>Municipio</label>
            <input type='text' class='instmt-input-group' name='instmt_ote[municipio]' id='instmt_ote_municipio' value='" . $municipio . "'>
            <br/>
            <label for='instmt_ote_provincia'>Provincia</label>
            <select class='instmt-input-group' name='instmt_ote[provincia]' id='instmt_ote_provincia'>
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
            <label for='instmt_ote_telefono'>Teléfono</label>
            <input type='text' class='instmt-input-group' name='instmt_ote[telefono]' id='instmt_ote_telefono' value='" . $telefono . "'>           
            <label for='instmt_ote_extension_1'>Extensión 1</label>
            <input type='text' class='instmt-input-group' name='instmt_ote[extension_1]' id='instmt_ote_extension_1' value='" . $extension1 . "'>
            <label for='instmt_ote_extension_2'>Extensión 2</label>
            <input type='text' class='instmt-input-group' name='instmt_ote[extension_2]' id='instmt_ote_extension_2' value='" . $extension2 . "'>
        ";         
        
        $html .= "
            <br>
            <label for='instmt_ote_map_iframe'>Código de Google Maps</label><br>
            <input type='text' class='instmt-input-group' name='instmt_ote[map_iframe]' id='instmt_ote_map_iframe' value='" . $iframe . "'>
            <br>
            <label for='instmt_ote_horario'>Horario</label>
            <input type='text' class='instmt-input-group' name='instmt_ote[horario]' id='instmt_ote_horario' value='" . $horario . "'>
        "; 

        echo $html;        
        
    }

    public static function save($post_id)
    {

        $nonce_value = isset($_POST['instmt_ote_nonce']) ? $_POST['instmt_ote_nonce'] : '';
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

        if (array_key_exists('instmt_ote', $_POST)) {

            $_POST['instmt_ote']['map_iframe'] = sanitize_text_field( $_POST['instmt_ote']['map_iframe'] );
            $_POST['instmt_ote']['encargado'] = sanitize_text_field( $_POST['instmt_ote']['encargado'] );
            $_POST['instmt_ote']['cargo'] = sanitize_text_field( $_POST['instmt_ote']['cargo'] );

            update_post_meta(
                $post_id,
                '_instmt_ote',
                $_POST['instmt_ote']
            );
        }
    }
}

add_action('add_meta_boxes', ['Instmt_OTE_Metabox', 'add']);
add_action('save_post', ['Instmt_OTE_Metabox', 'save']);
