<?php 

class InstitucionalMT_Widget extends WP_Widget {

    public function __construct(){

        $widget_options = [
            'classname' => 'instmt-widget',
            'description' => 'Este es una prueba de un Widget'
        ];

        $control_options = [
            'height' => 200,
            'width' => 250,
            // // se usa cuando se crearan mas de una instancia de un widget: {id_base}-{numero_unico}
            //'id_base' => array()
        ];

        parent::__construct( 'instmt-plugin-widget', __('InstitucionalMT Widget personalizado', 'textdomain'), $widget_options, $control_options );
    }

    public function widget( $args, $instance ){

        extract( $args, EXTR_SKIP );

        $titulo = isset( $instance['title'] ) ? $instance['title'] : 'Ingresa un titulo';
        $contenido = isset( $instance['content'] ) ? $instance['content'] : 'Ingresa el contenido';

        $output = "
            $before_widget
                $before_title $titulo $after_title
                $contenido 
            $after_widget        
        ";

        echo $output;

    }

    public function update( $new_instance, $old_instance ){

        return $new_instance;

    }

    public function form($instance)
    {

        $title_id = $this->get_field_id( 'title' );
        $title_name = $this->get_field_name( 'title' );
        $title_val = esc_attr( $instance['title'] );

        $content_id = $this->get_field_id( 'content' );
        $content_name = $this->get_field_name( 'content' );
        $content_val = esc_attr( $instance['content'] );

        $form = "
        <p>
            <label for='$title_id'>Title</label><br />
            <input type='text' name='$title_name' id='$title_id' value='$title_val' class='' maxlength='50' />
            <label for='$content_id'>Content</label><br />
            <textarea id='$content_id' name='$content_name'>$content_val</textarea>
        </p>
        ";

        echo $form;

    }

}