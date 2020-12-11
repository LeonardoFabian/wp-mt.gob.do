<?php

add_action('customize_register', '_themename_register_custom_header');


function _themename_register_custom_header($wp_customize)
{    

    // CUSTOM HEADER PANEL
    $wp_customize->add_panel('custom_header_panel', array(
        'priority' => 400,
        'theme_supports' => '',
        'title' => __('Cabecera personalizada', '_themename'),
        'description' => __('Cabecera personalizada (logo, color de fondo)', '_themename'),

    ));

    // --- MAIN LOGO SECTION ---//

    // Add sections
    $wp_customize->add_section('custom_main_logo_section', array(
        'title' => __('Logotipo', '_themename'),
        'panel' => 'custom_header_panel',
        'priority' => 401
    ));

    $imageLocation = 'admin/image/logo.svg';

    //$headerMod = get_theme_mod('header-background');    

    $wp_customize->add_setting('custom_main_logo', array(
        'default' => get_theme_file_uri($imageLocation), // Add Default Image URL 
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_main_logo', array(
        'label'    => __('Logotipo', '_themename'),
        'description' => 'Logotipo personalizado (390px x 200px) | SVG, PNG, JPEG',
        'section'  => 'custom_main_logo_section', // section id
        'settings' => 'custom_main_logo',
        'priority' => 1,
        'button_labels' => array( // All These labels are optional
            'select' => 'Seleccionar Logo',
            'remove' => 'Quitar Logo',
            'change' => 'Cambiar Logo',
        )
    )));

    // --- SECOND LOGO FOR DARK BACKGROUNDS SECTION ---//

    // Add sections
    $wp_customize->add_section('custom_second_logo_section', array(
        'title' => __('Logotipo (fondo oscuro)', '_themename'),
        'panel' => 'custom_header_panel',
        'priority' => 402
    ));

    $imageLocation = 'admin/image/logo-white.svg';

    //$headerMod = get_theme_mod('header-background');    

    $wp_customize->add_setting('custom_second_logo', array(
        'default' => get_theme_file_uri($imageLocation), // Add Default Image URL 
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_second_logo', array(
        'label'    => __('Logotipo (fondo oscuro)', '_themename'),
        'description' => 'Logotipo personalizado, recomendado para cabeceras con color de fondo oscuro (390px x 200px) | SVG, PNG, JPEG',
        'section'  => 'custom_second_logo_section', // section id
        'settings' => 'custom_second_logo',
        'priority' => 1,
        'button_labels' => array( // All These labels are optional
            'select' => 'Seleccionar Logo',
            'remove' => 'Quitar Logo',
            'change' => 'Cambiar Logo',
        )
    )));


}
