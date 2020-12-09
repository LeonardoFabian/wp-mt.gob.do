<?php institucionalmt_page_header(); ?>

<div id="post-<?php the_ID(); ?>">
    <div class="container">

        <!--Section: Content-->
        <section class="text-center text-lg-left dark-grey-text">

            <!--Google map-->
            <div class="my-5">
                <div class="mapouter">
                    <div class="gmap_canvas">
                        <?php
                        if (get_theme_mod('custom_html_map_code_setting') != '') {
                            echo get_theme_mod('custom_html_map_code_setting');
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!--Google Maps-->

            <!--Grid row-->
            <div class="row d-flex justify-content-center mb-5">


                <!--Grid column-->
                <div class="col-md-6 text-center">

                    <?php if (isset($_GET['errormsg'])) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $_GET['errormsg']; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($_GET['exito']) == 1) : ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $_GET['success']; ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                        <h3 class="font-weight-bold">
                            <?php
                            if (get_theme_mod('custom_form_title_setting') != '') {
                                echo get_theme_mod('custom_form_title_setting');
                            } else {
                            ?>
                                Contáctanos
                            <?php
                            }
                            ?>
                        </h3>

                        <!-- Material outline input -->
                        <div class="md-form md-outline mt-3">
                            <label for="institucionalmt-txtname">
                                <?php
                                if (get_theme_mod('first_form_control_label_setting') != '') {
                                    echo get_theme_mod('first_form_control_label_setting');
                                } else {
                                ?>
                                    Nombre
                                <?php
                                }
                                ?>
                            </label>
                            <input type="text" id="institucionalmt-txtname" name="institucionalmt-txtname" class="form-control">
                        </div>

                        <!-- Material outline input -->
                        <div class="md-form md-outline mt-3">
                            <label for="institucionalmt-txtemail">
                                <?php
                                if (get_theme_mod('second_form_control_label_setting') != '') {
                                    echo get_theme_mod('second_form_control_label_setting');
                                } else {
                                ?>
                                    Correo Electrónico
                                <?php
                                }
                                ?>
                            </label>
                            <input type="email" id="institucionalmt-txtemail" name="institucionalmt-txtemail" class="form-control">
                        </div>

                        <!-- Material outline input -->
                        <div class="md-form md-outline">
                            <label for="institucionalmt-txtsubject">
                                <?php
                                if (get_theme_mod('third_form_control_label_setting') != '') {
                                    echo get_theme_mod('third_form_control_label_setting');
                                } else {
                                ?>
                                    Asunto
                                <?php
                                }
                                ?>
                            </label>
                            <input type="text" id="institucionalmt-txtsubject" name="institucionalmt-txtsubject" class="form-control">
                        </div>

                        <!--Material textarea-->
                        <div class="md-form md-outline mb-3">
                            <label for="institucionalmt-txtmessage">
                                <?php
                                if (get_theme_mod('fourth_form_control_label_setting') != '') {
                                    echo get_theme_mod('fourth_form_control_label_setting');
                                } else {
                                ?>
                                    Mensaje
                                <?php
                                }
                                ?>
                            </label>
                            <textarea id="institucionalmt-txtmessage" name="institucionalmt-txtmessage" class="md-textarea form-control" rows="5"></textarea>
                        </div>

                        <input type="hidden" name="action" value="institucionalmt_contactform">

                        <button type="submit" class="btn btn-lg btn-primary btn-sm ml-0">
                            <?php
                            if (get_theme_mod('button_submit_text_setting') != '') {
                                echo get_theme_mod('button_submit_text_setting');
                            } else {
                            ?>
                                Enviar
                            <?php
                            }
                            ?>
                            <i class="
    <?php
    if (get_theme_mod('button_submit_icon_setting') != '') {
        echo get_theme_mod('button_submit_icon_setting');
    } else {
    ?>
            far fa-paper-plane ml-2
        <?php
    }
        ?>                          
    ">
                            </i>
                        </button>

                        <div class="md-form md-outline mt-3">
                            <p class="text-muted">
                                <?php
                                if (get_theme_mod('custom_form_legal_warning_setting') != '') {
                                    echo get_theme_mod('custom_form_legal_warning_setting');
                                } else {
                                ?>
                                    En caso de que tenga alguna duda acerca de este formulario o quiera realizar cualquier comentario
                                    sobre este sitio Web, puede enviar un mensaje de correo electrónico a la dirección que aparece al pié de
                                    este formulario.
                                <?php
                                }
                                ?>
                            </p>
                        </div>
                    </form>
                </div>
                <!--Grid column-->


            </div>
            <!--Grid row-->
            <hr>
            <!--Grid row-->
            <div class="row text-center py-5">

                <!--Grid column-->
                <div class="col-lg-4 col-md-12 mb-4 mb-md-0">

                    <i class="fas fa-map-marker-alt fa-2x blue-text"></i>

                    <p class="font-weight-bold my-3">Dirección</p>
                    <?php if (get_theme_mod('custom_brand_street_type') != "") : ?>
                        <p class="text-muted">
                            <?php echo get_theme_mod('custom_brand_street_type'); ?>
                            <?php echo get_theme_mod('custom_brand_street'); ?>
                            <?php echo get_theme_mod('custom_brand_location_number'); ?>
                            <br />
                            <?php echo get_theme_mod('custom_brand_location_reference'); ?>
                            <?php echo get_theme_mod('custom_brand_location_state'); ?>
                            <?php echo get_theme_mod('custom_brand_location_country'); ?>
                        </p>
                    <?php endif; ?>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">

                    <i class="fas fa-phone fa-2x blue-text"></i>

                    <p class="font-weight-bold my-3">Teléfono</p>
                    <?php if (get_theme_mod('custom_brand_contact_phone') != "") : ?>
                        <p class="text-muted">
                            Tel.:&nbsp;<a href="tel:<?php echo get_theme_mod('custom_brand_contact_phone'); ?>"><?php echo get_theme_mod('custom_brand_contact_phone'); ?></a>
                            | Fax:&nbsp;<?php echo get_theme_mod('custom_brand_contact_fax'); ?>
                        </p>
                    <?php endif; ?>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">

                    <i class="fas fa-envelope fa-2x blue-text"></i>

                    <p class="font-weight-bold my-3">E-mail</p>
                    <?php if (get_theme_mod('custom_brand_contact_email') != "") : ?>
                        <p class="text-muted">
                            <a href="mailto:<?php echo get_theme_mod('custom_brand_contact_email'); ?>"><?php echo get_theme_mod('custom_brand_contact_email'); ?></a>
                        </p>
                    <?php endif; ?>

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->


            <hr>

            <!--Grid row-->
            <div class="row d-flex justify-content-center py-4">

                <!--Grid column-->
                <div class="col-md-6 text-center">

                    <?php if (get_theme_mod('custom_social_title_setting') != "") : ?>
                        <p class="font-weight-bold my-3">
                            <?php echo get_theme_mod('custom_social_title_setting'); ?>
                        </p>
                    <?php else : ?>
                        <p class="font-weight-bold my-3">
                            Síguenos en
                        </p>
                    <?php endif; ?>

                    <!--Facebook-->
                    <?php if (get_theme_mod('custom_facebook_setting') != '') { ?>
                        <a href="<?php echo get_theme_mod('custom_facebook_setting'); ?>" target="_blank" class="btn btn-social" role="button"><i class="fab fa-facebook-f"></i></a>
                    <?php } ?>

                    <?php if (get_theme_mod('custom_twitter_setting') != '') { ?>
                        <a href="<?php echo get_theme_mod('custom_twitter_setting'); ?>" target="_blank" class="btn btn-social" role="button"><i class="fab fa-twitter"></i></a>
                    <?php } ?>

                    <?php if (get_theme_mod('custom_instagram_setting') != '') { ?>
                        <a href="<?php echo get_theme_mod('custom_instagram_setting'); ?>" target="_blank" class="btn btn-social" role="button"><i class="fab fa-instagram"></i></a>
                    <?php } ?>

                    <?php if (get_theme_mod('custom_youtube_setting') != '') { ?>
                        <a href="<?php echo get_theme_mod('custom_youtube_setting'); ?>" target="_blank" class="btn btn-social" role="button"><i class="fab fa-youtube"></i></a>
                    <?php } ?>

                    <?php if (get_theme_mod('custom_linkedin_setting') != '') { ?>
                        <a href="<?php echo get_theme_mod('custom_linkedin_setting'); ?>" target="_blank" class="btn btn-social" role="button"><i class="fab fa-linkedin-in"></i></a>
                    <?php } ?>

                    <?php if (get_theme_mod('custom_pinterest_setting') != '') { ?>
                        <a href="<?php echo get_theme_mod('custom_pinterest_setting'); ?>" target="_blank" class="btn btn-social" role="button"><i class="fab fa-pinterest"></i></a>
                    <?php } ?>

                    <?php if (get_theme_mod('custom_github_setting') != '') { ?>
                        <a href="<?php echo get_theme_mod('custom_github_setting'); ?>" target="_blank" class="btn btn-social" role="button"><i class="fab fa-github"></i></a>
                    <?php } ?>


                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

            <hr>

            <!--Grid row-->
            <div class="row text-center pt-3 justify-content-center">

                <!--Grid column-->
                <div class="col-lg-6 col-md-6 mb-4 mb-md-0">

                    <i class="fas fa-clock fa-2x blue-text"></i>

                    <?php if (get_theme_mod('custom_contact_day_title_setting') != "") : ?>
                        <p class="font-weight-bold my-3">
                            <?php echo get_theme_mod('custom_contact_day_title_setting'); ?>
                        </p>
                    <?php else : ?>
                        <p class="font-weight-bold my-3">
                            Horario de atención
                        </p>
                    <?php endif; ?>

                    <?php if (get_theme_mod('custom_start_day_setting') != "") : ?>
                        <p class="text-muted">
                            <?php echo get_theme_mod('custom_start_day_setting'); ?>
                        <?php else : ?>
                            Lunes
                        <?php endif; ?>
                        a
                        <?php if (get_theme_mod('custom_end_day_setting') != "") : ?>
                            <?php echo get_theme_mod('custom_end_day_setting'); ?>
                        <?php else : ?>
                            Viernes

                        <?php endif; ?>

                        <?php if (!empty(get_theme_mod('custom_start_time_setting'))) : ?>
                            de <?php echo get_theme_mod('custom_start_time_setting'); ?>
                        <?php else : ?>
                            de 8:00 AM
                        <?php endif; ?>
                        a
                        <?php if (!empty(get_theme_mod('custom_end_time_setting'))) : ?>
                            <?php echo get_theme_mod('custom_end_time_setting'); ?>
                        <?php else : ?>
                            4:00 PM
                        <?php endif; ?>
                        </p>


                        <!-- otros horarios -->

                        <?php if (get_theme_mod('custom_another_contact_day_title_setting') != "") : ?>
                            <p class="font-weight-bold my-3">
                                <?php echo get_theme_mod('custom_another_contact_day_title_setting'); ?>
                            </p>
                        <?php endif; ?>
                        <p class="text-muted">
                            <?php if (get_theme_mod('custom_another_start_day_setting') != "") : ?>
                                <?php echo get_theme_mod('custom_another_start_day_setting'); ?>
                            <?php endif; ?>

                            <?php if (get_theme_mod('custom_another_end_day_setting') != "") : ?>
                                a <?php echo get_theme_mod('custom_another_end_day_setting'); ?>
                            <?php endif; ?>

                            <?php if (!empty(get_theme_mod('custom_another_start_time_setting'))) : ?>
                                de <?php echo get_theme_mod('custom_another_start_time_setting'); ?>
                            <?php endif; ?>

                            <?php if (!empty(get_theme_mod('custom_another_end_time_setting'))) : ?>
                                a <?php echo get_theme_mod('custom_another_end_time_setting'); ?>
                            <?php endif; ?>
                        </p>


                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

        </section>
        <!--Section: Content-->

    </div>
</div>