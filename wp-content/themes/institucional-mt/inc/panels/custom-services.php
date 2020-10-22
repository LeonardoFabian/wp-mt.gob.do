<?php

add_action('customize_register', 'institucionalmt_register_custom_services');


function institucionalmt_register_custom_services($wp_customize)
{

    $mytheme = 'institucionalmt';

    // Create custom panel
    $wp_customize->add_panel('services_panel', array(
        'priority' => 500,
        'theme_supports' => '',
        'title' => __('Servicios Portada', $mytheme),
        'description' => __('3 columnas que se muestran en la portada con información sobre los servicios ofrecidos por la institución.', $mytheme),

    ));


    // --- CUSTOM SERVICES SECTION ---//

    // Add sections
    $wp_customize->add_section('service_option_section', array(
        'title' => __('Ajustes Servicios Portada', $mytheme),
        'panel' => 'services_panel',
        'priority' => 501
    ));


    // add the setting for the header background
    $wp_customize->add_setting('service_option_setting');

    // add the control for the header background
    $wp_customize->add_control(
        'service_option_control',
        array(
            'label'      => 'Mostrar la sección "Servicios" en la portada?',
            'section'    => 'service_option_section',
            'settings'   => 'service_option_setting',
            'type'       => 'radio',
            'choices'    => array(
                'service-section-off'   => 'No',
                'service-section-on'  => 'Si',
            ),
            'priority' => 1
        )
    );


    /************************* Service 1 ************************/

    // Service 1 section
    $wp_customize->add_section('service_one_section', array(
        'title' => __('Servicio #1', $mytheme),
        'panel' => 'services_panel',
        'priority' => 502
    ));

    // Add image
    $wp_customize->add_setting('service_one_img_setting', array(
        'transport'         => 'refresh',
        'height'         => 325,
    ));

    // Add Controls
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'service_one_img_control', array(
        'label'             => __('Imagen servicio #1', 'institucionalmt'),
        'section'           => 'service_one_section',
        'settings'          => 'service_one_img_setting',
    )));


    

    // --- CONTACT SECTION ---//
