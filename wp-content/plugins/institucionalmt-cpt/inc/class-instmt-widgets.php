<?php 

    /**
     * List custom post 'instmt_viceministro'
     */
    function institucionalmt_list_viceministros(){

        // query arguments
        $args = [
            'post_type' => 'instmt_viceministro',
            'posts_per_page' => 6
        ];

        // query
        $query = new WP_Query( $args );

        if( $query->have_posts() ) :

            ?>

                <!-- Grid row-->
                <div class="instmt-viceministros-post row text-center text-md-left">

                    <?php while( $query->have_posts() ) : $query->the_post(); ?>

                        <!-- Grid column -->
                        <div id="post-<?php the_ID(); ?>" <?php post_class( 'col-lg-12 col-md-12 mb-5 d-md-flex justify-content-between' ); ?>>
                            <div class="col-sm-12 col-lg-4 col-md-4 our-team-avatar mb-md-0 mb-4 ">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail('post-thumbnail', array('class' => 'img-fluid rounded z-depth-1')); ?>
                                <?php endif; ?>         
                            </div>
                            <div class="col-sm-12 col-lg-8 col-md-8">
                                <h4 class="font-weight-bold mb-3"><?php the_title(); ?></h4>                               
                                <p class="grey-text"><?php the_content(); ?></p>
                                <!-- Facebook-->
                                <a class="p-2 fa-lg fb-ic">
                                <i class="fab fa-facebook-f"> </i>
                                </a>
                                <!-- Twitter -->
                                <a class="p-2 fa-lg tw-ic">
                                <i class="fab fa-twitter"> </i>
                                </a>
                                <!--Dribbble -->
                                <a class="p-2 fa-lg dribbble-ic">
                                <i class="fab fa-dribbble"> </i>
                                </a>
                            </div>
                        </div>
                        <!-- Grid column -->

                    <?php endwhile; ?>

                </div>
                <!-- Grid row-->

            <?php

        endif;

        wp_reset_postdata();

    }

/**
 * Agregar aqui los Widgets del plugin
 * Cada clase Widget hereda de la clase WP_Widget
 */

class InstitucionalMT_Our_Team_Widget extends WP_Widget {    

    /**
     * Método constructor
     */
    public function __construct(){

        $widget_options = [
            'classname' => 'instmt_our_team_widget',
            'description' => __('Muestra una lista con informaciones sobre el equipo de trabajo', 'institucionalmt')
        ];

        $control_options = [
            'height' => 200,
            'width' => 250,
            // // se usa cuando se crearan mas de una instancia de un widget: {id_base}-{numero_unico}
            //'id_base' => array()
        ];

        parent::__construct( 'instmt_plugin_our_team_widget', __('InstitucionalMT Our Team Widget', 'institucionalmt'), $widget_options, $control_options );

    }

    /**
     * Función para mostrar el Widget en el lado del cliente
     */
    public function widget( $args, $instance ){

        extract( $args, EXTR_SKIP );

        $titulo = isset( $instance['title'] ) ? $instance['title'] : '';       

        // Vista
        echo $before_widget; 
        
        ?>
            
            <div class='instmt-our-team'>

                <?php if( ! empty( $title ) ) : ?>
                    
                    <?php echo $before_title . '<h4 class="widget-title">' . $title . '</h4>' . $after_title; ?>

                <?php endif; ?>

                <?php institucionalmt_list_viceministros(); ?>

            </div>

        <?php
    
        echo $after_widget;      

    }

    /**
     * Función para definir los datos almacenados por el Widget
     */
    public function update( $new_instance, $old_instance ){

        $instance = $old_instance;
        $instance['title'] = strip_tags( $new_instance['title'] );
        return $instance;

    }

    /**
     * Función para mostrar el formulario del Widget
     */
    public function form($instance)
    {

        $title_id = $this->get_field_id( 'title' );
        $title_name = $this->get_field_name( 'title' );
        $title_val = esc_attr( $instance['title'] );        

        $form = "
        <p>
            <label for='$title_id'>" . __('Título', 'institucionalmt') . "</label><br />
            <input type='text' name='$title_name' id='$title_id' value='$title_val' class='' maxlength='50' />            
        </p>
        ";

        echo $form;

    }

}