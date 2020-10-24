<?php

/**
 * Pagina de archivo para listar todas las Representaciones Locales
 * Se requiere tener instalado el plugin
 */

$custom_fields = get_post_meta($post->ID, '_instmt_rlt');

$datos = $custom_fields;

foreach ($datos as $key => $dato) {

    //var_dump($post->ID);

?>

    <!-- Card -->
    <div class="card rlt mb-5">

        <!-- Codigo Map -->
        <div id="" class="card-img-top">

            <!-- <?php echo $dato['map_iframe']; ?> -->

            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15139.0046486556!2d-69.9270603!3d18.449604!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1bd5a3e2c7836a6c!2sMinisterio%20de%20Trabajo!5e0!3m2!1ses-419!2sdo!4v1603516550102!5m2!1ses-419!2sdo" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

        </div>

        <!-- floating button / JS -->
        <a href="#" class="float rlt-btn" status="1" data-toggle="collapse" data-target="#collapseVCard-<?php echo $post->ID ?>" aria-expanded="true" aria-controls="collapseVCard">

            <i class="fa fa-arrow-up rlt-icon float-icon" status="1"></i>

        </a>

        <!-- Content -->
        <div class="card-body">

            <div class="white">

                <!-- Title -->
                <h5 class="map-card-title card-title h5 text-left"><?php echo get_the_title(); ?></h5>
                               

                <div id="collapseVCard-<?php echo $post->ID ?>" class="collapse">

                <?php if ($dato['representante_rlt'] != '') { ?>

                    <div class="container">
                        <div class="row my-3">
                            <div class="col-2 agent align-self-center float-left">
                                <img src="<?php echo get_template_directory_uri(); ?>/admin/image/domo-dark.svg" class="img-fluid mx-auto d-block" style="min-width: 30px;">
                            </div>
                            <div class="col-10">
                                <span class="card-subtitle text-left">
                                    <?php echo $dato['nombre']; ?><br>
                                    <span class="card-title-desc text-muted"><?php echo $dato['cargo']; ?></span>
                                </span>
                            </div>
                        </div>
                    </div>

                <?php } ?> 

                    <table class="table table-borderless">

                        <tbody>

                            <?php if($dato['telefono'] != '') : ?>
                            <tr>
                                <th scope="row" class="px-0 ">
                                    <i class="fa fa-phone"></i>
                                </th>
                                <td class="text-left text-muted">
                                    <a class="tel text-muted" href="tel:+1<?php echo $dato['telefono'] ?>"><?php echo $dato['telefono']; ?></a>
                                    <?php if($dato['extension_1'] != '' ) : ?>
                                        &nbsp;Ext.:<span><?php echo $dato['extension_1'] ?></span>
                                    <?php endif; ?>
                                    <?php if($dato['extension_2'] != '' ) : ?>
                                        &nbsp;|&nbsp;<span><?php echo $dato['extension_2'] ?></span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endif; ?>

                            <?php if($dato['flota'] != '') : ?>
                            <tr>
                                <th scope="row" class="px-0 ">
                                    <i class="fa fa-mobile"></i>
                                </th>
                                <td class="text-left">
                                    <a class="flota text-muted" href="tel:+1<?php echo $dato['flota'] ?>"><?php echo $dato['flota']; ?></a>
                                </td>
                            </tr>
                            <?php endif; ?>

                            <?php if($dato['correo'] != '') : ?>
                            <tr class="mt-1">
                                <th scope="row" class="px-0 ">
                                    <i class="far fa-envelope"></i>
                                </th>
                                <td class=" text-left">
                                    <a class="correo text-muted" href="mailto:<?php echo $dato['correo'] ?>">&nbsp;<?php echo $dato['correo']; ?></a>
                                </td>
                            </tr>
                            <?php endif; ?>

                            <?php if($dato['direccion_1'] != '') : ?>
                            <tr class="mt-1">
                                <th scope="row" class="px-0 ">
                                    <i class="fas fa-map-marker-alt"></i>
                                </th>
                                <td class="text-left">
                                    <address class="direccion-rlt">
                                        <span class="calle"><?php echo $dato['direccion_1'] ?></span>
                                        <?php if($dato['direccion_2'] != '') : ?><span class="referencia"><?php echo ", " . $dato['direccion_2'] ?></span><?php endif; ?>
                                        <?php if($dato['municipio'] != '') : ?><span class="municipio"><?php echo ", " . $dato['municipio'] ?></span><?php endif; ?>
                                        <?php if($dato['provincia'] != '') : ?><span class="provincia"><?php echo ", " . $dato['provincia'] ?></span><?php endif; ?>
                                    <address>                                  
                                </td>
                            </tr>
                            <?php endif; ?>                            

                            <?php if($dato['horario'] != '') : ?>
                            <tr class="mt-1">
                                <th scope="row" class="px-0 ">
                                    <i class="far fa-clock"></i>
                                </th>
                                <td class="text-left">
                                    <?php echo $dato['horario']; ?>
                                </td>
                            </tr>
                            <?php endif; ?>

                        </tbody>

                    </table>

                </div>

            </div>
            <!-- end White -->

        </div>
        <!-- end Card -->

    </div>

<?php } ?>