/*

    // Add sections
    $wp_customize->add_section('custom_contact_section', array(
        'title' => __('Información de contacto', $mytheme),
        'panel' => 'brand_info_panel',
        'priority' => 202
    ));

    // brand street type
    $wp_customize->add_setting('custom_brand_street_type');

    $wp_customize->add_control('custom_brand_street_type', array(
        'label'      => 'Calle / Avenida Organismo',
        'description' => 'Seleccionar si el organismo se encuentra en una calle o avenida',
        'section'    => 'custom_contact_section',
        'settings'   => 'custom_brand_street_type',
        'type'       => 'select',
        'choices'    => array(
            ''  =>  '-- Seleccione una opción --',
            'C/'   => 'Calle',
            'Ave'  => 'Avenida',
        ),
        'priority' => 1,
    ));

    // brand street
    $wp_customize->add_setting('custom_brand_street', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_brand_street',
        array(
            'label'    => __('Calle / Avenida', $mytheme),
            'description' => 'Colocar la calle o avenida donde reside el organismo',
            'section'  => 'custom_contact_section',
            'type'     => 'text',
            'priority' => 2,
        )
    ));

    // brand location number
    $wp_customize->add_setting('custom_brand_location_number', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_brand_location_number',
        array(
            'label'    => __('Número localidad', $mytheme),
            'description' => 'Colocar el número de la localidad donde reside el organismo',
            'section'  => 'custom_contact_section',
            'type'     => 'text',
            'priority' => 3,
        )
    ));

    // brand location reference
    $wp_customize->add_setting('custom_brand_location_reference', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_brand_location_reference',
        array(
            'label'    => __('Paraje o Sector', $mytheme),
            'description' => 'Colocar el paraje o sector donde reside el organismo',
            'section'  => 'custom_contact_section',
            'type'     => 'text',
            'priority' => 4,
        )
    ));


    // brand location municipio
    $wp_customize->add_setting('custom_brand_location_municipio', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_brand_location_municipio',
        array(
            'label'    => __('Municipio localidad', $mytheme),
            'description' => 'Colocar el municipio donde reside el organismo',
            'section'  => 'custom_contact_section',
            'type'     => 'text',
            'priority' => 5,
        )
    ));

    // brand location provincia
    $wp_customize->add_setting('custom_brand_location_state', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_brand_location_state',
        array(
            'label'    => __('Provincia localidad', $mytheme),
            'description' => 'Colocar la provincia donde reside el organismo',
            'section'  => 'custom_contact_section',
            'type'     => 'text',
            'priority' => 6,
        )
    ));


    // brand location country
    $wp_customize->add_setting('custom_brand_location_country', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_brand_location_country',
        array(
            'label'    => __('País localidad', $mytheme),
            'description' => 'Colocar el país donde reside el organismo',
            'section'  => 'custom_contact_section',
            'type'     => 'text',
            'priority' => 7,
        )
    ));

    // brand location phone
    $wp_customize->add_setting('custom_brand_contact_phone', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_brand_contact_phone',
        array(
            'label'    => __('Teléfono del organismo', $mytheme),
            'description' => 'Colocar el teléfono del organismo',
            'section'  => 'custom_contact_section',
            'type'     => 'text',
            'priority' => 8,
        )
    ));

    // brand location email
    $wp_customize->add_setting('custom_brand_contact_email', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_brand_contact_email',
        array(
            'label'    => __('Correo del organismo', $mytheme),
            'description' => 'Colocar el correo del organismo',
            'section'  => 'custom_contact_section',
            'type'     => 'text',
            'priority' => 9,
        )
    ));


    // brand fax
    $wp_customize->add_setting('custom_brand_contact_fax', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_brand_contact_fax',
        array(
            'label'    => __('Fax del organismo', $mytheme),
            'description' => 'Colocar el fax del organismo',
            'section'  => 'custom_contact_section',
            'type'     => 'text',
            'priority' => 10,
        )
    ));

    // brand latitude
    $wp_customize->add_setting('custom_brand_location_latitude', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_brand_location_latitude',
        array(
            'label'    => __('Latitud', $mytheme),
            'description' => 'Latitud de ubicación del organismo',
            'section'  => 'custom_contact_section',
            'type'     => 'text',
            'priority' => 11,
        )
    ));

    // brand longitude
    $wp_customize->add_setting('custom_brand_location_longitude', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_brand_location_longitude',
        array(
            'label'    => __('Longitud', $mytheme),
            'description' => 'Longitud de ubicación del organismo',
            'section'  => 'custom_contact_section',
            'type'     => 'text',
            'priority' => 12,
        )
    ));



    // --- BASIC INFO SECTION ---//


    // Add sections
    $wp_customize->add_section('custom_basic_info_section', array(
        'title' => __('Información básica del organismo', $mytheme),
        'panel' => 'brand_info_panel',
        'priority' => 203
    ));

    // brand legal base
    $wp_customize->add_setting('custom_brand_legal_base');

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_brand_legal_base',
        array(
            'label'      => 'Organismo creado por',
            'section'    => 'custom_basic_info_section',
            'settings'   => 'custom_brand_legal_base',
            'type'       => 'radio',
            'choices'    => array(
                'Ley'   => 'Ley',
                'Decreto'  => 'Decreto',
            ),
            'priority' => 1,
        )
    ));

    // law/order number (text)
    $wp_customize->add_setting('custom_brand_law_order_number', array(
        "default" => '0000-00',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_brand_law_order_number',
        array(
            'label'    => __('Ley / Decreto No.:', $mytheme),
            'section'  => 'custom_basic_info_section',
            'type'     => 'text',
            'priority' => 2,
        )
    ));

    // foundation date (date)
    $wp_customize->add_setting("custom_brand_foundation_date", array(
        "capability" => 'edit_theme_options',
        "sanitize_callback" => "institucionalmt_sanitize_foundation_date",
    ));
    $wp_customize->add_control('custom_brand_foundation_date', array( // setting id
        'label'    => __('Organismo fundado el'),
        'description' => 'Fecha de fundación del organismo',
        'section'  => 'custom_basic_info_section', // section id
        'type'     => 'date',
        'priority' => 3,
    ));

    function institucionalmt_sanitize_foundation_date($input)
    {
        $date = new DateTime($input);
        return $date->format('d-m-Y');
    }

    // brand release president (text)
    $wp_customize->add_setting('custom_brand_release_president', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_brand_release_president',
        array(
            'label'    => __('Fundado en la gestión del Presidente:', $mytheme),
            'section'  => 'custom_basic_info_section',
            'type'     => 'text',
            'priority' => 4,
        )
    ));


    /* --- ANALITYCS SECTION --- */
/*
    // Add sections
    $wp_customize->add_section('custom_site_analitycs_section', array(
        'title' => __('Analítica', $mytheme),
        'panel' => 'brand_info_panel',
        'priority' => 204
    ));

    // brand release president (text)
    $wp_customize->add_setting('custom_site_analitycs', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_site_analitycs',
        array(
            'label'    => __('Código UA de Google Analytics:', $mytheme),
            'section'  => 'custom_site_analitycs_section',
            'type'     => 'text',
            'priority' => 1,
        )
    ));

    */
}
