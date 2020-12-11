<?php

// Adjust color brightness

if( !function_exists( 'adjustBrightness' ) ){
    function adjustBrightness($hex, $steps)
    {
        // Steps should be between -255 and 255. Negative = darker, positive = lighter
        $steps = max(-255, min(255, $steps));

        // Normalize into a six character long hex string
        $hex = str_replace('#', '', $hex);
        if (strlen($hex) == 3) {
            $hex = str_repeat(substr($hex, 0, 1), 2) . str_repeat(substr($hex, 1, 1), 2) . str_repeat(substr($hex, 2, 1), 2);
        }

        // Split into three parts: R, G and B
        $color_parts = str_split($hex, 2);
        $return = '#';

        foreach ($color_parts as $color) {
            $color   = hexdec($color); // Convert to decimal
            $color   = max(0, min(255, $color + $steps)); // Adjust color
            $return .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT); // Make two char hex code
        }

        return $return;
    }
}



// ADD CSS COLOR SCHEME
if( !function_exists( '_themename_customize_styles' ) ){
    function _themename_customize_styles()
{

    /* -- SET COLORS TO CSS STYLES -- */

    // main color
    $primary_color = get_option('primary_color');
    $primary_color_dark_10 = adjustBrightness($primary_color, -10);

    // secondary color
    $secondary_color = get_option('secondary_color');

    // secondary color
    $accent_color = get_option('accent_color');

    // link color
    $link_color = get_option('link_color');

    // hover or active link color
    $hover_link_color = get_option('hover_link_color');

    // light color
    $light_color = get_option('light_color');

    // dark color
    $dark_color = get_option('dark_color');
    $dark_color_light = adjustBrightness($dark_color, 30);
    $dark_color_dark = adjustBrightness($dark_color, -30);

    /****************************************
styling
     ****************************************/
?>
    <style>

        /* COLORS */
        .bg-primary {
            background-color: <?php echo $primary_color; ?> !important;
        }

        /* BUTTONS */

        .btn-lg {
            padding: 16px 32px;
        }

        .btn-primary {
            background-color: <?php echo $primary_color; ?>;
            border-color: <?php echo $primary_color; ?>;
            color: <?php echo $light_color; ?> !important;
        }

        .btn-primary:hover {
            background-color: <?php echo $accent_color; ?>;
            border-color: <?php echo $accent_color; ?>;
            color: <?php echo $light_color; ?> !important;
        }

        /* HEADER */

        /* background main color */
        .header-background-on #site-header {
            background: <?php echo $primary_color; ?>;
            background-color: <?php echo $primary_color; ?>;
        }

        /* .header-background-on #site-main-navbar ul li:hover, */
        .header-background-on #site-main-navbar .current-menu-parent,
        .header-background-on #site-main-navbar .current-menu-ancestor {
            background-color: rgba(255, 255, 255, 0.2) !important;
        }

        .header-background-on #headerbar-menu ul li a {
            color: <?php echo $hover_link_color; ?>;
        }

        .header-background-on #site-main-navbar .nav-link span,
        .header-background-on #site-main-navbar .current_page_parent .nav-link span,
        .header-background-on #site-main-navbar .current-menu-parent .nav-link span {
            color: <?php echo $light_color; ?> !important;
        }

        .header-background-on #site-main-navbar .dropdown-menu {
            background-color: <?php echo $primary_color_dark_10; ?>;
        }

        /* NAVBAR */

        /* main menu */
        .menu-background-on #site-main-navbar {
            background-color: <?php echo $primary_color; ?>;
        }

        .menu-background-on #site-main-navbar .current-menu-item .nav-link span {
            color: <?php echo $light_color; ?> !important;
        }

        /* .menu-background-on #site-main-navbar .nav-link:hover, */
        .menu-background-on #site-main-navbar .current_page_parent,
        .menu-background-on #site-main-navbar .current-menu-parent,
        .menu-background-on #site-main-navbar .current-menu-ancestor {
            background-color: rgba(255, 255, 255, 0.2) !important;
        }

        .menu-background-on #site-main-navbar .nav-link span,
        .menu-background-on #site-main-navbar .current_page_parent .nav-link span,
        .menu-background-on #site-main-navbar .current-menu-parent .nav-link span {
            color: <?php echo $light_color; ?>;
        }

        /* first dropdown menu */
        .menu-background-on #site-main-navbar .dropdown-menu {
            background-color: <?php echo $primary_color_dark_10; ?>;
        }

        .menu-background-on #site-main-navbar .dropdown-menu .menu-item:hover {
            background-color: rgba(255, 255, 255, 0.2) !important;
        }


        /* TITLE BAR */


        .title-bar h2 {
            color: #003876;
        }

        .title-bar-background-on .title-bar {
            background: <?php echo $primary_color; ?>;
            background-color: <?php echo $primary_color; ?>;
        }

        .title-bar-background-on .title-bar h2 {
            color: <?php echo $light_color; ?>;
        }


        /* CAROUSEL */


        .carousel-caption {
            background-color: <?php echo $dark_color; ?>;
        }

        .carousel-item-title {
            color: #ffffff;
        }

        .carousel-caption-background-on .carousel-caption {
            background-color: <?php echo $primary_color; ?>;
        }

        /* FIRST FOOTER */

        .first-footer-background-on #footer-top {
            background-color: <?php echo $dark_color_light; ?>;
        }

        /* SECOND FOOTER */

        /* 'default' => '#394451', */
        .second-footer-background-on #footer-inset {
            background-color: <?php echo $dark_color; ?>;
        }

        .second-footer-background-on #copyright {
            background-color: <?php echo $dark_color_dark; ?>;
        }

        .second-footer-background-on footer,
        .second-footer-background-on footer h3,
        .second-footer-background-on footer a:link,
        .second-footer-background-on footer a:visited,
        .second-footer-background-on footer a:active,
        .second-footer-background-on footer a:hover {
            color: #aab4bf;
        }

        .second-footer-background-on footer a:link,
        .second-footer-background-on footer a:visited {
            text-decoration: none;
        }

        .second-footer-background-on footer a:active,
        .second-footer-background-on footer a:hover {
            text-decoration: none;
            color: #8bbce0;
        }

        /* MAP SETTINGS */

        .map-width-full-on #contact-section iframe {
            width: 100%;
        }


        /* WRAPPING TEXT IN POST IMAGE OBJECT */
        img.alignright {
            float: right;
            margin: 0 0 1em 1em;
        }

        img.alignleft {
            float: left;
            margin: 0 1em 0.5em 0;
        }

        img.aligncenter {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .alignright {
            float: right;
        }

        .alignleft {
            float: left;
        }

        .aligncenter {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        /* background secondary color */
        .bg-secondary-color {
            background: <?php echo $secondary_color; ?>;
            background-color: <?php echo $secondary_color; ?>;
        }

        /* primary color */
        .primary-color {
            color: <?php echo $primary_color; ?>;
        }

        /* secondary color */
        .secondary-color {
            color: <?php echo $secondary_color; ?>;
        }

        /* links color */
        a:link,
        a:visited {
            color: <?php echo $link_color; ?>;
        }

        /* hover links color */
        a:hover,
        a:active {
            color: <?php echo $hover_link_color; ?>;
        }


        /* background colors */











        /* SOCIAL */


        /* FOOTER */

        /********************************** 
        LAYOUT SETTINGS 
        ***********************************/
        /* 
        Mostrar u ocultar las secciones
        */
        .instmt-top-section-on #_themename-top-section {
            display: block;
        }
        .instmt-front-page-portfolio-section-on #_themename-front-page-portfolio-section {
            display: block;
        }

    </style>

<?php


}
}

add_action('wp_head', '_themename_customize_styles');
