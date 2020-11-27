<?php

$theme_uri = get_template_directory();
$img_bg_1  = '/admin/image/services/' . $post->ID . '/img-bg.png';

// var_dump($theme_uri . $img_bg_1);

$custom_fields = get_post_meta($post->ID, '_instmt_servicio');

$datos = $custom_fields;

foreach ($datos as $key => $dato) {
?>

    <div id="single-service-header" class="single-service-header title-bar mb-5 d-none d-sm-block">


        <?php

        $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));

        echo '<div class="d-flex text-left text-light h-100 imagen-cabecera" style="background: linear-gradient( rgba(39, 128, 196, 0.55), rgba(0, 56, 118, 0.75) ), url(' . $url . ');repeat: no-repeat;background-size:cover;background-position: center;background-attachment: fixed;">';
                                              
        ?>
        <div class="container align-self-center" style="z-index:999;">
            <div class="">
                <h2 class="entry-header-title"><?php the_title(); ?></h2>
                <small class="breadcrumbs tex-muted"><?php the_breadcrumb(); ?></small>
                <div class="text-left my-4">
                    <a href="" class="btn btn-lg bg-secondary-color text-light"><i class="fas fa-link"></i>Acceder al Servicio</a>
                </div>
            </div>
        </div>

    </div>

</div>


    <article id="post-<?php the_ID(); ?>" <?php post_class('pb-5'); ?>>

        <div id="single-post-wrapper" class="single-post-wrapper">

            <div class="container">

                <!-- title visible only xs -->
                <header class="article-header my-3">
                    <h2 class="the-post-title mb-3 d-block d-sm-none"><?php the_title(); ?></h2>
                </header>

                <section>
                    <div class="row" style="height:150px;">
                        <div class="col-xl-12 col-md-12 mb-5 text-left">
                            <?php if (function_exists('the_ratings')) : ?>
                                <?php _e('Valoración del servicio', 'institucionalmt') ?>
                                <?php the_ratings(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>

                <section>
                    <div class="row my-5">
                        <div class="col-xl-3 col-md-6 mb-4 text-light">
                            <!-- column -->
                            <!-- Panel -->
                            <div class="card card-pricing mb-4 white-text bg-blue-light-light">
                                <div class="card-body">
                                    <div class="pull-right">
                                        <i class="fas fa-calendar service-card-icon"></i>
                                    </div>
                                    <p class="text-uppercase">Horario de atención</p>
                                    <h5 class="text-uppercase"><?php echo $dato['desde'] . " - " . $dato['hasta']; ?></h5>
                                </div>
                                <div class="card-body" style="border-radius: 0 0 32px 32px;">
                                    <p class="mb-0">Worse than last week (25%)</p>
                                </div>
                            </div>
                            <!-- Panel -->
                        </div><!-- end column -->
                        <div class="col-xl-3 col-md-6 mb-4 text-light">
                            <!-- column -->
                            <!-- Panel -->
                            <div class="card card-pricing mb-4 white-text bg-red-light-color">
                                <div class="card-body">
                                    <div class="pull-right">
                                        <i class="fa fa-hourglass service-card-icon"></i>
                                    </div>
                                    <p class="text-uppercase">Tiempo de respuesta</p>
                                    <h5 class="text-uppercase"><?php echo $dato['tiempo_respuesta']; ?></h5>
                                </div>
                                <div class="card-body" style="border-radius: 0 0 32px 32px;">
                                    <p class="mb-0">Worse than last week (25%)</p>
                                </div>
                            </div>
                            <!-- Panel -->
                        </div><!-- end column -->
                        <div class="col-xl-3 col-md-6 mb-4 text-light">
                            <!-- column -->
                            <!-- Panel -->
                            <div class="card card-pricing mb-4 white-text bg-green-color">
                                <div class="card-body">
                                    <div class="pull-right">
                                        <i class="fas fa-dollar service-card-icon"></i>
                                    </div>
                                    <p class="text-uppercase">Costo</p>
                                    <h5 class="text-uppercase"><?php echo $dato['precio']; ?></h5>
                                </div>
                                <div class="card-body" style="border-radius: 0 0 32px 32px;">
                                    <p class="mb-0">Worse than last week (25%)</p>
                                </div>
                            </div>
                            <!-- Panel -->
                        </div><!-- end column -->
                        <div class="col-xl-3 col-md-6 mb-4 text-light">
                            <!-- column -->
                            <!-- Panel -->
                            <div class="card card-pricing mb-4 white-text bg-yellow-color">
                                <div class="card-body">
                                    <div class="pull-right">
                                        <i class="fas fa-phone service-card-icon"></i>
                                    </div>
                                    <p class="text-uppercase">Contacto</p>
                                    <h5 class="text-uppercase"><?php echo $dato['telefono_1']; ?></h5>
                                </div>
                                <div class="card-body" style="border-radius: 0 0 32px 32px;">
                                    <p class="mb-0">EXT.: <?php echo $dato['extension_1'] . " | " . $dato['extension_2'] . " | " . $dato['extension_3']; ?></p>
                                </div>
                            </div>
                            <!-- Panel -->
                        </div><!-- end column -->
                    </div>
                </section>

            </div>


           
                <div class="col-md-12 mb-5">

                    <!-- TO DO: social-vertical-bar -->
                    <!--
                    <div id="post-social-vertical" class="social-vertical d-none d-sm-block float-left mr-5">                       
                    <ul class="social-list list-unstyled ">
                            <li><a class="btn-social fa fa-facebook" title="Facebook" href="https://www.facebook.com/MTrabajoRD" target="_blank" rel="noopener"> </a></li>
                            <li><a class="btn-social fa fa-twitter" title="Twitter" href="https://twitter.com/MTrabajoRD" target="_blank" rel="noopener"> </a></li>
                            <li><a class="btn-social fa fa-instagram" title="Instagram" href="https://www.instagram.com/mtrabajord/" target="_blank" rel="noopener"> </a></li>
                            <li><a class="btn-social fa fa-youtube" title="Youtube" href="https://www.youtube.com/channel/UCvQVfiyRPCxmWMrmH5QYqdg" target="_blank" rel="noopener"> </a></li>
                        </ul>

                    </div>
                    -->






                    <?php if (!empty(get_the_content())) : ?>
                        <div>
                            <div class="container">
                                <div class="row mb-5" style="background: #ffffff;">
                                    <div class="col-xl-6 text-center" style="height:400px;overflow:hidden;padding-left:0;padding-bottom:0;">
                                        <!--<i class="far fa-clipboard" style="font-size:4em;"></i>-->
                                        <div class="post-content-image" style="margin: 0 auto;">
                                            <?php
                                            if (has_post_thumbnail()) {
                                                the_post_thumbnail('medium_large', array('class' => 'img-responsive'));
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 py-5 px-5">
                                        <h3>Descripción</h3>
                                        <div class="single-content-description lead text-justify my-4">
                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="container">

                    <div class="row mb-5 justify-content-between">

                                <?php if ($dato['dirigido_a'] != '') : ?>
                                    <div class="col-xl-5 my-3 py-5 text-center" style="background: #ffffff;">
                                        <i class="fas fa-users mt-4 my-3" style="font-size:4em;"></i>
                                        <h3>A quién va dirigido</h3>
                                        <div class="single-content-description lead mb-3">
                                            <p><?php echo $dato['dirigido_a']; ?></p>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if ($dato['area_responsable'] != '') : ?>
                                    <div class="col-xl-5 my-3 py-5 text-center" style="background: #ffffff;">
                                        <i class="fas fa-landmark mt-4 my-3" style="font-size:4em;"></i>
                                        <h3>Área responsable</h3>
                                        <div class="single-content-description lead mb-3">
                                            <p><?php echo $dato['area_responsable']; ?></p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>                           

                        <?php if ($dato['requisitos'] != '') : ?>
                            <div class="row mb-5 py-4 px-4" style="background: #ffffff;">
                                <div class="col-xl-1 my-3 text-center"><i class="fas fa-asterisk" style="font-size:4em;"></i></div>
                                <div class="col-xl-11">
                                    <h3>Requisitos</h3>
                                    <div class="single-content-description lead text-justify mb-3">
                                        <p><?php echo $dato['requisitos']; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (file_exists($theme_uri . $img_bg_1) && $dato['procedimiento_online'] != '') : ?>
                            <div class="row mb-5">
                                <?php if ($dato['procedimiento_online'] != '') : ?>
                                    <div class="my-3 px-4 py-5" style="width:50%; background: #ffffff;">
                                        <table>
                                            <tr class="text-left">
                                                <th scope="row" class="px-0 text-center">  
                                                    <i class="fas fa-laptop" style="font-size:4em;"></i>
                                                </th>
                                                <td class="text-left">                                                                              
                                                    <h3>Procedimiento</h3>      
                                                    <span>(Modalidad En Linea)</span>                                                                            
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="padding-top:16px;">
                                                    <div class="online lead text-justify mb-3 px-4">
                                                        <p><?php echo $dato['procedimiento_online']; ?></p>
                                                    </div>  
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                <?php endif; ?>                               
                                <div class="my-3 text-center start-animation">
                                    <div class="procedimiento-online-img-bg">
                                        <img src="<?php echo get_template_directory_uri(); ?>/admin/image/services/<?php echo $post->ID ?>/img-bg.png" class="img-fluid">
                                        <div class="procedimiento-online-content">
                                        <?php
                                            $urlImage = get_template_directory_uri() . '/admin/image/services/'. $post->ID .'/img.png';

                                            echo '<div class="loopscroll" style="background-image: url(' . $urlImage . ');"></div>';
                                        ?>
                                            <!-- <div class="loopscroll">
                                            <span style="background-image: url(<?php echo get_template_directory_uri(); ?>/admin/image/services/<?php echo $post->ID ?>/img.png);"></span> 
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="row text-center pt-5">
                                        <div class="col-xl-12 col-md-12 mb-5 justify-content-center">
                                            <a href="<?php echo $dato['url']; ?>" class="btn btn-lg bg-secondary-color text-light"><i class="fas fa-link"></i>Acceder al Servicio</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php else : ?>
                            <?php if ($dato['procedimiento_online'] != '') : ?>
                                <div class="row mb-5 py-4 px-4" style="background: #ffffff;">
                                    <div class="col-xl-1 my-3 text-center"><i class="fas fa-laptop" style="font-size:4em;"></i></div>
                                    <div class="col-xl-11">
                                        <h3>Procedimiento (Modalidad En Linea)</h3>
                                        <div class="single-content-description lead text-justify mb-3">
                                            <p><?php echo $dato['procedimiento_online']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if ($dato['procedimiento'] != '') : ?>
                            <div class="row mb-5 py-4 px-4" style="background: #ffffff;">
                                <div class="col-xl-1 my-3 text-center"><i class="fas fa-walking" style="font-size:4em;"></i></div>
                                <div class="col-xl-11">
                                    <h3>Procedimiento (Modalidad Presencial)</h3>
                                    <div class="single-content-description lead text-justify mb-3">
                                        <p><?php echo $dato['procedimiento']; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ($dato['informacion_adicional'] != '') : ?>
                            <div class="row mb-5 py-4 px-4" style="background: #ffffff;">
                                <div class="col-xl-1 my-3 text-center"><i class="fas fa-info-circle" style="font-size:4em;"></i></div>
                                <div class="col-xl-11">
                                    <h3>Información adicional</h3>
                                    <div class="single-content-description lead text-justify mb-3">
                                        <p><?php echo $dato['informacion_adicional']; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>







                        <div class="tags-list text-muted mb-5">
                            <?php the_tags('<span class="tag"><i class="fa fa-tag"></i>', '</span><span class="tag"><i class="fa fa-tag"></i>', '</span>'); ?>
                        </div>

                        

                        <div class="comments-count my-3">
                            <span class="comment">
                                <a href="#comments">
                                    <i class="fa fa-comment"></i>
                                    <?php
                                    comments_number();
                                    ?>
                                </a>
                            </span>
                        </div>

                        <div>
                            <!-- container -->




                        </div><!-- single post wrapper -->

    </article><!-- #post-<?php the_ID(); ?> -->


<?php } ?>