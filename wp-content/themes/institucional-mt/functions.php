<?php

// Theme customizer
include_once('inc/customizer.php');

// Navwalker fix for bootstrap navbar
require_once('wp-bootstrap-navwalker.php');

// Helpers fumctions
require_once('lib/helpers.php');

// Theme enqueue styles and scripts
require_once('lib/enqueue-scripts.php');

// Theme sidebars widget positions
require_once('lib/sidebars.php');

/**
 * Theme setup
 */
if( !function_exists( '_themename_theme_setup' ) ){
    function _themename_theme_setup(){
        // title tags
        add_theme_support('title-tag');
    
        // translation
        load_theme_textdomain( '_themename', get_stylesheet_directory() . '/languages' );
    
        // post formats
        add_theme_support( 'post_formats' );
    
        // custom logo
        add_theme_support('custom-logo');
    
        // RSS feed links to head
        add_theme_support( 'automatic-feed-links' );
    
        // page template
        add_theme_support('timeline');
    
        // post thumbnails or featured images
        add_theme_support( 'post-thumbnails' );
    }
}
add_action('after_setup_theme', '_themename_theme_setup');


// THEME MENUS
if( !function_exists( '_themename_menus' ) ){
    function _themename_menus(){

        $locations = array(
            'main' => 'Menu Principal',
            'footer-menu' => "Footer Menu",
            'headerbar-menu' => "Header Bar Menu",
            'sidebar-primary' => "Right Sidebar Menu",
            'footer_column_1' => 'Footer Column 1',
            'footer_column_2' => 'Footer Column 2',
            'footer_column_3' => 'Footer Column 3',
            'footer_column_4' => 'Footer Column 4',
            'footer_top_2' => 'Footer Top 2',
            'about-us-menu' => 'About Us',
        );
    
        register_nav_menus($locations);
    }
}
add_action('init', '_themename_menus');

// Allow shortcodes on widgets
add_filter('widget_text', 'do_shortcode');

// Allow shortcodes on pages (not tested, but should work)
add_filter('the_content', 'do_shortcode');


if( !function_exists( '_themename_add_navmenu_link_class' ) ){
    function _themename_add_navmenu_link_class($atts, $item, $args){
        $class = 'nav-link';
        $atts['class'] = $class;
        return $atts;
    }
}
// LINKS CLASS (anchor <a>)
add_filter('nav_menu_link_attributes', '_themename_add_navmenu_link_class', 10, 3);


// soporte para entradas embed con formato embed-{post_type}-{post_format}
if( !function_exists( '_themename_embed_post_format_support' ) ){
    function _themename_embed_post_format_support(){
        add_theme_support('post-formats', ['video', 'gallery','link']);
    }
}
add_action('after_setup_theme', '_themename_embed_post_format_support');

// agregar soporte para entradas [video, gallery] en las paginas 
if( !function_exists( '_themename_add_post_support_to_page_format' ) ){
    function _themename_add_post_support_to_page_format(){
        add_post_type_support('page', 'post-formats');
    }
}
add_action('init', '_themename_add_post_support_to_page_format');


// excerpt length
if( !function_exists( '_themename_set_excerpt_length' ) ){
    function _themename_set_excerpt_length($length){
        return 15;
    }
}
add_filter('excerpt_length', '_themename_set_excerpt_length');


if( !function_exists( '_themename_add_readmore_to_excerpt' ) ){
    function _themename_add_readmore_to_excerpt($more){       
        if (!is_single()) {
            
            $more = sprintf('&nbsp;<a class="c-post__readmore" href="%1$s">%2$s<span class="u-screen-reader-text d-none">acerca de %3$s </span></a>', esc_url( get_permalink( get_the_ID() ) ), __('Leer más ', '_themename'), get_the_title() );
        }
        return $more;
    }
}
add_filter('excerpt_more', '_themename_add_readmore_to_excerpt');

