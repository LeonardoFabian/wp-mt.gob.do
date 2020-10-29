<?php 
/**
 * Menu Ajustes: En proceso...
 */

class InstitucionalMT_Menu_Ajustes {

    protected $build_menupage;

    public function __construct( $build_menupage ){

        $this->build_menupage = $build_menupage;

    }

    public function options_page(){

        $this->build_menupage->add_menu_page('MT Ajustes', __('MT Ajustes', 'institucionalmt'), 'manage_options', 'instmt_settings', [$this, 'page_view_principal'], plugin_dir_url(__DIR__) . 'admin/image/domo.svg', 15 );

        $this->build_menupage->add_submenu_page( 'instmt_settings', __('Configuración', 'institucionalmt'), __('Configuración', 'institucionalmt'), 'manage_options', 'instmt_settings_config', [$this, 'page_view_configurations'] );

        $this->build_menupage->run();

    }

    public function page_view_principal(){

        echo '<h1 style="font-size:30px; line-height: 33px;">';

            do_action('instmt_settings_page');

        echo '</h1>';

        echo "
            <table class='form-table'>
                <tr>
                    <td><input type='text' class='nombre' placeholder='". __('Escribe tu nombre', 'institucionalmt') . "'></td>
                </tr>
            </table>
            <button class='peticion btn-primary' name='btn-prueba'>" . __('Enviar peticion Ajax', 'institucionalmt') . "</button>
            <br>
            <br>            
        ";

        $args = [
            'arg1' => 150,
            'arg2' => 250,
        ];

        echo "<pre>";

        // // mostrar los intervalos
        // var_dump(wp_get_schedules());
        // var_dump(wp_get_schedule('instmt_cron', $args));

        // obtener tareas programadas en wordpress        
        // var_dump(_get_cron_array());

        //echo wp_next_scheduled( 'instmt_cron', $args);

        echo "</pre>";

        echo "<br><br><pre>";

        echo __( 'Plugin realizado en Republica Dominicana', 'institucionalmt');
        echo '<br>';
        _e( 'Plugin realizado en Republica Dominicana', 'institucionalmt');
        echo '<br>';
        
        $ciudad = 'Republica Dominicana';
        printf( __( 'Plugin realizado en %s', 'institucionalmt'), $ciudad );

        echo '<br>';
        $provincia = 'Santo Domingo';
        printf( __( 'Plugin realizado en %1$s, provincia  %2$s', 'institucionalmt'), $ciudad, $provincia );

        echo "</pre>";

        if( current_user_can( 'manage_options' ) ) {

            if( isset( $_GET['settings-updated'] ) ) {

                add_settings_error(
                    'instmt_settings',
                    'instmt_settings',
                    __('Configuración guardada correctamente', 'institucionalmt'),
                    'updated'
                );
                
            }

            settings_errors( 'instmt_settings' );

            echo '<form action="instmt-menu-pages-settings.php" method="post">';

                settings_fields( 'instmt_settings' );

                do_settings_sections( 'instmt_settings' );

                submit_button( __('Guardar cambios', 'institucionalmt') );

            echo '</form>';

        }

    }

    public function page_view_configurations(){

        $prefijo = 'instmt_';
        $id = 15;

        if( current_user_can( 'manage_options' ) ) : 

            ?>

                <form action ="" method="post">

                    <input name="<?php echo $prefijo ?>ajuste" type="text" placeholder="<?php __('Ajuste', 'institucionalmt') ?>">

                    <?php 

                        //do_action('instmt_ajuste_x', $prefijo, $id ); 

                        submit_button( __('Guardar ajustes', 'institucionalmt') );
                        
                    ?>

                </form>

            <?php

        endif;

    }

}