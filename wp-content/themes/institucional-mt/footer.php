<!-- Footer -->
<footer id="site-footer">
    <div id="footer-top" class="d-none d-sm-block">
        <div class="container py-5">
            <div class="mb-5">
                <div id="footer-top-1 text-center" class="col-12">
                    <img src="<?php echo get_template_directory_uri(); ?>/admin/image/escudo-light.svg" class="img-fluid mx-auto d-block" style="max-width: 80px;">
                </div><!-- footer row -->
                <div id="footer-top-2" class="col-12">
                    <nav class="navbar navbar-expand-md">
                        <?php wp_nav_menu(array(
                            'menu' => 'footer_top_2',
                            'theme_location' => 'footer_top_2',
                            'container' => 'div',
                            'container_class' => 'row col-md-12 justify-content-center',
                            'container_id' => 'footerTop2',
                            'items_wrap' => '<ul class="navbar-nav">%3$s</ul>',
                            'menu_class' => 'nav-link'
                        )); ?>
                    </nav>
                </div><!-- footer row -->
            </div>
            <div class="row">
                <div id="footer-column-1" class="col-3">
                    <!-- footer column -->
                    <nav class="navbar">
                        <?php wp_nav_menu(array(
                            'menu' => 'footer_column_1',
                            'theme_location' => 'footer_column_1',
                            'container' => 'div',
                            'container_class' => '',
                            'container_id' => 'footerColumn1',
                            'items_wrap' => '<ul class="nav flex-column text-left">%3$s</ul>',
                            'menu_class' => 'nav-link'
                        )); ?>
                    </nav>
                </div><!-- footer column -->
                <div id="footer-column-2" class="col-3">
                    <!-- footer column -->
                    <nav class="navbar">
                        <?php wp_nav_menu(array(
                            'menu' => 'footer_column_2',
                            'theme_location' => 'footer_column_2',
                            'container' => 'div',
                            'container_class' => '',
                            'container_id' => 'footerColumn2',
                            'items_wrap' => '<ul class="nav flex-column text-left">%3$s</ul>',
                            'menu_class' => 'nav-link'
                        )); ?>
                    </nav>
                </div><!-- footer column -->
                <div id="footer-column-3" class="col-3">
                    <!-- footer column -->
                    <nav class="navbar">
                        <?php wp_nav_menu(array(
                            'menu' => 'footer_column_3',
                            'theme_location' => 'footer_column_3',
                            'container' => 'div',
                            'container_class' => '',
                            'container_id' => 'footerColumn3',
                            'items_wrap' => '<ul class="nav flex-column text-left">%3$s</ul>',
                            'menu_class' => 'nav-link'
                        )); ?>
                    </nav>
                </div><!-- footer column -->
                <div id="footer-column-4" class="col-3">
                    <!-- footer column -->
                    <nav class="navbar">
                        <?php wp_nav_menu(array(
                            'menu' => 'footer_column_4',
                            'theme_location' => 'footer_column_4',
                            'container' => 'div',
                            'container_class' => '',
                            'container_id' => 'footerColumn4',
                            'items_wrap' => '<ul class="nav flex-column text-left">%3$s</ul>',
                            'menu_class' => 'nav-link'
                        )); ?>
                    </nav>
                </div><!-- footer column -->
            </div>
        </div>
    </div><!-- footer top -->
    <div id="footer-inset" class="text-white py-3">
        <div class="container">
            <div class="row">
                <!-- Footer left -->
                <div class="d-inline col-sm-12 col-md-4">
                    <?php if (is_active_sidebar('second-footer-left-widget-area')) : ?>
                        <?php dynamic_sidebar('second-footer-left-widget-area'); ?>
                    <?php endif; ?>
                </div>
                <!-- Footer center -->
                <div class="footer-center d-inline col-sm-12 col-md-4 text-center">
                    <?php if (is_active_sidebar('second-footer-center-widget-area')) : ?>
                        <?php dynamic_sidebar('second-footer-center-widget-area'); ?>
                    <?php endif; ?>
                    <img src="<?php echo esc_url(get_theme_mod('footer_logo')); ?>" class="img-fluid" style="max-width: 390px;">

                    <h4 class="footer-title"><?php echo get_bloginfo('name'); ?></h4>
                    <?php if (get_theme_mod('custom_brand_street_type') != "") : ?>
                        <p class="footer-text">
                            <?php echo get_theme_mod('custom_brand_street_type'); ?>
                            <?php echo get_theme_mod('custom_brand_street'); ?>
                            <?php echo get_theme_mod('custom_brand_location_number'); ?>
                            <br />
                            <?php echo get_theme_mod('custom_brand_location_reference'); ?>
                            <?php echo get_theme_mod('custom_brand_location_state'); ?>
                            <?php echo get_theme_mod('custom_brand_location_country'); ?>
                        </p>
                    <?php endif; ?>
                    <?php if (get_theme_mod('custom_brand_contact_phone') != "") : ?>
                        <p class="footer-text">
                            Tel.:&nbsp;<a href="tel:<?php echo get_theme_mod('custom_brand_contact_phone'); ?>"><?php echo get_theme_mod('custom_brand_contact_phone'); ?></a>
                            | Fax:&nbsp;<?php echo get_theme_mod('custom_brand_contact_fax'); ?>
                        </p>
                    <?php endif; ?>
                    <?php if (get_theme_mod('custom_brand_contact_email') != "") : ?>
                        <p class="footer-text">
                            <a href="mailto:<?php echo get_theme_mod('custom_brand_contact_email'); ?>"><?php echo get_theme_mod('custom_brand_contact_email'); ?></a>
                        </p>
                    <?php endif; ?>

                </div>
                <!-- Footer right -->
                <div id="footer-right" class="footer-right d-none d-sm-block">
                    <div class="d-inline col-sm-12 col-md-4">

                        <?php
                        if (get_theme_mod('footer_nortic') != '') {
                            echo get_theme_mod('footer_nortic');
                        } else {
                            dynamic_sidebar('footer-right-widget');
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- Footer bottom -->
        <div class="container">
            <!-- Footer Menu -->
            
            <?php if (has_nav_menu('footer-menu')) : ?>
                <nav class="footer-navigation" role="navigation" aria-label="" id="theme-footer-menu">
                    <?php wp_nav_menu(array(
                        'theme_location' => 'footer-menu',
                        'container' => 'div',
                        'container_class' => 'text-center',
                        'container_id' => 'theme-footer-menu',
                        'items_wrap' => '<ul class="list-unstyled list-inline">%3$s</ul>',
                        'menu_class' => 'list-inline-item'
                    )); ?>
                </nav><!-- End Footer Menu -->
            <?php endif; ?>
        </div>
    </div>
    <!-- Copyright -->
    <div id="copyright" class="footer-copyright text-center py-3">
        <?php echo get_theme_mod('footer_copyright'); ?>
    </div>
    <!-- Copyright -->
</footer>
<!-- /Footer -->

<!-- WordPress Scripts -->
<?php wp_footer(); ?>

</body>

</html>