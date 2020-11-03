<?php 

class InstitucionalMT_Menu_Documentos {

    protected $build_menupage;

    public function __construct( $build_menupage ){

        $this->build_menupage = $build_menupage;

    }

    public function options_page(){

        $this->build_menupage->add_menu_page('Documentos', __('Documentos', 'institucionalmt'), 'manage_options', 'menu_documentos_mt', [$this, 'page_view_principal'], plugin_dir_url(__DIR__) . 'admin/image/domo.svg', 33 );

        // Añadir submenu para las taxonomias
        $this->build_menupage->add_submenu_page( 'menu_documentos_mt', __('Categorías de Documentos', 'institucionalmt'), __('Categorías de Documentos', 'institucionalmt'), 'manage_options', 'edit-tags.php?taxonomy=documentos_taxonomy&post_type=instmt_documentos', false );

        $this->build_menupage->run();

    }

    public function page_view_principal(){
       

        if( current_user_can( 'manage_options' ) ) {
            
        //     $html = "
        //     <label for='instmt_documentos_archivo'>" . __('Documento', 'institucionalmt') . "</label>
        //     <input type='text' class='instmt-input-group' name='instmt_documentos[archivo]' id='instmt_documentos_archivo' value='' >
        //     <button class='btn btn-lg btn-primary btnMarco'>Seleccionar archivo</button>
        // ";      

        // echo $html;    

        }

    }
   

}