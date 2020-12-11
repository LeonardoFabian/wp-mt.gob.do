<?php

/**
 * Search_Form widget class with Icon
 *
 * @since 1.0
 */

function _themename_register_widget()
{
    register_widget('_themename_search_widget');
}

add_action('widgets_init', '_themename_register_widget');


class _themename_search_widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            // widget ID
            '_themename_searchform',
            // widget name
            __('_themename Searchform Widget', '_themename'),
            // widget description
            array(
                'description' => __('Formulario de búsqueda personalizado (_themename)', '_themename'),
            )
        );
    }

    public function widget($args, $instance)
    {
        $title = apply_filters('title', $instance['title'] );

        echo $args['before_widget'];

        // if title is present
        if (!empty($title)) {
            echo $args['before_title'] . '' . $args['after_title'];
        }
        // output
        $text = '';
?>

        <div class="">
            <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="input-group">
                    <input class="form-control py-2 " type="search" value="<?php echo esc_html($text); ?>" id="s" name="s" placeholder="<?php echo apply_filters('title', $instance['title']); ?>">
                    <span class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
        </div>


    <?php
        //echo __('Buscador', '_themename');

        echo $args['after_widget'];
    }

    public function form($instance)
    {
        if (isset($instance['title']))
            $title = $instance['title'];
        else {
            $title = __('', '_themename');
        }
    ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">
                <?php _e('Title:'); ?>
            </label>

            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
<?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();

        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';

        return $instance;
    }
}
