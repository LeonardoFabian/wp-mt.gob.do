<?php 

/**
 * Registrar todos los menús y submenus del plugin
 * 
 * @link        https://misitioweb.com
 * @since       1.0.0
 * 
 * @package     InstitucionalMT-CPT
 * @subpackage  InstitucionalMT-CPT/inc
 */

/**
 * Agrega todos los menús y submenus a utilizar en el plugin
 * donde los métodos add_menu_page() y add_submenu_page()
 * tienen que ser llamados junto con el gancho
 * de acción 'admin_menu'
 * 
 * @since       1.0.0
 * @package     InstitucionalMT-CPT
 * @subpackage  InstitucionalMT-CPT/inc
 * @author      Leonardo Fabián <ramonlfabian@gmail.com>
 * 
 * @property    array   $menus
 * @property    array   $submenus
 */
class InstitucionalMT_Menu_Pages {

    /**
     * Array de menús a registrar en WordPress
     * 
     * @since       1.0.0
     * @access      protected
     * @var         array       $menus      Los menús registrados en WordPress para ejecutar cuando se llame
     */
    protected $menus;

    /**
     * Array de submenus a registrar en WordPress
     * 
     * @since       1.0.0
     * @access      protected
     * @var         array       $submenus       Los submenus registrados en WordPress para ejecutar cuando se llame.
     */
    protected $submenus;

    public function __construct(){

        $this->menus = [];
        $this->submenus = [];

    }

    public function add_menu_page( $pageTitle, $menuTitle, $capability, $menuSlug, $functionName, $iconUrl = '', $position = null ){
            
        $this->menus = $this->add_menu( $this->menus, $pageTitle, $menuTitle, $capability, $menuSlug, $functionName, $iconUrl, $position );
        
    }

    public function add_menu( $menus, $pageTitle, $menuTitle, $capability, $menuSlug, $functionName, $iconUrl, $position ){

        $menus[] = [
            'pageTitle' => $pageTitle,
            'menuTitle' => $menuTitle,

            'capability' => $capability,
            'menuSlug' => $menuSlug,
            'functionName' => $functionName,
            'iconUrl' => $iconUrl,
            'position' => $position
        ];

        return $menus;

    }

    public function add_submenu_page( $parentSlug, $pageTitle, $menuTitle, $capability, $menuSlug, $functionName ){

        $this->submenus = $this->add_submenu( $this->submenus, $parentSlug, $pageTitle, $menuTitle, $capability, $menuSlug, $functionName );

    }

    public function add_submenu( $submenus, $parentSlug, $pageTitle, $menuTitle, $capability, $menuSlug, $functionName ){

        $submenus[] = [
            'parentSlug' => $parentSlug,
            'pageTitle' => $pageTitle,
            'menuTitle' => $menuTitle,
            'capability' => $capability,
            'menuSlug' => $menuSlug,
            'functionName' => $functionName
        ];

        return $submenus;

    }

    /**
     * Registra los menús y submenus con WordPress
     * 
     * @since       1.0.0
     * @access      public
     */
    public function run(){

        foreach( $this->menus as $menus ){

            extract( $menus, EXTR_OVERWRITE );

            add_menu_page( $pageTitle, $menuTitle, $capability, $menuSlug, $functionName, $iconUrl, $position );

        }

        foreach( $this->submenus as $submenus ){

            extract( $submenus, EXTR_OVERWRITE );

            add_submenu_page( $parentSlug, $pageTitle, $menuTitle, $capability, $menuSlug, $functionName );

        }
    }


}