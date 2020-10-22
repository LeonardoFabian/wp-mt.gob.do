<?php 

// ADD NEW MENU PAGE

if( ! function_exists('institucionalmt_add_menu_page')){

    function institucionalmt_add_menu_page($institucionalmt_menus){

        if(is_array($institucionalmt_menus)){

            for ($i = 0; $i < count($institucionalmt_menus); $i++){

                add_menu_page(

                    $institucionalmt_menus[$i]['page_title'],
                    $institucionalmt_menus[$i]['menu_title'],
                    $institucionalmt_menus[$i]['capability'],
                    $institucionalmt_menus[$i]['menu_slug'],
                    $institucionalmt_menus[$i]['function'],
                    $institucionalmt_menus[$i]['icon_url'],
                    $institucionalmt_menus[$i]['position']
    
                );

            }

        }

    }

}

// REMOVE MENU PAGE 

if( ! function_exists('institucionalmt_remove_menu_page')){

    function institucionalmt_remove_menu_page($institucionalmt_menu){

        remove_menu_page($institucionalmt_menu);

    }

}

// ADD SUBMENU PAGE

if( ! function_exists('institucionalmt_add_submenu_page')){

    function institucionalmt_add_submenu_page($institucionalmt_submenus){

        if( is_array($institucionalmt_submenus)){

            for ($i = 0; $i < count($institucionalmt_submenus); $i++){

                add_submenu_page(

                    $institucionalmt_submenus[$i]['parent_slug'],
                    $institucionalmt_submenus[$i]['page_title'],
                    $institucionalmt_submenus[$i]['menu_title'],
                    $institucionalmt_submenus[$i]['capability'],
                    $institucionalmt_submenus[$i]['menu_slug'],
                    $institucionalmt_submenus[$i]['function']             
    
                );

            }

        }

    }

}