// REGISTER NEW IMAGE SIZE
if( !function_exists( '_themename_images_size' ) ){
    function _themename_images_size(){
        // additional image sizes
        add_image_size('justified-in-posts-image', 755, 400, true);
        add_image_size('middle-post-image', 375, 300, true);
        add_image_size('carousel-image', 1140, 500, true);
    }
}
add_action('after_setup_theme', '_themename_images_size');

// ADD IMAGE SIZE TO IMAGES OPTIONS
if( !function_exists( '_themename_images_size_choose' ) ){
    function _themename_images_size_choose($sizes){
        return array_merge($sizes, array(
            'justified-in-posts-image' => __('Tamaño ajustado al ancho de las entradas', '_themename'),
            'middle-post-image' => __('Tamaño medio en las entradas', '_themename'),
            'carousel-image' => __('Tamaño carousel'),
        ));
    }
}
add_filter('image_size_names_choose', '_themename_images_size_choose');


/**
 * Theme favicon
 */
if( !function_exists( '_themename_favicon' ) ){
    function _themename_favicon(){
        echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_bloginfo('wpurl').'/favicon.ico" /> ';
    }
}
add_action( 'wp_head', '_themename_favicon');


/**
 * Return SVG markup.
 *
 * @param array $args {
 *     Parameters needed to display an SVG.
 *
 *     @type string $icon  Required SVG icon filename.
 *     @type string $title Optional SVG title.
 *     @type string $desc  Optional SVG description.
 * }
 * @return string SVG markup.
 */
if( !function_exists( '_themename_get_svg' ) ){
    function _themename_get_svg($args = array())
{
    // Make sure $args are an array.
    if (empty($args)) {
        return __('Please define default parameters in the form of an array.', '_themename');
    }

    // Define an icon.
    if (false === array_key_exists('icon', $args)) {
        return __('Please define an SVG icon filename.', '_themename');
    }

    // Set defaults.
    $defaults = array(
        'icon'        => '',
        'title'       => '',
        'desc'        => '',
        'aria_hidden' => true, // Hide from screen readers.
        'fallback'    => false,
    );

    // Parse args.
    $args = wp_parse_args($args, $defaults);

    // Set aria hidden.
    $aria_hidden = '';

    if (true === $args['aria_hidden']) {
        $aria_hidden = ' aria-hidden="true"';
    }

    // Set ARIA.
    $aria_labelledby = '';

    if ($args['title'] && $args['desc']) {
        $aria_labelledby = ' aria-labelledby="title desc"';
    }

    // Begin SVG markup.
    $svg = '<svg class="icon icon-' . esc_attr($args['icon']) . '"' . $aria_hidden . $aria_labelledby . ' role="img">';

    // If there is a title, display it.
    if ($args['title']) {
        $svg .= '<title>' . esc_html($args['title']) . '</title>';
    }

    // If there is a description, display it.
    if ($args['desc']) {
        $svg .= '<desc>' . esc_html($args['desc']) . '</desc>';
    }

    // Use absolute path in the Customizer so that icons show up in there.
    if (is_customize_preview()) {
        $svg .= '<use xlink:href="' . get_parent_theme_file_uri('/assets/images/svg-icons.svg#icon-' . esc_html($args['icon'])) . '"></use>';
    } else {
        $svg .= '<use xlink:href="#icon-' . esc_html($args['icon']) . '"></use>';
    }

    // Add some markup to use as a fallback for browsers that do not support SVGs.
    if ($args['fallback']) {
        $svg .= '<span class="svg-fallback icon-' . esc_attr($args['icon']) . '"></span>';
    }

    $svg .= '</svg>';

    return $svg;
}
}


