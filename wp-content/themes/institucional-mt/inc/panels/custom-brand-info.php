<?php

add_action('customize_register', '_themename_register_custom_brand_info');


function _themename_register_custom_brand_info($wp_customize)
{

    // Create custom panel
    $wp_customize->add_panel('brand_info_panel', array(
        'priority' => 200,
        'theme_supports' => '',
        'title' => apply_filters('_themename_company_data', __('Datos de la organización', '_themename') ),
        'description' => apply_filters( '_themename_company_info', __('Información del organismo', '_themename') ),

    ));

    
    // --- site release section ---//

    // Add sections
    $wp_customize->add_section( 'custom_site_release', array(
        'title' => apply_filters( '_themename_website_release_info', __( 'Lanzamiento del portal institucional', '_themename' ) ),
        'panel' => 'brand_info_panel',
        'priority' => 201
    ));

    // site release date 
    $wp_customize->add_setting( 'custom_site_release_date', array(
        "capability" => 'edit_theme_options',
        "sanitize_callback" => "_themename_sanitize_release_date",
    ));
    $wp_customize->add_control( 'custom_site_release_date', array( // setting id
        'label'    => apply_filters( '_themename_website_release_date_label', __( 'Lanzamiento del Portal Institucional', '_themename' ) ),
        'description' => apply_filters('_themename_website_release_date_meta', __('Especifique el día, mes y año en que fue lanzado este portal', '_themename' ) ),
        'section'  => 'custom_site_release', // section id
        'type'     => 'date',
        'priority' => 1,
    ));   

    if( !function_exists( '_themename_sanitize_release_date' ) ){
        function _themename_sanitize_release_date($input)
        {
            $date = new DateTime($input);
            return $date->format('d-m-Y');
        }
    }
    

    // --- CONTACT SECTION ---//


    // Add sections
    $wp_customize->add_section( 'custom_contact_section', array(
        'title' => apply_filters( '_themename_contact_info_section', __( 'Información de contacto', '_themename') ),
        'panel' => 'brand_info_panel',
        'priority' => 202
    ));

    // brand street type
    $wp_customize->add_setting('custom_brand_street_type');

    $wp_customize->add_control( 'custom_brand_street_type', array(
        'label'      => apply_filters( '_themename_company_street_type_label', __('Calle / Avenida Organismo', '_themename' ) ),
        'description' => apply_filters( '_themename_company_street_type_control_description', __('Seleccionar si el organismo se encuentra en una calle o avenida', '_themename') ),
        'section'    => 'custom_contact_section',
        'settings'   => 'custom_brand_street_type',
        'type'       => 'select',
        'choices'    => array(
            ''  =>  apply_filters( '_themename_company_street_option_placeholder', __('Seleccione una opción', '_themename') ),
            'C/'   => apply_filters( '_themename_company_street_first_option', __('Calle', '_themename') ),
            'Ave'  => apply_filters( '_themename_company_street_second_option', __('Avenida', '_themename') ),
        ),
        'priority' => 1,
    ));

    // brand street
    $wp_customize->add_setting( 'custom_brand_street', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_brand_street',
        array(
            'label'    => apply_filters( '_themename_company_street_name_label', __( 'Calle / Avenida', '_themename' ) ),
            'description' => apply_filters( '_themename_company_street_meta', __('Colocar la calle o avenida donde reside el organismo', '_themename') ),
            'section'  => 'custom_contact_section', 
            'type'     => 'text',
            'priority' => 2,
        )
    ));

    // brand location number
    $wp_customize->add_setting( 'custom_brand_location_number', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_brand_location_number',
        array(
            'label'    => apply_filters( '_themename_company_address_number_label', __( 'Número localidad', '_themename' ) ),
            'description' => apply_filters( '_themename_company_address_meta', __('Colocar el número de la localidad donde reside el organismo'. '_themename') ),
            'section'  => 'custom_contact_section', 
            'type'     => 'text',
            'priority' => 3,
        )
    ));

    // brand location reference
    $wp_customize->add_setting( 'custom_brand_location_reference', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_brand_location_reference',
        array(
            'label'    => __( 'Paraje o Sector', '_themename' ),
            'description' => 'Colocar el paraje o sector donde reside el organismo',
            'section'  => 'custom_contact_section', 
            'type'     => 'text',
            'priority' => 4,
        )
    ));


    // brand location municipio
    $wp_customize->add_setting( 'custom_brand_location_municipio', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_brand_location_municipio',
        array(
            'label'    => __( 'Municipio localidad', '_themename' ),
            'description' => 'Colocar el municipio donde reside el organismo',
            'section'  => 'custom_contact_section', 
            'type'     => 'text',
            'priority' => 5,
        )
    ));

    // brand location provincia
    $wp_customize->add_setting( 'custom_brand_location_state', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_brand_location_state',
        array(
            'label'    => __( 'Provincia localidad', '_themename' ),
            'description' => __('Colocar la provincia donde reside el organismo', '_themename'),
            'section'  => 'custom_contact_section', 
            'type'     => 'text',
            'priority' => 6,
        )
    ));
    

    // brand location country
    $wp_customize->add_setting( 'custom_brand_location_country', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_brand_location_country',
        array(
            'label'    => __( 'País localidad', '_themename' ),
            'description' => __('Colocar el país donde reside el organismo', '_themename'),
            'section'  => 'custom_contact_section', 
            'type'     => 'text',
            'priority' => 7,
        )
    ));

    // brand location phone
    $wp_customize->add_setting( 'custom_brand_contact_phone', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_brand_contact_phone',
        array(
            'label'    => __( 'Teléfono del organismo', '_themename' ),
            'description' => __('Colocar el teléfono del organismo', '_themename'),
            'section'  => 'custom_contact_section', 
            'type'     => 'text',
            'priority' => 8,
        )
    ));

    // brand location email
    $wp_customize->add_setting( 'custom_brand_contact_email', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_brand_contact_email',
        array(
            'label'    => __( 'Correo del organismo', '_themename' ),
            'description' => 'Colocar el correo del organismo',
            'section'  => 'custom_contact_section', 
            'type'     => 'text',
            'priority' => 9,
        )
    ));
    

    // brand fax
    $wp_customize->add_setting( 'custom_brand_contact_fax', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_brand_contact_fax',
        array(
            'label'    => __( 'Fax del organismo', '_themename' ),
            'description' => 'Colocar el fax del organismo',
            'section'  => 'custom_contact_section', 
            'type'     => 'text',
            'priority' => 10,
        )
    ));

    // brand latitude
    $wp_customize->add_setting( 'custom_brand_location_latitude', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_brand_location_latitude',
        array(
            'label'    => __( 'Latitud', '_themename' ),
            'description' => __('Latitud de ubicación del organismo', '_themename'),
            'section'  => 'custom_contact_section', 
            'type'     => 'text',
            'priority' => 11,
        )
    ));

    // brand longitude
    $wp_customize->add_setting( 'custom_brand_location_longitude', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_brand_location_longitude',
        array(
            'label'    => __( 'Longitud', '_themename' ),
            'description' => 'Longitud de ubicación del organismo',
            'section'  => 'custom_contact_section', 
            'type'     => 'text',
            'priority' => 12,
        )
    ));



