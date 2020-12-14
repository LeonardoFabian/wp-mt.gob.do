<aside role="complementary">

    <div id="sidebar" style="padding:0px 0px 30px 30px;">

        <?php

        if (is_home()) {
            // Código para la página de Inicio
        } else {
            // another code
        }

        if (is_page()) {
            // plugin _themename-cpt/public/class-instmt-public.php
            do_action('instmt_sidebar_menu');
        } else {
            // another code
        }

        if (is_page('433')) {
            // Código para las páginas
            if (is_active_sidebar('service-right-widget-area')) {

                dynamic_sidebar('service-right-widget-area');

            } else {
                // another code
            }
        }


        // Sidebar: Quienes somos, Historia, Organigrama, Direcciones y Dependencias, Representaciones Locales
        if (is_page_template('templates/about.php')) {
            // Código para las páginas About Us        
            // include('sidebar-about.php');

            if (is_active_sidebar('about-us-right-sidebar')) {

                dynamic_sidebar('about-us-right-sidebar');

            } else {
                // another code
            }

            if (is_active_sidebar('banners-pages-sidebar')) {

                dynamic_sidebar('banners-pages-sidebar');

            } else {
                // another code
            }
        }

        if (is_single()) {

            // Código para los detalles de las entradas            

            dynamic_sidebar('post-right-widget-area');

                // plugin _themename-cpt/public/class-instmt-public.php
            do_action('instmt_latest_post_per_category_collection');           

            dynamic_sidebar('banners-post-sidebar');
            
        }

        if (is_category('servicios')) {

            // Código para los detalles de las categorias
            if (is_active_sidebar('service-right-widget-area')) {

                dynamic_sidebar('service-right-widget-area');

            } else {
                // another code
            }
        }

        if (is_page_template('contacto')) {
            // Código si tenemos una plantilla de página "contacto"       

        }

        ?>

    </div>

</aside>