// ADD BOOTSTRAP PAGINATION TO THEME
if( !function_exists( 'bootstrap_pagination' ) ){
    function bootstrap_pagination(\WP_Query $wp_query = null, $echo = true, $params = []){
        if (null === $wp_query) {
            global $wp_query;
        }
    
        $add_args = [];
    
        //add query (GET) parameters to generated page URLs
        /*if (isset($_GET[ 'sort' ])) {
            $add_args[ 'sort' ] = (string)$_GET[ 'sort' ];
        }*/
    
        $pages = paginate_links(array_merge([
            'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
            'format'       => '?paged=%#%',
            'current'      => max(1, get_query_var('paged')),
            'total'        => $wp_query->max_num_pages,
            'type'         => 'array',
            'show_all'     => false,
            'end_size'     => 3,
            'mid_size'     => 1,
            'prev_next'    => true,
            'prev_text'    => __('« Anterior'),
            'next_text'    => __('Siguiente »'),
            'add_args'     => $add_args,
            'add_fragment' => ''
        ], $params));
    
        if (is_array($pages)) {
            //$current_page = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
            $pagination = '<div class="pagination"><ul class="pagination">';
    
            foreach ($pages as $page) {
                $pagination .= '<li class="page-item' . (strpos($page, 'current') !== false ? ' active' : '') . '"> ' . str_replace('page-numbers', 'page-link', $page) . '</li>';
            }
    
            $pagination .= '</ul></div>';
    
            if ($echo) {
                echo $pagination;
            } else {
                return $pagination;
            }
        }
    
        return null;
    }
}




// ADD CATEGORIES FOR PAGES

if( !function_exists( '_themename_add_cats_and_tags_to_pages_definition' ) ){
    function _themename_add_cats_and_tags_to_pages_definition(){
        register_taxonomy_for_object_type('post_tag', 'page');
        register_taxonomy_for_object_type('category', 'page');
    }
}

add_action('init', '_themename_add_cats_and_tags_to_pages_definition');


/**
* ADD BREADCRUMBS TO THEME
*/
if( !function_exists( '_themename_breadcrumb' ) ){
    function _themename_breadcrumb() {
        global $post;
        echo '<ul id="breadcrumbs" class="list-unstyled list-inline">';
        if (!is_home()) {
            echo '<li><a href="';
            echo get_option('home');
            echo '">';
            echo 'Home';
            echo '</a></li><li class="separator"> / </li>';
            if (is_category() || is_single() ) {
                echo '<li>';
                the_category(' </li><li class="separator"> / </li><li> ');
                if (is_single()) {
                    echo '</li><li class="separator"> / </li><li>';
                    the_title();
                    echo '</li>';
                }
            } elseif (is_page()) {
                if($post->post_parent){
                    $anc = get_post_ancestors( $post->ID );
                    $title = get_the_title();
                    foreach ( $anc as $ancestor ) {
                        $output = '<li><a href="'. esc_url( get_permalink($ancestor) ).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li> <li class="separator">/</li>';
                    }
                    echo $output;
                    echo '<strong title="'.$title.'"> '.$title.'</strong>';
                } else {
                    echo '<li><strong> '.get_the_title().'</strong></li>';
                }
            }
        }
        elseif (is_tag()) {single_tag_title();}
        elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
        elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
        elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
        elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
        elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
        elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
        echo '</ul>';
    }
}

/*
function add_cats_and_tags_to_queries($wp_query) {
    if ( $wp_query->get('tag') || $wp_query->get('category_name') ) {
        $posttypes_list = $wp_query->get('post_type');
        if ( is_string ( $posttypes_list ) )  // we convert the string var in an array when it's necessary
           {
            $posttypes_list[] = $posttypes_list;
           }
        $posttypes_list[] = 'page';            // And here we add the additional type of post_Type, the 'page'.
        $wp_query->set('post_type', $posttypes_list );
    }


// we could also add the word 'any' as a new WP_Query var, but it's always 
// better to control each one of post_types
// $wp_query->set('post_type', 'any');

}
add_action( 'pre_get_posts', 'add_cats_and_tags_to_queries');
*/


/**
 * funcion callback para depurar las acciones que se estan ejecutando
 * Descomentar solo para depurar
 */
/*
function _themename_depurar(){
    echo "<script>
    
    console.log('actions', ". current_action() .")
    
    </script>";
}

add_action( 'all', '_themename_depurar' );
*/

// Process contact form
require get_theme_file_path('/inc/process-contact-form.php');