// --- BASIC INFO SECTION ---//


    // Add sections
    $wp_customize->add_section('custom_basic_info_section', array(
        'title' => __('Información básica del organismo', '_themename'),
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
    $wp_customize->add_setting( 'custom_brand_law_order_number', array(
        "default" => '0000-00',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_brand_law_order_number',
        array(
            'label'    => __( 'Ley / Decreto No.:', '_themename' ),
            'section'  => 'custom_basic_info_section', 
            'type'     => 'text',
            'priority' => 2,
        )
    ));

    // foundation date (date)
    $wp_customize->add_setting("custom_brand_foundation_date", array(
        "capability" => 'edit_theme_options',
        "sanitize_callback" => "_themename_sanitize_foundation_date",
    ));
    $wp_customize->add_control('custom_brand_foundation_date', array( // setting id
        'label'    => __('Organismo fundado el', '_themename'),
        'description' => 'Fecha de fundación del organismo',
        'section'  => 'custom_basic_info_section', // section id
        'type'     => 'date',
        'priority' => 3,
    ));

    function _themename_sanitize_foundation_date($input)
    {
        $date = new DateTime($input);
        return $date->format('d-m-Y');
    }

    // brand release president (text)
    $wp_customize->add_setting( 'custom_brand_release_president', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_brand_release_president',
        array(
            'label'    => __( 'Fundado en la gestión del Presidente:', '_themename' ),
            'section'  => 'custom_basic_info_section', 
            'type'     => 'text',
            'priority' => 4,
        )
    ));     


    /* --- ANALITYCS SECTION --- */

    // Add sections
    $wp_customize->add_section( 'custom_site_analitycs_section', array(
        'title' => __( 'Analítica', '_themename'),
        'panel' => 'brand_info_panel',
        'priority' => 205
    ));

    // brand release president (text)
    $wp_customize->add_setting( 'custom_site_analitycs', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_site_analitycs',
        array(
            'label'    => __( 'Código UA de Google Analytics:', '_themename' ),
            'section'  => 'custom_site_analitycs_section', 
            'type'     => 'text',
            'priority' => 1,
        )
    ));
   


}
