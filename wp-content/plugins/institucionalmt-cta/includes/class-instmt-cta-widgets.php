<?php

/**
 * Widgets del plugin
 * Cada clase Widget hereda de la clase WP_Widget
 */

class InstitucionalMT_CTA_Button_Widget extends WP_Widget
{

    /**
     * Método constructor
     */
    public function __construct()
    {

        $widget_options = [
            'classname' => 'instmt-cta-widget',
            'description' => __('Añade un botón de llamada a la acción, con texto personalizado y enlace', 'institucionalmtcta')
        ];

        $control_options = [
            'height' => 200,
            'width' => 250,
        ];

        parent::__construct('instmt-cta-button-widget', __('InstitucionalMT CTA Button', 'institucionalmtcta'), $widget_options, $control_options);
    }

    /**
     * Función para mostrar el widget en el sitio web
     */
    public function widget($args, $instance)
    {

        extract($args, EXTR_SKIP);

        // Variables
        $title = isset($instance['title']) ? apply_filters('widget_title', $instance['title']) : '';
        $text = isset($instance['text']) ? $instance['text'] : '';
        $link = isset($instance['link']) ? $instance['link'] : '';
        $target = isset($instance['target']) ? $instance['target'] : '';
        $alignment = isset($instance['alignment']) ? $instance['alignment'] : '';
        $class = isset($instance['class']) ? $instance['class'] : '';


        // var_dump($instance);

        // Vista
        $output = "

            $before_widget
                
            <div class='instmt-cta {$alignment}'>

                $before_title  $title $after_title                         

               <a href='$link' target='$target' class='btn-instmt-cta-xl btn-primary {$class}'>$text</a>              

            </div>
        
            $after_widget

        ";

        echo $output;
    }

    /**
     * Función para definir los datos almacenados por el widget
     */
    public function update($new_instance, $old_instance)
    {

        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['text'] = strip_tags($new_instance['text']);
        $instance['link'] = strip_tags($new_instance['link']);
        $instance['alignment'] = strip_tags($new_instance['alignment']);
        $instance['target'] = strip_tags($new_instance['target']);
        $instance['class'] = strip_tags($new_instance['class']);
        return $instance;
    }

    /**
     * Función para mostrar el formulario del widget
     * en el área de Widgets
     */
    public function form($instance)
    { 
      
        $title = ( isset($instance['title']) ) ? $instance['title'] : '';
        
        $text = (isset($instance['text'])) ? $instance['text'] : '';
        
        $link = (isset($instance['link'])) ? $instance['link'] : '';      
        
        $class = (isset($instance['class'])) ? $instance['class'] : '';
        
        ?>

        <?php extract($instance, EXTR_OVERWRITE); ?>
        <div style="margin-top:30px;"></div>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_attr_e('Título', 'institucionalmtcta'); ?></label><br />
            <input type='text' name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo $title ?>" class='widefat' maxlength='50' />

        </p>
        <p>
            <label for="<?php echo $this->get_field_id('text'); ?>"><?php esc_attr_e('Texto del botón', 'institucionalmtcta'); ?></label><br />
            <input type='text' name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>" value="<?php echo $text ?>" class='widefat' maxlength='50' />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('link'); ?>"><?php esc_attr_e('Enlace del botón', 'institucionalmtcta'); ?></label><br />
            <input type='text' name="<?php echo $this->get_field_name('link'); ?>" id="<?php echo $this->get_field_id('link'); ?>" value="<?php echo $link ?>" class='widefat' maxlength='' />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('class'); ?>"><?php esc_attr_e('Clases personalizadas', 'institucionalmtcta'); ?></label><br />
            <input type='text' name="<?php echo $this->get_field_name('class'); ?>" id="<?php echo $this->get_field_id('class'); ?>" value="<?php echo $class ?>" aria-describedby="instmt-cta-class-help" class='widefat' maxlength='' />
            <small id="instmt-cta-class-help" class="text-muted">Añade aquí tus clases, separadas por espacio, para aplicar tus estilos personalizados</small>
        </p>
        <p>
            <?php __('Alinear botón:', 'institucionalmtcta') ?><br />
            <label>
                <input type='radio' value='text-left' name="<?php echo $this->get_field_name('alignment'); ?>" <?php checked($alignment, 'text-left'); ?> id="<?php echo $this->get_field_id('alignment'); ?>" class="widefat instmt-cta-radio-buttons" />
                <?php esc_attr_e('Izquierda', 'institucionalmtcta'); ?>
            </label>
            <label>
                <input type='radio' value='text-center' name="<?php echo $this->get_field_name('alignment'); ?>" <?php checked($alignment, 'text-center'); ?> id="<?php echo $this->get_field_id('alignment'); ?>" class="widefat instmt-cta-radio-buttons" />
                <?php esc_attr_e('Centro', 'institucionalmtcta'); ?>
            </label>
            <label>
                <input type='radio' value='text-right' name="<?php echo $this->get_field_name('alignment'); ?>" <?php checked($alignment, 'text-right'); ?> id="<?php echo $this->get_field_id('alignment'); ?>" class="widefat instmt-cta-radio-buttons" />
                <?php esc_attr_e('Derecha', 'institucionalmtcta'); ?>
            </label>
        </p>
        <p>

            <label for="<?php echo $this->get_field_id('target'); ?>"><?php __('Abrir en:', 'institucionalmtcta') ?></label><br />
            <select name="<?php echo $this->get_field_name('target'); ?>" id="<?php echo $this->get_field_id('target'); ?>" value="<?php echo $target ?>" class='widefat' tyle='width:100%;' />
            <option value="">Selecciona una opción</option>
            <option <?php selected($target, '_parent', false) ?> value='_top'>La misma ventana</option>
            <option <?php selected($target, '_blank', false) ?> value='_blank'>Una ventana nueva</option>
            </select>

        </p>

<?php
    }
}
