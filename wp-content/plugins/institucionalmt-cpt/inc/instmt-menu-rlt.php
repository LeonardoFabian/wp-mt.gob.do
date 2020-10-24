<?php 

class InstitucionalMT_Menu_RLT {

    protected $build_menupage;

    public function __construct( $build_menupage ){

        $this->build_menupage = $build_menupage;

    }

    public function options_page(){

        $this->build_menupage->add_menu_page('RLT`s', 'RLT`s', 'manage_options', 'menu_rlt', [$this, 'page_view_principal'], plugin_dir_url(__DIR__) . 'admin/image/domo.svg', 30 );

        // Añadir submenu para las taxonomias
        $this->build_menupage->add_submenu_page( 'menu_rlt', 'Zonas', 'Zonas', 'manage_options', 'edit-tags.php?taxonomy=rlt_taxonomy&post_type=instmt_rlt', false );

        $this->build_menupage->run();

    }

    public function page_view_principal(){
       

        if( current_user_can( 'manage_options' ) ) {
            
            

        }

    }
   

}