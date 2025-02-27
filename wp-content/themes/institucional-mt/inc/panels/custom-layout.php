<?php


// Load custom layout
require get_template_directory() . '/inc/panels/custom-styles.php';

add_action('customize_register', '_themename_register_custom_layout');


if( !function_exists( '_themename_register_custom_layout' ) ){
    function _themename_register_custom_layout($wp_customize)
{
   
    $panel = 'layout_panel';

    // Create custom panel
    $wp_customize->add_panel($panel, array(
        'priority' => 300,
        'theme_supports' => '',
        'title' => __('Opciones de diseño', '_themename'),
        'description' => __('Especifique el diseño de las  paginas, esquema de colores y fondo', '_themename'),

    ));

    // --- COLORS SECTION ---//

    // add the section to contain the settings
    $wp_customize->add_section('colors_section', array(
        'title' =>  __('Colores', '_themename'),
        'panel' => $panel,
        'priority' => 301
    ));

    // main color ( site title, h1, h2, h4. h6, widget headings, nav links, footer headings )
    $colors[] = array(
        'slug' => 'primary_color',
        'default' => '#003876',
        'label' => 'Primario'
    );

    // secondary color ( site description, sidebar headings, h3, h5, nav links on hover )
    $colors[] = array(
        'slug' => 'secondary_color',
        'default' => '#EE2A24',
        'label' => 'Secundario'
    );

    // accent color (btn:hover)
    $colors[] = array(
        'slug' => 'accent_color',
        'default' => '#EE2A24',
        'label' => 'Acentuado'
    );

    // link color
    $colors[] = array(
        'slug' => 'link_color',
        'default' => '#1663a7',
        'label' => 'Enlaces'
    );

    // link color ( hover, active )
    $colors[] = array(
        'slug' => 'hover_link_color',
        'default' => '#4491cc',
        'label' => 'Enlaces (on hover)'
    );

    // light color
    $colors[] = array(
        'slug' => 'light_color',
        'default' => '#ffffff',
        'label' => 'Claro'
    );

    // dark color
    $colors[] = array(
        'slug' => 'dark_color',
        'default' => '#343a40',
        'label' => 'Oscuro'
    );

    // add the settings and controls for each color
    foreach ($colors as $color) {

        // SETTINGS
        $wp_customize->add_setting(
            $color['slug'],
            array(
                'default' => $color['default'],
                'type' => 'option',
                'capability' => 'edit_theme_options'
            )
        );
        // CONTROLS
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                $color['slug'],
                array(
                    'label' => $color['label'],
                    'section' => 'colors_section',
                    'settings' => $color['slug']
                )
            )
        );
    }

    // --- BACKGROUNDS SECTION ---//

    // add the section to contain the settings
    $wp_customize->add_section('backgrounds_section', array(
        'title' =>  __('Ajustes de fondo', '_themename'),
        'panel' => $panel,
        'priority' => 302
    ));

    // backgrounds
    $backgrounds[] = array(
        'slug' => 'header-background',
        'label' => 'Cabecera',
        'color' => 'Primario'
    );

    $backgrounds[] = array(
        'slug' => 'menu-background',
        'label' => 'Menú',
        'color' => 'Primario'
    );

    $backgrounds[] = array(
        'slug' => 'title-bar-background',
        'label' => 'Barra de título',
        'color' => 'Primario'
    );

    $backgrounds[] = array(
        'slug' => 'carousel-caption-background',
        'label' => 'Caja de texto (carousel)',
        'color' => 'Primario'
    );

    $backgrounds[] = array(
        'slug' => 'first-footer-background',
        'label' => 'Primer pie de página',
        'color' => 'Oscuro (con iluminación)'
    );

    $backgrounds[] = array(
        'slug' => 'second-footer-background',
        'label' => 'Segundo pie de página',
        'color' => 'Oscuro'
    );


    foreach ($backgrounds as $background) {
        // add the setting for the header background
        $wp_customize->add_setting($background['slug']);

        // add the control for the header background
        $wp_customize->add_control(
            $background['slug'],
            array(
                'label'      => 'Aplicar color "' . $background['color'] . '" en [' . $background['label'] . ']?',
                'section'    => 'backgrounds_section',
                'settings'   => $background['slug'],
                'type'       => 'radio',
                'choices'    => array(
                    $background['slug'] . '-off'   => 'No',
                    $background['slug'] . '-on'  => 'Si',
                )
            )
        );
    }

    // --- LAYOUT SECTIONS ---//

    // add the section to contain the settings
    $wp_customize->add_section('instmt_layout_sections', array(
        'title' =>  __('Ajustes del Diseño', '_themename'),
        'panel' => $panel,
        'priority' => 303
    ));

    $wp_customize->add_setting('instmt-top-section-settings');

        // add the control for the top section
        $wp_customize->add_control(
            'instmt-top-section-control',
            array(
                'label'      => __('Mostrar la barra superior?', '_themename' ),
                'section'    => 'instmt_layout_sections',
                'settings'   => 'instmt-top-section-settings',
                'type'       => 'radio',
                'choices'    => array(
                    'instmt-top-section' . '-off'   => 'No',
                    'instmt-top-section' . '-on'  => 'Si',
                )
            )
        );

        $wp_customize->add_setting('instmt-front-page-portfolio-section-settings');

        // add the control for the Front Page Portfolio section
        $wp_customize->add_control(
            'instmt-front-page-portfolio-section-control',
            array(
                'label'      => __('Mostrar la sección "Portafolio" en la página principal?', '_themename' ),
                'section'    => 'instmt_layout_sections',
                'settings'   => 'instmt-front-page-portfolio-section-settings',
                'type'       => 'radio',
                'choices'    => array(
                    'instmt-front-page-portfolio-section' . '-off'   => 'No',
                    'instmt-front-page-portfolio-section' . '-on'  => 'Si',
                )
            )
        );
}
}


// ADD SOLID BACKGROUND TO BODY ELEMENTS

/*******************************************************************************
 add class to body if backgrounds turned on using the body_class filter
 ********************************************************************************/
if( !function_exists( 'institucioanlmt_add_body_class' ) ){
    function institucioanlmt_add_body_class($classes)
{

    // set the header background
    $header_background = get_theme_mod('header-background');
    $classes[] = $header_background;

    // set the footer background
    $menu_background = get_theme_mod('menu-background');
    $classes[] = $menu_background;

    // set the title bar background
    $title_bar_background = get_theme_mod('title-bar-background');
    $classes[] = $title_bar_background;

    // set the carousel caption background
    $carousel_caption_background = get_theme_mod('carousel-caption-background');
    $classes[] = $carousel_caption_background;

    // set the first footer background
    $first_footer_background = get_theme_mod('first-footer-background');
    $classes[] = $first_footer_background;

    // set the second footer background
    $second_footer_background = get_theme_mod('second-footer-background');
    $classes[] = $second_footer_background;

    // set the contact map width
    $map_width = get_theme_mod('custom_map_width_setting');
    $classes[] = $map_width;

    $top_section = get_theme_mod('instmt-top-section-settings');
    $classes[] = $top_section;

    $front_page_portfolio_section = get_theme_mod('instmt-front-page-portfolio-section-settings');
    $classes[] = $front_page_portfolio_section;

    return $classes;
}
}

add_filter('body_class', 'institucioanlmt_add_body_class');



