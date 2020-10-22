<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <!-- Required meta tags -->
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <meta http-equiv="Expires" content="0">
  <meta http-equiv="Last-Modified" content="0">
  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
  <meta http-equiv="Pragma" content="no-cache"> -->
    <title><?php echo bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <!-- InstitucionalMT_register_styles -->
</head>

<body <?php body_class(); ?>>
    <header id="site-header">
        <div class="container">
            <!-- top display mobile -->
            <div class="top-mobile col-xs-12"><img src="<?php echo get_template_directory_uri(); ?>/admin/image/republica-dominicana.svg" class="img-fluid mx-auto d-block d-sm-none mt-2" alt="" style="max-width:50%"></div>
            <hr class="d-block d-sm-none">
            <!-- site header -->
            <div id="site-header" class="row" style="height: 200px;">
                <!-- Logo -->
                <div id="header-brand" class="col-lg-8">
                    <div id="logo">
                        <a href="<?php echo home_url(); ?>" title="" rel="home" class="logo">
                            <?php if ( (get_theme_mod('custom_main_logo') != "") && (get_theme_mod('header-background') == "header-background-off") ) { ?>
                                <!-- Display main logo using header custom panel -->
                                <img src="<?php echo esc_url( get_theme_mod( 'custom_main_logo' ) ); ?>" class="img-fluid" style="max-width: 390px;" />
                            <?php } elseif( (get_theme_mod('custom_second_logo') != "") && (get_theme_mod('header-background') == "header-background-on") ) { ?>
                                <!-- Display main logo using header custom panel -->
                                <img src="<?php echo esc_url( get_theme_mod( 'custom_second_logo' ) ); ?>" class="img-fluid" style="max-width: 390px;" />
                            <?php } elseif ( (get_theme_mod('custom_main_logo') == "") && (get_theme_mod('custom_second_logo') == "") ) { 
                                $custom_logo_id = get_theme_mod('custom_logo');
                                $image = wp_get_attachment_image_src( $custom_logo_id, 'full' );
                                ?>
                                <img src="<?php echo $image[0]; ?>" class="img-fluid" style="max-width: 390px;" />
                            <?php } ?>
                        </a>
                    </div>
                </div>
                <!-- widget area 1 -->
                <div id="headerbar" class="col-lg-4 align-self-center text-center d-none d-sm-block">
                    <?php if (is_active_sidebar('header-right-widget-area')) : ?>
                        <?php dynamic_sidebar('header-right-widget-area'); ?>
                    <?php endif; ?>
                    <aside id="nav_menu-3" class="widget widget_nav_menu">
                        <!-- widget title -->                                                
                        <?php wp_nav_menu(array(
                            'theme_location' => 'headerbar-menu',
                            'container' => 'div',
                            'container_class' => 'menu menu-de-navegacion-container d-none d-sm-block',
                            'container_id' => 'headerbar-menu',
                            'items_wrap' => '<ul id="menu-menu-de-navegacion" class="menu list-unstyled list-inline d-md-none d-lg-block">%3$s</ul>',
                            'menu_class' => 'list-inline-item ml-2'
                        )); ?>
                        <!-- END: menu de navegacion (headerbar-menu) -->

                    </aside>
                </div>
            </div>
        </div>
        <!-- NAVBAR WEB -->
        <nav id="site-main-navbar" class="navbar navbar-nav navbar-expand-lg" role="navigation">
            <div class="container">
                <form class="form-inline col-10 my-2 my-lg-0 d-lg-none d-md-none flex-column flex-sm-row">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                </form>
                <button class="navbar-toggler col-2 navbar-toggler-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="navbar-toggler-animated-icon"><span></span><span></span><span></span></div>
                </button>
                <!--
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav mr-auto text-center">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="page.html">Sample Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                    </ul>
                </div>
                -->

                <?php wp_nav_menu(array(
                    'menu' => 'main',
                    'depth' => 2,
                    'theme_location' => 'main',
                    'container' => 'div',
                    'container_class' => 'collapse navbar-collapse',
                    'container_id' => 'navbarSupportedContent',
                    'items_wrap' => '<ul class="navbar-nav mr-auto text-left">%3$s</ul>',
                    'menu_class' => 'nav navbar-nav',
                    'walker' => new WP_Bootstrap_Navwalker()
                )); ?>

            </div>
        </nav>
    </header>