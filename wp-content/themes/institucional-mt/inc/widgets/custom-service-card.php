<?php

/**
 * Card widget class with Icon
 *
 * @since 1.0
 */

function _themename_register_service_card_widget()
{
    register_widget('_themename_Service_Cards_Widget');
}

add_action('widgets_init', '_themename_register_service_card_widget');

// Enqueue additional admin scripts
add_action('admin_enqueue_scripts', 'custom_service_card_script');

function custom_service_card_script()
{
    wp_enqueue_media();
    wp_enqueue_script('_themename-custom-service-card', get_template_directory_uri() . '/admin/js/widget.js', false, '1.0', true);
    wp_enqueue_script('_themename-custom-service-icon', get_template_directory_uri() . '/admin/js/icon-upload.js', false, '1.0', true);
}


class _themename_Service_Cards_Widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            // widget ID
            '_themename_service_card',
            // widget name
            __('_themename Service Card Widget', '_themename'),
            // widget description
            array(
                'description' => __('Three equal columns service cards layout (_themename)', '_themename'),
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
        
        $title = apply_filters('widget_title', $instance['front-page-portfolio-title']);

        echo $args['before_widget'];

        // if title is present
        
        if (!empty($title)) {
            echo $args['before_title'] . '' . $args['after_title'];
        }
        
        // output
?>
        <!-- Grid column -->
        <div class="mb-4 d-flex align-items-stretch" style="max-height:430px;">
            
                <!-- Card -->
                <div class="card card-image" style="background-image: url('<?php echo esc_url($instance['image_uri']); ?>');">
                    <!--<img src="<?php echo esc_url($instance['image_uri']); ?>" />-->
                    <!-- Service Card -->
                    <div class="text-white text-center pricing-card d-flex align-items-center rgba-stylish-strong py-3 px-3">
                        <!-- Content -->
                        <div class="card-body">
                            <a href="" class="text-decoration-none">
                                <div class="icon-wrapper">
                                    <?php if(! empty( $instance['front-page-portfolio-fontawesome-icon'])) : ?>
                                        <h2 class="text-center"><i class="<?php echo apply_filters('front-page-portfolio-fontawesome-icon', $instance['front-page-portfolio-fontawesome-icon']); ?>"></i></h2>
                                    <?php endif; ?>
                                    <?php if (empty(apply_filters('front-page-portfolio-fontawesome-icon', $instance['front-page-portfolio-fontawesome-icon']))
                                        
                                    ) : ?>
                                        <img src="<?php echo esc_url($instance['custom_icon_uri']); ?>" class="custom_icon_uri img-fluid" style="max-height: 100px;" />
                                    <?php else : ?>
                                    <?php endif; ?>
                                </div>
                            </a>
                            <?php if(! empty( $instance['front-page-portfolio-title'])) : ?>
                                <h4 class="home-card-title card-title pt-2"><?php echo apply_filters('widget_title', $instance['front-page-portfolio-title']); ?></h4>
                            <?php else : ?>
                            <?php endif; ?>
                            <?php if(! empty( $instance['front-page-portfolio-description'])) : ?>
                            <div class="card-text-wrapper d-none d-sm-block" style="white-space: initial;overflow:hidden;">
                                <p><?php echo apply_filters('description', $instance['front-page-portfolio-description']) . '...'; ?></p>
                            </div>
                            <?php else : ?>
                            <?php endif; ?>
                            <div class="service-card-footer text-center d-none d-sm-block">
                                <a href="<?php echo esc_url($instance['service_uri']); ?>" class="btn btn-lg btn-primary btn-outline-white">Consultar</a>
                            </div>
                        </div>
                        <!-- Content -->
                    </div>
                    <!-- Service Card -->
                </div>
                <!-- Card -->
            
        </div>
        <!-- Grid column -->

    <?php
        //echo __('Buscador', '_themename');

        echo $args['after_widget'];
    }

    public function form($instance)
    {
        if (isset($instance['front-page-portfolio-title']))
            $title = $instance['front-page-portfolio-title'];
        else {
            $title = '';
        }
        if (isset($instance['front-page-portfolio-description']))
            $description = $instance['front-page-portfolio-description'];
        else {
            $description = '';
        }
        if (isset($instance['front-page-portfolio-fontawesome-icon']))
            $fontawesome_icon = $instance['front-page-portfolio-fontawesome-icon'];
        else {
            $fontawesome_icon = '';
        }        
        
    ?>

        <p>
            <label for="<?php echo $this->get_field_id('front-page-portfolio-title'); ?>">Title</label><br />
            <input type="text" name="<?php echo $this->get_field_name('front-page-portfolio-title'); ?>" id="<?php echo $this->get_field_id('front-page-portfolio-title'); ?>" value="<?php echo $title; ?>" class="widefat" maxlengt="50" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('front-page-portfolio-fontawesome-icon'); ?>">Fontawesome icon</label><br />
            <small class="text-muted font-italic">Ex.: "fas fa-hand-holding"</small>
            <input type="text" name="<?php echo $this->get_field_name('front-page-portfolio-fontawesome-icon'); ?>" id="<?php echo $this->get_field_id('front-page-portfolio-fontawesome-icon'); ?>" value="<?php echo $fontawesome_icon; ?>" class="widefat" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('custom_icon_uri'); ?>">Custom icon</label><br />
            <img class="<?php echo $this->id ?>_ico" src="<?php echo (!empty($instance['custom_icon_uri'])) ? $instance['custom_icon_uri'] : ''; ?>" style="margin:0;padding:0;max-width:100%;display:block;" />
            <input type="text" class="widefat <?php echo $this->id ?>_uri" name="<?php echo $this->get_field_name('custom_icon_uri'); ?>" value="<?php echo $instance['custom_icon_uri']; ?>" style="margin-top:5px;" />
            <input type="button" id="<?php echo $this->id ?>" class="button button-primary js_custom_upload_icon" value="Upload image" style="margin-top:5px;" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('image_uri'); ?>">Background image</label><br />
            <img class="<?php echo $this->id ?>_img" src="<?php echo (!empty($instance['image_uri'])) ? $instance['image_uri'] : ''; ?>" style="margin:0;padding:0;max-width:100%;display:block;" />
            <input type="text" class="widefat <?php echo $this->id ?>_url" name="<?php echo $this->get_field_name('image_uri'); ?>" value="<?php echo $instance['image_uri']; ?>" style="margin-top:5px;" />
            <input type="button" id="<?php echo $this->id ?>" class="button button-primary js_custom_upload_media" value="Upload image" style="margin-top:5px;" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('front-page-portfolio-description'); ?>">Description</label><br />
            <input type="text" name="<?php echo $this->get_field_name('front-page-portfolio-description'); ?>" id="<?php echo $this->get_field_id('front-page-portfolio-description'); ?>" value="<?php echo $description; ?>" class="widefat" maxlength="80"/>
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

        $instance['front-page-portfolio-title'] = (!empty($new_instance['front-page-portfolio-title'])) ? strip_tags($new_instance['front-page-portfolio-title']) : '';
        $instance['front-page-portfolio-fontawesome-icon'] = (!empty($new_instance['front-page-portfolio-fontawesome-icon'])) ? strip_tags($new_instance['front-page-portfolio-fontawesome-icon']) : '';
        $instance['custom_icon_uri'] = (!empty($new_instance['custom_icon_uri'])) ? strip_tags($new_instance['custom_icon_uri']) : '';
        $instance['image_uri'] = (!empty($new_instance['image_uri'])) ? strip_tags($new_instance['image_uri']) : '';
        $instance['front-page-portfolio-description'] = (!empty($new_instance['front-page-portfolio-description'])) ? strip_tags($new_instance['front-page-portfolio-description']) : '';
        $instance['service_uri'] = (!empty($new_instance['service_uri'])) ? strip_tags($new_instance['service_uri']) : '';

        return $instance;
    }
}
