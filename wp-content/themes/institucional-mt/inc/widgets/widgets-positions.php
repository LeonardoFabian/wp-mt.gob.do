<?php

// THEME WIDGETS AREAS


function _themename_register_widgets()
{

    // Widget Area located on the top left
    register_sidebar(
        array(
            'name' => __('Top - Left Sidebar', '_themename'),
            'id' => 'top-left-sidebar',
            'description' => esc_html__('Esta es un área en el lado izquierdo superior del sitio web.', '_themename'),
            'before_widget' => '<aside id="%1$s" class="widget-container d-none d-sm-block widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        )
    );

    // Widget Area located on the top middle
    register_sidebar(
        array(
            'name' => __('Top - Mid Sidebar', '_themename'),
            'id' => 'top-mid-sidebar',
            'description' => esc_html__('Esta es un área en el centro de la parte superior del sitio web.', '_themename'),
            'before_widget' => '<aside id="%1$s" class="widget-container d-none d-sm-block widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        )
    );

    // Widget Area located on the top right
    register_sidebar(
        array(
            'name' => __('Top - Right Sidebar', '_themename'),
            'id' => 'top-right-sidebar',
            'description' => esc_html__('Esta es un área en el lado derecho superior del sitio web.', '_themename'),
            'before_widget' => '<aside id="%1$s" class="widget-container d-none d-sm-block widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        )
    );

    // Header Left Widget Area
    register_sidebar(
        array(
            'name' => __('Header - Left Sidebar', '_themename'),
            'id' => 'header-left-sidebar',
            'description' => esc_html__('Esta es un área del "Header" para la columna izquierda de la cabecera.', '_themename'),
            'before_widget' => '<aside id="%1$s" class="widget-container d-none d-sm-block widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        )
    );

    // Header Right Widget Area
    register_sidebar(
        array(
            'name' => __('Header - Right Sidebar', '_themename'),
            'id' => 'header-right-sidebar',
            'description' => esc_html__('Esta es un área del "Header" para la columna derecha de la cabecera.', '_themename'),
            'before_widget' => '<aside id="%1$s" class="widget-container d-none d-sm-block widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        )
    );

    // Header Right Widget Area
    register_sidebar(
        array(
            'name' => __('Header - Float Left', '_themename'),
            'id' => 'header-float-left',
            'description' => esc_html__('Esta es un área flotante en el lado izquierdo de la cabecera y de posición fija', '_themename'),
            'before_widget' => '<aside id="%1$s" class="widget-container d-none d-sm-block widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h6 class="widget-title">',
            'after_title' => '</h6>'
        )
    );

    // Front Hero Widget Area 
    register_sidebar(array(
        'name' => __('Front Hero Area', '_themename'),
        'id' => 'front-hero-area',
        'description' => esc_html__('Esta área esta diseñada para agregar contenido destacado en la página frontal, debajo de la cabecera', '_themename'),
        'before_widget' => '<div id="%1$s" class="widget-container main-carousel %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

    /* Front Page Portfolio Widget Area */
    register_sidebar(array(
        'name' => __('Front Page Portfolio', '_themename'),
        'id' => 'front-page-portfolio',
        'description' => esc_html__('Esta área esta diseñada para mostrar el portafolio de productos, servicios, etc, debajo del contenido destacado.', '_themename'),
        'before_widget' => '<div id="%1$s" class="widget-container col-6 col-md-4">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

    /* Front Page Blog Area */
    register_sidebar(array(
        'name' => __('Front Page Blog Area', '_themename'),
        'id' => 'front-page-blog-area',
        'description' => esc_html__('Esta área esta diseñada para mostrar las entradas del blog en la página principal', '_themename'),
        'before_widget' => '<div id="%1$s" class="widget-container col-12 col-sm-12 col-md-12 col-lg-12">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

    /* Content top 1 - Left */
    register_sidebar(array(
        'name' => __('Content Top 1 - Left', '_themename'),
        'id' => 'content-top-1-left',
        'description' => esc_html__('Esta área esta diseñada para mostrar contenido en la página principal', '_themename'),
        'before_widget' => '<div id="%1$s" class="widget-container col-sm-12 col-md-12 col-lg-12">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

    /* Content top 1 - Right */
    register_sidebar(array(
        'name' => __('Content Top 1 - Right', '_themename'),
        'id' => 'content-top-1-right',
        'description' => esc_html__('Esta área esta diseñada para mostrar contenido en la página principal', '_themename'),
        'before_widget' => '<div id="%1$s" class="widget-container col-sm-12 col-md-12 col-lg-12">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

    /* Content top 2 - Left */
    register_sidebar(array(
        'name' => __('Content Top 2 - Left', '_themename'),
        'id' => 'content-top-2-left',
        'description' => esc_html__('Esta área esta diseñada para mostrar contenido en la página principal', '_themename'),
        'before_widget' => '<div id="%1$s" class="widget-container col-sm-12 col-md-12 col-lg-12">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

    /* Content top 2 - Right */
    register_sidebar(array(
        'name' => __('Content Top 2 - Right', '_themename'),
        'id' => 'content-top-2-right',
        'description' => esc_html__('Esta área esta diseñada para mostrar contenido en la página principal', '_themename'),
        'before_widget' => '<div id="%1$s" class="widget-container col-sm-12 col-md-12 col-lg-12">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

    /* Content top 3 - Left */
    register_sidebar(array(
        'name' => __('Content Top 3 - Left', '_themename'),
        'id' => 'content-top-3-left',
        'description' => esc_html__('Esta área esta diseñada para mostrar contenido en la página principal', '_themename'),
        'before_widget' => '<div id="%1$s" class="widget-container col-sm-12 col-md-12 col-lg-12">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

    /* Content top 3 - Right */
    register_sidebar(array(
        'name' => __('Content Top 3 - Right', '_themename'),
        'id' => 'content-top-3-right',
        'description' => esc_html__('Esta área esta diseñada para mostrar contenido en la página principal', '_themename'),
        'before_widget' => '<div id="%1$s" class="widget-container col-sm-12 col-md-12 col-lg-12">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

    /* Content Mid 1 */
    register_sidebar(array(
        'name' => __('Content Mid 1', '_themename'),
        'id' => 'content-mid-1',
        'description' => esc_html__('Esta área esta diseñada para mostrar una fila contenido en la página principal', '_themename'),
        'before_widget' => '<div id="%1$s" class="widget-container col-sm-12 col-md-12 col-lg-12">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

     /* Content Mid 2 */
     register_sidebar(array(
        'name' => __('Content Mid 2', '_themename'),
        'id' => 'content-mid-2',
        'description' => esc_html__('Esta área esta diseñada para mostrar contenido en la página principal', '_themename'),
        'before_widget' => '<div id="%1$s" class="widget-container col-sm-12 col-md-12 col-lg-12">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title mb-5">',
        'after_title' => '</h3>'
    ));

    /* Content Bottom 1*/
    register_sidebar(array(
        'name' => __('Content Bottom 1', '_themename'),
        'id' => 'content-bottom-1',
        'description' => esc_html__('Esta área esta diseñada para mostrar contenido de una columna en la página principal', '_themename'),
        'before_widget' => '<div id="%1$s" class="widget-container col-sm-12 col-md-12 col-lg-12">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title mb-5">',
        'after_title' => '</h3>'
    ));

    /* Content Bottom 2 - Left */
    register_sidebar(array(
        'name' => __('Content Bottom 2 - Left', '_themename'),
        'id' => 'content-bottom-2-left',
        'description' => esc_html__('Esta área esta diseñada para mostrar contenido en una de dos columnas en la página principal', '_themename'),
        'before_widget' => '<div id="%1$s" class="widget-container col-sm-12 col-md-3 col-lg-3">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title mb-5">',
        'after_title' => '</h3>'
    ));

    // Post Widgets
    register_sidebar(array(
        'name' => __('Post - Right Widget Area', '_themename'),
        'id' => 'post-right-widget-area',
        'description' => esc_html__('Esta es un área dentro de los "Posts" para la columna derecha de las entradas.', '_themename'),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s mb-5">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

    // Sevice Pages Widgets
    // right sidebar
    register_sidebar(array(
        'name' => __('Service - Right Widget Area', '_themename'),
        'id' => 'service-right-widget-area',
        'description' => esc_html__('Barra lateral derecha en el area de los "Servicios".', '_themename'),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s mb-5">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

    // About Us Pages Widgets
    // right sidebar
    register_sidebar(array(
        'name' => __('About Us - Right Widget Area', '_themename'),
        'id' => 'about-us-right-widget-area',
        'description' => esc_html__('Barra lateral derecha en el area "Sobre Nosotros".', '_themename'),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s mb-5">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

    // Banners for pages sidebar    
    register_sidebar(array(
        'name' => __('Banners - Pages Sidebar', '_themename'),
        'id' => 'banners-pages-sidebar',
        'description' => esc_html__('Banners fijos en la barra lateral derecha de las páginas, recomendado para banners que permanecerán en el sitio web.', '_themename'),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s mb-3">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

    // Banners for post sidebar   
    register_sidebar(array(
        'name' => __('Banners - Post Sidebar', '_themename'),
        'id' => 'banners-post-sidebar',
        'description' => esc_html__('Banners temporales en la barra lateral derecha de las entradas, recomendado para banners que estarán publicados por un tiempo.', '_themename'),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s mb-3">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

    // Banners for post content   
    register_sidebar(array(
        'name' => __('Banners - Post Content', '_themename'),
        'id' => 'banners-post-content',
        'description' => esc_html__('Banners temporales en la parte inferior de las entradas, recomendado para banners rectangulares que estarán publicados por un tiempo.', '_themename'),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s mb-3">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

    // Mobile App Sidebar 
    register_sidebar(array(
        'name' => __('Mobile App Sidebar', '_themename'),
        'id' => 'mobile-app-sidebar',
        'description' => esc_html__('Sección para colocar un banner de la aplicación movíl en la parte inferior de la página de inicio, antes del pie de página.', '_themename'),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

    // Customers Sidebar 
    register_sidebar(array(
        'name' => __('Customers Sidebar', '_themename'),
        'id' => 'customers-sidebar',
        'description' => esc_html__('Sección para colocar banners, logotipos con enlaces externos, testimonios de clientes, etc', '_themename'),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

    // Representaciones Locales right sidebar
    register_sidebar(array(
        'name' => __('RLTs - Content Widget Area', '_themename'),
        'id' => 'rlt-content-widget-area',
        'description' => esc_html__('Contenido de la sección "Representaciones Locales".', '_themename'),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s my-5">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

    // Second Footer Widgets
    register_sidebar(array(
        'name' => __('Second Footer - Left Widget Area', '_themename'),
        'id' => 'second-footer-left-widget-area',
        'description' => esc_html__('Esta es un área del "Second Footer" para la columna izquierda del pie de página.', '_themename'),
        'before_widget' => '<aside id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

    // Second Footer center widget area
    register_sidebar(array(
        'name' => __('Second Footer - Center Widget Area', '_themename'),
        'id' => 'second-footer-center-widget-area',
        'description' => __('Esta es un área del "Second Footer" centrado en el pie de página.', '_themename'),
        'before_widget' => '<aside id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

    // Second Footer right widget area
    register_sidebar(array(
        'name' => __('Second Footer - Right Widget Area', '_themename'),
        'id' => 'footer-right-widget',
        'description' => __('Footer Widget Area', '_themename'),
        'before_title' => '',
        'after_title' => '',
        'before_widget' => '',
        'after_widget' => '',
    ));

    // Social bar located in posts
    register_sidebar(array(
        'name' => __('Post Social Bar', '_themename'),
        'id' => 'post-social-icons',
        'description' => __('Widgets in this area will be shown next to your single posts, to the left of the thumbnail images', '_themename'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));    

    /**
     * PAGE SIDEBAR
     */
    // Our Team Page - Content Area
    register_sidebar(array(
        'name' => __('About Us - Right Sidebar', '_themename'),
        'id' => 'about-us-right-sidebar',
        'description' => __('Esta área esta diseñada para mostrar contenido en la parte derecha de las páginas de la sección "Sobre Nosotros".', '_themename'),
        'before_widget' => '<div class="text-justify mb-5 col-md-12 col-lg-12" style="width:100%;">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    /**
     * OUR TEAM PAGE - WIDGET AREAS
     */
    // Our Team Page - Content Area
    register_sidebar(array(
        'name' => __('Our Team Page - Content Area', '_themename'),
        'id' => 'our-team-page-content-area',
        'description' => __('Esta área esta diseñada para mostrar contenido en la página de "Viceministros".', '_themename'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

}

add_action('widgets_init', '_themename_register_widgets');
