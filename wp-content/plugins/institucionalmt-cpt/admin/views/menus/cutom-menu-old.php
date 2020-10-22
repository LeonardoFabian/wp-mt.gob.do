<?php

/**
 * CREATE MENU PAGES
 */
/*

if (!function_exists('institucionalmt_add_new_menu_page')) {

    add_action('admin_menu', 'institucionalmt_add_new_menu_page');

    function institucionalmt_add_new_menu_page()
    {

        if(did_action('admin_menu') !== 1){
            return;
        }

        // MENU PAGES
        
        $institucionalmt_menus = [];
        $institucionalmt_submenus = [];
        
        $institucionalmt_menus[] = [
            'page_title' => 'Servicios Ministerio de Trabajo', // page title
            'menu_title' => 'Servicios', // menu title
            'capability' => 'manage_options', // capability
            'menu_slug' => plugin_dir_path(__FILE__) . 'admin/views/servicios/servicios.php', // slug or page
            'function' => null,   // : callable
            'icon_url' => plugin_dir_url(__FILE__) . 'admin/image/domo.svg', // icon 20px x 20px
            'position' => 21 // position : int
        ];

        $institucionalmt_submenus[] = [
            'parent_slug' => plugin_dir_path(__FILE__) . 'admin/views/servicios/servicios.php', // parent slug
            'page_title' => 'Añadir nuevo servicio', // page title
            'menu_title' => 'Añadir nuevo', // menu title
            'capability' => 'manage_options', // capability
            'menu_slug' => plugin_dir_path(__FILE__) . 'admin/views/servicios/nuevo-servicio.php', // slug or page
            'function' => null   // : callable           
        ];

        $institucionalmt_menus[] = [
            'page_title' => 'Representaciones Locales de Trabajo', // page title
            'menu_title' => 'RLT`s', // menu title
            'capability' => 'manage_options', // capability
            'menu_slug' => plugin_dir_path(__FILE__) . 'admin/views/rlt.php', // slug or page
            'function' => null,   // : callable
            'icon_url' => plugin_dir_url(__FILE__) . 'admin/image/domo.svg', // icon 20px x 20px
            'position' => 22 // position : int
        ];

        $institucionalmt_menus[] = [
            'page_title' => 'Oficinas Territoriales de Empleo', // page title
            'menu_title' => 'OTE`s', // menu title
            'capability' => 'manage_options', // capability
            'menu_slug' => plugin_dir_path(__FILE__) . 'admin/views/ote.php', // slug or page
            'function' => null,   // : callable
            'icon_url' => plugin_dir_url(__FILE__) . 'admin/image/domo.svg', // icon 20px x 20px
            'position' => 23 // position : int
        ];

        // ADD MENUS
        institucionalmt_add_menu_page($institucionalmt_menus);
        institucionalmt_add_submenu_page($institucionalmt_submenus);

        // REMOVE MENU
        // $menu_slug = '';
        // institucionalmt_remove_menu_page($menu_slug);



        
    }







    /*

    if (!function_exists('institucionalmt_add_services_menu_html')) {

        function institucionalmt_add_services_menu_html()
        {
?>

            <?php if (current_user_can('manage_options')) : ?>

                <?php $nonce = wp_create_nonce('bradhelyn');  ?>
                <div class="wrap">
                    <h1 class="wp-heading-inline"><?php echo get_admin_page_title(); ?></h1>
                    <span class="split-page-title-action">
                        <a href="">Añadir nuevo servicio</a>
                        <span class="expander" tabindex="0" role="button" aria-haspopup="true" aria-label="Menú agregar nuevo servicio"></span>
                        <span class="dropdown"></span>
                    </span>
                    <span class="page-title-action" style="display:none;"></span>
                    <hr class="wp-header-end">

                    <form action="" method="post">
                        <input name="nonce" type="hidden" value="<?php echo $nonce; ?>">
                        <input name="delete-service" type="hidden" value="delete-service">
                        <?php submit_button('Registrar Servicio'); ?>
                    </form>
                </div>
            <?php else : ?>
                <div class="alert alert-danger" role="alert">
                    Su usuario no tiene permisos para acceder a esta sección, favor comunicarse con el administrador.
                </div>
            <?php endif; ?>
<?php
        }
    }




*/




    /*
    if (!function_exists('institucionalmt_add_services_submenu_html')) {

        function institucionalmt_add_services_submenu_html()
        {
            ?>

            <?php if (current_user_can('manage_options')) : ?>

                <?php $nonce = wp_create_nonce('bradhelyn');  ?>
                <div class="wrap">
                    <h1 class="wp-heading-inline"><?php echo get_admin_page_title(); ?></h1>
                    <span class="split-page-title-action">
                        <a href="">Añadir nuevo servicio</a>
                        <span class="expander" tabindex="0" role="button" aria-haspopup="true" aria-label="Menú agregar nuevo servicio"></span>
                        <span class="dropdown"></span>
                    </span>
                    <span class="page-title-action" style="display:none;"></span>
                    <hr class="wp-header-end">

                    <form action="" method="post">
                        <input name="nonce" type="hidden" value="<?php echo $nonce; ?>">
                        <input name="delete-service" type="hidden" value="delete-service">
                        <?php submit_button('Registrar Servicio'); ?>
                    </form>
                </div>
            <?php else : ?>
                <div class="alert alert-danger" role="alert">
                    Su usuario no tiene permisos para acceder a esta sección, favor comunicarse con el administrador.
                </div>
            <?php endif; ?>
<?php
        }
        // end view
    }
    
}
*/

/*
        add_menu_page(
            'Servicios Ministerio de Trabajo', // page title
            'Servicios', // menu title
            'manage_options', // capability
            plugin_dir_path(__FILE__) . 'views/services.php', // slug or page
            null,   // callable
            plugin_dir_url(__FILE__) . 'admin/image/domo.svg', // icon 20px x 20px
            21 // position
        );
*/
        /*
        add_submenu_page(
            'institucionalmt-servicios', // parent slug
            'Servicios Empleador', // page title
            'Servicios Empleador', // menu title 
            'manage_options', // capability 
            'submenu-servicios-empleador', // slug 
            'institucionalmt_add_services_submenu_html'
        );
        */

        // add another menu page