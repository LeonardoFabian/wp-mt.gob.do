<?php 

include_once( INSTMT_SLIDESHOW_PLUGIN_DIR_PATH . 'public/partials/instmt-slideshow-slider.php' );

/**
 * Widgets del plugin
 * Cada clase widget hereda de la clase WP_Widget
 */
if( ! class_exists( 'InstitucionalMT_Slideshow_Widget' ) ){

    class InstitucionalMT_Slideshow_Widget extends WP_Widget{

        /**
         * Método constructor
         */
        public function __construct(){
    
            $widget_options = [
                'classname' => 'instmt-slideshow-widget',
                'description' => __( 'Añade un slide de imagenes', 'instmtslideshow' )
            ];
    
            $control_options = [
                'height' => 200,
                'width' => 250,
            ];
    
            parent::__construct( 'instmt-slideshow-widget', __('MT Slideshow', 'instmtslideshow' ), $widget_options, $control_options );
    
        }
    
        public function widget( $args, $instance ){
    
            extract( $args, EXTR_SKIP );

            $title = isset( $instance['title'] ) ? $instance['title'] : '';

            echo $before_widget;

                if( ! empty( $instance['title'] ) ) :

                    echo $before_title . '<h4 class="widget-title">' . $title . '</h4>' . $after_title; 

                endif;

                institucionalmt_multiple_items_slide();

            echo $after_widget;
                
        }

        public function update( $new_instance, $old_instance ){

            $instance = $old_instance;
            $instance['title'] = strip_tags( $new_instance['title'] );
            return $instance;
    
        }
    
        public function form( $instance ){
    
            $title_id = $this->get_field_id( 'title' );
            $title_name = $this->get_field_name( 'title' );
            $title_val = esc_attr( $instance['title'] );

            $form = "
                <p>
                    <label for='$title_id'>" . __('Título', 'instmtslideshow') . "</label><br />
                    <input type='text' name='$title_name' id='$title_id' value='$title_val' class='widefat' maxlength='50' />            
                </p>
            ";

            echo $form;
    
        }       
    
    }

}