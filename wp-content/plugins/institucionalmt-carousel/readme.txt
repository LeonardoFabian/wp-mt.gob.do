
// /**
//  * Mostrar plugin
//  */
// function institucionalmt_carousel_init()
// {

//     // Set the category name, order and qty to display
//     $args = array(
//         'category_name' => 'noticias-destacadas',        
//         'orderby' => 'post_date',
//         'order' => 'DESC',
//         'limit' => 5
//     );

//     $query = new WP_Query($args);   ?>

//     <?php if ($query->have_posts()) : ?>

     
//         <div id="institucionalmtCarousel" class="carousel slide" data-ride="carousel">
//             <div class="carousel-inner">

//                 <!-- ul width adjust to the (N*100)% of container -->   
//                 <?php while ($query->have_posts()) : the_post(); ?>

//                     <div class="carousel-item text-center">      
                        
//                         <a href="<?php the_permalink(); ?>">
//                             <?php
//                             if (has_post_thumbnail()) {
//                                 the_post_thumbnail('post_thumbnail', array('class' => 'd-block w-100 img-fluid'));
//                             }
//                             ?>
//                         </a>

//                         <div class="carousel-caption d-none d-md-block">
//                             <div class="container">
//                                 <div class="text-left">
//                                     <a href="<?php the_permalink(); ?>">
//                                         <h3 class="carousel-item-title"><?php the_title(); ?></h3>
//                                     </a>
//                                 </div>
//                                 <div class="carousel-item-description-wrapper text-left">
//                                     <p class="carousel-item-description lead">
//                                         <?php the_excerpt(); ?>
//                                     </p>
//                                 </div>
//                             </div>
//                         </div>

//                     </div>

//                 <?php endwhile; ?>                  

//             </div>

//             <a class="carousel-control-prev" href="#institucionalmtCarousel" role="button" data-slide="prev">
//                 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
//                 <span class="sr-only">Previous</span>
//             </a>
//             <a class="carousel-control-next" href="#institucionalmtCarousel" role="button" data-slide="next">
//                 <span class="carousel-control-next-icon" aria-hidden="true"></span>
//                 <span class="sr-only">Next</span>
//             </a>

//         </div>

//     <?php endif; ?>

//     <?php wp_reset_postdata(); ?>

// <?php        
  
// }

// register_activation_hook(__FILE__, 'institucionalmt_carousel_init');

// // Post carousel plugin styles

// function enqueue_institucionalmt_carousel_style()
// {
//     wp_enqueue_style('institucionalmt_post_carousel_style', INSTMT_CAROUSEL_PLUGIN_DIR_PATH . 'admin/css/institucionalmt-carousel-admin-style.css');
// }

// add_action('wp_enqueue_scripts', 'enqueue_institucionalmt_carousel_style');
