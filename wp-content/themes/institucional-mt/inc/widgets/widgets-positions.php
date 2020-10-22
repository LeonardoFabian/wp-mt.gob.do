<?php

// THEME WIDGETS AREAS


function institucionalmt_widget_areas()
{
    // Header Widgets
    register_sidebar(
        array(
            'name' => 'Header - Right Widget Area',
            'id' => 'header-right-widget-area',
            'description' => esc_html__('Esta es un área del "Header" para la columna derecha de la cabecera.', 'institucionalmt'),
            'before_widget' => '<aside id="%1$s" class="d-none d-sm-block widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        )
    );

    // Top One widgets
    register_sidebar(
        array(
            'name' => 'Home - Top First Widget Area',
            'id' => 'home-top-first-widget-area',
            'description' => esc_html__('Esta área esta diseñada para agregar contenido en la parte superior, debajo de la cabecera', 'institucionalmt'),
            'before_widget' => '<div id="%1$s" class="main-carousel %2$s">',           
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        )
    );

    /* Top Two Widget */
    register_sidebar(
        array(
            'name' => 'Home - Top Second Widget Area',
            'id' => 'home-top-second-widget-area',
            'description' => esc_html__('Esta área esta diseñada para agregar contenido en la parte superior, debajo de la cabecera', 'institucionalmt'),
            'before_widget' => '<div class="col-6 col-md-4">',           
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        )
    );

    // Post Widgets
    register_sidebar(
        array(
            'name' => __('Post - Right Widget Area'),
            'id' => 'post-right-widget-area',
            'description' => esc_html__('Esta es un área dentro de los "Posts" para la columna derecha de las entradas.', 'institucionalmt'),
            'before_widget' => '<div id="%1$s" class="%2$s mb-5">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        )
    );

    // Sevice Pages Widgets
    // right sidebar
    register_sidebar(
        array(
            'name' => __('Service - Right Widget Area'),
            'id' => 'service-right-widget-area',
            'description' => esc_html__('Barra lateral derecha en el area de los "Servicios".', 'institucionalmt'),
            'before_widget' => '<div id="%1$s" class="%2$s mb-5">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        )
    );

    // About Us Pages Widgets
    // right sidebar
    register_sidebar(
        array(
            'name' => __('About Us - Right Widget Area'),
            'id' => 'about-us-right-widget-area',
            'description' => esc_html__('Barra lateral derecha en el area "Sobre Nosotros".', 'institucionalmt'),
            'before_widget' => '<div id="%1$s" class="%2$s mb-5">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        )
    );

    // Representaciones Locales right sidebar
    register_sidebar(
        array(
            'name' => __('RLTs - Content Widget Area'),
            'id' => 'rlt-content-widget-area',
            'description' => esc_html__('Contenido de la sección "Representaciones Locales".', 'institucionalmt'),
            'before_widget' => '<div id="%1$s" class="%2$s my-5">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        )
    );

    // Second Footer Widgets
    register_sidebar(
        array(
            'name' => 'Second Footer - Left Widget Area',
            'id' => 'second-footer-left-widget-area',
            'description' => esc_html__('Esta es un área del "Second Footer" para la columna izquierda del pie de página.', 'institucionalmt'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        )
    );

    register_sidebar(
        array(
            'name' => 'Second Footer - Center Widget Area',
            'id' => 'second-footer-center-widget-area',
            'description' => 'Esta es un área del "Second Footer" centrado en el pie de página.',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        )
    );

    register_sidebar(
        array(
            'name' => 'Second Footer - Right Widget Area',
            'id' => 'footer-right-widget',
            'description' => 'Footer Widget Area',
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => '',
        )
    );

    register_sidebar(
        array(
            'name' => 'Post Social Bar',
            'id' => 'post-social-icons',
            'description' => 'Widgets in this area will be shown next to your single posts, to the left of the thumbnail images',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        )
    );
}

add_action('widgets_init', 'institucionalmt_widget_areas');


