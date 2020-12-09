<?php

/**
 * Función para mostrar el carousel
 */
function display_institucionalmt_carousel()
{

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 5,
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => 'noticias-destacadas'
            )
        )
    );

    $query = new WP_Query($args);   ?>

    <?php if ($query->have_posts()) : ?>

        <div id="institucionalmtCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">

                <!-- ul width adjust to the (N*100)% of container -->
                <?php while ($query->have_posts()) : $query->the_post(); ?>

                    <div class="carousel-item text-center">

                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute() ?>">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('post_thumbnail', array('class' => 'd-block w-100 img-fluid'));
                            }
                            ?>
                        </a>

                        <div class="carousel-caption d-none d-md-block">
                            <div class="container">
                                <div class="text-left">
                                    <time datetime="<?php echo esc_attr( get_the_date('c') ) ?>"><?php echo esc_html( get_the_date() ) ?></time>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute() ?>">
                                        <h3 class="carousel-item-title"><?php the_title(); ?></h3>
                                    </a>
                                </div>
                                <div class="carousel-item-description-wrap text-left">
                                    <div class="carousel-item-description lead">
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                <?php endwhile; ?>

            </div>

            <a class="carousel-control-prev" href="#institucionalmtCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#institucionalmtCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>

    <?php else : ?>
        <?php __('No hay publicaciones para mostrar', 'instmtcarousel'); ?>
    <?php endif; ?>

    <?php wp_reset_postdata(); ?>

    <?php

}


/**
 * Widgets del plugin
 * Cada clase Widget hereda de la clase WP_Widget
 */

class InstitucionalMT_Carousel_Widget extends WP_Widget
{

    /**
     * Método constructor
     */
    public function __construct()
    {

        $widget_options = [
            'classname' => 'instmt-carousel-widget',
            'description' => __('Añade un carousel de tus entradas mediante una categoría asignada', 'instmtcarousel')
        ];

        $control_options = [
            'height' => 200,
            'width' => 250,
        ];

        parent::__construct('instmt-carousel-widget', __('InstitucionalMT Carousel', 'instmtcarousel'), $widget_options, $control_options);
    }

    /**
     * Función para mostrar el widget en el sitio web
     */
    public function widget($args, $instance)
    {

        extract($args, EXTR_SKIP);

        $title = isset($instance['title']) ? $instance['title'] : '';

        // Vista
        echo $before_widget;

    ?>


        <?php if (!empty($title)) : ?>

            <?php echo $before_title . '<h4 class="widget-title">' . $title . '</h4>' . $after_title; ?>

        <?php endif; ?>

        <?php display_institucionalmt_carousel(); ?>



<?php

        echo $after_widget;
    }

    /**
     * Función para definir los datos almacenados por el widget
     */
    public function update($new_instance, $old_instance)
    {

        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }

    /**
     * Función para mostrar el formulario del widget
     * en el área de Widgets
     */
    public function form($instance)
    {

        $title_id = $this->get_field_id('title');
        $title_name = $this->get_field_name('title');
        $title_val = esc_attr($instance['title']);

        $form = "
        <p>
            <label for='$title_id'>" . __('Título', 'institucionalmt') . "</label><br />
            <input type='text' name='$title_name' id='$title_id' value='$title_val' class='widefat' maxlength='50' />            
        </p>
        ";

        echo $form;
    }
}
