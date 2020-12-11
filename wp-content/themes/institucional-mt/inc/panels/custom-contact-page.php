<?php

add_action('customize_register', '_themename_register_custom_contact_page');

if( !function_exists( '_themename_register_custom_contact_page' ) ){
    function _themename_register_custom_contact_page($wp_customize)
{    

    // Create custom panel
    $wp_customize->add_panel('contact_page_panel', array(
        'priority' => 600,
        'theme_supports' => '',
        'title' => __('Ajustes de la página de contacto', '_themename'),
        'description' => __('Puedes elegir qué mostrar en la página de contacto de tu sitio. ', '_themename'),

    ));


    // --- MAP LOCATION SECTION ---//

    // Add sections
    $wp_customize->add_section('custom_map_location_section', array(
        'title' => __('Mapa', '_themename'),
        'panel' => 'contact_page_panel',
        'priority' => 601
    ));

    // map html code
    $wp_customize->add_setting('custom_html_map_code_setting', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_map_location_control',
        array(
            'label'    => __('Marcador', '_themename'),
            'description' => __('Copia y pega aquí el Código HTML del marcador del mapa', '_themename'),
            'section'  => 'custom_map_location_section',
            'settings'   => 'custom_html_map_code_setting',
            'type'     => 'textarea',
            'priority' => 1,
        )
    ));

    /*
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15139.0046486556!2d-69.9358150302246!3d18.449604000000008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8ea5626db99183fb%3A0x1bd5a3e2c7836a6c!2sMinisterio%20de%20Trabajo!5e0!3m2!1ses-419!2sdo!4v1601320745708!5m2!1ses-419!2sdo" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    */

    // adjust map width
    $wp_customize->add_setting('custom_map_width_setting');

    // add the control for the header background
    $wp_customize->add_control('custom_map_width_control', array(
        'label'      => __('Ajustar el ancho del mapa al 100% del contenedor?', '_themename'),
        'section'    => 'custom_map_location_section',
        'settings'   => 'custom_map_width_setting',
        'type'       => 'radio',
        'choices'    => array(
            'map-width-full-off'   => 'No',
            'map-width-full-on'  => 'Si',
        )
    ));



    // --- CONTACT FORM SECTION ---//

    // Add sections
    $wp_customize->add_section('custom_contact_form_section', array(
        'title' => __('Formulario de contacto', '_themename'),
        'panel' => 'contact_page_panel',
        'priority' => 602
    ));

    // contact form title
    $wp_customize->add_setting('custom_form_title_setting', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_form_title_control',
        array(
            'label'    => __('Título del formulario', '_themename'),
            'description' => __('Escribe un título para mostrarlo en la cabecera del formulario (Default: "Contáctanos")', '_themename'),
            'section'  => 'custom_contact_form_section',
            'settings'   => 'custom_form_title_setting',
            'type'     => 'text',
            'priority' => 1,
        )
    ));

    // first form control label
    $wp_customize->add_setting('first_form_control_label_setting', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'first_form_control_label_control',
        array(
            'label'    => __('First form control label', '_themename'),
            'description' => 'Label para mostrar en el primer campo (Default: "Nombre")',
            'section'  => 'custom_contact_form_section',
            'settings'   => 'first_form_control_label_setting',
            'type'     => 'text',
            'priority' => 2,
        )
    ));

    // second form control label
    $wp_customize->add_setting('second_form_control_label_setting', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'second_form_control_label_control',
        array(
            'label'    => __('Second form control label', '_themename'),
            'description' => 'Label para mostrar en el segundo campo (Default: "Correo Electrónico")',
            'section'  => 'custom_contact_form_section',
            'settings'   => 'second_form_control_label_setting',
            'type'     => 'text',
            'priority' => 3,
        )
    ));

    // third form control label
    $wp_customize->add_setting('third_form_control_label_setting', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'third_form_control_label_control',
        array(
            'label'    => __('Third form control label', '_themename'),
            'description' => 'Label para mostrar en el tercer campo (Default: "Asunto")',
            'section'  => 'custom_contact_form_section',
            'settings'   => 'third_form_control_label_setting',
            'type'     => 'text',
            'priority' => 4,
        )
    ));

    // fourth form control label
    $wp_customize->add_setting('fourth_form_control_label_setting', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'fourth_form_control_label_control',
        array(
            'label'    => __('Fourth form control label', '_themename'),
            'description' => 'Label para mostrar en el cuarto campo (Default: "Mensaje")',
            'section'  => 'custom_contact_form_section',
            'settings'   => 'fourth_form_control_label_setting',
            'type'     => 'text',
            'priority' => 5,
        )
    ));

    // button text
    $wp_customize->add_setting('button_submit_text_setting', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'button_submit_text_control',
        array(
            'label'    => __('Texto del botón (Llamada a la acción)', '_themename'),
            'description' => 'Texto para mostrar en el botón (Default: "Enviar")',
            'section'  => 'custom_contact_form_section',
            'settings'   => 'button_submit_text_setting',
            'type'     => 'text',
            'priority' => 6,
        )
    ));

    // button icon
    $wp_customize->add_setting('button_submit_icon_setting', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'button_submit_icon_control',
        array(
            'label'    => __('Ícono del botón', '_themename'),
            'description' => 'Ícono para mostrar en el botón (Este tema es compatible con Fontawesome, importante agregar ml-2 al final del texto; Default: "far fa-paper-plane ml-2")',
            'section'  => 'custom_contact_form_section',
            'settings'   => 'button_submit_icon_setting',
            'type'     => 'text',
            'priority' => 7,
        )
    ));

    // contact form legal warning
    $wp_customize->add_setting('custom_form_legal_warning_setting', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_form_legal_warning_control',
        array(
            'label'    => __('Aviso Legal', '_themename'),
            'description' => 'Escribe un Aviso Legal para mostrarlo al pie del formulario (Default: "En caso de que tenga alguna duda acerca de este formulario o quiera realizar cualquier comentario sobre este sitio Web, puede enviar un mensaje de correo electrónico a la dirección que aparece al pié de este formulario.")',
            'section'  => 'custom_contact_form_section',
            'settings'   => 'custom_form_legal_warning_setting',
            'type'     => 'textarea',
            'priority' => 8,
        )
    ));




    // --- SOCIAL SECTION ---//

    // Add sections
    $wp_customize->add_section( 'custom_social_section', array(
        'title' => __( 'Redes Sociales', '_themename' ),
        'panel' => 'contact_page_panel',
        'priority' => 603
    ));

    // social section title
    $wp_customize->add_setting('custom_social_title_setting', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_social_title_control',
        array(
            'label'    => __('Título de la sección Redes Sociales', '_themename'),
            'description' => 'Introduce un título para esta sección (Default: "Síguenos en")',
            'section'  => 'custom_social_section',
            'settings'   => 'custom_social_title_setting',
            'type'     => 'text',
            'priority' => 1,
        )
    ));

     // facebook profile
     $wp_customize->add_setting( 'custom_facebook_setting', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_facebook_control',
        array(
            'label'    => __( 'Facebook', '_themename' ),
            'description' => 'URL del perfíl de Facebook',
            'section'  => 'custom_social_section', 
            'settings'   => 'custom_facebook_setting',
            'type'     => 'text',
            'priority' => 2,
        )
    ));

     // twitter profile
     $wp_customize->add_setting( 'custom_twitter_setting', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_twitter_control',
        array(
            'label'    => __( 'Twitter', '_themename' ),
            'description' => 'URL del perfíl de Twitter',
            'section'  => 'custom_social_section', 
            'settings'   => 'custom_twitter_setting',
            'type'     => 'text',
            'priority' => 3,
        )
    ));

    // instagram profile
    $wp_customize->add_setting( 'custom_instagram_setting', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_instagram_control',
        array(
            'label'    => __( 'Instagram', '_themename' ),
            'description' => 'URL del perfíl de Instagram',
            'section'  => 'custom_social_section', 
            'settings'   => 'custom_instagram_setting',
            'type'     => 'text',
            'priority' => 4,
        )
    ));

    // youtube profile
    $wp_customize->add_setting( 'custom_youtube_setting', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_youtube_control',
        array(
            'label'    => __( 'YouTube', '_themename' ),
            'description' => 'URL del perfíl de YouTube',
            'section'  => 'custom_social_section', 
            'settings'   => 'custom_youtube_setting',
            'type'     => 'text',
            'priority' => 5,
        )
    ));




    // --- WORKING SCHEDULE SECTION ---//

    // Add sections
    $wp_customize->add_section('custom_contact_days_section', array(
        'title' => __('Horario', '_themename'),
        'panel' => 'contact_page_panel',
        'priority' => 604
    ));

    // conctact day title
    $wp_customize->add_setting('custom_contact_day_title_setting', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_contact_day_title_control',
        array(
            'label'    => __('Título', '_themename'),
            'description' => __('Escribe un título la sección "Horarios" (Default: "Horario de atención")', '_themename'),
            'section'  => 'custom_contact_days_section',
            'settings'   => 'custom_contact_day_title_setting',
            'type'     => 'text',
            'priority' => 1,
        )
    ));

    // start day
    $wp_customize->add_setting('custom_start_day_setting');

    $wp_customize->add_control('custom_start_day_control', array(
        'label'      => 'Desde',
        'description' => 'Seleccione el día en que inicia la jornada de trabajo',
        'section'    => 'custom_contact_days_section',
        'settings'   => 'custom_start_day_setting',
        'type'       => 'select',
        'choices'    => array(
            ''  =>  '-- Seleccione una día --',
            'Lunes'   => 'Lunes',
            'Martes'  => 'Martes',
            'Miércoles'  => 'Miércoles',
            'Jueves'  => 'Jueves',
            'Viernes'  => 'Viernes',
            'Sábado'  => 'Sábado',
            'Domingo'  => 'Domingo',
        ),
        'priority' => 2,
    ));


    // end day
    $wp_customize->add_setting('custom_end_day_setting');

    $wp_customize->add_control('custom_end_day_control', array(
        'label'      => 'Hasta',
        'description' => 'Seleccione el día en que termina la jornada de trabajo',
        'section'    => 'custom_contact_days_section',
        'settings'   => 'custom_end_day_setting',
        'type'       => 'select',
        'choices'    => array(
            ''  =>  '-- Seleccione una día --',
            'Lunes'   => 'Lunes',
            'Martes'  => 'Martes',
            'Miércoles'  => 'Miércoles',
            'Jueves'  => 'Jueves',
            'Viernes'  => 'Viernes',
            'Sábado'  => 'Sábado',
            'Domingo'  => 'Domingo',
        ),
        'priority' => 3,
    ));


    // Start time
    $wp_customize->add_setting(
        'custom_start_time_setting',
        array(
            'default' => false,
            'type' => 'theme_mod', // theme_mod or option
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
            'sanitize_callback' => '_themename_sanitize_time'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Date_Time_Control(
            $wp_customize,
            'custom_start_time_control',
            array(
                'label' => __( 'Hora de inicio', '_themename'),
                'description' => esc_html__( 'Seleccione la hora de inicio de la jornada de trabajo'),
                'section' => 'custom_contact_days_section',
                'settings' => 'custom_start_time_setting',
                'type' => 'time',                
            )
        )
    );

// End time
$wp_customize->add_setting(
    'custom_end_time_setting',
    array(
        'default' => false,
        'type' => 'theme_mod', // theme_mod or option
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'sanitize_callback' => '_themename_sanitize_time'
    )
);

$wp_customize->add_control(
    new WP_Customize_Date_Time_Control(
        $wp_customize,
        'custom_end_time_control',
        array(
            'label' => __( 'Hora de término', '_themename' ),
            'description' => esc_html__( 'Seleccione la hora de término de la jornada de trabajo', '_themename'),
            'section' => 'custom_contact_days_section',
            'settings' => 'custom_end_time_setting',
            'type' => 'time',            
        )
    )
);


    // --- ANOTHER WORKING SCHEDULE SECTION ---//

    // Add sections
    $wp_customize->add_section('custom_another_contact_days_section', array(
        'title' => __('Otros Horarios', '_themename'),
        'panel' => 'contact_page_panel',
        'priority' => 605
    ));

    // conctact day title
    $wp_customize->add_setting('custom_another_contact_day_title_setting', array(
        "default" => '',
        "transport" => "postMessage",
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'custom_contact_day_title_control',
        array(
            'label'    => __('Título', '_themename'),
            'description' => __('Escribe un título para este horario', '_themename'),
            'section'  => 'custom_another_contact_days_section',
            'settings'   => 'custom_another_contact_day_title_setting',
            'type'     => 'text',
            'priority' => 1,
        )
    ));

    // start day
    $wp_customize->add_setting('custom_another_start_day_setting');

    $wp_customize->add_control('custom_another_start_day_control', array(
        'label'      => __('Desde', '_themename'),
        'description' => __('Seleccione el día en que inicia la jornada de trabajo','_themename'),
        'section'    => 'custom_another_contact_days_section',
        'settings'   => 'custom_another_start_day_setting',
        'type'       => 'select',
        'choices'    => array(
            ''  =>  '-- Seleccione una día --',
            'Lunes'   => 'Lunes',
            'Martes'  => 'Martes',
            'Miércoles'  => 'Miércoles',
            'Jueves'  => 'Jueves',
            'Viernes'  => 'Viernes',
            'Sábado'  => 'Sábado',
            'Domingo'  => 'Domingo',
        ),
        'priority' => 2,
    ));


    // end day
    $wp_customize->add_setting('custom_another_end_day_setting');

    $wp_customize->add_control('custom_another_end_day_control', array(
        'label'      => 'Hasta',
        'description' => 'Seleccione el día en que termina la jornada de trabajo',
        'section'    => 'custom_another_contact_days_section',
        'settings'   => 'custom_another_end_day_setting',
        'type'       => 'select',
        'choices'    => array(
            ''  =>  '-- Seleccione una día --',
            'Lunes'   => 'Lunes',
            'Martes'  => 'Martes',
            'Miércoles'  => 'Miércoles',
            'Jueves'  => 'Jueves',
            'Viernes'  => 'Viernes',
            'Sábado'  => 'Sábado',
            'Domingo'  => 'Domingo',
        ),
        'priority' => 3,
    ));


    // Start time
    $wp_customize->add_setting(
        'custom_another_start_time_setting',
        array(
            'default' => false,
            'type' => 'theme_mod', // theme_mod or option
            'capability' => 'edit_theme_options',
            'transport' => 'refresh',
            'sanitize_callback' => '_themename_sanitize_time'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Date_Time_Control(
            $wp_customize,
            'custom_another_start_time_control',
            array(
                'label' => __( 'Hora de inicio', '_themename' ),
                'description' => esc_html__( 'Seleccione la hora de inicio de la jornada de trabajo'),
                'section' => 'custom_another_contact_days_section',
                'settings' => 'custom_another_start_time_setting',
                'type' => 'time',                
            )
        )
    );

// End time
$wp_customize->add_setting(
    'custom_another_end_time_setting',
    array(
        'default' => false,
        'type' => 'theme_mod', // theme_mod or option
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'sanitize_callback' => '_themename_sanitize_time'
    )
);

$wp_customize->add_control(
    new WP_Customize_Date_Time_Control(
        $wp_customize,
        'custom_another_end_time_control',
        array(
            'label' => __( 'Hora de término', '_themename'),
            'description' => esc_html__( 'Seleccione la hora de término de la jornada de trabajo'),
            'section' => 'custom_another_contact_days_section',
            'settings' => 'custom_another_end_time_setting',
            'type' => 'time',            
        )
    )
);

/**
 * Sanitize date time value
 * @param $input
 * @return string
 */

function _themename_sanitize_time($input){        
    $date = new DateTime( $input );
    return $date->format('g:i A');
}


}
}

