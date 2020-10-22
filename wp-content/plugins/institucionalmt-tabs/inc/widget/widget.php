<?php

/**
 * InstitucionalMT responsive tabs widget 
 * @since 1.0.0 
 */

function InstitucionalMT_Responsive_Tabs_Widget()
{
    register_widget('InstitucionalMT_Responsive_Tabs_Widget');
}
add_action('widgets_init', 'InstitucionalMT_Responsive_Tabs_Widget');


class InstitucionalMT_Responsive_Tabs_Widget extends WP_Widget
{

    /**
     * Register widget with WordPress
     */
    function __construct()
    {
        parent::__construct(
            // ID
            'institucionalmt_responsive_tabs',
            // name 
            __('InstitucionalMT Responsive Tabs Widget', 'institucioanlmt'),
            // description 
            array(
                'description' => __('Muestra tus tabs en un widget area','institucionalmt'),
            )
        );
    }

    /**
     * Front-end display of widget
     */
    public function widget( $args, $instance )
    {
        $title = apply_filters( 'widget_title', $instance['title'] );

        echo $args[ 'before widget' ];

        echo $args[ 'after widget' ];
    }

    /**
     * Back-end widget form
     * @see WP_Widget::form()
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance )
    {
        if( isset( $instance['title'] ) ){
            $title = $instance['title'];
        } else {
            $title = "Responsive Tab Shortcode";
        }

        if( isset( $instance['shortcode'] ) ){
            $shortcode = $instance['shortcode'];
        } else {
            $shortcode = "Select Any Tabs";
        }
        // FORM
        ?>
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>">Title</label><br/>
                <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo $instance['title']; ?>" class="widefat" maxlength="50" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('shortcode'); ?>" ><?php _e( 'Select Tabs' ); ?> (Required)</label>
            </p>
        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     */
    public function update( $new_instance, $old_instance )
    {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['shortcode'] = ( ! empty( $new_instance['shortcode'] ) ) ? strip_tags( $new_instance['shortcode'] ) : 'Select Any Tab';

        return $instance;
    }

} // end of Widget Class
