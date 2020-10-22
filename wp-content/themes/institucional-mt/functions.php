<?php

// Theme customizer
include_once('inc/customizer.php');

// Navwalker fix for bootstrap navbar
require_once('wp-bootstrap-navwalker.php');

function institucionalmt_theme_support()
{
    // Add dynamic Title Tag support
    add_theme_support('title-tag');
    // Add custom logo
    add_theme_support('custom-logo');
    // page template
    add_theme_support('timeline');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'institucionalmt_theme_support');

// THEME STYLES
function InstitucionalMT_register_styles()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('InstitucionalMT-style', get_template_directory_uri() . '/style.css', array('InstitucionalMT-bootstrap'), $version, 'all');
    wp_enqueue_style('InstitucionalMT-bootstrap', get_template_directory_uri() . '/admin/css/bootstrap/bootstrap.min.css', array(), '4.5.2', 'all');
    wp_enqueue_style('InstitucionalMT-fontawesome', 'https://use.fontawesome.com/releases/v5.14.0/css/all.css', array(), '5.14.0', 'all');
}

add_action('wp_enqueue_scripts', 'InstitucionalMT_register_styles');

// THEME SCRIPTS
function InstitucionalMT_register_scripts()
{
    wp_enqueue_script('InstitucionalMT-jquery', 'https://code.jquery.com/jquery-3.5.1.slim.min.js', array(), '3.5.1', true);
    wp_enqueue_script('InstitucionalMT-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', array(), '1.16.1', true);
    wp_enqueue_script('InstitucionalMT-fontawesome', 'https://kit.fontawesome.com/cece37c6b0.js', array(), '5.14.0', true);
    wp_enqueue_script('InstitucionalMT-bootstrap', get_template_directory_uri() . '/admin/js/bootstrap/bootstrap.min.js', array(), '4.5.2', true);
    wp_enqueue_script('InstitucionalMT-code', get_template_directory_uri() . '/admin/js/code.js', array('jquery'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'InstitucionalMT_register_scripts');

// THEME MENUS
function InstitucionalMT_menus()
{

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

add_action('init', 'InstitucionalMT_menus');

// Allow shortcodes on widgets
add_filter('widget_text', 'do_shortcode');

// Allow shortcodes on pages (not tested, but should work)
add_filter('the_content', 'do_shortcode');


// LINKS CLASS (anchor <a>)
add_filter('nav_menu_link_attributes', 'temp_addNavMenuLinkClass', 10, 3);

function temp_addNavMenuLinkClass($atts, $item, $args)
{
    $class = 'nav-link';
    $atts['class'] = $class;
    return $atts;
}

// soporte para entradas embed con formato embed-{post_type}-{post_format}
function institucionalmt_embed_post_format_support()
{
    add_theme_support('post-formats', ['video', 'gallery','link']);
}
add_action('after_setup_theme', 'institucionalmt_embed_post_format_support');

// agregar soporte para entradas [video, gallery] en las paginas 
function institucionalmt_add_post_support_to_page_format()
{
    add_post_type_support('page', 'post-formats');
}
add_action('init', 'institucionalmt_add_post_support_to_page_format');

// excerpt length
function institucionalmt_set_excerpt_length($length)
{
    return 15;
}
add_filter('excerpt_length', 'institucionalmt_set_excerpt_length');

function institucionalmt_add_readmore_to_excerpt($more)
{
    if (!is_single()) {
        $more = sprintf('&nbsp;<a class="read-more" href="%1$s">%2$s</a>', get_permalink(get_the_ID()), __('Leer más...', 'institucionalmt'));
    }
    return $more;
}
add_filter('excerpt_more', 'institucionalmt_add_readmore_to_excerpt');

// REGISTER NEW IMAGE SIZE
function institucionalmt_images_size()
{
    // additional image sizes
    add_image_size('justified-in-posts-image', 755, 400, true);
    add_image_size('middle-post-image', 375, 300, true);
    add_image_size('carousel-image', 1140, 500, true);
}

add_action('after_setup_theme', 'institucionalmt_images_size');

// ADD IMAGE SIZE TO IMAGES OPTIONS
function institucionalmt_images_size_choose($sizes)
{
    return array_merge($sizes, array(
        'justified-in-posts-image' => __('Tamaño ajustado al ancho de las entradas'),
        'middle-post-image' => __('Tamaño medio en las entradas'),
        'carousel-image' => __('Tamaño carousel'),
    ));
}

add_filter('image_size_names_choose', 'institucionalmt_images_size_choose');




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
function mytheme_get_svg($args = array())
{
    // Make sure $args are an array.
    if (empty($args)) {
        return __('Please define default parameters in the form of an array.', 'mytheme');
    }

    // Define an icon.
    if (false === array_key_exists('icon', $args)) {
        return __('Please define an SVG icon filename.', 'mytheme');
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


// ADD BOOTSTRAP PAGINATION TO THEME
function bootstrap_pagination(\WP_Query $wp_query = null, $echo = true, $params = [])
{
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




// ADD CATEGORIES FOR PAGES

function add_cats_and_tags_to_pages_definition()
{
    register_taxonomy_for_object_type('post_tag', 'page');
    register_taxonomy_for_object_type('category', 'page');
}
add_action('init', 'add_cats_and_tags_to_pages_definition');



/**
* ADD BREADCRUMBS TO THEME
*/
function the_breadcrumb() {
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
                    $output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li> <li class="separator">/</li>';
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
function institucionalmt_depurar(){
    echo "<script>
    
    console.log('actions', ". current_action() .")
    
    </script>";
}

add_action( 'all', 'institucionalmt_depurar' );
*/

// Process contact form
require get_theme_file_path('/inc/process-contact-form.php');