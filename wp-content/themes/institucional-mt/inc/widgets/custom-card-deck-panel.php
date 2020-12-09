<?php

/**
 * Card Deck Panel widget class with Icon
 *
 * @since 1.0
 */

function institucionalmt_register_card_deck_panel_widget()
{
    register_widget('InstitucionalMT_Card_Deck_Panel_Widget');
}

add_action('widgets_init', 'institucionalmt_register_card_deck_panel_widget');

// Enqueue additional admin scripts
/*
add_action('admin_enqueue_scripts', 'custom_service_card_script');

function custom_service_card_script()
{
    wp_enqueue_media();
    wp_enqueue_script('institucionalmt-custom-service-card', get_template_directory_uri() . '/admin/js/widget.js', false, '1.0', true);
    wp_enqueue_script('institucionalmt-custom-service-icon', get_template_directory_uri() . '/admin/js/icon-upload.js', false, '1.0', true);
}
*/

class InstitucionalMT_Card_Deck_Panel_Widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            // widget ID
            'institucionalmt_card_deck_panel',
            // widget name
            __('InstitucionalMT Card Deck Panel Widget', 'institucionalmt'),
            // widget description
            array(
                'description' => __('Need a set two cards of equal width and height panels that aren’t attached to one another? Use decks. (InstitucionalMT)', 'institucionalmt'),
            )
        );
    }

    function ctUp_ads()
    {
        $widget_ops = array('classname' => 'ctUp_ads');
        $this->WP_Widget('ctUp-ads-widget', 'EOWT', $widget_ops);
    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);

        echo $args['before widget'];

        // if title is present
        /*
        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
        */
        // output
?>
        <div class="col-12 col-md-6 card text-center">
            <div class="card-body">
                <p class="mt-4 pt-2"><i class="<?php echo apply_filters('fontawesome_icon', $instance['fontawesome_icon']); ?>"></i></p>
                <h5 class="font-weight-normal my-4 py-2"><a class="dark-grey-text" href="<?php echo apply_filters('service_uri', $instance['service_uri']); ?>"><?php echo apply_filters('widget_title', $instance['title']); ?></a></h5>
                <?php if (empty(apply_filters('fontawesome_icon', $instance['fontawesome_icon']))) : ?>
                    <img src="<?php echo esc_url($instance['custom_icon_uri']); ?>" class="custom_icon_uri img-fluid" style="max-height: 100px;" />
                <?php endif;     ?>
                <p class="card-text text-muted"><?php echo apply_filters('description', $instance['description']); ?></p>

            </div>
        </div>

    <?php
        //echo __('Buscador', 'institucionalmt');

        echo $args['after widget'];
    }



    public function form($instance)
    {
        if (isset($instance['title']))
            $title = $instance['title'];
        else {
            $title = __('Default title', 'institucionalmt');
        }
    ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title</label><br />
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo $instance['title']; ?>" class="widefat" maxlengt="50" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('fontawesome_icon'); ?>">Fontawesome icon</label><br />
            <small class="text-muted font-italic">Ex.: "fas fa-hand-holding"</small>
            <input type="text" name="<?php echo $this->get_field_name('fontawesome_icon'); ?>" id="<?php echo $this->get_field_id('fontawesome_icon'); ?>" value="<?php echo $instance['fontawesome_icon']; ?>" class="widefat" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('custom_icon_uri'); ?>">Custom icon image</label><br />
            <img class="<?php echo $this->id ?>_ico" src="<?php echo (!empty($instance['custom_icon_uri'])) ? $instance['custom_icon_uri'] : ''; ?>" style="margin:0;padding:0;max-width:100%;display:block;background:#f5f5f5;" />
            <input type="text" class="widefat <?php echo $this->id ?>_uri" name="<?php echo $this->get_field_name('custom_icon_uri'); ?>" value="<?php echo $instance['custom_icon_uri']; ?>" style="margin-top:5px;" />
            <input type="button" id="<?php echo $this->id ?>" class="button button-primary js_custom_upload_icon" value="Upload custom icon image" style="margin-top:5px;" />
        </p>        
        <p>
            <label for="<?php echo $this->get_field_id('description'); ?>">Description</label><br />
            <input type="text" name="<?php echo $this->get_field_name('description'); ?>" id="<?php echo $this->get_field_id('description'); ?>" value="<?php echo $instance['description']; ?>" class="widefat" maxlengt="75" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('service_uri'); ?>">Service URL</label><br />
            <input type="text" name="<?php echo $this->get_field_name('service_uri'); ?>" id="<?php echo $this->get_field_id('service_uri'); ?>" value="<?php echo $instance['service_uri']; ?>" class="widefat" />
        </p>
        
<?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;

        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['fontawesome_icon'] = (!empty($new_instance['fontawesome_icon'])) ? strip_tags($new_instance['fontawesome_icon']) : '';
        $instance['custom_icon_uri'] = (!empty($new_instance['custom_icon_uri'])) ? strip_tags($new_instance['custom_icon_uri']) : '';
        $instance['description'] = (!empty($new_instance['description'])) ? strip_tags($new_instance['description']) : '';
        $instance['service_uri'] = (!empty($new_instance['service_uri'])) ? strip_tags($new_instance['service_uri']) : '';

        return $instance;
    }
}
