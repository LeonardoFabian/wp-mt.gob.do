<?php 

class InstitucionalMT_Menu_OTE {

    protected $build_menupage;

    public function __construct( $build_menupage ){

        $this->build_menupage = $build_menupage;

    }

    public function options_page(){

        $this->build_menupage->add_menu_page('OTE`s', __('OTE`s', 'institucionalmt'), 'manage_options', 'menu_ote', [$this, 'page_view_principal'], plugin_dir_url(__DIR__) . 'admin/image/domo.svg', 31 );

        // Añadir submenu para las taxonomias
        $this->build_menupage->add_submenu_page( 'menu_ote', __('Zonas', 'institucionalmt'), __('Zonas', 'institucionalmt'), 'manage_options', 'edit-tags.php?taxonomy=ote_taxonomy&post_type=instmt_ote', false );

        $this->build_menupage->run();

    }

    public function page_view_principal(){
       

        if( current_user_can( 'manage_options' ) ) {
            
            

        }

    }
   

}