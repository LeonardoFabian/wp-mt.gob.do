<?php 

/**
 * Contiene todas las funciones a utilizar dentro del tema
 */

/**
* Encabezado para mostrar en las páginas
* @since          1.0.0
* @access         public
*/
if( !function_exists( '_themename_page_header' ) ){
    function _themename_page_header(){
        ?>
        <div id="_themename-header-id-<?php echo get_the_ID(); ?>" class="title-bar mb-5 d-none d-sm-block">
            <div class="container d-flex text-left overlay text-light h-100">
                <div class="align-self-center">
                    <h2 class="_themename-page-title"><?php the_title(); ?><span></span></h2>
                    <small class="_themename-breadcrumbs tex-muted"><?php _themename_breadcrumb(); ?></small>
                </div>
            </div>
        </div><!-- entry-header -->
        <?php
    }
}

/**
* Encabezado para mostrar en los single-posts
* @since          1.0.0
* @access         public
*/
if( !function_exists( '_themename_post_header' ) ){
    function _themename_post_header(){
        ?>
        <div id="_themename-header-id-<?php echo get_the_ID(); ?>" class="title-bar mb-5 d-none d-sm-block">
            <div class="o-container d-flex text-left overlay text-light h-100">
                <div class="align-self-center">
                    <h2 class="_themename-page-title c-post__title"><?php the_title(); ?><span></span></h2>
                    <small class="_themename-breadcrumbs tex-muted"><?php _themename_breadcrumb(); ?></small>
                </div>
            </div>
        </div><!-- entry-header -->
        <?php
    }
}

if( !function_exists( '_themename_tag_page_header' ) ){
    function _themename_tag_page_header(){
        ?>
    <div id="_themename-tag-header" class="title-bar mb-5 d-none d-sm-block">
       <div class="container d-flex text-left overlay text-light h-100">
           <div class="align-self-center">
               <h2 class="_themename-page-title"><?php the_tags(); ?></h2>
               <small class="_themename-breadcrumbs tex-muted"><?php _themename_breadcrumb(); ?></small>
           </div>
       </div>
   </div><!-- archive-header -->
   <?php
    }
}

/**
* Muestra información de la publicación (Autor, Fecha de publicación, etc)
* @since          1.0.0
* @access         public
*/
if( !function_exists( '_themename_post_meta' ) ){
    function _themename_post_meta(){

        /* translators: %s: Post date */
       printf(
           esc_html__( 'Publicado el %s', '_themename'),
           '<a href="' . esc_url( get_permalink() ) .'" class="text-decoration-none text-muted">
               <time datetime="'. esc_attr( get_the_date('c') ) .'">' . date_i18n( __('l j \d\e F Y, \a \l\a\s g:i A', '_themename') ) .'</time>
           </a><br>'
       );
   
       /* translators: %s: Post Author */
       printf(
           esc_html__( 'Por %s', '_themename' ),
           '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">'. esc_html( get_the_author() ) . '</a>'
       );
   
    }
}

/**
* Enlace leer más (Read more link)
* @since          1.0.0
* @access         public
*/
if( !function_exists( '_themename_readmore' ) ){
    function _themename_readmore(){

        echo '<a class="c-post__readmore" href="'. esc_url( get_permalink() ) .'" title="' . the_title_attribute( ['echo' => false ] ) . '">';
        /* translators: %s: Post title */
        printf(
            wp_kses(
                __( 'Leer más <span class="u-screen-reader-text">acerca de %s</span>', '_themename' ),
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
}