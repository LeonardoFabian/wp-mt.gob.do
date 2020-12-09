<?php 

/**
 * Contiene todas las funciones a utilizar dentro del tema
 */

 /**
  * Encabezado para mostrar en las páginas
  * @since          1.0.0
  * @access         public
  */
 function institucionalmt_page_header(){
     ?>
    <div id="institucionalmt-header-id-<?php echo get_the_ID(); ?>" class="title-bar mb-5 d-none d-sm-block">
        <div class="container d-flex text-left overlay text-light h-100">
            <div class="align-self-center">
                <h2 class="institucionalmt-title"><?php the_title(); ?><span></span></h2>
                <small class="institucionalmt-breadcrumbs tex-muted"><?php the_breadcrumb(); ?></small>
            </div>
        </div>
    </div><!-- entry-header -->
    <?php
 }

 /**
  * Muestra información de la publicación (Autor, Fecha de publicación, etc)
  * @since          1.0.0
  * @access         public
  */
 function institucionalmt_post_meta(){

     /* translators: %s: Post date */
    printf(
        esc_html__( 'Publicado el %s', 'institucionalmt'),
        '<a href="' . esc_url( get_permalink() ) .'" class="text-decoration-none text-muted">
            <time datetime="'. esc_attr( get_the_date('c') ) .'">' . date_i18n( __('l j \d\e F Y, \a \l\a\s g:i A', 'institucionalmt') ) .'</time>
        </a><br>'
    );

    /* translators: %s: Post Author */
    printf(
        esc_html__( 'Por %s', 'institucionalmt' ),
        '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">'. esc_html( get_the_author() ) . '</a>'
    );

 }

 /**
  * Enlace leer más (Read more link)
  * @since          1.0.0
  * @access         public
  */
function institucionalmt_readmore(){

    echo '<a href="'. esc_url( get_permalink() ) .'" title="' . the_title_attribute( ['echo' => false ] ) . '">';
    /* translators: %s: Post title */
    printf(
        wp_kses(
            __( 'Leer más <span class="u-screen-reader-text">acerca de %s</span>', 'institucionalmt' ),
            [
                'span' => [
                    'class' => []
                ]
            ]
        ),
        esc_html( get_the_title() )
    );
    echo '</a>';

}