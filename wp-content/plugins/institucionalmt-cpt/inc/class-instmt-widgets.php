<?php 

/**
 * Agregar aqui los Widgets del plugin
 * Cada clase Widget hereda de la clase WP_Widget
 */

class InstitucionalMT_Widget extends WP_Widget {

    public function __construct(){

        $widget_options = [
            'classname' => 'instmt-widget',
            'description' => __('Este es una prueba de un Widget', 'institucionalmt')
        ];

        $control_options = [
            'height' => 200,
            'width' => 250,
            // // se usa cuando se crearan mas de una instancia de un widget: {id_base}-{numero_unico}
            //'id_base' => array()
        ];

        parent::__construct( 'instmt-plugin-widget', __('InstitucionalMT Widget personalizado', 'institucionalmt'), $widget_options, $control_options );
    }

    public function widget( $args, $instance ){

        extract( $args, EXTR_SKIP );

        $titulo = isset( $instance['title'] ) ? $instance['title'] : __('Ingresa un titulo', 'institucionalmt');
        $contenido = isset( $instance['content'] ) ? $instance['content'] : __('Ingresa el contenido', 'institucionalmt');

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
            <label for='$title_id'>" . __('Título', 'institucionalmt') . "</label><br />
            <input type='text' name='$title_name' id='$title_id' value='$title_val' class='' maxlength='50' />
            <label for='$content_id'>" . __('Contenido', 'institucionalmt') . "</label><br />
            <textarea id='$content_id' name='$content_name'>$content_val</textarea>
        </p>
        ";

        echo $form;

    }

}