<?php

if (!function_exists('institucionalmt_add_services_menu')) {

    add_action('admin_menu', 'institucionalmt_add_services_menu');

    function institucionalmt_add_services_menu()
    {

        add_menu_page(
            'Servicios Ministerio de Trabajo',
            'Servicios',
            'manage_options',
            'institucionalmt-servicios',
            'institucionalmt_add_services_menu_html',
            get_theme_file_uri('admin/image/domo.svg'),
            21
        );

        add_submenu_page(
            'institucionalmt-servicios', // parent slug
            'Servicios Empleador', // page title
            'Servicios Empleador', // menu title 
            'manage_options', // capability 
            'submenu-servicios-empleador', // slug 
            'institucionalmt_add_services_submenu_html'
        );

        // add another menu page
    }

    if (!function_exists('institucionalmt_add_services_menu_html')) {

        function institucionalmt_add_services_menu_html()
        {
            // view
            if (current_user_can('manage_options')) {

                $nonce = wp_create_nonce('bradhelyn');                

            ?>
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
                        <button type="submit">Eliminar</button>
                    </form>
                </div>
<?php

            }
            // end view
        }
    }

    if (!function_exists('institucionalmt_add_services_submenu_html')) {

        function institucionalmt_add_services_submenu_html()
        {
            // view
            if (current_user_can('manage_options')) {

                $nonce = wp_create_nonce('bradhelyn');                

            ?>
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
                        <button type="submit">Eliminar</button>
                    </form>
                </div>
<?php

            }
            // end view
        }
    }
}
?>