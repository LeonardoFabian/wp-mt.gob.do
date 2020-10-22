<?php

/**
 * Card widget class with Icon
 *
 * @since 1.0
 */

function institucionalmt_register_map_card_widget()
{
    register_widget('InstitucionalMT_Map_Card_Widget');
}

add_action('widgets_init', 'institucionalmt_register_map_card_widget');

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


class InstitucionalMT_Map_Card_Widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            // widget ID
            'institucionalmt_map_card',
            // widget name
            __('InstitucionalMT Map Card Widget', 'institucionalmt'),
            // widget description
            array(
                'description' => __('Two equal columns map cards layout (InstitucionalMT)', 'institucionalmt'),
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

        echo $args['before_widget'];

        // if title is present
        /*
        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
        */
        // output
?>
        <!-- Grid column -->
        <div class="col-12 col-md-5 text-center">

            <!-- Card -->
            <div class="card map-card">

                <!-- Map -->
                <div id="<?php echo $this->id ?>" class="z-depth-1-half map-container" style="height:150px">
                    <!--<iframe src="<?php echo $instance['map_uri']; ?>" frameborder="0" style="border:0" allowfullscreen></iframe>-->
                    <?php echo $instance['map_uri']; ?>
                    
                </div>

                <!-- Content -->
                <div class="card-body closed px-0">

                    <div class="button px-2 mt-3">
                        <a class="btn-floating btn-lg living-coral float-right"><?php echo apply_filters('float_btn_icon', $instance['float_btn_icon']); ?></a>
                    </div>

                    <div class="white px-4 pb-4 pt-3-5">

                        <!-- Title -->
                        <h5 class="map-card-title card-title h5 text-left"><?php echo apply_filters('widget_title', $instance['title']); ?></h5>

                        <div class="d-flex justify-content-between">
                            <h5 class="card-subtitle font-weight-light"><?php echo apply_filters('contact_name', $instance['contact_name']); ?></h5>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-small font-weight-light mt-n1"><?php echo apply_filters('contact_position', $instance['contact_position']); ?></h6>
                        </div>

                        <hr>

                        <div class="row justify-content-between pt-2 mt-1 text-center text-uppercase">
                            <div class="col-12 col-sm-6">
                                <i class="fas fa-phone fa-lg mb-3 primary-color"></i>
                                <p class="mb-0"><?php echo apply_filters('contact_phone', $instance['contact_phone']); ?></p>
                            </div>
                            <div class="col-12 col-sm-6">
                                <i class="fa fa-mobile fa-lg mb-3 primary-color"></i>
                                <p class="mb-0"><?php echo apply_filters('contact_mobile', $instance['contact_mobile']); ?></p>
                            </div>
                        </div>

                        <hr>

                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th scope="row" class="px-0 ">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </th>
                                    <td class="text-left"><?php echo apply_filters('address', $instance['address']); ?></td>
                                </tr>
                                <tr class="mt-2">
                                    <th scope="row" class="px-0 ">
                                        <i class="fas fa-cloud-moon"></i>
                                    </th>
                                    <td class=" text-left"><?php echo apply_filters('email', $instance['email']); ?></td>
                                </tr>
                                <tr class="mt-2">
                                    <th scope="row" class="px-0 ">
                                        <i class="far fa-clock"></i>
                                    </th>
                                    <td class="text-left"><?php echo apply_filters('schedule', $instance['schedule']); ?></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <!-- white -->
                </div>
                <!-- Content -->

            </div>
            <!-- Card -->

        </div>
        <!-- Grid column -->

    <?php
        //echo __('Buscador', 'institucionalmt');

        echo $args['after_widget'];
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
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo $instance['title']; ?>" class="widefat" maxlength="50" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('map_uri'); ?>">Map HTML Code</label><br />
            <input type="textarea" name="<?php echo $this->get_field_name('map_uri'); ?>" id="<?php echo $this->get_field_id('map_uri'); ?>" value="<?php echo $instance['map_uri']; ?>" class="widefat" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('float_btn_icon'); ?>">Float button icon</label><br />
            <small class="text-muted font-italic">Ex.: "fas fa-hand-holding"</small>
            <input type="text" name="<?php echo $this->get_field_name('float_btn_icon'); ?>" id="<?php echo $this->get_field_id('float_btn_icon'); ?>" value="<?php echo $instance['float_btn_icon']; ?>" class="widefat" maxlength="50"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('contact_name'); ?>">Contact Name</label><br />
            <input type="text" name="<?php echo $this->get_field_name('contact_name'); ?>" id="<?php echo $this->get_field_id('contact_name'); ?>" value="<?php echo $instance['contact_name']; ?>" class="widefat" maxlengt="50" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('contact_position'); ?>">Contact Position</label><br />
            <input type="text" name="<?php echo $this->get_field_name('contact_position'); ?>" id="<?php echo $this->get_field_id('contact_position'); ?>" value="<?php echo $instance['contact_position']; ?>" class="widefat" maxlength="50" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('contact_phone'); ?>">Contact Phone</label><br />
            <input type="text" name="<?php echo $this->get_field_name('contact_phone'); ?>" id="<?php echo $this->get_field_id('contact_phone'); ?>" value="<?php echo $instance['contact_phone']; ?>" class="widefat" maxlength="25" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('contact_mobile'); ?>">Contact Mobile</label><br />
            <input type="number" name="<?php echo $this->get_field_name('contact_mobile'); ?>" id="<?php echo $this->get_field_id('contact_mobile'); ?>" value="<?php echo $instance['contact_mobile']; ?>" class="widefat" maxlength="11" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('address'); ?>">Contact Address</label><br />
            <input type="textarea" name="<?php echo $this->get_field_name('address'); ?>" id="<?php echo $this->get_field_id('address'); ?>" value="<?php echo $instance['address']; ?>" class="widefat" maxlength="100" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('email'); ?>">Contact Email</label><br />
            <input type="email" name="<?php echo $this->get_field_name('email'); ?>" id="<?php echo $this->get_field_id('email'); ?>" value="<?php echo $instance['email']; ?>" class="widefat" maxlength="100" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('schedule'); ?>">Contact Schedule</label><br />
            <input type="text" name="<?php echo $this->get_field_name('schedule'); ?>" id="<?php echo $this->get_field_id('schedule'); ?>" value="<?php echo $instance['schedule']; ?>" class="widefat" maxlength="25" />
        </p>
        <!-- 
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">
                <?php _e('Title:'); ?>
            </label>

            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
    -->
<?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;

        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['map_uri'] = (!empty($new_instance['map_uri'])) ? strip_tags($new_instance['map_uri'], '<iframe>') : '';
        $instance['float_btn_icon'] = (!empty($new_instance['float_btn_icon'])) ? strip_tags($new_instance['float_btn_icon'], '<i>') : '';
        $instance['contact_name'] = (!empty($new_instance['contact_name'])) ? strip_tags($new_instance['contact_name']) : '';
        $instance['contact_position'] = (!empty($new_instance['contact_position'])) ? strip_tags($new_instance['contact_position']) : '';
        $instance['contact_phone'] = (!empty($new_instance['contact_phone'])) ? strip_tags($new_instance['contact_phone']) : '';
        $instance['contact_mobile'] = (!empty($new_instance['contact_mobile'])) ? strip_tags($new_instance['contact_mobile']) : '';

        $instance['address'] = (!empty($new_instance['address'])) ? strip_tags($new_instance['address']) : '';
        $instance['email'] = (!empty($new_instance['email'])) ? strip_tags($new_instance['email']) : '';
        $instance['schedule'] = (!empty($new_instance['schedule'])) ? strip_tags($new_instance['schedule']) : '';

        return $instance;
    }
}
