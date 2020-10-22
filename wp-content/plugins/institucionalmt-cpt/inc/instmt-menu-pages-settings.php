<?php 

class InstitucionalMT_Menu_Ajustes {

    protected $build_menupage;

    public function __construct( $build_menupage ){

        $this->build_menupage = $build_menupage;

    }

    public function options_page(){

        $this->build_menupage->add_menu_page('MT Ajustes', 'MT Ajustes', 'manage_options', 'instmt_settings', [$this, 'page_view_principal'], plugin_dir_url(__DIR__) . 'admin/image/domo.svg', 15 );

        $this->build_menupage->add_submenu_page( 'instmt_settings', 'Configuración', 'Configuración', 'manage_options', 'instmt_settings_config', [$this, 'page_view_configurations'] );

        $this->build_menupage->run();

    }

    public function page_view_principal(){

        echo '<h1 style="font-size:30px; line-height: 33px;">';

            do_action('instmt_settings_page');

        echo '</h1>';

        echo "
            <table class='form-table'>
                <tr>
                    <td><input type='text' class='nombre' placeholder='Escribe tu nombre'></td>
                </tr>
            </table>
            <button class='peticion btn-primary' name='btn-prueba'>Enviar peticion Ajax</button>
        ";

        if( current_user_can( 'manage_options' ) ) {

            if( isset( $_GET['settings-updated'] ) ) {

                add_settings_error(
                    'instmt_settings',
                    'instmt_settings',
                    'Configuración guardada correctamente',
                    'updated'
                );
                
            }

            settings_errors( 'instmt_settings' );

            echo '<form action="instmt-menu-pages-settings.php" method="post">';

                settings_fields( 'instmt_settings' );

                do_settings_sections( 'instmt_settings' );

                submit_button( 'Guardar cambios' );

            echo '</form>';

        }

    }

    public function page_view_configurations(){

        $prefijo = 'instmt_';
        $id = 15;

        if( current_user_can( 'manage_options' ) ) : 

            ?>

                <form action ="" method="post">

                    <input name="<?php echo $prefijo ?>ajuste" type="text" placeholder="Ajuste">

                    <?php 

                        //do_action('instmt_ajuste_x', $prefijo, $id ); 

                        submit_button( 'Guardar ajustes' );
                        
                    ?>

                </form>

            <?php

        endif;

    }

}