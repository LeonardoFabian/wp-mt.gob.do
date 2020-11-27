<?php

class InstitucionalMT_Public
{

    /**
     * El identificador único de éste plugin
     * 
     * @since       1.0.0
     * @access      private
     * @var         string      $plugin_name    El nombre o identificador único de éste plugin
     */
    private $plugin_name;

    /**
     * Versión actual del plugin
     * 
     * @since       1.0.0
     * @access      private
     * @var         string      $version    La versión actual del plugin
     */
    private $version;  

    /**
     * @param   string      $plugin_name    Nombre o identificador único de éste plugin
     * @param   string      $version        Versión actual del plugin
     */
    public function __construct( $plugin_name, $version )
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;                
    }

    public function institucionalmt_public_enqueue_styles()
    {                

        wp_enqueue_style( 'instmt_public_plugin_styles', INSTMT_PLUGIN_DIR_URL . 'public/css/public-styles.css', [], $this->version, 'all' );                   

    }

    public function institucionalmt_public_enqueue_scripts()
    {        
        
        wp_enqueue_script( 'instmt_public_plugin_scripts', INSTMT_PLUGIN_DIR_URL . 'public/js/public-scripts.js', ['jquery'], $this->version, true );            

        // Required plugins
        wp_enqueue_script('imagesloaded');
        wp_enqueue_script('owl-carousel', INSTMT_PLUGIN_DIR_URL . 'public/js/owl.carousel.js', array('jquery'), '', true  );

    }        

    /**
     * Output Posts signature
     * 
     * @since       1.0.0
     * @access      public
     */
    public function institucionalmt_signature_below_posts(){        

        if( is_singular( 'post' ) ) { ?>

            <div class="post-signature text-left mb-5">
                <p>
                    <span><?php the_author_posts_link(); ?></span><br>
                    <span>Contacto: </span><a href="tel:8095354404">Tel.: (809) 535-4404</a><br>
                    <span>Extensión: 3207</span>
                </p>
            </div>

        <?php }

    }  

    /**
     * Check if the current page is the top level page
     * 
     * @since       1.0.0
     * @access      public
     */
    public function institucionalmt_check_top_level_page(){

        // check if we're on a page
        if( is_page() ){

            global $post;

            // check if the page has parents
            if( $post->post_parent ){

                // fetch higher level posts
                $parents = array_reverse( get_post_ancestors( $post->ID ) );

                // get the top level ancestor
                return $parents[0];

            }

            return $post->ID;

        }

    }

    // #TODO: Mostrar menu en las paginas, añadir estilos
    /**
     * Output Page Menu
     * 
     * @since       1.0.0
     * @access      public
     */
    public function institucionalmt_page_menu(){

        // don't run on the main blog page
        if( is_page() && ! is_home() ){

            $ancestor = $this->institucionalmt_check_top_level_page();            

            // set the arguments for the children of the ancestor
            $args = array(
                'child_of' => $ancestor,
                'depth' => '-1',
                'title_li' => '',
                'link_before'  => '<div class="pl-3 py-2 bg-secondary text-light text-decoration-none" style="border-bottom:1px solid #bdbdbd;">',
                'link_after'   => '</div>',
            );            

            // save output of get pages
            $list_pages = get_pages( $args );
            //var_dump( $list_pages );

            if( $list_pages ){ ?>

                <section class='section-menu sidebar widget'>

                    <div class="mb-5" style="margin-left:20px;">
                    
                        <h3 class="widget-title pl-3 py-3">
                            <a href="<?php echo get_permalink( $ancestor ); ?>" class="text-dark text-decoration-none"><?php echo get_the_title( $ancestor ); ?></a> 
                        </h3>

                        <ul class="list-unstyled subpages">
                            <?php wp_list_pages( $args ); ?>
                        </ul>

                    </div>
                
                </section>

            <?php }
        }
    }

    /**
     * Obtener las ultimas entradas por categoría y mostrarlas con su imagen destacada
     * 
     * @since       1.0.0
     * @access      public
     * 
     */
    public function institucionalmt_latest_post_category_collection(){

        $args = [
            'orderby' => 'rand',
            'number' => 3,
            'order' => 'DESC'
        ];

        $categories = get_categories( $args );

        if( $categories ) :

            $exclude[] = 0; 
            ?>

                <section class="institucionalmt-latest-post-category-collection-section">

                    <?php 
                    
                        echo '<div class="mb-5">';
                        echo '<h3>' . __( 'Últimas publicaciones','institucionalmt' ) . '</h3>';
                        echo '</div>';

                        foreach( $categories as $category ){

                            $args = [
                                'post_type' => 'post',
                                'posts_per_page' => 3,
                                'category_name' => $category->name,
                                'post__not_in' => $exclude
                            ];

                            $query = new WP_Query( $args );

                            if( $query->have_posts() ) :

                                ?>
                                    <!-- Category title -->
                                            <div class="my-5">
                                                        
                                                <h4><?php echo $category->name; ?></h4>

                                            </div> 
<?php

                                while( $query->have_posts() ) : 

                                    $query->the_post();

                                    ?>

                                        <article id="post-<?php the_ID(); ?>" <?php post_class('instmt-category-posts'); ?>>                                             

                                            <div class="row align-items-center mb-4">

                                                <div class="col-4 col-sm-4 col-md-4">

                                                    <div clas="view overlay rounded z-depth-1-half" style="width:100px;height:100px;overflow:hidden;">
                                                    
                                                        <?php if( has_post_thumbnail() ) { ?>

                                                            <a href="<?php the_permalink(); ?>">

                                                                <?php the_post_thumbnail('medium', array( 'class' => 'img-cover img-fluid', 'height' => 100, 'width' => 100 ) ); ?>

                                                            </a>                                                

                                                        <?php } ?>

                                                    </div>
                                                
                                                </div>

                                                <!-- grid column -->
                                                <div class="col-7 col-sm-7 col-md-7" style="padding-right:0;">                                                                                                              

                                                    <h6><a class="text-secondary" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>

                                                    <!-- <p style="font-size: 16px;"><?php echo get_the_excerpt(); ?></p> -->
                                                    <span class="text-muted"><?php the_date('d M Y'); ?></span>
                                                </div>
                                            
                                            </div>

                                        </article>

                                    <?php 
                                    
                                    $exclude[] = get_the_ID();
                                
                                endwhile;

                            endif;
                            
                            wp_reset_postdata();

                        } // end foreach

                    ?>

                </section>

            <?php

        endif;

    }  

}
