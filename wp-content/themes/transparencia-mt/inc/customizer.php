<?php

// CUSTOM -> COLOR PALETTE
function InstitucionalMT_customize_register($wp_customize)
{
    /*******************************************
    Sections
     ********************************************/
/*
    $wp_customize->add_section('logo-options', array(
        'title' => 'Logo',
        'priority' => 5
    ));
*/
    $wp_customize->add_section('site-info-section', array(
        'title' => 'Datos de organización',
        'priority' => 6
    ));

    // add the section to contain the settings
    /*
    $wp_customize->add_section('textcolors', array(
        'title' =>  'Esquema de colores',
    ));
*/
    // add the section to contain the settings
    /*
    $wp_customize->add_section('background', array(
        'title' =>  'Colores de fondo',
    ));
*/
    $wp_customize->add_section('footer-options', array(
        'title' => 'Pie de página',
    ));


    // main color ( site title, h1, h2, h4. h6, widget headings, nav links, footer headings )
/*
    $txtcolors[] = array(
        'slug' => 'primary_color',
        'default' => '#003876',
        'label' => 'Primario'
    );

    // secondary color ( site description, sidebar headings, h3, h5, nav links on hover )
    $txtcolors[] = array(
        'slug' => 'secondary_color',
        'default' => '#EE2A24',
        'label' => 'Secundario'
    );

    // link color
    $txtcolors[] = array(
        'slug' => 'link_color',
        'default' => '#1663a7',
        'label' => 'Enlaces'
    );

    // link color ( hover, active )
    $txtcolors[] = array(
        'slug' => 'hover_link_color',
        'default' => '#4491cc',
        'label' => 'Enlaces (on hover)'
    );

    // light color
    $txtcolors[] = array(
        'slug' => 'light_color',
        'default' => '#ffffff',
        'label' => 'Claro'
    );

    // dark color
    $txtcolors[] = array(
        'slug' => 'dark_color',
        'default' => '#343a40',
        'label' => 'Oscuro'
    );
*/

    // add the settings and controls for each color
    /*
    foreach ($txtcolors as $txtcolor) {

        // SETTINGS
        $wp_customize->add_setting(
            $txtcolor['slug'],
            array(
                'default' => $txtcolor['default'],
                'type' => 'option',
                'capability' =>
                'edit_theme_options'
            )
        );
        // CONTROLS
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                $txtcolor['slug'],
                array(
                    'label' => $txtcolor['label'],
                    'section' => 'textcolors',
                    'settings' => $txtcolor['slug']
                )
            )
        );
    }
*/

    /**************************************
    Solid background colors
     ***************************************/

/*
    // add the setting for the header background
    $wp_customize->add_setting('header-background');

    // add the control for the header background
    $wp_customize->add_control('header-background', array(
        'label'      => 'Aplicar color "Primario" a la cabecera?',
        'section'    => 'background',
        'settings'   => 'header-background',
        'type'       => 'radio',
        'choices'    => array(
            'header-background-off'   => 'No',
            'header-background-on'  => 'Si',
        )
    ));

    // add the setting for the menu background
    $wp_customize->add_setting('menu-background');

    // add the control for the header background
    $wp_customize->add_control('menu-background', array(
        'label'      => 'Aplicar color "Primario" al menu?',
        'section'    => 'background',
        'settings'   => 'menu-background',
        'type'       => 'radio',
        'choices'    => array(
            'menu-background-off'   => 'No',
            'menu-background-on'  => 'Si',
        )
    ));

    // add the setting for the footer background
    $wp_customize->add_setting('footer-background');

    // add the control for the footer background
    $wp_customize->add_control('footer-background', array(
        'label'      => 'Aplicar color "Oscuro" al pie de página?',
        'section'    => 'background',
        'settings'   => 'footer-background',
        'type'       => 'radio',
        'choices'    => array(
            'footer-background-off'   => 'No',
            'footer-background-on'  => 'Si',
        )
    ));
*/


    /* Add footer logo */
    $wp_customize->add_setting('footer_logo', array(
        'default' => get_theme_file_uri('admin/image/logo-footer.svg'), // Add Default Image URL 
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
        'label' => 'Logo footer (max-width: 390px)',
        'priority' => 1,
        'section' => 'footer-options',
        'settings' => 'footer_logo',
        'button_labels' => array( // All These labels are optional
            'select' => 'Seleccionar Logo',
            'remove' => 'Quitar Logo',
            'change' => 'Cambiar Logo',
        )
    )));

    // Add copyright text in the footer
    $wp_customize->add_setting("footer_copyright", array(
        "default" => '&copy 2020 ' .  get_bloginfo('name')  . ' | Todos los Derechos Reservados.',
        "transport" => "postMessage",
    ));
    $wp_customize->add_control('footer_copyright', array( // setting id
        'label'    => __('Copyright', 'copyright'),
        'section'  => 'footer-options', // section id
        'type'     => 'text',
        'priority' => 2,
    ));

    // Add Sello NORTIC Web
    $wp_customize->add_setting("footer_nortic", array(
        "default" => '',
        "transport" => "postMessage",
    ));
    $wp_customize->add_control('footer_nortic', array( // setting id
        'label'    => __('Sello NORTIC', 'nortic'),
        'section'  => 'footer-options', // section id
        'type'     => 'textarea',
        'priority' => 3,
    ));

    // Add Sello NORTIC Mobile
    $wp_customize->add_setting("footer_nortic_mobile", array(
        "default" => '',
        "transport" => "postMessage",
    ));
    $wp_customize->add_control('footer_nortic_mobile', array( // setting id
        'label'    => __('Sello NORTIC (Móvil)', 'nortic_movil'),
        'section'  => 'footer-options', // section id
        'type'     => 'textarea',
        'priority' => 4,
    ));    

}

add_action('customize_register', 'InstitucionalMT_customize_register');



// CUSTOMIZE LOGO
function InstitucionalMT_customizer_logo($wp_customize)
{
/*
    $imageLocation = '';

    $headerMod = get_theme_mod('header-background');

    if ($headerMod == 'header-background-on') {
        $imageLocation = 'admin/image/logo-white.svg';
    } else {
        $imageLocation = 'admin/image/logo.svg';
    }

    $wp_customize->add_setting('site_logo', array(
        'default' => get_theme_file_uri($imageLocation), // Add Default Image URL 
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'InstitucionalMT', array(
        'label' => 'Subir una imagen',
        'priority' => 20,
        'section' => 'logo-options',
        'settings' => 'site_logo',
        'button_labels' => array( // All These labels are optional
            'select' => 'Seleccionar Logo',
            'remove' => 'Quitar Logo',
            'change' => 'Cambiar Logo',
        )
    )));
    */
}

add_action('customize_register', 'InstitucionalMT_customizer_logo');











/************************* Custom Files ************************/

/**
 * Load all our Customizer Custom Controls
 */
require_once trailingslashit( dirname(__FILE__)) . 'custom-controls.php';

// Theme panels
require get_template_directory() . '/inc/panels/panels.php';

// Theme Widgets
require get_template_directory() . '/inc/widgets/widgets.php';

// Theme Widgets positions
require get_template_directory() . '/inc/widgets/widgets-positions.php';
