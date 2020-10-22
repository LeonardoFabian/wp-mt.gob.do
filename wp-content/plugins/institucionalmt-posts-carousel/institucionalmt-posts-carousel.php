<?php

/**
 * Plugin Name: InstitucionalMT Posts Carousel
 * Plugin URI:
 * Description: Este plugin permite presentar las noticias destacadas en un carousel.
 * Version: 1.0.0
 * Author: Leonardo Fabián
 * Author URI: https://www.linkedin.com/in/leonardofabian/
 * License:
 */
define( 'INSTITUCIONALMT_POST_CAROUSEL__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

register_activation_hook( __FILE__, 'institucionalmt_display_carousel' ) ;

//add_action( 'init', array( 'institucionalmt_display_carousel', 'init' ) );

function institucionalmt_display_carousel()
{

    // Set the category name, order and qty to display
    $args = array(
        'category_name' => 'noticias-destacadas',
        'orderby' => 'link_id',
        'order' => 'DESC',
        'limit' => 5
    );

    $links = get_bookmarks($args);
    $n = count($links);

    if (!empty($links)) {
        // Code to display the carousel
?>
        <!-- container 1600 * 400 -->
        <div id="institucionalmt-post-carousel">
            <!-- ul width adjust to the (N*100)% of container -->
            <ul style="width:b<?php echo $n * 100; ?>%;">
                <?php
                foreach ($links as $i => $link) {
                    // Background image
                    $background = (!empty($link->link_image)) ? 'url(' . $link->link_image . ')' : 'rgb(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ')';

                    /*
                        if( ! empty( $link->link_image ))
                            $background = 'url('. $link->link_image . ')';
                        else 
                            $background = 'rgb(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ')';
                        */

                    // Target attr 
                    $target = (!empty($link->link_target)) ? ' target="' . $link->link_target . '"' : '';
                    /*
                        if( ! empty( $link->link_target ) )
                            $target = ' target="' . $link->link_target . '"';
                        else 
                            $target = '';
                        */

                    // Rel attr 
                    $rel = (!empty($link->link_rel)) ? ' rel="' . $link->link_rel . '"' : '';
                    /*
                        if( ! empty( $link->link_rel ) )
                            $rel = ' rel="' . $link->link_rel . '"';
                        else 
                            $rel = '';
                        */

                ?>
                    <li style="background:<?php echo $background; ?>">
                        <a class="institucionalmt-carousel-link" href="<?php echo $link->link_url; ?>" title="<?php echo $link->link_name; ?>" <?php echo $target . $rel ?>>
                            <a href="<?php echo $link->link_url; ?>">
                                <strong><?php echo $link->link_name; ?></strong>
                            </a>
                            <?php if (!empty($link->link_description)) : ?>
                                <em><?php echo $link->link_description; ?></em>
                            <?php endif; ?>
                        </a>
                        <?php
                        // Previous link
                        if ($i > 0) {
                        ?>
                            <a href="#prev" class="institucionalmt-carousel-prev-control">&lt;</a>
                        <?php
                        }
                        ?>
                        <?php
                        // Next link
                        if ($i < $n - 1) {
                        ?>
                            <a href="#next" class="institucionalmt-carousel-next-control">&gt;</a>
                        <?php
                        }
                        ?>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
<?php

        // Post carousel plugin scripts if links is not empty
        if (!empty($links)) {
            wp_enqueue_script('institucionalmt_post_carousel_script', plugin_dir_url(__FILE__) . 'admin/js/institucionalmt-post-carousel-code.js', array('jquery'), '1.0', true);
        }
    }
}

// Post carousel plugin styles

function enqueue_institucionalmt_post_carousel_style()
{
    wp_enqueue_style('institucionalmt_post_carousel_style', plugin_dir_url(__FILE__) . '/admin/css/institucionalmt-post-carousel-style.css');
}

add_action('wp_enqueue_scripts', 'enqueue_institucionalmt_post_carousel_style');






