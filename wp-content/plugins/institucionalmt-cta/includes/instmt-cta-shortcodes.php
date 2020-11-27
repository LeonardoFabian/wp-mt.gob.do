<?php 

/**
 * Añade un botón de llamada a la acción con enlace
 * Shortcode: [instmt_cta_button]
 * 
 * @since           1.0.0
 * @access          public
 */
function institucionalmt_cta_button_shortcode_atts( $atts, $content = null ){

    $args = [       
        'text' => __( 'Añade un texto', 'institucionalmtcta' ),
        'link' => '#',
        'target' => '_parent',
        'class' => '',
        'alignment' => '',
    ];

    $atts = shortcode_atts( $args, $atts, 'instmt_cta_button' );

    ob_start();

    ?>

        <div class='instmt-cta <?php $atts['alignment'] ?>'>                                   

            <?php echo '<a href="' . $atts['link'] . '" target="' . $atts['target'] . '" class="btn-instmt-cta-xl btn-primary ' . $atts['class'] .  '">' . $atts['text'] . '</a>'; ?>           

        </div>

    <?php

    return ob_get_clean();

}





